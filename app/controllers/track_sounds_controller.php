<?php 
$track_sound = new TrackSound(); 

switch ($action) { 

	 case 'index': 
		 $track_sounds = $track_sound->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/track_sounds/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/track_sounds/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $track_sound = $track_sound->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/track_sounds/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $track_sound = new TrackSound($_REQUEST['track_sound']); 
		 $save = $track_sound->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $track_sound = $track_sound->find($id); 
		 $save = $track_sound->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['track_sound']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $track_sound = $track_sound->find($id); 
		 $track_sound->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>