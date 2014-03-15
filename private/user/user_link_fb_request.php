<?php

include_once __DIR__ . "/../request/session_request.php";

class UserLinkFBRequest extends SessionRequest {

	private $fb_auth_token;

	public function __construct($session_token, $fb_auth_token) {
		parent::__construct($session_token);
		$this->fb_auth_token = $this->db->escape_string($fb_auth_token);
	}

	public function request() {
		/* Check that it is a valid session. */
		if (!$this->valid_session()) {
			return false;
		}

		
		$fb_user_id = "123";

		$query = $this->db->query("UPDATE user.user SET fb_id = " .
			$fb_user_id . " WHERE user_id = " .
			$this->user_id);
		if (!$query) {
			return $this->error(NULL);
		}

		return $this->success(NULL);
	}

}

?>