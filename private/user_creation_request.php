<?php

include_once __DIR__ . "/request.php";

class UserCreationRequest extends Request {

	public function request() {
		$query = $this->db->query("SELECT count(*) FROMadsfasdfa user.user");
		if (!$query) {
			return $this->error("failed");
		}
		$result = $query->fetch_assoc();

		return $this->success($result["count(*)"]);
	}

}

?>