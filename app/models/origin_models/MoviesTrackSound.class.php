<?php 
class MoviesTrackSoundClass { 

	 const TBL = 'movies_track_sounds'; 

	 public $movie; 
	 public $movie_id; 
	 public $track_sound; 
	 public $track_sound_id; 

	 function __construct($params = array()) { 
		 $movie = new Movie(); 
		 if($params['movie_id'] != '') { 
			 $this->movie = $movie->find($params['movie_id']); 
		 } else { 
			 $this->movie = $movie; 
		 } 
		 $this->movie_id = $params['movie_id']; 
		 $track_sound = new TrackSound(); 
		 if($params['track_sound_id'] != '') { 
			 $this->track_sound = $track_sound->find($params['track_sound_id']); 
		 } else { 
			 $this->track_sound = $track_sound; 
		 } 
		 $this->track_sound_id = $params['track_sound_id']; 
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

	 public function get_track_sound() { 
		 return $this->track_sound; 
	 } 

	 public function set_track_sound($track_sound_id) { 
		 $track_sound = new TrackSound(); 
		 $this->track_sound = $track_sound->find($track_sound_id); 
	 } 

	 public function get_track_sound_id($encoding = '') { 
		 $return = ''; 
		 if ($encoding == 'encode') { 
			 $return = utf8_encode($this->track_sound_id); 
		 } elseif ($encoding == 'decode') { 
			 $return = utf8_decode($this->track_sound_id); 
		 } else { 
			 $return = $this->track_sound_id; 
		 } 
		 return stripslashes($return); 
	 } 

	 public function set_track_sound_id($track_sound_id) { 
		 $this->track_sound_id = $track_sound_id; 
	 } 

	 public function get_field_type_movie_id() { 
		 return 'i'; 
	 } 

	 public function get_field_type_track_sound_id() { 
		 return 'i'; 
	 } 

	 public function get_fields_type() { 
		 $type_fields = ''; 
		 $type_fields .= $this->get_field_type_movie_id(); 
		 $type_fields .= $this->get_field_type_track_sound_id(); 
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
			 $movies_track_sounds[] = new MoviesTrackSound($row); 
		 } 
		 return $movies_track_sounds; 
	 } 

	 public function find($movie_id, $track_sound_id) { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL."  WHERE movie_id = ? AND track_sound_id = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_movie_id(); 
		 $fields_type .= $this->get_field_type_track_sound_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, $movie_id, $track_sound_id); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 $stmt->fetch(); 
		 return new MoviesTrackSound($row); 
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
			 $movies_track_sounds[] = new MoviesTrackSound($row); 
		 } 
		 return $movies_track_sounds; 
	 } 

	 public function find_by_track_sound_id($track_sound_id, $order_by = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "SELECT * FROM  ".self::TBL." WHERE track_sound_id = ? "; 
		 if ($order_by != '') { 
			 $request .=  " ORDER BY $order_by ;"; 
		 } else { 
			 $request .=  ";"; 
		 } 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_field_type_track_sound_id(), $track_sound_id); 
		 $stmt->execute(); 
		 $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $movies_track_sounds[] = new MoviesTrackSound($row); 
		 } 
		 return $movies_track_sounds; 
	 } 

	 public function init_update_attributes($params = array()) { 
		 if (isset($params['movie_id'])) { 
			 $this->movie_id = $params['movie_id']; 
		 } 
		 if (isset($params['track_sound_id'])) { 
			 $this->track_sound_id = $params['track_sound_id']; 
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
		 $movies_track_sound = new MoviesTrackSound(); 
		 $movies_track_sound = $movies_track_sound->find($this->id); 
	 } 

	 public function after_update($params = array(), &$error = array(), $encoding = '') { 
	 } 

	 public function insert($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "INSERT INTO ".self::TBL." VALUES ( ?, ? );"; 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($this->get_fields_type(), trim($this->get_movie_id($encoding)), trim($this->get_track_sound_id($encoding))); 
		 $stmt->execute(); 
		 return $mysqli->insert_id; 
	 } 

	 public function update($encoding = '') { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET  WHERE movie_id = ?  AND track_sound_id  = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_movie_id(); 
		 $fields_type .= $this->get_field_type_track_sound_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, trim($this->get_movie_id($encoding)), trim($this->get_track_sound_id($encoding))); 
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
		 $request = "DELETE FROM ".self::TBL." WHERE movie_id = ?  AND track_sound_id  = ? "; 
		 $fields_type = ""; 
		 $fields_type .= $this->get_field_type_movie_id(); 
		 $fields_type .= $this->get_field_type_track_sound_id(); 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param($fields_type, $this->movie_id, $this->track_sound_id); 
		 $stmt->execute(); 
		 return $mysqli->affected_rows; 
	 } 
} 
?>