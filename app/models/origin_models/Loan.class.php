<?php 
class LoanClass { 

	 const TBL = 'loans'; 

	 public $id_owner; 
	 public $id_user; 
	 public $id_movie; 
	 public $name; 
	 public $firs_name; 
	 public $email; 
	 public $loanDate; 

	 function __construct($params = array()) { 
		 $this->id_owner = $params['id_owner']; 
		 $this->id_user = $params['id_user']; 
		 $this->id_movie = $params['id_movie']; 
		 $this->name = $params['name']; 
		 $this->firs_name = $params['firs_name']; 
		 $this->email = $params['email']; 
		 $this->loanDate = $params['loanDate']; 
	 } 

	 public function get_id_owner($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->id_owner); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->id_owner); 
		 } else { 
			 $return = $this->id_owner; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_id_owner($id_owner) { 
		 $this->id_owner = $id_owner; 
	 } 

	 public function get_id_user($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->id_user); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->id_user); 
		 } else { 
			 $return = $this->id_user; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_id_user($id_user) { 
		 $this->id_user = $id_user; 
	 } 

	 public function get_id_movie($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->id_movie); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->id_movie); 
		 } else { 
			 $return = $this->id_movie; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_id_movie($id_movie) { 
		 $this->id_movie = $id_movie; 
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

	 public function get_firs_name($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->firs_name); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->firs_name); 
		 } else { 
			 $return = $this->firs_name; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_firs_name($firs_name) { 
		 $this->firs_name = $firs_name; 
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

	 public function get_loanDate($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->loanDate); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->loanDate); 
		 } else { 
			 $return = $this->loanDate; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_loanDate($loanDate) { 
		 $this->loanDate = $loanDate; 
	 } 

	 public function get_field_type_id_owner() { 
		 return 'i'; 
	 } 

	 public function get_field_type_id_user() { 
		 return 'i'; 
	 } 

	 public function get_field_type_id_movie() { 
		 return 'i'; 
	 } 

	 public function get_field_type_name() { 
		 return 's'; 
	 } 

	 public function get_field_type_firs_name() { 
		 return 's'; 
	 } 

	 public function get_field_type_email() { 
		 return 's'; 
	 } 

	 public function get_field_type_loanDate() { 
		 return 's'; 
	 } 

	 public function get_fields_type() { 
		 $type_fields = ''; 
		 $type_fields .= $this->get_field_type_id_owner(); 
		 $type_fields .= $this->get_field_type_id_user(); 
		 $type_fields .= $this->get_field_type_id_movie(); 
		 $type_fields .= $this->get_field_type_name(); 
		 $type_fields .= $this->get_field_type_firs_name(); 
		 $type_fields .= $this->get_field_type_email(); 
		 $type_fields .= $this->get_field_type_loanDate(); 
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
			 $loans[] = new Loan($row); 
		 } 
		 return $loans; 
	 } 

	 public function find($id_owner, $id_movie) { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL."  WHERE id_owner = ? AND id_movie = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_id_owner(); 
		 $fields_type .= $this->get_field_type_id_movie(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, $id_owner, $id_movie); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 $stmt->fetch(); 
		 return new Loan($row); 
	 } 

	 public function find_by_id_owner($id_owner, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE id_owner = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_id_owner(), $id_owner); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $loans[] = new Loan($row); 
		 } 
		 return $loans; 
	 } 

	 public function find_by_id_user($id_user, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE id_user = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_id_user(), $id_user); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $loans[] = new Loan($row); 
		 } 
		 return $loans; 
	 } 

	 public function find_by_id_movie($id_movie, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE id_movie = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_id_movie(), $id_movie); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $loans[] = new Loan($row); 
		 } 
		 return $loans; 
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
			 $loans[] = new Loan($row); 
		 } 
		 return $loans; 
	 } 

	 public function find_by_firs_name($firs_name, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE firs_name = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_firs_name(), $firs_name); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $loans[] = new Loan($row); 
		 } 
		 return $loans; 
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
			 $loans[] = new Loan($row); 
		 } 
		 return $loans; 
	 } 

	 public function find_by_loanDate($loanDate, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE loanDate = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_loanDate(), $loanDate); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $loans[] = new Loan($row); 
		 } 
		 return $loans; 
	 } 

	 public function init_update_attributes($params = array()) { 
		 if (isset($params['id_owner'])) { 
			 $this->id_owner = $params['id_owner']; 
		 } 
		 if (isset($params['id_user'])) { 
			 $this->id_user = $params['id_user']; 
		 } 
		 if (isset($params['id_movie'])) { 
			 $this->id_movie = $params['id_movie']; 
		 } 
		 if (isset($params['name'])) { 
			 $this->name = $params['name']; 
		 } 
		 if (isset($params['firs_name'])) { 
			 $this->firs_name = $params['firs_name']; 
		 } 
		 if (isset($params['email'])) { 
			 $this->email = $params['email']; 
		 } 
		 if (isset($params['loanDate'])) { 
			 $this->loanDate = $params['loanDate']; 
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
		 $loan = new Loan(); 
		 $loan = $loan->find($this->id); 
	 } 

	 public function after_update($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function insert($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "INSERT INTO ".self::TBL." VALUES ( ?, ? , ? , ? , ? , ? , ? );"; 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_fields_type(), trim($this->get_id_owner($encoding)), trim($this->get_id_user($encoding)), trim($this->get_id_movie($encoding)), trim($this->get_name($encoding)), trim($this->get_firs_name($encoding)), trim($this->get_email($encoding)), trim($this->get_loanDate($encoding))); 
		 $stmt->execute(); 
		 return $mysqli->insert_id; 
	 } 

	 public function update($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET id_user = ? , name = ? , firs_name = ? , email = ? , loanDate = ?  WHERE id_owner = ?  AND id_movie  = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_id_user(); 
		 $fields_type .= $this->get_field_type_name(); 
		 $fields_type .= $this->get_field_type_firs_name(); 
		 $fields_type .= $this->get_field_type_email(); 
		 $fields_type .= $this->get_field_type_loanDate(); 
		 $fields_type .= $this->get_field_type_id_owner(); 
		 $fields_type .= $this->get_field_type_id_movie(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, trim($this->get_id_user($encoding)), trim($this->get_name($encoding)), trim($this->get_firs_name($encoding)), trim($this->get_email($encoding)), trim($this->get_loanDate($encoding)), trim($this->get_id_owner($encoding)), trim($this->get_id_movie($encoding))); 
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
		 $request = "DELETE FROM ".self::TBL." WHERE id_owner = ?  AND id_movie  = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_id_owner(); 
		 $fields_type .= $this->get_field_type_id_movie(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, $this->id_owner, $this->id_movie); 
		 $stmt->execute(); 
		 return $mysqli->affected_rows; 
	 } 
} 
?>