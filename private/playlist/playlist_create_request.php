<?php

include_once __DIR__ . "/../request/session_request.php";

class PlaylistCreateRequest extends SessionRequest {

	private $name;

	public function __construct($session_token, $name) {
		parent::__construct($session_token);
		$this->name = $this->db->escape_string($name);
	}

	public function request() {
		/* Check that it is a valid session. */
		if (!$this->valid_session()) {
			return false;
		}

		$query = $this->db->query("INSERT INTO music.playlist(user_id, name, likes, url) VALUES (" .
			$this->user_id . ", '" .
			$this->name . "', 0, NULL)");

		if (!$query) {
			return $this->error("INSERT INTO music.playlist(user_id, name, likes, url) VALUES (" .
			$this->user_id . ", '" .
			$this->name . "', 0, NULL)");
		}

		$query->close();

		$query = $this->db->query("SELECT playlist_id FROM music.playlist WHERE user_id = " .
			$this->user_id . " AND name = '" .
			$this->name . "'");
		if (!$query || !$query->num_rows) {
			return $this->error(NULL);
		}

		return $this->success("got here4");

		$result = $query->fetch_assoc();

		$query->close();

		$playlist_id = $result["playlist_id"];

		return $this->success(array("playlist" => array("playlist_id" => $playlist_id)));
	}

}

?>