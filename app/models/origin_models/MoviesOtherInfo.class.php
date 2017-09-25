<?php 
class MoviesOtherInfoClass { 

	 const TBL = 'movies_other_infos'; 

	 public $movie; 
	 public $movie_id; 
	 public $other_info; 
	 public $other_info_id; 

	 function __construct($params = array()) { 
		 $movie = new Movie(); 
		 if($params['movie_id'] != '') { 
			 $this->movie = $movie->find($params['movie_id']); 
		 } else { 
			 $this->movie = $movie; 
		 } 
		 $this->movie_id = $params['movie_id']; 
		 $other_info = new OtherInfo(); 
		 if($params['other_info_id'] != '') { 
			 $this->other_info = $other_info->find($params['other_info_id']); 
		 } else { 
			 $this->other_info = $other_info; 
		 } 
		 $this->other_info_id = $params['other_info_id']; 
	 } 

	 public function get_movie() { 
		 return $this->movie; 
	 } 

	 public function set_movie($movie_id) { 
		 $movie = new Movie(); 
		 $this->movie = $movie->find($movie_id); 
	 } 

	 public function get_movie_id($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->movie_id); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->movie_id); 
		 } else { 
			 $return = $this->movie_id; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_movie_id($movie_id) { 
		 $this->movie_id = $movie_id; 
	 } 

	 public function get_other_info() { 
		 return $this->other_info; 
	 } 

	 public function set_other_info($other_info_id) { 
		 $other_info = new OtherInfo(); 
		 $this->other_info = $other_info->find($other_info_id); 
	 } 

	 public function get_other_info_id($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->other_info_id); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->other_info_id); 
		 } else { 
			 $return = $this->other_info_id; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_other_info_id($other_info_id) { 
		 $this->other_info_id = $other_info_id; 
	 } 

	 public function get_field_type_movie_id() { 
		 return 'i'; 
	 } 

	 public function get_field_type_other_info_id() { 
		 return 'i'; 
	 } 

	 public function get_fields_type() { 
		 $type_fields = ''; 
		 $type_fields .= $this->get_field_type_movie_id(); 
		 $type_fields .= $this->get_field_type_other_info_id(); 
		 return $type_fields; 
	 } 

	 public function all($order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL ; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies_other_infos[] = new MoviesOtherInfo($row); 
		 } 
		 return $movies_other_infos; 
	 } 

	 public function find($movie_id, $other_info_id) { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL."  WHERE movie_id = ? AND other_info_id = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_movie_id(); 
		 $fields_type .= $this->get_field_type_other_info_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, $movie_id, $other_info_id); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 $stmt->fetch(); 
		 return new MoviesOtherInfo($row); 
	 } 

	 public function find_by_movie_id($movie_id, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE movie_id = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_movie_id(), $movie_id); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies_other_infos[] = new MoviesOtherInfo($row); 
		 } 
		 return $movies_other_infos; 
	 } 

	 public function find_by_other_info_id($other_info_id, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE other_info_id = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_other_info_id(), $other_info_id); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies_other_infos[] = new MoviesOtherInfo($row); 
		 } 
		 return $movies_other_infos; 
	 } 

	 public function init_update_attributes($params = array()) { 
		 if (isset($params['movie_id'])) { 
			 $this->movie_id = $params['movie_id']; 
		 } 
		 if (isset($params['other_info_id'])) { 
			 $this->other_info_id = $params['other_info_id']; 
		 } 
	 } 

	 public function update_attributes($params = array(), &$error = array(), $encoding = '', $init = array()) { 
		 $this->init_update_attributes($init); 
		 $this->before_save($params, $error, $encoding ); 
			 $this->before_update($params, $error, $encoding); 
			 $this->update($encoding); 
			 $this->after_update($params, $error, $encoding); 
		 $this->after_save($params, $error, $encoding); 
	 } 

	 public function save($params = array(), &$error = array(), $encoding = '') { 
		 $this->before_save($params, $error, $encoding); 
		 $this->before_insert($params, $error, $encoding); 
		 $save = $this->insert($encoding); 
		 $this->after_insert($params, $error, $encoding); 
		 $this->after_save($params, $error, $encoding); 
		 return $save; 
	 } 

	 public function before_save($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function after_save($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function before_insert($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function after_insert($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function before_update($params = array(), &$error = array(), $encoding = '') { 
		 $movies_other_info = new MoviesOtherInfo(); 
		 $movies_other_info = $movies_other_info->find($this->id); 
	 } 

	 public function after_update($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function insert($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "INSERT INTO ".self::TBL." VALUES ( ?, ? );"; 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_fields_type(), trim($this->get_movie_id($encoding)), trim($this->get_other_info_id($encoding))); 
		 $stmt->execute(); 
		 return $mysqli->insert_id; 
	 } 

	 public function update($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET  WHERE movie_id = ?  AND other_info_id  = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_movie_id(); 
		 $fields_type .= $this->get_field_type_other_info_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, trim($this->get_movie_id($encoding)), trim($this->get_other_info_id($encoding))); 
		 $stmt->execute(); 
		 if ($mysqli->affected_rows > 0) { 
			 return true; 
		 } else { 
			 return false; 
		 } 
	 } 

	 public function delete() { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request = "DELETE FROM ".self::TBL." WHERE movie_id = ?  AND other_info_id  = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_movie_id(); 
		 $fields_type .= $this->get_field_type_other_info_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, $this->movie_id, $this->other_info_id); 
		 $stmt->execute(); 
		 return $mysqli->affected_rows; 
	 } 
} 
?>