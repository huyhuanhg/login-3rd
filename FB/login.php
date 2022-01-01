<?php
require_once('./vendor/php-graph-sdk/src/Facebook/autoload.php');
$fb = new Facebook\Facebook([
    'app_id' => '1455099791558695',
    'app_secret' => 'bef4bfcf45b688f9a23b9f08d641d365',
    'default_graph_version' => 'v2.9',
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://login-3rd.com/?file=button-php&page=finish', $permissions);
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
