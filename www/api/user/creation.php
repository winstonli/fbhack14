<?php

include_once __DIR__ . "/../../../private/user/user_creation_request.php";

$request = new UserCreationRequest($_POST["username"],
								   $_POST["password"],
								   $_POST["first_name"],
								   $_POST["last_name"]);
$request->request();
$request->output();

?>
