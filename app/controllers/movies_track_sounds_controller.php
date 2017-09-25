<?php 
$movies_track_sound = new MoviesTrackSound(); 

switch ($action) { 

	 case 'index': 
		 $movies_track_sounds = $movies_track_sound->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_track_sounds/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_track_sounds/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $movies_track_sound = $movies_track_sound->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies_track_sounds/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $movies_track_sound = new MoviesTrackSound($_REQUEST['movies_track_sound']); 
		 $save = $movies_track_sound->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $movies_track_sound = $movies_track_sound->find($id); 
		 $save = $movies_track_sound->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['movies_track_sound']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $movies_track_sound = $movies_track_sound->find($id); 
		 $movies_track_sound->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>