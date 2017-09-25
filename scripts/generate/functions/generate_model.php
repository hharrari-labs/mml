<?php
function generate_model($table){
    // Récupération du nom du modèle
    $model = get_name_model(explode('_', $table));
    $origin_model = $model.'Class';
    
    // Création du chemin
    $path = $_SERVER["DOCUMENT_ROOT"] . "/app/models/".$model.".php";
    
    // Création du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }

    // Début du fichier
    fwrite($file, "<?php \r\n");
    fwrite($file, "class " . $model . " extends ".$origin_model." { \r\n\n\n");
    
    
    // Fin du fichier
    fwrite($file, "} \r\n?>");
    fclose($file);
}
?>
