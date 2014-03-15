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
		echo "9\n";
		$query = $this->db->query("SELECT user_id FROM user.user WHERE username = '" .
			$this->username . "' AND password = '" .
			$this->password . "'");
		echo "8\n";
		if (!$query) {
			return $this->error(NULL);
		}
		echo "7\n";
		if (!$query->num_rows) {
			return $this->error("invalid login");
		}
		echo "6\n";
		$result = $query->fetch_assoc();

		echo "5\n";
		$query->close();

		echo "4\n";
		$user_id = $result["user_id"];

		echo "3\n";
		$session_token = md5($user_id . microtime());
		
		echo "2\n";
		$query = $this->databaseConnection->query(
			"INSERT INTO user.session VALUES (NULL, " . 
				$user_id . ", x'" . 
				$session_token . "')"
		);
		echo "1\n";
		if (!$query) {
			return $this->error(NULL);
		}

		return $this->success(array("session_token" => $session_token));
	}

}

?>