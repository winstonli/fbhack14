<?php

include_once __DIR__ . "/../../../private/playlist/playlist_delete_request.php";

$request = new PlaylistDeleteRequest($_POST["session_token"], $_POST["playlist_id"]);
$request->request();
$request->output();

?>
