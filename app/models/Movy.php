<?php

class Movy extends MovyClass {

    public function set_movies_user_by_id($movy_id, $user_id) {
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "INSERT INTO " . MoviesUser::TBL . " VALUES ( ?, ? );";
        $stmt = $mysqli->prepare($request);
        $stmt->bind_param("ii", $movy_id, $user_id);
        $stmt->execute();
        return $mysqli->insert_id;
    }

    public function find_by_user_id($user_id) {
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "SELECT * FROM " . Movy::TBL . " , " . MoviesUser::TBL . " WHERE `user_id` = ? AND `movie_id` = `id`;";
        $stmt = $mysqli->prepare($request);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $database->fetch_assoc($stmt, $row);
        while ($stmt->fetch()) {
            $movies[] = new Movy($row);
        }
        return $movies;
    }

    public function get_last_id() {
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "SELECT MAX(id) FROM `movies` ;";
        $stmt = $mysqli->prepare($request);
        $stmt->execute();
        $row = array();
        $database->fetch_assoc($stmt, $row);
        while ($stmt->fetch()) {
            $last_movies = $row["MAX(id)"];
        }
        return $last_movies;
    }

    function get_info_user($id_user_loan) {
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "SELECT * FROM " . UserClass::TBL . " WHERE id = ? ;";
        $stmt = $mysqli->prepare($request);
        $stmt->bind_param("i", $id_user_loan);
        $stmt->execute();
        $row = array();
        $database->fetch_assoc($stmt, $row);
        while ($stmt->fetch()) {
            $users[] = new User($row);
        }
        return $users;
    }
    

        function set_loan_by_movies_user($id,$id_user, $id_movie, $name, $first_name, $email,$date) {
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "INSERT INTO " . Loan::TBL . " VALUES ( ?, ?, ?, ?, ?, ?, ?);";
       // $request = "INSERT INTO " . Loan::TBL . " VALUES ( ".$id.", ".$id_user.", ".$id_movie.", ".$name.", ".$first_name.",".$email.", '?');";
       // echo $request;
        $stmt = $mysqli->prepare($request);
        $stmt->bind_param("iiissss",$id,$id_user, $id_movie, $name, $first_name, $email,$date);
        $stmt->execute();
        return $mysqli->insert_id;
    }
        function set_loan_by_movies_new_user($id,$id_user, $id_movie, $name, $first_name, $email,$date) {
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "INSERT INTO " . Loan::TBL . " VALUES (  ?, ?, ?, ?, ?, ?, ?);";
       // echo $request;
        $stmt = $mysqli->prepare($request);
        $stmt->bind_param("iiissss",$id,$id_user, $id_movie, $name, $first_name, $email,$date);
        $stmt->execute();
        return $mysqli->insert_id;
    }
        function update_loan_by_movies_user($id_user, $name, $first_name, $email,$date,$id,$id_movie) {
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "UPDATE " . Loan::TBL . "  SET id_user = ? , name = ? , firs_name = ? , email = ? , loanDate = ?  WHERE id_owner = ?  AND id_movie  = ? ";
       // $request = "UPDATE " . Loan::TBL . "  SET id_user = ".$id_user." , name = ".$name." , firs_name = ".$first_name."
//                                            , email = ".$email." , loanDate = ".$date." 
//                                             WHERE id_owner = ".$id."  AND id_movie  = ".$id_movie." ";
      //  echo $request;
        $stmt = $mysqli->prepare($request);
        $stmt->bind_param("issssii",$id_user, $name, $first_name, $email,$date, $id,$id_movie);
        $stmt->execute(); 
		 if ($mysqli->affected_rows > 0) { 
			 return true; 
		 } else { 
			 return false; 
		 } 
    }

//     public function update_movie($encoding,
//                           $title_vf_post,
//                           $title_vo_post,
//                           $year_post,
//                           $synopsis_post, 
//                           $edition_post,
//                           $jacket_format,
//                           $distributor_post, 
//                           $zone_post,
//                           $duration_post,
//                           $trailer_post,
//                           $loan_post, 
//                           $barcode_post, 
//                           $manuel_post, 
//                           $price_post,
//                           $id_post) { 
//		 $database = new Database(); 
//		 $mysqli = $database->get_connection(); 
////		 $request =  "UPDATE ".self::TBL." SET title_vf = ? , 
////                                                       title_vo = ? , 
////                                                       year = '".$year_post."' , 
////                                                       synopsis = ? , 
////                                                       edition = ? , 
////                                                       jacket = ? ,                                                       
////                                                       distributor = ? , 
////                                                       zone = ? , 
////                                                       duration = ? , 
////                                                       trailer = ? , 
////                                                       loan = ? , 
////                                                       barcode = ? , 
////                                                       manuel = ? , 
////                                                       price = ?  
////                                                    WHERE id = ? "; 
//                 
//                 $request =  "UPDATE ".self::TBL." SET title_vf = '".$title_vf_post."' , 
//                                                       title_vo = '".$title_vo_post."' , 
//                                                       year = '".$year_post."' , 
//                                                       synopsis = '".$synopsis_post."' , 
//                                                       edition = '".$edition_post."' ,
//                                                       jacket = '".$jacket_format."' ,                                                         
//                                                       distributor = '".$distributor_post."' , 
//                                                       zone = '".$zone_post."' , 
//                                                       duration = '".$duration_post."' , 
//                                                       trailer = '".$trailer_post."' , 
//                                                       loan = '".$loan_post."' , 
//                                                       barcode = '".$barcode_post."' , 
//                                                       manuel = '".$manuel_post."' , 
//                                                       price = '".$price_post."'  
//                                                       WHERE id = ".$id_post." "; 
//        
//                
//                 echo $request; 
//                 
//		 $stmt = $mysqli->prepare($request); 
//		 $stmt->bind_param('ssssssssisisidi',$title_vf_post,
//                                                     $title_vo_post,
//                                                     $year_post,
//                                                     $synopsis_post, 
//                                                     $edition_post,
//                                                     $jacket_format,
//                                                     $distributor_post, 
//                                                     $zone_post,
//                                                     $duration_post,
//                                                     $trailer_post,
//                                                     $loan_post, 
//                                                     $barcode_post, 
//                                                     $manuel_post, 
//                                                     $price_post,
//                                                     $id_post); 
//		 $stmt->execute(); 
//		 if ($mysqli->affected_rows > 0) { 
//			 return true; 
//		 } else { 
//			 return false; 
//		 } 
//	 }
         
    function insert_new_form_jacket($fichier_id,$last_movie){
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request =  "UPDATE ".self::TBL." SET jacket = '".$fichier_id."' WHERE id = ".$last_movie.""; 
                 echo $request;
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param('si',$fichier_id,$last_movie); 
		 $stmt->execute(); 
		 if ($mysqli->affected_rows > 0) { 
			 return true; 
		 } else { 
			 return false; 
		 }
    }      
     public function update_movie($jacket_format,$id_post) { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection();                 
                 $request =  "UPDATE ".self::TBL." SET jacket = '".$jacket_format."' WHERE id = ".$id_post." ";                
                 echo $request;                 
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param('si', $jacket_format,$id_post); 
		 $stmt->execute(); 
		 if ($mysqli->affected_rows > 0) { 
			 return true; 
		 } else { 
			 return false; 
		 } 
	 }
               
}

?>