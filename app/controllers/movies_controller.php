<?php 
$movy = new Movy(); 

    $user = new User();
    $movies_user = new MoviesUser();
    $loan = new Loan();
switch ($action) { 

    
	 case 'index': 
                 if ($session->get_user_status_id() == ADMINSTATUS){
                 $movies = $movy->all();   
                 }
                 if($session->get_user_status_id() == MEMBERSTATUS){
                 $movies = $movy->find_by_user_id($session->get_id());
                 }
		 
		 $page = $_SERVER["DOCUMENT_ROOT"] . "/app/views/movies/$action.php"; 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/layout/layout.php"); 
		 break;      

	 case 'new': 
                 if ($session->get_user_status_id() == ADMINSTATUS){
                  $users = $user->all();   
                 }
                 if($session->get_user_status_id() == MEMBERSTATUS){
                 $users = $user->find_by_user_status_id(MEMBERSTATUS);
                 }
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies/$action.php"); 
		 break; 
             
	 case 'new_scanne': 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies/$action.php"); 
		 break; 

	 case 'edit': 
                  if ($session->get_user_status_id() == ADMINSTATUS){
                  $users = $user->all();   
                 }
                 if($session->get_user_status_id() == MEMBERSTATUS){
                 $users = $user->find_by_user_status_id(MEMBERSTATUS);
                 }
		 $encoding = "encode"; 
		 $movy = $movy->find($id); 
		 include_once ($_SERVER["DOCUMENT_ROOT"] . "/app/views/movies/$action.php"); 
		 break; 

	 case 'create': 
                 
		 $error['error'] = 'false'; 
		 $movy = new Movy($_REQUEST['movy']); 
                 if($_REQUEST['movy']){
		 $save = $movy->save($_REQUEST, $error);
                 }
                 $last_movie = $movy->get_last_id();
                 $movies_user = $movy->set_movies_user_by_id($last_movie,$session->get_id());
                 
                
                if ($movy->get_loan()== 1){
                if (isset($_REQUEST['user_loan'])){
                         $id_user_loan = $_REQUEST['user_loan'];          
                         $info_user = $user->find_by_id($id_user_loan);  
                         $today = date("j/n/Y");
                         $movies_loan = $movy->set_loan_by_movies_user($session->get_id(), $info_user->get_id(), $last_movie, $info_user->get_name(),$info_user->get_first_name(),$info_user->get_email(),$date);                
                }
                if (isset($_REQUEST['nom_pret'])){
                   $nom_pret = $_REQUEST['nom_pret'];
                   $prenom_pret = $_REQUEST['prenom_pret'];
                   $email_pret=  $_REQUEST['email_pret'];
                   $today = date("j/n/Y");
                 $movies_loan = $movy->set_loan_by_movies_new_user($session->get_id(),$id_user,$last_movie,$nom_pret,$prenom_pret,$email_pret,$date);
                }
                }
               
               echo json_encode($error); 
		 break; 

	 case 'update': 
                 $error['error'] = 'false'; 
		 $encoding = "decode";                       
		 $movy = $movy->find($id); 
                   // partie upload d'image pour jaqette 
                $dossier = './public/upload/';
                $fichier = basename($_FILES['file']['name']); 
                $taille_maxi = 10000000;
                $taille = filesize($_FILES['file']['tmp_name']);
                $extensions = array('.png', '.gif', '.jpg', '.jpeg','.JPG');
                $extension = strrchr($_FILES['file']['name'], '.'); 
                //Début des vérifications de sécurité...
                if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                {
                     
                     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
                }
                if($taille>$taille_maxi)
                {
                     $erreur = 'Le fichier est trop gros...';
                }
                if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
                {
                     //On formate le nom du fichier ici...
                     $fichier = strtr($fichier, 
                          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                     
                     if ($movy->get_manuel()== 0){ // si le film est manuelle alors lui associée sa propre jaquettte
                     $fichier_id = $movy->get_id()."_".$session->get_id()."_". $fichier;
                     }else{
                     $fichier_id = $movy->get_id()."_". $fichier; // si le film est scanné alors utilisé la jaquette imposée par l'api
                     }
                     if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier_id)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                     {
                          echo 'Upload effectué avec succès !';
                     }
                     else //Sinon (la fonction renvoie FALSE).
                     {
                          echo 'Echec de l\'upload !';
                     }
                }
                else
                {
                     echo $erreur;
                }
                
                if ( $_REQUEST ['movy']['jacket'] != ''){
                       $save = $movy->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['movy']);                  
                       $name_jacket = $_REQUEST ['movy']['jacket'];                  
                       $deform_jacket = substr(strrchr($name_jacket, "_"), 1);
                           if($deform_jacket != ""){
                               $jacket_format = $movy->get_id()."_".$session->get_id()."_".$deform_jacket;
                           }else{   
                               $jacket_format = $movy->get_id()."_".$session->get_id()."_".$name_jacket;
                           }
                               $id_post = $_REQUEST ['movy']['id'];                 
                               $movy->update_movie( $jacket_format,$id_post);
                 }else{
                     
                  $save = $movy->update_attributes($_REQUEST, $error, $encoding, $_REQUEST['movy']);
               
                  }                           
                 if ($movy->get_loan()== 0){
                     $loan->delete_loan($session->get_id(),$movy->get_id()); 
                 }
                 $loans = $loan->find_by_id_owner($session->get_id());
                 if ($movy->get_loan()== 1){
                if (isset($_REQUEST['user_loan'])){
                         $id_user_loan = $_REQUEST['user_loan'];            
                         $info_user = $user->find_by_id($id_user_loan);                  
                         foreach ($loans as $loan) {
                            if($loan->get_id_user()!= $_REQUEST['user_loan'] && $loan->get_id_movie()!= $_REQUEST['id']){
                              $movies_loan = $movy->set_loan_by_movies_user($session->get_id(), $info_user->get_id(), $movy->get_id(), $info_user->get_name(),$info_user->get_first_name(),$info_user->get_email(),$date);
                         }else{
                            $movies_loan = $movy->update_loan_by_movies_user( $info_user->get_id(), $info_user->get_name(),$info_user->get_first_name(),$info_user->get_email(),$date,$session->get_id(),$movy->get_id());                
                         }
                         }
                  }
                if (isset($_REQUEST['nom_pret'])){
                   $nom_pret = $_REQUEST['nom_pret'];
                   $prenom_pret = $_REQUEST['prenom_pret'];
                   $email_pret=  $_REQUEST['email_pret'];
                   foreach ($loans as $loan) {
                      if($loan->get_id_movie()!= $_REQUEST['id']){
                       $movies_loan = $movy->set_loan_by_movies_new_user($session->get_id(),$id_user,$movy->get_id(),$nom_pret,$prenom_pret,$email_pret,$date);
                       }else{
                       $movies_loan = $movy->update_loan_by_movies_user($id_user,$nom_pret,$prenom_pret,$email_pret,$date,$session->get_id(),$movy->get_id());
                       }
                   }
                }
                 }
		 echo json_encode($error); 
		 break; 

	 case 'destroy': 
                  if ( $session->get_user_status_id()==  MEMBERSTATUS){
               
                     
                 $loan = $loan->find_user_movie_owner($session->get_id(),$id); 
//		 $loan->delete();
                 
                 $movies_user = $movies_user->find($id,$session->get_id());
                 $movies_user->delete();
                 $movy = $movy->find($id); 
		 $movy->delete();
                 
                  }
                 if ( $session->get_user_status_id()==  ADMINSTATUS){
		 $movy = $movy->find($id); 
		 $movy->delete(); 
                 }
		 break; 

	 default : 
		 header('Location: '.$return); 
		 break; 

 } 
?>