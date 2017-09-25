<?php 
$loan = new Loan(); 
$movie =new Movy();
switch ($action) { 

	 case 'index': 
             $encoding = "decode"; 
              
              if($session->get_user_status_id() == MEMBERSTATUS){
                   $loans = $loan->find_by_id_owner($session->get_id());
              }
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/loans/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/loans/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $loan = $loan->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/loans/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $loan = new Loan($_REQUEST['loan']); 
		 $save = $loan->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $loan = $loan->find($id); 
		 $save = $loan->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['loan']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 
		 $loan->delete(); 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>