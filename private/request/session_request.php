<?php

include_once __DIR__ . "/request.php";

abstract class SessionRequest extends Request {

	private $session_token;
	private $user_id;

	public function __construct($session_token) {
		parent::__construct();
		$this->session_token = $this->db->escape_string($session_token);
	}

	protected function valid_session() {
		return true;
	}

}

?>
