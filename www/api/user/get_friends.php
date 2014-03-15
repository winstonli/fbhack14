<?php

include_once __DIR__ . "/../../../private/user/user_get_friends_request.php";

$request = new UserGetFriendsRequest($_POST["session_token"]);
$request->request();
$request->output();

?>
