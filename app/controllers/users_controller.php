<?php 
$user = new User(); 

switch ($action) { 

	 case 'index': 
             if ($session->get_user_status_id() == ADMINSTATUS){
                  $users = $user->all();   
                 }		 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/users/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 
             
	 case 'my_account': 
		 $user = $user->find_by_id($session->get_id()); 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/users/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'new': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/users/$action.php"); 
		 break; 

	 case 'edit': 
		 $encoding = "encode"; 
		 $user = $user->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/users/$action.php"); 
		 break; 

	 case 'create': 
		 $error['error'] = 'false'; 
		 $user = new User($_REQUEST['user']); 
		 $save = $user->save($_REQUEST, $error); 
		 echo json_encode($error); 
		 break; 

	 case 'update': 
		 $error['error'] = 'false'; 
		 $encoding = "decode"; 
		 $user = $user->find($id); 
		 $save = $user->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['user']); 
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
		 $user = $user->find($id); 
		 $user->delete(); 
		 break; 

	 case 'login': 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/users/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break; 

	 case 'logout': 
		 if (isset($_COOKIE['cookie_id'])) { 
			 setcookie('cookie_id', '', time() - COOKIE_EXPIRE, COOKIE_PATH); 
		 } 
		 unset($_SESSION['session_id']); 
		 unset($session); 
		 header('Location: '.$return); 
		 break; 

	 case 'captcha': 
		 require_once($_SERVER["DOCUMENT_ROOT"] . "/librairies/captcha/cryptographp.fct.php"); 
		 if (isset($_POST['code']) && chk_crypt($_POST['code'])){ 
			 header('Location:' . $return . 'users/forgotten_password'); 
		 } else { 
			 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/users/$action.php"; 
			 include ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php");  
		 } 
		 break; 

	 case 'forgotten_password': 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/users/$action.php"; 
		 include ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php");  
		 break; 

	 case 'update_password': 
		 $user = $user->find_by_email($_REQUEST['email']); 
		 if ($user instanceof User) { 
			 $new_password = md5($user->random_password(8)); 
			 $user->set_password($new_password); 
			 if ($user->update()) { 
				 $user->send_new_password($new_password); 
				 header('Location:'. $return); 
			 } else { 
				 header('Location:' . $return . 'users/forgotten_password?error=true'); 
			 } 
		 } else { 
			 header('Location:' . $return . 'users/forgotten_password?error=true'); 
		 } 
		 break; 

	 case 'connect': 
		 $email = $_REQUEST['login_email']; 
		 $password = md5($_REQUEST['login_password']); 
		 $error = false; 
		 if ($email != '' && $password != '') { 
			 if (preg_match("/^[_+a-zA-Z0-9-]+(\.[_+a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]{1,})*\.([a-zA-Z]{2,}){1}$/", $email)) { 
				 $user = $user->find_by_email_and_password($email, $password); 
				 if ($user->get_id() != '') { 
					 $_SESSION['session_id'] = $user->get_id(); 
					 $error = false; 
				 } else { 
					 $error = true; 
				 } 
			 } else { 
				 $error = true; 
			 } 
		 } else { 
			 $error = true; 
		 } 
		 if ($error) { 
			 unset($_SESSION['session_id']); 
			 unset($_SESSION['cookie_id']); 
			 header('Location:'. $return . 'users/login?error=true'); 
		 } else { 
			 header('Location:'. $return); 
		 } 
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>