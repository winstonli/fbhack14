<?php

include_once __DIR__ . "/../request/request.php";

class PlaylistGetRequest extends Request {

	private $playlist_id;

	public function __construct($playlist_id) {
		parent::__construct();
		$this->playlist_id = $this->db->escape_string($playlist_id);
	}

	public function request() {
		$query = $this->db->query("SELECT name FROM music.playlist WHERE playlist_id = " .
			$this->playlist_id);

		if (!$query) {
			return $this->error(NULL);
		}
		if (!$query->num_rows) {
			return $this->error("no such playlist");
		}

		$result = $query->fetch_assoc();

		$query->close();

		$playlist_name = $result["name"];

		$query = $this->db->query("SELECT song_id, position, youtube_url, name FROM music.song WHERE playlist_id = " .
			$this->playlist_id . " ORDER BY name ASC");

		if (!$query) {
			return $this->error(NULL);
		}

		$song_list = array();

		while ($result = $query->fetch_assoc()) {
			$song_list[] = $result;
		}

		$query->close();

		return $this->success(array("playlist" => array("playlist_id" => $this->playlist_id,
													    "name" => $playlist_name,
													    "songs" => array("list" => $song_list))));
	}

}

?>