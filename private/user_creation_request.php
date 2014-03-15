<?php

include_once __DIR__ . "/request.php";

class UserCreationRequest extends Request {

	private $username;
	private $password;
	private $first_name;
	private $last_name;

	public function __construct($username, $password, $first_name, $last_name) {
		parent::__construct();
		$this->username = $this->db->escape_string($username);
		$this->password = $this->db->escape_string($password);
		$this->first_name = $this->db->escape_string($first_name);
		$this->last_name = $this->db->escape_string($last_name);
	}

	public function request() {
		/* ADD PW CHECK. */
		$query = $this->db->query("INSERT INTO user.user(username, password, first_name, last_name) VALUES ('" .
			$this->username . "', '" .
			$this->password . "', '" .
			$this->first_name . "', '" .
			$this->last_name . "')");
		if (!$query) {
			return $this->error(NULL);
		}

		return $this->success(NULL);
	}

}

?>