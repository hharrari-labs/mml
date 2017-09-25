<?php 
$team = new Team(); 

switch ($action) { 

	 case 'index': 
		 $teams = $team->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/teams/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/teams/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $team = $team->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/teams/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $team = new Team($_REQUEST['team']); 
		 $save = $team->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $team = $team->find($id); 
		 $save = $team->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['team']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $team = $team->find($id); 
		 $team->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>