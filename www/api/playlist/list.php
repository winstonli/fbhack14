<?php

include_once __DIR__ . "/../../../private/playlist/playlist_list_request.php";

$request = new PlaylistListRequest($_POST["user_id"]);
$request->request();
$request->output();

?>
