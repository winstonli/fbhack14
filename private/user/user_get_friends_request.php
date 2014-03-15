<?php

include_once __DIR__ . "/../request/session_request.php";

class UserGetFriendsRequest extends SessionRequest {

	public function __construct($session_token) {
		parent::__construct($session_token);
	}

	public function request() {
		/* Check that it is a valid session. */
		if (!$this->valid_session()) {
			return false;
		}

		$query = $this->db->query("SELECT user.user.user_id, first_name, last_name, username FROM user.user JOIN user.friend ON user.user.fb_id = user.friend.friend.fb_id WHERE user.friend.user_id = " .
			$this->user_id);
		if (!$query) {
			return $this->error(NULL);
		}

		$friend_list = array();
		while ($result = $query->fetch_assoc()) {
			$friend_list[] = $result;
		}

		return $this->success(array("friends" => array("list" => $friend_list)));
	}

}

?>