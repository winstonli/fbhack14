<?php

include_once __DIR__ . "/../../../private/user/user_login_request.php";

$request = new UserLoginRequest($_POST["username"],
								$_POST["password"]);
$request->request();
$request->output();

?>
