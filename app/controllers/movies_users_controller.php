<?php 
$movies_user = new MoviesUser(); 

switch ($action) { 

	 case 'index': 
		 $movies_users = $movies_user->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_users/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_users/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $movies_user = $movies_user->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_users/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $movies_user = new MoviesUser($_REQUEST['movies_user']); 
		 $save = $movies_user->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $movies_user = $movies_user->find($id); 
		 $save = $movies_user->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['movies_user']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $movies_user = $movies_user->find($id); 
		 $movies_user->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>