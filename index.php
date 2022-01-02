<?php
session_start();

require_once('./vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once('./load_default/helper.php');
require_once('./load_default/define.php');

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
    case 'send-mail': {
        return require_once('./Mail/send-mail.php');
    }
    default: {
            return renderError();
        }
}
