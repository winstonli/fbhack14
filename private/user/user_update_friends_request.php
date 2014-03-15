<?php

include_once __DIR__ . "/../request/session_request.php";

class UserUpdateFriendsRequest extends SessionRequest {

	public function __construct($session_token) {
		parent::__construct($session_token);
	}

	public function request() {
		/* Check that it is a valid session. */
		if (!$this->valid_session()) {
			return false;
		}

		/* Check their fb account is linked. */

		$query = $this->db->query("SELECT fb_auth_token FROM user.user WHERE user_id = " .
			$this->user_id);
		if (!$query) {
			return $this->error(NULL);
		}
		if (!$query->num_rows) {
			return $this->error("not linked with facebook");
		}

		$result = $query->fetch_assoc();

		$query->close();

		$fb_auth_token = $result["fb_auth_token"];

		$friend_list = json_decode(file_get_contents("https://graph.facebook.com/me/friends?access_token=" . $fb_auth_token), true);

		/* Ensure the fb ids match. */

		$query = $this->db->query("SELECT fb_id FROM user.user WHERE user_id = " .
			$this->user_id);

		if (!$query || !$query->num_rows) {
			return $this->error(NULL);
		}

		$result = $query->fetch_assoc();

		$query->close();
		
		$fb_user_id = $result["fb_id"];

		if ($fb_user_id != $friend_list["id"]) {
			return $this->error("invalid facebook auth token");
		}

		/* do the update */

		$values = "(";

		foreach ($friend_list["friends"]["data"] as $friend) {
			echo $friend["first_name"] . "\n";
		}

		return $this->success(NULL);
	}

}

?>