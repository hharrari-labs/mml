<?php 
$subtitle = new Subtitle(); 

switch ($action) { 

	 case 'index': 
		 $subtitles = $subtitle->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/subtitles/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/subtitles/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $subtitle = $subtitle->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/subtitles/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $subtitle = new Subtitle($_REQUEST['subtitle']); 
		 $save = $subtitle->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $subtitle = $subtitle->find($id); 
		 $save = $subtitle->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['subtitle']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $subtitle = $subtitle->find($id); 
		 $subtitle->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>