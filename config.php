<?php

// OAuth & site configuration
$YT_oauthClientID     = '';
$YT_oauthClientSecret = '';
$baseURL           = 'https://cokain.fr/rootdossier';
$redirectURL       = $baseURL.'/upload.php';



$DM_apiKey        = '';
$DM_apiSecret     = '';
// $DM_testUser      = '';
// $DM_testPassword  = '';


define('OAUTH_CLIENT_ID',$YT_oauthClientID);
define('OAUTH_CLIENT_SECRET',$YT_oauthClientSecret);
define('REDIRECT_URL',$redirectURL);
define('BASE_URL',$baseURL);

// Include google client libraries
require_once 'google-api-php-client/src/Google/autoload.php'; 
require_once 'google-api-php-client/src/Google/Client.php';
require_once 'google-api-php-client/src/Google/Service/YouTube.php';

if(!session_id()) session_start();

$client = new Google_Client();
$client->setClientId(OAUTH_CLIENT_ID);
$client->setClientSecret(OAUTH_CLIENT_SECRET);
$client->setScopes('https://www.googleapis.com/auth/youtube');
$client->setRedirectUri(REDIRECT_URL);

// Define an object that will be used to make all API requests.
$youtube = new Google_Service_YouTube($client);
    
?>