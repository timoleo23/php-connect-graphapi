<?php
/**
 *  Copyright (c) Microsoft. All rights reserved. Licensed under the MIT license.
 *  See LICENSE in the project root for license information.
 *
 *  PHP version 5
 *
 *  @category Code_Sample
 *  @package  php-connect-rest-sample
 *  @author   Ricardo Loo <ricardol@microsoft.com>
 *  @license  MIT License
 *  @link     http://github.com/microsoftgraph/php-connect-rest-sample
 */
 
/*! 
    @abstract User is directed to this page after the web app gets tokens.
              The page offers UI to send a welcome email to the specified account. 
 */

require_once("../autoload.php");

use Microsoft\Graph\Connect\MailManager;

//We store user name, id, and tokens in session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Use the given name if it exists, otherwise, use the alias
$greetingName = isset($_SESSION['given_name'])
                ? $_SESSION['given_name']
                : explode('@', $_SESSION['preferred_username'])[0];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Microsoft Graph Connect sample</title>

  <!-- Third party dependencies. -->
  <link 
      rel="stylesheet" 
      href="https://appsforoffice.microsoft.com/fabric/1.0/fabric.css">
  <link 
      rel="stylesheet" 
      href="https://appsforoffice.microsoft.com/fabric/1.0/fabric.components.css">
  
  <!-- App code. -->
  <link rel="stylesheet" href="styles.css">
  
</head>

<body class="ms-Grid">
    <div class="ms-Grid-row">
    <!-- App navigation bar markup. -->
    <div class="ms-NavBar">
    <ul class="ms-NavBar-items">
        <li class="navbar-header">Microsoft Graph Connect sample</li>
        <li 
            class="ms-NavBar-item ms-NavBar-item--right" 
            onclick="window.location.href='disconnect.php'">
            <i class="ms-Icon ms-Icon--x"></i> Disconnect
        </li>
    </ul>
    </div>

    <!-- App main content markup. -->
    <form action="" method="post">
    <div class="ms-Grid-col ms-u-mdPush1 ms-u-md9 ms-u-lgPush1 ms-u-lg6">
    <div>
        <h2 class="ms-font-xxl ms-fontWeight-semibold">
            Hi, <?php echo $greetingName; ?>!
        </h2>
        <p class="ms-font-xl">
            You're now connected to Microsoft Graph. Click the button below to send a 
            message from your account using the Microsoft Graph.
        </p>
        <div class="ms-TextField">
        <input 
            class="ms-TextField-field" 
            name="recipient" 
            value="<?php echo $_SESSION['preferred_username']; ?>"
        >
        </div>
        <button class="ms-Button">
                <span class="ms-Button-label">Send mail</span>
        </button>
        <div>
            <?php
                // The user clicked the "Send mail" button
            if ($_SERVER['REQUEST_METHOD'] === 'POST'
                && isset($_POST['recipient'])
            ) {
                try {
                    MailManager::sendWelcomeMail($_POST['recipient']);
            ?>
                        <p 
                            class="ms-font-m ms-fontColor-green">
                            Successfully sent an email to 
                            <?php echo $_POST['recipient']; ?>!
                        </p>
            <?php
                } catch (\RuntimeException $e) {
                ?>
                        <p 
                            class="ms-font-m ms-fontColor-redDark">
                            Something went wrong, couldn't send an email. <?php echo $e->getMessage(); ?>
                        </p>
            <?php
                }
            }
            ?>
        
        </div>
    </div>
    </div>
    </form>
</div>
</body>

</html>
