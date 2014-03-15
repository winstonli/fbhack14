<?php

include_once __DIR__ . "/../../../private/user/user_link_fb_request.php";

$request = new UserLinkFBRequest($_POST["session_token"],
								 $_POST["fb_auth_token"]);
$request->request();
$request->output();

?>
