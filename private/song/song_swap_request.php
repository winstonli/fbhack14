<?php

include_once __DIR__ . "/../request/session_request.php";

class SongSwapRequest extends SessionRequest {

	private $playlist_id;
	private $position1;
	private $position2;

	public function __construct($session_token, $playlist_id, $position1, $position2) {
		parent::__construct($session_token);
		$this->playlist_id = $this->db->escape_string($playlist_id);
		$this->position1 = $this->db->escape_string($position1);
		$this->position2 = $this->db->escape_string($position2);
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

		$query = $this->db->query("SELECT count(*) FROM music.song WHERE playlist_id = " .
			$this->playlist_id . " AND position IN (" .
			$this->position1 . ", " .
			$this->position2 . ")");

		/* update positions */
		$query = $this->db->query("UPDATE music.song AS song1 JOIN music.song AS song2 ON (song1.position = " .
			$this->position1 . " AND song2.position = " .
			$this->position2 . ") SET song1.position = song2.position, song2.position = song1.position");

		if (!$query) {
			return $this->error(NULL);
		}
		if (!$this->db->affected_rows) {
			return $this->error("invalid position");
		}

		/* get new list for output */
		$query = $this->db->query("SELECT song_id, position, youtube_url, name FROM music.song WHERE playlist_id = " .
			$this->playlist_id . " ORDER BY position ASC");
		if (!$query || !$query->num_rows) {
			return $this->error(NULL);
		}

		$song_list = array();
		while ($result = $query->fetch_assoc()) {
			$song_list[] = $result;
		}

		$query->close();

		return $this->success(array("playlist" => array("playlist_id" => $this->playlist_id),
							        "songs" => array("list" => $song_list)));
	}

}

?>