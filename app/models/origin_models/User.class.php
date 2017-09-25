<?php 
class UserClass { 

	 const TBL = 'users'; 

	 public $id; 
	 public $name; 
	 public $first_name; 
	 public $email; 
	 public $password; 
	 public $adversity; 
	 public $signature; 
	 public $presentation; 
	 public $location; 
	 public $user_status; 
	 public $user_status_id; 

	 function __construct($params = array()) { 
		 $this->id = $params['id']; 
		 $this->name = $params['name']; 
		 $this->first_name = $params['first_name']; 
		 $this->email = $params['email']; 
		 $this->password = $params['password']; 
		 $this->adversity = $params['adversity']; 
		 $this->signature = $params['signature']; 
		 $this->presentation = $params['presentation']; 
		 $this->location = $params['location']; 
		 $user_status = new UserStatus(); 
		 if($params['user_status_id'] != '') { 
			 $this->user_status = $user_status->find($params['user_status_id']); 
		 } else { 
			 $this->user_status = $user_status; 
		 } 
		 $this->user_status_id = $params['user_status_id']; 
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

	 public function get_name($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->name); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->name); 
		 } else { 
			 $return = $this->name; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_name($name) { 
		 $this->name = $name; 
	 } 

	 public function get_first_name($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->first_name); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->first_name); 
		 } else { 
			 $return = $this->first_name; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_first_name($first_name) { 
		 $this->first_name = $first_name; 
	 } 

	 public function get_email($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->email); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->email); 
		 } else { 
			 $return = $this->email; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_email($email) { 
		 $this->email = $email; 
	 } 

	 public function get_password($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->password); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->password); 
		 } else { 
			 $return = $this->password; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_password($password) { 
		 $this->password = $password; 
	 } 

	 public function get_adversity($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->adversity); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->adversity); 
		 } else { 
			 $return = $this->adversity; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_adversity($adversity) { 
		 $this->adversity = $adversity; 
	 } 

	 public function get_signature($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->signature); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->signature); 
		 } else { 
			 $return = $this->signature; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_signature($signature) { 
		 $this->signature = $signature; 
	 } 

	 public function get_presentation($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->presentation); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->presentation); 
		 } else { 
			 $return = $this->presentation; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_presentation($presentation) { 
		 $this->presentation = $presentation; 
	 } 

	 public function get_location($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->location); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->location); 
		 } else { 
			 $return = $this->location; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_location($location) { 
		 $this->location = $location; 
	 } 

	 public function get_user_status() { 
		 return $this->user_status; 
	 } 

	 public function set_user_status($user_status_id) { 
		 $user_status = new UserStatus(); 
		 $this->user_status = $user_status->find($user_status_id); 
	 } 

	 public function get_user_status_id($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->user_status_id); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->user_status_id); 
		 } else { 
			 $return = $this->user_status_id; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_user_status_id($user_status_id) { 
		 $this->user_status_id = $user_status_id; 
	 } 

	 public function get_field_type_id() { 
		 return 'i'; 
	 } 

	 public function get_field_type_name() { 
		 return 's'; 
	 } 

	 public function get_field_type_first_name() { 
		 return 's'; 
	 } 

	 public function get_field_type_email() { 
		 return 's'; 
	 } 

	 public function get_field_type_password() { 
		 return 's'; 
	 } 

	 public function get_field_type_adversity() { 
		 return 's'; 
	 } 

	 public function get_field_type_signature() { 
		 return 's'; 
	 } 

	 public function get_field_type_presentation() { 
		 return 's'; 
	 } 

	 public function get_field_type_location() { 
		 return 's'; 
	 } 

	 public function get_field_type_user_status_id() { 
		 return 'i'; 
	 } 

	 public function get_fields_type() { 
		 $type_fields = ''; 
		 $type_fields .= $this->get_field_type_id(); 
		 $type_fields .= $this->get_field_type_name(); 
		 $type_fields .= $this->get_field_type_first_name(); 
		 $type_fields .= $this->get_field_type_email(); 
		 $type_fields .= $this->get_field_type_password(); 
		 $type_fields .= $this->get_field_type_adversity(); 
		 $type_fields .= $this->get_field_type_signature(); 
		 $type_fields .= $this->get_field_type_presentation(); 
		 $type_fields .= $this->get_field_type_location(); 
		 $type_fields .= $this->get_field_type_user_status_id(); 
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
			 $users[] = new User($row); 
		 } 
		 return $users; 
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
		 return new User($row); 
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
		 return new User($row); 
	 } 

	 public function find_by_name($name, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE name = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_name(), $name); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function find_by_first_name($first_name, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE first_name = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_first_name(), $first_name); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function find_by_email($email, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE email = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_email(), $email); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function find_by_password($password, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE password = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_password(), $password); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function find_by_adversity($adversity, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE adversity = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_adversity(), $adversity); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function find_by_signature($signature, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE signature = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_signature(), $signature); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function find_by_presentation($presentation, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE presentation = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_presentation(), $presentation); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function find_by_location($location, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE location = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_location(), $location); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function find_by_user_status_id($user_status_id, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE user_status_id = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_user_status_id(), $user_status_id); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $users[] = new User($row); 
		 } 
		 return $users; 
	 } 

	 public function init_update_attributes($params = array()) { 
		 if (isset($params['id'])) { 
			 $this->id = $params['id']; 
		 } 
		 if (isset($params['name'])) { 
			 $this->name = $params['name']; 
		 } 
		 if (isset($params['first_name'])) { 
			 $this->first_name = $params['first_name']; 
		 } 
		 if (isset($params['email'])) { 
			 $this->email = $params['email']; 
		 } 
		 if (isset($params['password'])) { 
			 $this->password = $params['password']; 
		 } 
		 if (isset($params['adversity'])) { 
			 $this->adversity = $params['adversity']; 
		 } 
		 if (isset($params['signature'])) { 
			 $this->signature = $params['signature']; 
		 } 
		 if (isset($params['presentation'])) { 
			 $this->presentation = $params['presentation']; 
		 } 
		 if (isset($params['location'])) { 
			 $this->location = $params['location']; 
		 } 
		 if (isset($params['user_status_id'])) { 
			 $this->user_status_id = $params['user_status_id']; 
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
		 $this->password = md5($this->password); 
	 } 

	 public function after_insert($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function before_update($params = array(), &$error = array(), $encoding = '') { 
		 $user = new User(); 
		 $user = $user->find($this->id); 
		 if($user->password != $this->password) { 
			 $this->password = md5($this->password); 
		 } 
	 } 

	 public function after_update($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function insert($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "INSERT INTO ".self::TBL." VALUES ( ?, ? , ? , ? , ? , ? , ? , ? , ? , ? );"; 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_fields_type(), trim($this->get_id($encoding)), trim($this->get_name($encoding)), trim($this->get_first_name($encoding)), trim($this->get_email($encoding)), trim($this->get_password($encoding)), trim($this->get_adversity($encoding)), trim($this->get_signature($encoding)), trim($this->get_presentation($encoding)), trim($this->get_location($encoding)), trim($this->get_user_status_id($encoding))); 
		 $stmt->execute(); 
		 return $mysqli->insert_id; 
	 } 

	 public function update($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET name = ? , first_name = ? , email = ? , password = ? , adversity = ? , signature = ? , presentation = ? , location = ? , user_status_id = ?  WHERE id = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_name(); 
		 $fields_type .= $this->get_field_type_first_name(); 
		 $fields_type .= $this->get_field_type_email(); 
		 $fields_type .= $this->get_field_type_password(); 
		 $fields_type .= $this->get_field_type_adversity(); 
		 $fields_type .= $this->get_field_type_signature(); 
		 $fields_type .= $this->get_field_type_presentation(); 
		 $fields_type .= $this->get_field_type_location(); 
		 $fields_type .= $this->get_field_type_user_status_id(); 
		 $fields_type .= $this->get_field_type_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, trim($this->get_name($encoding)), trim($this->get_first_name($encoding)), trim($this->get_email($encoding)), trim($this->get_password($encoding)), trim($this->get_adversity($encoding)), trim($this->get_signature($encoding)), trim($this->get_presentation($encoding)), trim($this->get_location($encoding)), trim($this->get_user_status_id($encoding)), trim($this->get_id($encoding))); 
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

	 public function find_by_email_and_password($email, $password, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE email = ? AND password = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_email().$this->get_field_type_password(), $email, $password); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 $stmt->fetch(); 
		 return new User($row); 
	 } 

	  public function random_password($length) { 
		  $randstr = '';  
		  for ($i = 0; $i < $length; $i++) {  
			  $randnum = mt_rand(0, 61); 
			  if ($randnum < 10) { 
				  $randstr .= chr($randnum + 48); 
			 } else if ($randnum < 36) { 
				  $randstr .= chr($randnum + 55); 
			 } else { 
				  $randstr .= chr($randnum + 61); 
			 } 
		 } 
		 return $randstr; 
	 } 

	  public function send_new_password($new_password) { 
		  $subject = I18n("subject_new_password"); 
		  $body = I18n("content_new_password"); 
		  $body = str_replace("[username]", $this->last_name . " " . $this->first_name, $body); 
		  $body = str_replace("[user]", $this->email, $body); 
		  $body = str_replace("[password]", $this->password, $body); 
		  $body = str_replace("[URL]", URL, $body); 
		  return mail($this->email, $subject, $body, "From: " . EMAILADMIN); 
	 } 
} 
?>