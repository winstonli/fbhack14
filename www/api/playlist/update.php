<?php

include_once __DIR__ . "/../../../private/playlist/playlist_update_request.php";

$request = new PlaylistUpdateRequest($_POST["session_token"], $_POST["playlist_id"], $_POST["name"]);
$request->request();
$request->output();

?>
