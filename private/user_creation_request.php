<?php

include_once __DIR__ . "/request.php";

class UserCreationRequest extends Request {

	public function request() {
		$query = $this->db->query("SELECT count(*) FROM user.user");
		echo "got past query\n";
		if (!$query) {
			return $this->error("failed");
		}
		echo "not null\n";
		$result = $query->fetch_assoc();
		echo "got result: ". $result["count(*)"] . " \n";

		return $this->success($result["count(*)"]);
	}

}

?>