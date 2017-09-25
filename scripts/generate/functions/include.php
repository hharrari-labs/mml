<?php

function include_models($tables){
    
    // Création du chemin
    $path = $_SERVER["DOCUMENT_ROOT"] . "/config/include_models.php";
    $path_model = $_SERVER["DOCUMENT_ROOT"] . "/app/models/";
    $path_origin_model = $_SERVER["DOCUMENT_ROOT"] . "/app/models/origin_models/";
    // Création du fichier
    if (file_exists($path)) {
        unlink($path);
    }
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    fwrite($file, "<?php \r\n");
        
    foreach ($tables as $table) {
        $model = get_name_model(explode('_', $table));
        $origin_model = $model.'.class.php';
        $model .= ".php";
         if (file_exists($path_origin_model.$origin_model)) {
             fwrite($file, "require_once(\$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/models/origin_models/".$origin_model."\"); \r\n");
         }
         if (file_exists($path_model.$model)) {
             fwrite($file, "require_once(\$_SERVER[\"DOCUMENT_ROOT\"] . \"/app/models/".$model."\"); \r\n");
         }
          
    }
    
    // Fin du fichier
    fwrite($file, "?>");
    fclose($file);
}
?>
