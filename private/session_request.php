<?php

include_once __DIR__ . "/request.php";

echo "Session reuqeet included\n";

class SessionRequest extends Request {

	private $session_token;

	public function __construct($session_token) {
		$this->session_token = $this->db->escape_string($session_token);
	}

	protected function valid_session() {
		return true;
	}

}

?>
