<?php

include_once __DIR__ . "/../../../private/user/user_update_friends_request.php";

$request = new UserUpdateFriendsRequest($_POST["session_token"],
								 		$_POST["json"]);
$request->request();
$request->output();

?>
