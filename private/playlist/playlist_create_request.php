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
			return $this->error("playlist name already used");
		}

		$query = $this->db->query("SELECT playlist_id, name FROM music.playlist WHERE user_id = " .
			$this->user_id . " ORDER BY name ASC");

		if (!$query) {
			return $this->error("invalid user");
		}

		$playlist_list = array();

		while ($result = $query->fetch_assoc()) {
			$playlist_list[] = $result;
		}

		$query->close();

		return $this->success(array("playlists" => array("list" => $playlist_list)));
	}

}

?>