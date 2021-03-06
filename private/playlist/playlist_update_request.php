<?php

include_once __DIR__ . "/../request/session_request.php";

class PlaylistUpdateRequest extends SessionRequest {

	private $playlist_id;
	private $name;

	public function __construct($session_token, $playlist_id, $name) {
		parent::__construct($session_token);
		$this->playlist_id = $this->db->escape_string($playlist_id);
		$this->name = $this->db->escape_string($name);
	}

	public function request() {
		if (!$this->valid_session()) {
			return false;
		}
		$query = $this->db->query("UPDATE music.playlist SET name = '" .
			$this->name . "' WHERE user_id = " .
			$this->user_id . " AND playlist_id = " .
			$this->playlist_id);

		if (!$query || !$this->db->affected_rows) {
			return $this->error("name not changed or playlist not owned by user");
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