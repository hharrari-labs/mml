<?php 
class OtherInfoClass { 

	 const TBL = 'other_infos'; 

	 public $id; 
	 public $type; 
	 public $description; 

	 function __construct($params = array()) { 
		 $this->id = $params['id']; 
		 $this->type = $params['type']; 
		 $this->description = $params['description']; 
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

	 public function get_description($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->description); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->description); 
		 } else { 
			 $return = $this->description; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_description($description) { 
		 $this->description = $description; 
	 } 

	 public function get_field_type_id() { 
		 return 'i'; 
	 } 

	 public function get_field_type_type() { 
		 return 's'; 
	 } 

	 public function get_field_type_description() { 
		 return 's'; 
	 } 

	 public function get_fields_type() { 
		 $type_fields = ''; 
		 $type_fields .= $this->get_field_type_id(); 
		 $type_fields .= $this->get_field_type_type(); 
		 $type_fields .= $this->get_field_type_description(); 
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
			 $other_infos[] = new OtherInfo($row); 
		 } 
		 return $other_infos; 
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
		 return new OtherInfo($row); 
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
		 return new OtherInfo($row); 
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
		 $stmt->fetch(); 
		 return new OtherInfo($row); 
	 } 

	 public function find_by_description($description, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE description = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_description(), $description); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $other_infos[] = new OtherInfo($row); 
		 } 
		 return $other_infos; 
	 } 

	 public function init_update_attributes($params = array()) { 
		 if (isset($params['id'])) { 
			 $this->id = $params['id']; 
		 } 
		 if (isset($params['type'])) { 
			 $this->type = $params['type']; 
		 } 
		 if (isset($params['description'])) { 
			 $this->description = $params['description']; 
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
		 $other_info = $this->check_unique_type($this->type, $this->id); 
		 if ($other_info) { 
			 $error['unique'] = "type"; 
			 $error['error'] = 'true'; 
		 } 
	 } 

	 public function after_save($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function before_insert($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function after_insert($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function before_update($params = array(), &$error = array(), $encoding = '') { 
		 $other_info = new OtherInfo(); 
		 $other_info = $other_info->find($this->id); 
	 } 

	 public function after_update($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function insert($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "INSERT INTO ".self::TBL." VALUES ( ?, ? , ? );"; 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_fields_type(), trim($this->get_id($encoding)), trim($this->get_type($encoding)), trim($this->get_description($encoding))); 
		 $stmt->execute(); 
		 return $mysqli->insert_id; 
	 } 

	 public function update($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET type = ? , description = ?  WHERE id = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_type(); 
		 $fields_type .= $this->get_field_type_description(); 
		 $fields_type .= $this->get_field_type_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, trim($this->get_type($encoding)), trim($this->get_description($encoding)), trim($this->get_id($encoding))); 
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

	 public function check_unique_type($type, $id) { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE type = ? AND id != ? "; 
		 $stmt = $mysqli->prepare($request); 
		 $field_type = $this->get_field_type_type().$this->get_field_type_id(); 
		 $stmt->bind_param($field_type, $type, $id); 
		 $stmt->execute(); 
		 $stmt->store_result(); 
		 if ($stmt->num_rows == 1) { 
			 return true; 
		 } else { 
			 return false; 
		 } 
	 } 
} 
?>