<?php 
$other_info = new OtherInfo(); 

switch ($action) { 

	 case 'index': 
		 $other_infos = $other_info->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/other_infos/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/other_infos/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $other_info = $other_info->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/other_infos/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $other_info = new OtherInfo($_REQUEST['other_info']); 
		 $save = $other_info->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $other_info = $other_info->find($id); 
		 $save = $other_info->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['other_info']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $other_info = $other_info->find($id); 
		 $other_info->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>