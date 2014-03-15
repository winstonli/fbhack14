<?php

include_once __DIR__ . "/../request/session_request.php";

class SongRemoveRequest extends SessionRequest {

	private $playlist_id;
	private $position;

	public function __construct($session_token, $playlist_id, $position) {
		parent::__construct($session_token);
		$this->playlist_id = $this->db->escape_string($playlist_id);
		$this->position = $this->db->escape_string($position);
	}

	public function request() {
		/* Check that it is a valid session. */
		if (!$this->valid_session()) {
			return false;
		}

		/* Check for owner of playlist */

		$query = $this->db->query("SELECT count(*) FROM music.playlist WHERE user_id = " .
			$this->user_id . " AND playlist_id = " .
			$this->playlist_id);

		if (!$query || !$query->num_rows) {
			return $this->error(NULL);
		}

		$result = $query->fetch_assoc();

		$query->close();

		$count = $result["count(*)"];

		if (!$count) {
			return $this->error("playlist not owned by user");
		}

		/* Do remove */
		$query = $this->db->query("DELETE FROM music.song WHERE playlist_id = " .
			$this->playlist_id . " AND position = " .
			$this->position);
		if (!$query) {
			return $this->error(NULL);
		}
		if (!$this->db->affected_rows) {
			return $this->error("song not in playlist");
		}

		return $this->success(NULL);
	}

}

?>