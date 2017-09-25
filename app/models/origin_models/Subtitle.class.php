<?php 
class SubtitleClass { 

	 const TBL = 'subtitles'; 

	 public $id; 
	 public $language; 
	 public $type; 

	 function __construct($params = array()) { 
		 $this->id = $params['id']; 
		 $this->language = $params['language']; 
		 $this->type = $params['type']; 
	 } 

	 public function get_id($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->id); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->id); 
		 } else { 
			 $return = $this->id; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_id($id) { 
		 $this->id = $id; 
	 } 

	 public function get_language($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->language); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->language); 
		 } else { 
			 $return = $this->language; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_language($language) { 
		 $this->language = $language; 
	 } 

	 public function get_type($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->type); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->type); 
		 } else { 
			 $return = $this->type; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_type($type) { 
		 $this->type = $type; 
	 } 

	 public function get_field_type_id() { 
		 return 'i'; 
	 } 

	 public function get_field_type_language() { 
		 return 's'; 
	 } 

	 public function get_field_type_type() { 
		 return 's'; 
	 } 

	 public function get_fields_type() { 
		 $type_fields = ''; 
		 $type_fields .= $this->get_field_type_id(); 
		 $type_fields .= $this->get_field_type_language(); 
		 $type_fields .= $this->get_field_type_type(); 
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
			 $subtitles[] = new Subtitle($row); 
		 } 
		 return $subtitles; 
	 } 

	 public function find($id) { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL."  WHERE id = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, $id); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 $stmt->fetch(); 
		 return new Subtitle($row); 
	 } 

	 public function find_by_id($id, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE id = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_id(), $id); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 $stmt->fetch(); 
		 return new Subtitle($row); 
	 } 

	 public function find_by_language($language, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE language = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_language(), $language); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $subtitles[] = new Subtitle($row); 
		 } 
		 return $subtitles; 
	 } 

	 public function find_by_type($type, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE type = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_type(), $type); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $subtitles[] = new Subtitle($row); 
		 } 
		 return $subtitles; 
	 } 

	 public function init_update_attributes($params = array()) { 
		 if (isset($params['id'])) { 
			 $this->id = $params['id']; 
		 } 
		 if (isset($params['language'])) { 
			 $this->language = $params['language']; 
		 } 
		 if (isset($params['type'])) { 
			 $this->type = $params['type']; 
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
		 $subtitle = new Subtitle(); 
		 $subtitle = $subtitle->find($this->id); 
	 } 

	 public function after_update($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function insert($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "INSERT INTO ".self::TBL." VALUES ( ?, ? , ? );"; 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_fields_type(), trim($this->get_id($encoding)), trim($this->get_language($encoding)), trim($this->get_type($encoding))); 
		 $stmt->execute(); 
		 return $mysqli->insert_id; 
	 } 

	 public function update($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET language = ? , type = ?  WHERE id = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_language(); 
		 $fields_type .= $this->get_field_type_type(); 
		 $fields_type .= $this->get_field_type_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, trim($this->get_language($encoding)), trim($this->get_type($encoding)), trim($this->get_id($encoding))); 
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
		 $request = "DELETE FROM ".self::TBL." WHERE id = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, $this->id); 
		 $stmt->execute(); 
		 return $mysqli->affected_rows; 
	 } 
} 
?>