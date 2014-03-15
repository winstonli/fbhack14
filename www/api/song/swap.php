<?php

include_once __DIR__ . "/../../../private/song/song_swap_request.php";

$request = new SongSwapRequest($_POST["session_token"],
								 $_POST["playlist_id"],
								 $_POST["position1"],
								 $_POST["position2"]);
$request->request();
$request->output();

?>
