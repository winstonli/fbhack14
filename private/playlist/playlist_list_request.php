<?php

include_once __DIR__ . "/../request/session_request.php";

class PlaylistListRequest extends SessionRequest {

	public function __construct($session_token, $user_id) {
		parent::__construct($session_token);
		$this->user_id = $this->db->escape_string($user_id);
	}

	public function request() {
		if (!is_numeric(user_id) && !$this->validSession()) {
			return false;
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