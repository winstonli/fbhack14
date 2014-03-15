<?php

include_once __DIR__ . "/request.php";

abstract class SessionRequest extends Request {

	private $session_token;
	protected $user_id;

	public function __construct($session_token) {
		parent::__construct();
		$this->session_token = $this->db->escape_string($session_token);
	}

	protected function valid_session() {
		$query = $this->db->query(
			"SELECT user_id FROM user.session WHERE session_token = x'" .
				$this->session_token . "'"
		);
		if (!$query) {
			return $this->error(NULL);
		}
		if (!$query->num_rows) {
			return $this->error("invalid session");
		}
		$result = $query->fetch_assoc();
		$this->user_id = $result["user_id"];
		
		$query->close();
		return true;
	}

}

?>
