<?php
$fb = new Facebook\Facebook([
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => FB_DEFAULT_GRAPH_VERSION,
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://login-3rd.com/?file=button-php&page=finish', $permissions);
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
