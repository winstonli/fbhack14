<?php

include_once __DIR__ . "/../../../private/playlist/playlist_get_request.php";

$request = new PlaylistGetRequest($_POST["playlist_get"]);
$request->request();
$request->output();

?>
