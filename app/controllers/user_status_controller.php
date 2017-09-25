<?php 
$user_statu = new UserStatus(); 

switch ($action) { 

	 case 'index': 
		 $user_status = $user_statu->all(); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/user_status/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/user_status/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $user_statu = $user_statu->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/user_status/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $user_statu = new UserStatus($_REQUEST['user_statu']); 
		 $save = $user_statu->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $user_statu = $user_statu->find($id); 
		 $save = $user_statu->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['user_statu']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $user_statu = $user_statu->find($id); 
		 $user_statu->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>