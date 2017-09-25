<?php 
class MoviesUser extends MoviesUserClass { 
//
//   public function delete_by_movies_user($movie_id,$user_id) {
//        $database = new Database();
//        $mysqli = $database->get_connection();
//        $request = "DELETE FROM " . self::TBL . " WHERE movie_id = ?  AND user_id  = ? ";
//        $fields_type = "";
//        $fields_type .= $this->get_field_type_movie_id();
//        $fields_type .= $this->get_field_type_user_id();
//        $stmt = $mysqli->prepare($request);
//        $stmt->bind_param($fields_type, $this->movie_id, $this->user_id);
//        $stmt->execute();
//        return $mysqli->affected_rows;
//    }
//    
//      public function destroy_movies_user_by_id($movie_id,$user_id) { 
//		 $database = new Database(); 
//		 $mysqli = $database->get_connection(); 
//		 $request = "SELECT FROM ".MoviesUser::TBL." WHERE  `movie_id` = `id` AND `user_id` = ? ;"; 
//		 $stmt = $mysqli->prepare($request); 
//		 $stmt->bind_param("ii", $movy_id, $user_id); 
//		 $stmt->execute(); 
//		 return $mysqli->affected_rows; 
//	 }
} 
?>