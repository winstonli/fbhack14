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

		/* Check position valid */

		if ($this->position != 1) {
			$query = $this->db->query("SELECT count(*) FROM music.song WHERE playlist_id = " .
				$this->playlist_id);

			if (!$query || !$query->num_rows) {
				return $this->error(NULL);
			}

			$result = $query->fetch_assoc();

			$query->close();

			$count = $result["count(*)"];

			if (!$count) {
				return $this->error("invalid position");
			}
		}

		$query = $this->db->query("UPDATE music.song SET position = position + 1 WHERE playlist_id = " .
			$this->playlist_id . " AND position >= " .
			$this->position);

		if (!$query) {
			return $this->error(NULL);
		}

		$query = $this->db->query("INSERT INTO music.song(playlist_id, position, youtube_url, name) VALUES (" .
			$this->playlist_id . ", " .
			$this->position . ", '" .
			$this->youtube_url . "', '" .
			$this->name . "')");
		if (!$query) {
			return $this->error("song already in playlist");
		}

		$query = $this->db->query("SELECT song_id, position, youtube_url, name FROM music.song WHERE playlist_id = " .
			$this->playlist_id . " ORDER BY position ASC");
		if (!$query || !$query->num_rows) {
			return $this->error(NULL);
		}

		$song_list = array();
		while ($result = $query->fetch_assoc()) {
			$song_list[] = $result;
		}

		return $this->success(array("playlist" => array("playlist_id" => $this->playlist_id),
							        "songs" => array("list" => $song_list)));
	}

}

?>