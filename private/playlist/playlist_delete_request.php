<?php

include_once __DIR__ . "/../request/session_request.php";

class PlaylistDeleteRequest extends SessionRequest {

	private $playlist_id;

	public function __construct($session_token, $playlist_id) {
		parent::__construct($session_token);
		$this->playlist_id = $this->db->escape_string($playlist_id);
	}

	public function request() {
		if (!$this->valid_session()) {
			return false;
		}
		$query = $this->db->query("DELETE FROM music.playlist WHERE user_id = " .
			$this->user_id . " AND playlist_id = " .
			$this->playlist_id);

		if (!$query || !$query->affected_rows) {
			return $this->error("playlist not owned by user");
		}

		return $this->success(NULL);
	}

}

?>