<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/config/includes.php"); 

//systeme de session
if(isset ($_SESSION['session_id']) && $_SESSION['session_id']!="") {
    unset ($session);    
    $user = new User();
    $session = $user->find($_SESSION['session_id']);
    unset($user);
    if($session instanceof User == false || $session->get_id() == "0") {
        unset($session);
        unset($_SESSION['session_id']);
    }
} else {
    unset($session);
    unset($_SESSION['session_id']);
}

//recuperation des parametres
$action = $_REQUEST['action'];
$controller = $_REQUEST['controller'];
$id = $_REQUEST['id'];
$nested_id = $_REQUEST['nested_id'];
$nested_controller = $_REQUEST['nested_controller'];
if (isset($_REQUEST['error']) && $_REQUEST['error'] == true) {
    $error = true;
} else {
    $error = false;
}


//contrôleur par défaut
if($action == "" && $controller == "" && $session instanceof User && $session->get_id() != "") {
    controller_and_action_after_login($session->get_user_status_id(), $controller, $action);
} elseif($action == "" && $controller == "") {
    $action="login";
    $controller="users";
} elseif($action == "") {
    $action="index";
}

//test si connecté
if($session instanceof User == false || ($session->get_id() == "")) {
    if($action != "connect" && $action != "login" && $action != "forgotten_password" && $action != "captcha" && $action != "update_password") {
        header("Location: $return");
    }
}

// Droit de l'utilisateur
if($session instanceof User && $session->get_id() != "" ){
    authorization($session->get_user_status_id(), $controller, $action);
}

//echo $session->get_name().' - '. $session->get_user_status()->get_status();

//appel du contrôleur
if($controller != "" && file_exists($_SERVER["DOCUMENT_ROOT"] . "/app/controllers/".$controller."_controller.php")) {
    dictionnary($controller);
    require_once($_SERVER["DOCUMENT_ROOT"] . "/app/controllers/".$controller."_controller.php");
} else {
    header("Location: $return");
}
?>