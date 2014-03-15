<?php

include_once __DIR__ . "/../request/session_request.php";

class PlaylistCreateRequest extends SessionRequest {

	private $name;

	public function __construct($session_token) {
		parent::__construct($session_token);
	}

	public function request() {
		/* ADD PW CHECK. */
		
		if (!$this->valid_session()) {
			return $this->error(NULL);
		}

		return $this->success($this->user_id);
	}

}

?>