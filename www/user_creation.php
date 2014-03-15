<?php
echo "start\n";
include_once __DIR__ . "/../private/user_creation_request.php";
echo "included\n";
$request = new UserCreationRequest($_POST["session_token"], $_POST["username"], $_POST["password"], $_POST["first_name"], $_POST["last_name"]);
echo "created\n";
$request->request();
$request->output();

?>
