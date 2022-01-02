<?php

// v2
// =============

$response = $_POST['g-recaptcha-response'];
$ip = $_SERVER['REMOTE_ADDR'];
 $list = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . GG_CAPTCHA_V2_SECRET . "&response=$response&remoteip=$ip");
 print_r($list);





// v3

// if (isset($_POST['g-recaptcha-response'])) {
//    $captcha = $_POST['g-recaptcha-response'];
// } else {
//     $captcha = false;
// }
// if (!$captcha) {
//     //Do something with error
// } else {
//    $response = file_get_contents(
//        "https://www.google.com/recaptcha/api/siteverify?secret=" . GG_CAPTCHA_V3_SECRET . "&response=" . $response . "&remoteip=" . $ip
//    );
//
//    print_r($response);
    // use json_decode to extract json response
//     $response = json_decode($response);

//     if ($response->success === false) {
//         //Do something with error
//     }
// }

// //... The Captcha is valid you can continue with the rest of your code
// //... Add code to filter access using $response . score
// if ($response->success==true && $response->score <= 0.5) {
//     //Do something to denied access
// }