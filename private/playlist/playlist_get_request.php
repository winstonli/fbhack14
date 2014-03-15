<?php

include_once __DIR__ . "/../request/request.php";

class PlaylistGetRequest extends Request {

	private $playlist_id;

	public function __construct($playlist_id) {
		parent::__construct();
		$this->playlist_id = $this->db->escape_string($playlist_id);
	}

	public function request() {
		$query = $this->db->query("SELECT song_id, position, youtube_url FROM music.song WHERE playlist_id = " .
			$this->playlist_id);

		if (!$query) {
			return $this->error("SELECT song_id, position, youtube_url FROM music.song WHERE playlist_id = " .
			$this->playlist_id);
		}

		$song_list = array();

		while ($result = $query->fetch_assoc()) {
			$song_list[] = $result;
		}

		$query->close();

		return $this->success(array("playlist" => array("playlist_id" => $playlist_id,
													    "songs" => array("list" => $song_list))));
	}

}

?>