<?php 
$movies_other_info = new MoviesOtherInfo(); 

switch ($action) { 

	 case 'index': 
		 $movies_other_infos = $movies_other_info->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_other_infos/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_other_infos/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $movies_other_info = $movies_other_info->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_other_infos/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $movies_other_info = new MoviesOtherInfo($_REQUEST['movies_other_info']); 
		 $save = $movies_other_info->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $movies_other_info = $movies_other_info->find($id); 
		 $save = $movies_other_info->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['movies_other_info']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $movies_other_info = $movies_other_info->find($id); 
		 $movies_other_info->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>