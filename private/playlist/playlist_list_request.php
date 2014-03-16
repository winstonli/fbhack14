<?php

include_once __DIR__ . "/../request/request.php";

class PlaylistListRequest extends Request {

	private $user_id;

	public function __construct($user_id) {
		parent::__construct();
		$this->user_id = $this->db->escape_string($user_id);
	}

	public function request() {
		$query = $this->db->query("SELECT playlist_id, name FROM music.playlist WHERE user_id = " .
			$this->user_id);

		if (!$query) {
			return $this->error("invalid user");
		}

		$result = $query->fetch_assoc();

		$query->close();

		$playlist_list = array();

		while ($result = $query->fetch_assoc()) {
			$playlist_list[] = $result;
		}

		$query->close();

		return $this->success(array("playlists" => array("list" => "SELECT playlist_id, name FROM music.playlist WHERE user_id = " .
			$this->user_id)));
	}

}

?>