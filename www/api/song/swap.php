<?php

include_once __DIR__ . "/../../../private/song/song_remove_request.php";

$request = new SongRemoveRequest($_POST["session_token"],
								 $_POST["playlist_id"],
								 $_POST["position"]);
$request->request();
$request->output();

?>
