<?php 
class TrackSoundClass { 

	 const TBL = 'track_sounds'; 

	 public $id; 
	 public $language; 
	 public $code; 
	 public $encoding; 
	 public $standard_audio; 

	 function __construct($params = array()) { 
		 $this->id = $params['id']; 
		 $this->language = $params['language']; 
		 $this->code = $params['code']; 
		 $this->encoding = $params['encoding']; 
		 $this->standard_audio = $params['standard_audio']; 
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

	 public function get_code($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->code); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->code); 
		 } else { 
			 $return = $this->code; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_code($code) { 
		 $this->code = $code; 
	 } 

	 public function get_encoding($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->encoding); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->encoding); 
		 } else { 
			 $return = $this->encoding; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_encoding($encoding) { 
		 $this->encoding = $encoding; 
	 } 

	 public function get_standard_audio($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->standard_audio); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->standard_audio); 
		 } else { 
			 $return = $this->standard_audio; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_standard_audio($standard_audio) { 
		 $this->standard_audio = $standard_audio; 
	 } 

	 public function get_field_type_id() { 
		 return 'i'; 
	 } 

	 public function get_field_type_language() { 
		 return 's'; 
	 } 

	 public function get_field_type_code() { 
		 return 's'; 
	 } 

	 public function get_field_type_encoding() { 
		 return 's'; 
	 } 

	 public function get_field_type_standard_audio() { 
		 return 's'; 
	 } 

	 public function get_fields_type() { 
		 $type_fields = ''; 
		 $type_fields .= $this->get_field_type_id(); 
		 $type_fields .= $this->get_field_type_language(); 
		 $type_fields .= $this->get_field_type_code(); 
		 $type_fields .= $this->get_field_type_encoding(); 
		 $type_fields .= $this->get_field_type_standard_audio(); 
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
			 $track_sounds[] = new TrackSound($row); 
		 } 
		 return $track_sounds; 
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
		 return new TrackSound($row); 
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
		 return new TrackSound($row); 
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
			 $track_sounds[] = new TrackSound($row); 
		 } 
		 return $track_sounds; 
	 } 

	 public function find_by_code($code, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE code = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_code(), $code); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $track_sounds[] = new TrackSound($row); 
		 } 
		 return $track_sounds; 
	 } 

	 public function find_by_encoding($encoding, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE encoding = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_encoding(), $encoding); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $track_sounds[] = new TrackSound($row); 
		 } 
		 return $track_sounds; 
	 } 

	 public function find_by_standard_audio($standard_audio, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE standard_audio = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_standard_audio(), $standard_audio); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $track_sounds[] = new TrackSound($row); 
		 } 
		 return $track_sounds; 
	 } 

	 public function init_update_attributes($params = array()) { 
		 if (isset($params['id'])) { 
			 $this->id = $params['id']; 
		 } 
		 if (isset($params['language'])) { 
			 $this->language = $params['language']; 
		 } 
		 if (isset($params['code'])) { 
			 $this->code = $params['code']; 
		 } 
		 if (isset($params['encoding'])) { 
			 $this->encoding = $params['encoding']; 
		 } 
		 if (isset($params['standard_audio'])) { 
			 $this->standard_audio = $params['standard_audio']; 
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
		 $track_sound = new TrackSound(); 
		 $track_sound = $track_sound->find($this->id); 
	 } 

	 public function after_update($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function insert($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "INSERT INTO ".self::TBL." VALUES ( ?, ? , ? , ? , ? );"; 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_fields_type(), trim($this->get_id($encoding)), trim($this->get_language($encoding)), trim($this->get_code($encoding)), trim($this->get_encoding($encoding)), trim($this->get_standard_audio($encoding))); 
		 $stmt->execute(); 
		 return $mysqli->insert_id; 
	 } 

	 public function update($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET language = ? , code = ? , encoding = ? , standard_audio = ?  WHERE id = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_language(); 
		 $fields_type .= $this->get_field_type_code(); 
		 $fields_type .= $this->get_field_type_encoding(); 
		 $fields_type .= $this->get_field_type_standard_audio(); 
		 $fields_type .= $this->get_field_type_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, trim($this->get_language($encoding)), trim($this->get_code($encoding)), trim($this->get_encoding($encoding)), trim($this->get_standard_audio($encoding)), trim($this->get_id($encoding))); 
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