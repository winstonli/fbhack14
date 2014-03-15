<?php

include_once(__DIR__ . "/../private/user_creation_request.php");

echo 'hi1';
$request = new UserCreationRequest();
$request->request();
$request->output();

?>
