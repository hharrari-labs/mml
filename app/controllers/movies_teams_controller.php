<?php 
$movies_team = new MoviesTeam(); 

switch ($action) { 

	 case 'index': 
		 $movies_teams = $movies_team->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_teams/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_teams/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $movies_team = $movies_team->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_teams/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $movies_team = new MoviesTeam($_REQUEST['movies_team']); 
		 $save = $movies_team->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $movies_team = $movies_team->find($id); 
		 $save = $movies_team->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['movies_team']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $movies_team = $movies_team->find($id); 
		 $movies_team->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>