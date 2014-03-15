<?php

include_once __DIR__ . "/../request/request.php";

class UserLoginRequest extends Request {

	private $username;
	private $password;

	public function __construct($username, $password) {
		parent::__construct();
		$this->username = $this->db->escape_string($username);
		$this->password = $this->db->escape_string($password);
	}

	public function request() {
		/* ADD PW CHECK. */
		$query = $this->db->query("SELECT user_id FROM user.user WHERE username = '" .
			$this->username . "' AND password = '" .
			$this->password . "'");
		if (!$query) {
			return $this->error(NULL);
		}
		if (!$query->num_rows) {
			return $this->error("invalid login");
		}
		$result = $query->fetch_assoc();

		$query->close();

		$user_id = $result["user_id"];

		$session_token = md5($user_id . microtime());
		
		$query = $this->databaseConnection->query(
			"INSERT INTO user.sessions VALUES (NULL, " . 
				$user_id . ", x'" . 
				$sessionToken . "')"
		);
		if (!$query) {
			return $this->error(NULL);
		}

		echo "nearly req\n";
		return $this->success(array("session_token" => $session_token));
	}

}

?>