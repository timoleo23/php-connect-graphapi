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

namespace Microsoft\Graph\Connect;

/**
 *  Stores constant and configuration values used through the app
 *
 *  @class    Constants
 *  @category Code_Sample
 *  @package  php-connect-rest-sample
 *  @author   Ricardo Loo <ricardol@microsoft.com>
 *  @license  MIT License
 *  @link     http://github.com/microsoftgraph/php-connect-rest-sample
 */
class Constants
{
    const CLIENT_ID = '430495fa-4fb7-4578-a62c-3e511a9b360d';
    const CLIENT_SECRET = 'hubVCXNLL2397}bwrgT4||~';
    const REDIRECT_URI = 'http://localhost:8000/oauth.php';
    const AUTHORITY_URL = 'https://login.microsoftonline.com/common';
    const AUTHORIZE_ENDPOINT = '/oauth2/v2.0/authorize';
    const TOKEN_ENDPOINT = '/oauth2/v2.0/token';
    const RESOURCE_ID = 'https://graph.microsoft.com';
    const SENDMAIL_ENDPOINT = '/v1.0/me/sendmail';
    const SCOPES='openid profile user.read mail.send';
}
