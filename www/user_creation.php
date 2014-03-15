<?php

include_once(__DIR__ . "/../private/user_creation_request.php");

$request = new UserCreationRequest();
echo "hi\n";
$request->request();
echo "hi2\n";
$request->output();
echo "done\n";

?>
