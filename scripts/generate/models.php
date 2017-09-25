<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/connection.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_origin_model.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_model.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/include.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_view.php");

$tables = $database->get_tables();

foreach ($tables as $table) {
    $table_array = explode('_', $table);
    if ($table_array[0] != "view"){
        $fields = $database->get_fields($table);

        // Génération du modèle d'origine
        generate_origin_model($table, $fields);

        // Génération du modèle d'origine si il n'éxiste pas
        if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/app/models/".get_name_model(explode('_', $table)).".php") == false) {
            generate_model($table);
        }
    }
}

include_models($tables);

?>
