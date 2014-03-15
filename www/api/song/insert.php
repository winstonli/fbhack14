<?php

include_once __DIR__ . "/../../../private/song/song_insert_request.php";

$request = new SongInsertRequest($_POST["session_token"],
								 $_POST["playlist_id"],
								 $_POST["position"],
								 $_POST["youtube_url"],
								 $_POST["name"]);
$request->request();
$request->output();

?>
