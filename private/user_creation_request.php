<?php

include_once __DIR__ . "/request.php";

class UserCreationRequest extends Request {

	private $username;
	private $password;
	private $first_name;
	private $last_name;

	public function __construct($session_token, $username, $password, $first_name, $last_name) {
		
	}

	public function request() {
		$query = $this->db->query("SELECT count(*) FROM user.user");
		if (!$query) {
			return $this->error("failed");
		}
		$result = $query->fetch_assoc();

		return $this->success($result["count(*)"]);
	}

}

?>