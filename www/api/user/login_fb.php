<?php

include_once __DIR__ . "/../../../private/user/user_login_fb_request.php";

$request = new UserLoginFBRequest($_POST["fb_auth_token"]);
$request->request();
$request->output();

?>
