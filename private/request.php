<?php

include_once(__DIR__ . "/fbhmysqli.php");

abstract class Request {

	protected $db;
	protected $json;

	function __construct {
		// error_reporting(0);
		this->db = new FBHmysqli();
		$this->json = array();
		$this->db->autocommit(false);
	}

// 	public function output() {
// 		header("Content-type: application/json");
// 		// echo json_encode($this->output);
// 		echo 'hi' . json_encode($this->output);
// 	}
	
// 	abstract public function request();

// 	protected function error($error) {
// 		$this->output["error"] = $error;
// 		$this->databaseConnection->rollback();
// 		$this->databaseConnection->close();
// 		return false;
// 	}
	
// 	protected function success($success) {
// 		$this->output["success"] = $success;
// 		$this->databaseConnection->commit();
// 		$this->databaseConnection->close();
// 		return true;
// 	}
	
// 	private static function prettyPrint($json) {
// 		$result = '';
// 		$level = 0;
// 		$prev_char = '';
// 		$in_quotes = false;
// 		$ends_line_level = NULL;
// 		$json_length = strlen( $json );
	
// 		for ($i = 0; $i < $json_length; $i++) {
// 			$char = $json[$i];
// 			$new_line_level = NULL;
// 			$post = "";
// 			if($ends_line_level !== NULL) {
// 				$new_line_level = $ends_line_level;
// 				$ends_line_level = NULL;
// 			}
// 			if($char === '"' && $prev_char != '\\') {
// 				$in_quotes = !$in_quotes;
// 			} else if (!$in_quotes) {
// 				switch ($char) {
// 					case '}': case ']':
// 						$level--;
// 						$ends_line_level = NULL;
// 						$new_line_level = $level;
// 						break;
// 					case '{': case '[':
// 						$level++;
// 					case ',':
// 						$ends_line_level = $level;
// 						break;
// 					case ':':
// 						$post = " ";
// 						break;
// 					case " ": case "\t": case "\n": case "\r":
// 						$char = "";
// 						$ends_line_level = $new_line_level;
// 						$new_line_level = NULL;
// 						break;
// 				}
// 			}
// 			if($new_line_level !== NULL) {
// 				$result .= "\n".str_repeat( "\t", $new_line_level );
// 			}
// 			$result .= $char.$post;
// 			$prev_char = $char;
// 		}
	
// 		return $result;
// 	}

}

?>
