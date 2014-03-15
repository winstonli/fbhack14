<?php

include_once __DIR__ . "/../../../private/playlist/playlist_create_request.php";

$request = new PlaylistCreateRequest($_POST["session_token"], $_POST["name"]);
$request->request();
$request->output();

?>
