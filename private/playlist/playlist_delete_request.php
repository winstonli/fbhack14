<?php

include_once __DIR__ . "/../request/session_request.php";

class PlaylistDeleteRequest extends SessionRequest {

	private $playlist_id;

	public function __construct($session_token, $playlist_id) {
		parent::__construct($session_token);
		$this->playlist_id = $this->db->escape_string($playlist_id);
	}

	public function request() {
		$query = $this->db->query("DELETE FROM music.playlist WHERE user_id = " .
			$this->user_id . " AND playlist_id = " .
			$this->playlist_id);

		if (!$query) {
			return $this->error("DELETE FROM music.playlist WHERE user_id = " .
			$this->user_id . " AND playlist_id = " .
			$this->playlist_id);
		}

		return $this->success(NULL);
	}

}

?>