<?php 
$movies_subtitle = new MoviesSubtitle(); 

switch ($action) { 

	 case 'index': 
		 $movies_subtitles = $movies_subtitle->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_subtitles/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_subtitles/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $movies_subtitle = $movies_subtitle->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_subtitles/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $movies_subtitle = new MoviesSubtitle($_REQUEST['movies_subtitle']); 
		 $save = $movies_subtitle->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $movies_subtitle = $movies_subtitle->find($id); 
		 $save = $movies_subtitle->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['movies_subtitle']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $movies_subtitle = $movies_subtitle->find($id); 
		 $movies_subtitle->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>