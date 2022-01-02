<?php
session_start();
$file = $_GET['file'];
if (!$file) {
    return renderError();
}

$page = $_GET['page'];
switch ($file) {
    case 'button-js': {
            if ($page == 'finish' || isset($_SESSION['fb_access_token'])) {
                return require_once('./FB/fbconnect.php');
            }
            return require_once('./FB/button-js.php');
        }
    case 'button-php': {
            if ($page == 'finish' || isset($_SESSION['fb_access_token'])) {
                return require_once('./FB/fb-callback.php');
            }
            return require_once('./FB/login.php');
        }
    case 'login-gg.html': {
            return require_once('./GG/login.php');
        }
    case 'connect-gg.html': {
            return require_once('./GG/ggconnect.php');
        }
    case 'captcha': {
            return require_once('./GG/captcha.php');
        }
    case 'captcha-post': {
            return require_once('./GG/captcha-post.php');
        }
    default: {
            return renderError();
        }
}

function renderError()
{
    echo 'Params is empty or invalid!';
    die();
}

function renderUserInfo($id, $email, $name, $isToken = false, $link = false, $picture = false)
{
    echo '<b>Logged in as:</b> ' . $name;
    echo "<br/>";
    echo '<b>ID: </b>' . $id;
    echo "<br/>";
    echo '<b>Email: </b>' . $email;
    echo "<br/>";
    if ($link) {
        echo '<b>Link: </b>' . $link;
        echo "<br/>";
    }
    if ($picture) {
        echo '<b>Picture: </b>' . $picture;
        echo "<br/>";
    }
    echo '<b>HasToken: </b>' . ((string) $isToken);
}
