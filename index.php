<?php
session_start();
$file = $_GET['file'];
if(!$file){
    return renderError();
}

$page = $_GET['page'];
switch ($file){
    case 'button-js': {
        if($page == 'finish' || isset($_SESSION['fb_access_token'])){
            return require_once('./FB/fbconnect.php');
        }
        return require_once('./FB/button-js.php');
    }
    case 'button-php':{
        if($page == 'finish' || isset($_SESSION['fb_access_token'])){
            return require_once('./FB/fb-callback.php');
        }
        return require_once('./FB/login.php');
    }
    default: {
        return renderError();
    }
}

function renderError() {
    echo 'Params is empty or invalid!';
    die();
}

function renderUserInfo($me){
echo '<b>Logged in as:</b> ' . $me->getName();
echo "<br/>";
echo '<b>ID: </b>' . $me->getId();
echo "<br/>";
echo '<b>Email: </b>' . $me->getEmail();
echo "<br/>";
echo '<b>HasToken: </b>' . json_encode(!!$_SESSION['fb_access_token']);
}
