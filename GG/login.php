<?php
 
 require_once('./vendor/google-api-php-client/vendor/autoload.php');
 
// Lấy những giá trị này từ https://console.google.com
$client_id = '552504942422-n1pgqclbnsb70mmkrbum6nabp92pkqo5.apps.googleusercontent.com'; 
$client_secret = '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';
$redirect_uri = 'https://login-3rd.com?file=login-gg.html';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");
 
$service = new Google_Service_Oauth2($client);
 
// Nếu kết nối thành công, sau đó xử lý thông tin và lưu vào database
if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    //header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    $user = $service->userinfo->get(); //get user info 
    renderUserInfo($user->id, $user->email, $user->name, !!$_SESSION['access_token'], $user->link, $user->picture);

    exit;
}
 
//Nếu sẵn sàng kết nối, sau đó lưu session với tên access_token
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else { // Ngược lại tạo 1 link để login
    $authUrl = $client->createAuthUrl();
}
 
//Hiển thị button để login
echo '<div style="margin:20px">';
if (isset($authUrl)){ 
    //show login url
    echo '<div align="center">';
    echo '<h3>Login with Google -- Demo</h3>';
    echo '<div>Please click login button to connect to Google.</div>';
    echo '<a class="login" href="' . $authUrl . '">LOGIN</a>';
    echo '</div>';
     
} 
echo '</div>';