<?php

include_once __DIR__ . "/../request/request.php";

class UserLoginFBRequest extends Request {

	private $fb_auth_token;

	public function __construct($fb_auth_token) {
		parent::__construct();
		$this->fb_auth_token = $this->db->escape_string($fb_auth_token);
	}

	public function request() {
		$fb_profile = json_decode(file_get_contents("https://graph.facebook.com/me?fields=picture.type(square),first_name,last_name,username&access_token=" . $this->fb_auth_token), true);

		if ($fb_profile["error"]) {
			return $this->error("invalid auth token");
		}

		$fb_user_id = $this->db->escape_string($fb_profile["id"]);

		$query = $this->db->query("SELECT user_id FROM user.user WHERE fb_id = " .
			$fb_user_id);
		if (!$query) {
			return $this->error(NULL);
		}
		if ($query->num_rows) {
			$result = $query->fetch_assoc();
			$query->close();
			$user_id = $result["user_id"];

			$session_token = md5($user_id . microtime());
			
			$query = $this->db->query(
				"INSERT INTO user.session VALUES (NULL, " . 
					$user_id . ", x'" . 
					$session_token . "')"
			);

			if (!$query) {
				return $this->error(NULL);
			}

			return $this->success(array("session_token" => $session_token));
		} else {
			$query = $this->db->query("INSERT INTO user.user(username, first_name, last_name, dp_url, fb_auth_token, fb_id) VALUES ('" .
			$this->db->escape_string($fb_profile["username"]) . "', '" .
			$this->db->escape_string($fb_profile["first_name"]) . "', '" .
			$this->db->escape_string($fb_profile["last_name"]) . "', '" .
			$this->db->escape_string($fb_profile["picture"]["data"]["url"]) . "', '" .
			$this->fb_auth_token . "', " .
			$fb_user_id . ")");

			$query = $this->db->query("SELECT user_id FROM user.user WHERE fb_id = " .
				$fb_user_id);
			if (!$query) {
				return $this->error(NULL);
			}

			$result = $query->fetch_assoc();
			$query->close();
			$user_id = $result["user_id"];

			$session_token = md5($user_id . microtime());
			
			$query = $this->db->query(
				"INSERT INTO user.session VALUES (NULL, " . 
					$user_id . ", x'" . 
					$session_token . "')"
			);

			if (!$query) {
				return $this->error(NULL);
			}

			return $this->success(array("session_token" => $session_token));
		}
	}

}

?>