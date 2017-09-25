<?php 
class MovyClass { 

	 const TBL = 'movies'; 

	 public $id; 
	 public $title_vf; 
	 public $title_vo; 
	 public $year; 
	 public $synopsis; 
	 public $jacket; 
	 public $edition; 
	 public $distributor; 
	 public $zone; 
	 public $duration; 
	 public $trailer; 
	 public $loan; 
	 public $barcode; 
	 public $manuel; 
	 public $price; 

	 function __construct($params = array()) { 
		 $this->id = $params['id']; 
		 $this->title_vf = $params['title_vf']; 
		 $this->title_vo = $params['title_vo']; 
		 $this->year = $params['year']; 
		 $this->synopsis = $params['synopsis']; 
		 $this->jacket = $params['jacket']; 
		 $this->edition = $params['edition']; 
		 $this->distributor = $params['distributor']; 
		 $this->zone = $params['zone']; 
		 $this->duration = $params['duration']; 
		 $this->trailer = $params['trailer']; 
		 $this->loan = $params['loan']; 
		 $this->barcode = $params['barcode']; 
		 $this->manuel = $params['manuel']; 
		 $this->price = $params['price']; 
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

	 public function get_title_vf($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->title_vf); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->title_vf); 
		 } else { 
			 $return = $this->title_vf; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_title_vf($title_vf) { 
		 $this->title_vf = $title_vf; 
	 } 

	 public function get_title_vo($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->title_vo); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->title_vo); 
		 } else { 
			 $return = $this->title_vo; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_title_vo($title_vo) { 
		 $this->title_vo = $title_vo; 
	 } 

	 public function get_year($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->year); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->year); 
		 } else { 
			 $return = $this->year; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_year($year) { 
		 $this->year = $year; 
	 } 

	 public function get_synopsis($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->synopsis); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->synopsis); 
		 } else { 
			 $return = $this->synopsis; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_synopsis($synopsis) { 
		 $this->synopsis = $synopsis; 
	 } 

	 public function get_jacket($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->jacket); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->jacket); 
		 } else { 
			 $return = $this->jacket; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_jacket($jacket) { 
		 $this->jacket = $jacket; 
	 } 

	 public function get_edition($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->edition); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->edition); 
		 } else { 
			 $return = $this->edition; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_edition($edition) { 
		 $this->edition = $edition; 
	 } 

	 public function get_distributor($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->distributor); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->distributor); 
		 } else { 
			 $return = $this->distributor; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_distributor($distributor) { 
		 $this->distributor = $distributor; 
	 } 

	 public function get_zone($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->zone); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->zone); 
		 } else { 
			 $return = $this->zone; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_zone($zone) { 
		 $this->zone = $zone; 
	 } 

	 public function get_duration($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->duration); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->duration); 
		 } else { 
			 $return = $this->duration; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_duration($duration) { 
		 $this->duration = $duration; 
	 } 

	 public function get_trailer($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->trailer); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->trailer); 
		 } else { 
			 $return = $this->trailer; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_trailer($trailer) { 
		 $this->trailer = $trailer; 
	 } 

	 public function get_loan($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->loan); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->loan); 
		 } else { 
			 $return = $this->loan; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_loan($loan) { 
		 $this->loan = $loan; 
	 } 

	 public function get_barcode($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->barcode); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->barcode); 
		 } else { 
			 $return = $this->barcode; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_barcode($barcode) { 
		 $this->barcode = $barcode; 
	 } 

	 public function get_manuel($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->manuel); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->manuel); 
		 } else { 
			 $return = $this->manuel; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_manuel($manuel) { 
		 $this->manuel = $manuel; 
	 } 

	 public function get_price($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->price); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->price); 
		 } else { 
			 $return = $this->price; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_price($price) { 
		 $this->price = $price; 
	 } 

	 public function get_field_type_id() { 
		 return 'i'; 
	 } 

	 public function get_field_type_title_vf() { 
		 return 's'; 
	 } 

	 public function get_field_type_title_vo() { 
		 return 's'; 
	 } 

	 public function get_field_type_year() { 
		 return 's'; 
	 } 

	 public function get_field_type_synopsis() { 
		 return 's'; 
	 } 

	 public function get_field_type_jacket() { 
		 return 's'; 
	 } 

	 public function get_field_type_edition() { 
		 return 's'; 
	 } 

	 public function get_field_type_distributor() { 
		 return 's'; 
	 } 

	 public function get_field_type_zone() { 
		 return 's'; 
	 } 

	 public function get_field_type_duration() { 
		 return 'i'; 
	 } 

	 public function get_field_type_trailer() { 
		 return 's'; 
	 } 

	 public function get_field_type_loan() { 
		 return 'i'; 
	 } 

	 public function get_field_type_barcode() { 
		 return 's'; 
	 } 

	 public function get_field_type_manuel() { 
		 return 'i'; 
	 } 

	 public function get_field_type_price() { 
		 return 'd'; 
	 } 

	 public function get_fields_type() { 
		 $type_fields = ''; 
		 $type_fields .= $this->get_field_type_id(); 
		 $type_fields .= $this->get_field_type_title_vf(); 
		 $type_fields .= $this->get_field_type_title_vo(); 
		 $type_fields .= $this->get_field_type_year(); 
		 $type_fields .= $this->get_field_type_synopsis(); 
		 $type_fields .= $this->get_field_type_jacket(); 
		 $type_fields .= $this->get_field_type_edition(); 
		 $type_fields .= $this->get_field_type_distributor(); 
		 $type_fields .= $this->get_field_type_zone(); 
		 $type_fields .= $this->get_field_type_duration(); 
		 $type_fields .= $this->get_field_type_trailer(); 
		 $type_fields .= $this->get_field_type_loan(); 
		 $type_fields .= $this->get_field_type_barcode(); 
		 $type_fields .= $this->get_field_type_manuel(); 
		 $type_fields .= $this->get_field_type_price(); 
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
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
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
		 return new Movy($row); 
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
		 return new Movy($row); 
	 } 

	 public function find_by_title_vf($title_vf, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE title_vf = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_title_vf(), $title_vf); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_title_vo($title_vo, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE title_vo = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_title_vo(), $title_vo); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_year($year, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE year = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_year(), $year); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_synopsis($synopsis, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE synopsis = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_synopsis(), $synopsis); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_jacket($jacket, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE jacket = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_jacket(), $jacket); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_edition($edition, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE edition = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_edition(), $edition); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_distributor($distributor, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE distributor = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_distributor(), $distributor); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_zone($zone, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE zone = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_zone(), $zone); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_duration($duration, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE duration = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_duration(), $duration); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_trailer($trailer, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE trailer = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_trailer(), $trailer); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_loan($loan, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE loan = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_loan(), $loan); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_barcode($barcode, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE barcode = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_barcode(), $barcode); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_manuel($manuel, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE manuel = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_manuel(), $manuel); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function find_by_price($price, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE price = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_price(), $price); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies[] = new Movy($row); 
		 } 
		 return $movies; 
	 } 

	 public function init_update_attributes($params = array()) { 
		 if (isset($params['id'])) { 
			 $this->id = $params['id']; 
		 } 
		 if (isset($params['title_vf'])) { 
			 $this->title_vf = $params['title_vf']; 
		 } 
		 if (isset($params['title_vo'])) { 
			 $this->title_vo = $params['title_vo']; 
		 } 
		 if (isset($params['year'])) { 
			 $this->year = $params['year']; 
		 } 
		 if (isset($params['synopsis'])) { 
			 $this->synopsis = $params['synopsis']; 
		 } 
		 if (isset($params['jacket'])) { 
			 $this->jacket = $params['jacket']; 
		 } 
		 if (isset($params['edition'])) { 
			 $this->edition = $params['edition']; 
		 } 
		 if (isset($params['distributor'])) { 
			 $this->distributor = $params['distributor']; 
		 } 
		 if (isset($params['zone'])) { 
			 $this->zone = $params['zone']; 
		 } 
		 if (isset($params['duration'])) { 
			 $this->duration = $params['duration']; 
		 } 
		 if (isset($params['trailer'])) { 
			 $this->trailer = $params['trailer']; 
		 } 
		 if (isset($params['loan'])) { 
			 $this->loan = $params['loan']; 
		 } 
		 if (isset($params['barcode'])) { 
			 $this->barcode = $params['barcode']; 
		 } 
		 if (isset($params['manuel'])) { 
			 $this->manuel = $params['manuel']; 
		 } 
		 if (isset($params['price'])) { 
			 $this->price = $params['price']; 
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
		 $this->year = to_db($this->year); 
	 } 

	 public function after_save($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function before_insert($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function after_insert($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function before_update($params = array(), &$error = array(), $encoding = '') { 
		 $movy = new Movy(); 
		 $movy = $movy->find($this->id); 
	 } 

	 public function after_update($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function insert($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "INSERT INTO ".self::TBL." VALUES ( ?, ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? );"; 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_fields_type(), trim($this->get_id($encoding)), trim($this->get_title_vf($encoding)), trim($this->get_title_vo($encoding)), trim($this->get_year($encoding)), trim($this->get_synopsis($encoding)), trim($this->get_jacket($encoding)), trim($this->get_edition($encoding)), trim($this->get_distributor($encoding)), trim($this->get_zone($encoding)), trim($this->get_duration($encoding)), trim($this->get_trailer($encoding)), trim($this->get_loan($encoding)), trim($this->get_barcode($encoding)), trim($this->get_manuel($encoding)), trim($this->get_price($encoding))); 
		 $stmt->execute(); 
		 return $mysqli->insert_id; 
	 } 

	 public function update($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET title_vf = ? , title_vo = ? , year = ? , synopsis = ? , jacket = ? , edition = ? , distributor = ? , zone = ? , duration = ? , trailer = ? , loan = ? , barcode = ? , manuel = ? , price = ?  WHERE id = ? "; 
                 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_title_vf(); 
		 $fields_type .= $this->get_field_type_title_vo(); 
		 $fields_type .= $this->get_field_type_year(); 
		 $fields_type .= $this->get_field_type_synopsis(); 
		 $fields_type .= $this->get_field_type_jacket(); 
		 $fields_type .= $this->get_field_type_edition(); 
		 $fields_type .= $this->get_field_type_distributor(); 
		 $fields_type .= $this->get_field_type_zone(); 
		 $fields_type .= $this->get_field_type_duration(); 
		 $fields_type .= $this->get_field_type_trailer(); 
		 $fields_type .= $this->get_field_type_loan(); 
		 $fields_type .= $this->get_field_type_barcode(); 
		 $fields_type .= $this->get_field_type_manuel(); 
		 $fields_type .= $this->get_field_type_price(); 
		 $fields_type .= $this->get_field_type_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, trim($this->get_title_vf($encoding)), trim($this->get_title_vo($encoding)), trim($this->get_year($encoding)), trim($this->get_synopsis($encoding)), trim($this->get_jacket($encoding)), trim($this->get_edition($encoding)), trim($this->get_distributor($encoding)), trim($this->get_zone($encoding)), trim($this->get_duration($encoding)), trim($this->get_trailer($encoding)), trim($this->get_loan($encoding)), trim($this->get_barcode($encoding)), trim($this->get_manuel($encoding)), trim($this->get_price($encoding)), trim($this->get_id($encoding))); 
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