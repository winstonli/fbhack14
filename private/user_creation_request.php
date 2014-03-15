<?php

echo "trying to including base\n";

include_once __DIR__ . "/request.php";

echo "included base\n";

// public class UserCreationRequest extends Request {

// 	public function request() {
// 		$query = $this->db->request("SELECT count(*) FROM user.user");
// 		if (!$query) {
// 			return this->error("failed");
// 		}
// 		$result = $query->fetch_assoc();

// 		return $this->success($result["count(*)"]);
// 	}

// }

?>