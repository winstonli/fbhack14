<?php

include_once __DIR__ . "/../request/session_request.php";

class UserUpdateFriendsRequest extends SessionRequest {

	private $friend_list;

	public function __construct($session_token, $friend_list) {
		parent::__construct($session_token);
		$this->friend_list = $friend_list;
	}

	public function request() {
		/* Check that it is a valid session. */
		if (!$this->valid_session()) {
			return false;
		}

		$friends = json_decode($this->friend_list, true);

		var_dump($friends);

		/* Ensure the fb ids match. */

		$query = $this->db->query("SELECT fb_id FROM user.user WHERE user_id = " .
			$this->user_id);

		if (!$query || !$query->num_rows) {
			return $this->error(NULL);
		}

		$result = $query->fetch_assoc();

		$query->close();
		
		$fb_user_id = $result["fb_id"];

		// if ($friends["id"] != $fb_user_id) {
		// 	return $this->error("invalid facebook id");
		// }

		/* do the update */

		$values = "(";

		foreach ($friends["friends"]["data"] as $friend) {
			echo $friend["first_name"] . "\n";
		}

		return $this->success(NULL);
	}

}

?>