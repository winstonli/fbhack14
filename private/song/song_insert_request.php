<?php

include_once __DIR__ . "/../request/session_request.php";

class SongInsertRequest extends SessionRequest {

	private $playlist_id;
	private $position;
	private $youtube_url;
	private $name;

	public function __construct($session_token, $playlist_id, $position, $youtube_url, $name) {
		parent::__construct($session_token);
		$this->playlist_id = $this->db->escape_string($playlist_id);
		$this->position = $this->db->escape_string($position);
		$this->youtube_url = $this->db->escape_string($youtube_url);
		$this->name = $this->db->escape_string($name);
	}

	public function request() {
		/* Check that it is a valid session. */
		if (!$this->valid_session()) {
			return false;
		}

		return $this->success(NULL);

		$query = $this->db->query("INSERT INTO music.playlist(user_id, name, likes, url) VALUES (" .
			$this->user_id . ", '" .
			$this->name . "', 0, NULL)");

		if (!$query) {
			return $this->error("playlist name already used");
		}

		$query = $this->db->query("SELECT playlist_id FROM music.playlist WHERE user_id = " .
			$this->user_id . " AND name = '" .
			$this->name . "'");
		if (!$query || !$query->num_rows) {
			return $this->error(NULL);
		}

		$result = $query->fetch_assoc();

		$query->close();

		$playlist_id = $result["playlist_id"];

		return $this->success(array("playlist" => array("playlist_id" => $playlist_id)));
	}

}

?>