<?php

include_once __DIR__ . "/../request/session_request.php";

class PlaylistSessionRequest extends SessionRequest {

	private $playlist_id;

	public function __construct($playlist_id) {
		parent::__construct();
		$this->playlist_id = $this->db->escape_string($playlist_id);
	}

	public function request() {
		$query = $this->db->query("DELETE FROM music.playlist WHERE user_id = " .
			$this->user_id . " AND playlist_id = " .
			$this->playlist_id);

		if (!$query) {
			return $this->error("playlist not owned by user");
		}

		return $this->success(NULL);
	}

}

?>