<?php

include_once __DIR__ . "/../../../private/user/user_get_request.php";

$request = new UserGetRequest($_POST["session_token"],
							  $_POST["target_user_id"]);
$request->request();
$request->output();

?>
