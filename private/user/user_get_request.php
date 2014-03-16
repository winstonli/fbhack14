<?php

include_once __DIR__ . "/../request/session_request.php";

class UserGetRequest extends SessionRequest {

	private $target_user_id;

	public function __construct($session_token, $target_user_id) {
		parent::__construct($session_token);
		$this->target_user_id = $this->db->escape_string($target_user_id);
	}

	public function request() {
		/* Check that it is a valid session. */
		if (!$this->valid_session()) {
			return false;
		}

		$query = $this->db->query("SELECT user_id, username, first_name, last_name, dp_url FROM user.user WHERE user_id = " .
			$this->target_user_id);
		if (!$query) {
			return $this->error(NULL);
		}
		if (!$query->num_rows) {
			return $this->error("invalid user");
		}

		$result = $query->fetch_assoc();

		$query->close();

		$self = $target_user_id == $this->user_id;

		$result["self"] = $self;

		return $this->success(array("user" => $result));
	}

}

?>