<?php

include_once __DIR__ . "/../private/user_creation_request.php";

echo "start\n";

$request = new UserCreationRequest($_POST["username"],
								   $_POST["password"],
								   $_POST["first_name"],
								   $_POST["last_name"]);
echo "constructed\n";
$request->request();
$request->output();

?>
