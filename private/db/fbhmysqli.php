<?php

class FBHmysqli extends mysqli {

	const mysql_server = "localhost";
	const mysql_username = "root";
	const mysql_password = "JzN7sTZHi4nA";

	public function __construct() {
		parent::__construct(FBHmysqli::mysql_server, FBHmysqli::mysql_username, FBHmysqli::mysql_password);
	}

}

?>
