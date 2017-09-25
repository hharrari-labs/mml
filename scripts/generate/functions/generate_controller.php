<?php
function generate_controller($table) {
    
    //init variable
    $model = get_name_model(explode('_', $table));
    $folder = $table;
    $object = get_variable_model(explode('_', $table));

    $path = $_SERVER["DOCUMENT_ROOT"] . "/app/controllers/".$table."_controller.php";
    
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    
    //debut du fichier
    fwrite($file, "<?php \r\n");
    fwrite($file, "\$".$object." = new ".$model."(); \r\n\n");
    fwrite($file, "switch (\$action) { \r\n\n");
    
    //index
    fwrite($file, "\t case 'index': \r\n");
    fwrite($file, "\t\t \$".$table." = \$".$object."->all(); \r\n");
    fwrite($file, "\t\t \$page = \$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/".$folder."/\$action.php\"; \r\n");
    fwrite($file, "\t\t include_once (\$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/layout/layout.php\"); \r\n");
    fwrite($file, "\t\t break; \r\n\n");
    
    //new
    fwrite($file, "\t case 'new': \r\n");
    fwrite($file, "\t\t include_once (\$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/".$folder."/\$action.php\"); \r\n");
    fwrite($file, "\t\t break; \r\n\n");
    
    //edit
    fwrite($file, "\t case 'edit': \r\n");
    fwrite($file, "\t\t \$encoding = \"encode\"; \r\n");
    fwrite($file, "\t\t \$".$object." = \$".$object."->find(\$id); \r\n");
    fwrite($file, "\t\t include_once (\$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/".$folder."/\$action.php\"); \r\n");
    fwrite($file, "\t\t break; \r\n\n");
    
    //create
    fwrite($file, "\t case 'create': \r\n");
    fwrite($file, "\t\t \$error['error'] = 'false'; \r\n");
    fwrite($file, "\t\t \$".$object." = new ".$model."(\$_REQUEST['$object']); \r\n");
    fwrite($file, "\t\t \$save = \$".$object."->save(\$_REQUEST, \$error); \r\n");
    fwrite($file, "\t\t echo json_encode(\$error); \r\n");
    fwrite($file, "\t\t break; \r\n\n");
    
    //update
    fwrite($file, "\t case 'update': \r\n");
    fwrite($file, "\t\t \$error['error'] = 'false'; \r\n");
    fwrite($file, "\t\t \$encoding = \"decode\"; \r\n");
    
    fwrite($file, "\t\t \$".$object." = \$".$object."->find(\$id); \r\n");
    fwrite($file, "\t\t \$save = \$".$object."->update_attributes(\$_REQUEST, \$error, \$encoding, \$_REQUEST['$object']); \r\n");
    fwrite($file, "\t\t echo json_encode(\$error); \r\n");
    fwrite($file, "\t\t break; \r\n\n");
    
    //destroy
    fwrite($file, "\t case 'destroy': \r\n");
    fwrite($file, "\t\t \$".$object." = \$".$object."->find(\$id); \r\n");
    fwrite($file, "\t\t \$".$object."->delete(); \r\n");
    fwrite($file, "\t\t break; \r\n\n");
    
    
    // Si le controller est Users création du systeme de login
    if($table == "users"){
        
        //login
        fwrite($file, "\t case 'login': \r\n");
        fwrite($file, "\t\t \$page = \$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/".$folder."/\$action.php\"; \r\n");
        fwrite($file, "\t\t include_once (\$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/layout/layout.php\"); \r\n");
        fwrite($file, "\t\t break; \r\n\n");
        
        //logout
        fwrite($file, "\t case 'logout': \r\n");
        fwrite($file, "\t\t if (isset(\$_COOKIE['cookie_id'])) { \r\n");
        fwrite($file, "\t\t\t setcookie('cookie_id', '', time() - COOKIE_EXPIRE, COOKIE_PATH); \r\n");
        fwrite($file, "\t\t } \r\n");
        fwrite($file, "\t\t unset(\$_SESSION['session_id']); \r\n");
        fwrite($file, "\t\t unset(\$session); \r\n");
        fwrite($file, "\t\t header('Location: '.\$return); \r\n");
        fwrite($file, "\t\t break; \r\n\n");
    
        // captcha
        fwrite($file, "\t case 'captcha': \r\n");
        fwrite($file, "\t\t require_once(\$_SERVER[\"DOCUMENT_ROOT\"] . \"/librairies/captcha/cryptographp.fct.php\"); \r\n");
        fwrite($file, "\t\t if (isset(\$_POST['code']) && chk_crypt(\$_POST['code'])){ \r\n");
        fwrite($file, "\t\t\t header('Location:' . \$return . 'users/forgotten_password'); \r\n");
        fwrite($file, "\t\t } else { \r\n");
        fwrite($file, "\t\t\t \$page = \$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/users/\$action.php\"; \r\n");
        fwrite($file, "\t\t\t include (\$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/layout/layout.php\");  \r\n");
        fwrite($file, "\t\t } \r\n");
        fwrite($file, "\t\t break; \r\n\n");

        // forgotten password
        fwrite($file, "\t case 'forgotten_password': \r\n");
        fwrite($file, "\t\t \$page = \$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/users/\$action.php\"; \r\n");
        fwrite($file, "\t\t include (\$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/views/layout/layout.php\");  \r\n");
        fwrite($file, "\t\t break; \r\n\n");

        //update password
        fwrite($file, "\t case 'update_password': \r\n");
        fwrite($file, "\t\t \$".$object." = \$".$object."->find_by_email(\$_REQUEST['email']); \r\n");
        fwrite($file, "\t\t if (\$".$object." instanceof ".$model.") { \r\n");
        fwrite($file, "\t\t\t \$new_password = md5(\$".$object."->random_password(8)); \r\n");
        fwrite($file, "\t\t\t \$".$object."->set_password(\$new_password); \r\n");
        fwrite($file, "\t\t\t if (\$".$object."->update()) { \r\n");
        fwrite($file, "\t\t\t\t \$".$object."->send_new_password(\$new_password); \r\n");
        fwrite($file, "\t\t\t\t header('Location:'. \$return); \r\n");
        fwrite($file, "\t\t\t } else { \r\n");
        fwrite($file, "\t\t\t\t header('Location:' . \$return . 'users/forgotten_password?error=true'); \r\n");
        fwrite($file, "\t\t\t } \r\n");
        fwrite($file, "\t\t } else { \r\n");
        fwrite($file, "\t\t\t header('Location:' . \$return . 'users/forgotten_password?error=true'); \r\n");
        fwrite($file, "\t\t } \r\n");
        fwrite($file, "\t\t break; \r\n\n");
        
        //connect
        fwrite($file, "\t case 'connect': \r\n");
        fwrite($file, "\t\t \$email = \$_REQUEST['login_email']; \r\n");
        fwrite($file, "\t\t \$password = md5(\$_REQUEST['login_password']); \r\n");
        fwrite($file, "\t\t \$error = false; \r\n");
        fwrite($file, "\t\t if (\$email != '' && \$password != '') { \r\n");
        fwrite($file, "\t\t\t if (preg_match(\"/^[_+a-zA-Z0-9-]+(\.[_+a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]{1,})*\.([a-zA-Z]{2,}){1}$/\", \$email)) { \r\n");
        fwrite($file, "\t\t\t\t \$".$object." = \$".$object."->find_by_email_and_password(\$email, \$password); \r\n");
        fwrite($file, "\t\t\t\t if (\$".$object."->get_id() != '') { \r\n");
        fwrite($file, "\t\t\t\t\t \$_SESSION['session_id'] = \$".$object."->get_id(); \r\n");
        fwrite($file, "\t\t\t\t\t \$error = false; \r\n");
        fwrite($file, "\t\t\t\t } else { \r\n");
        fwrite($file, "\t\t\t\t\t \$error = true; \r\n");
        fwrite($file, "\t\t\t\t } \r\n");
        fwrite($file, "\t\t\t } else { \r\n");
        fwrite($file, "\t\t\t\t \$error = true; \r\n");
        fwrite($file, "\t\t\t } \r\n");
        fwrite($file, "\t\t } else { \r\n");
        fwrite($file, "\t\t\t \$error = true; \r\n");
        fwrite($file, "\t\t } \r\n");
        fwrite($file, "\t\t if (\$error) { \r\n");
        fwrite($file, "\t\t\t unset(\$_SESSION['session_id']); \r\n");
        fwrite($file, "\t\t\t unset(\$_SESSION['cookie_id']); \r\n");
        fwrite($file, "\t\t\t header('Location:'. \$return . 'users/login?error=true'); \r\n");
        fwrite($file, "\t\t } else { \r\n");
        fwrite($file, "\t\t\t header('Location:'. \$return); \r\n");
        fwrite($file, "\t\t } \r\n");
        fwrite($file, "\t\t break; \r\n\n");
    } 
    
    //default
    fwrite($file, "\t default : \r\n");
    fwrite($file, "\t\t header('Location: '.\$return); \r\n");
    fwrite($file, "\t\t break; \r\n\n");
    
 
    //Fin du fichier
    fwrite($file, " } \r\n");
    fwrite($file, "?>");
    fclose($file);
    
}
?>
