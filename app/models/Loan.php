<?php

class Loan extends LoanClass {

    public function find_user_movie_owner($owner, $movie) {
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "DELETE FROM " . self::TBL . " WHERE id_owner = ?  AND id_movie  = ? ";
        $stmt = $mysqli->prepare($request);
        $stmt->bind_param("ii",$owner,$movie);
        $stmt->execute();
        return $mysqli->affected_rows;
    }

    public function find_by_owner_and_movie($owner,$movie){
        $database = new Database();
        $mysqli = $database->get_connection();
        $request = "SELECT FROM " . self::TBL . " WHERE id_owner = ?  AND id_movie  = ? ";
        $stmt = $mysqli->prepare($request);
        $stmt->bind_param("ii",$owner,$movie);
        $stmt->execute();
        $row = array(); 
		 $database->fetch_assoc($stmt, $row); 
		 while ($stmt->fetch()) { 
			 $loans[] = new Loan($row); 
		 } 
		 return $loans;
    }
    
    public function delete_loan($id_owner,$id_movie) { 
		 $database = new Database(); 
		 $mysqli = $database->get_connection(); 
		 $request = "DELETE FROM ".self::TBL." WHERE id_owner = ?  AND id_movie  = ? ";  
		 $stmt = $mysqli->prepare($request); 
		 $stmt->bind_param("ii", $id_owner, $id_movie); 
		 $stmt->execute(); 
		 return $mysqli->affected_rows; 
	 } 
}

?>