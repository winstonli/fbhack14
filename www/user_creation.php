<?php

include_once __DIR__ . "/../private/user_creation_request.php";

$request = new UserCreationRequest();
$request->request();
$request->output();

?>
