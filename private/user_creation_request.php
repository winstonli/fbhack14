<?php

include_once __DIR__ . "/request.php";

class UserCreationRequest extends Request {

	private $username;
	private $password;
	private $first_name;
	private $last_name;

	public function __construct($username, $password, $first_name, $last_name) {
		$this->username = $this->db->escape_string($username);
		$this->password = $this->db->escape_string($password);
		$this->first_name = $this->db->escape_string($first_name);
		$this->last_name = $this->db->escape_string($last_name);
	}

	public function request() {
		if (!$this->valid_session()) {
			return $this->error("invalid session");
		}

		$query = $this->db->query("SELECT count(*) FROM user.user");
		if (!$query) {
			return $this->error("failed");
		}
		$result = $query->fetch_assoc();

		return $this->success($result["count(*)"]);
	}

}

?>