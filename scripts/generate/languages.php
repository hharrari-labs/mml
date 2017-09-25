<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/connection.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_language.php");

$tables = $database->get_tables();

foreach ($tables as $table) {
    $table_array = explode('_', $table);
    if ($table_array[0] != "view") {
        $path = $_SERVER["DOCUMENT_ROOT"] . "/config/locales/$table/";
        // Génération des fichiers de langue si il n'éxiste pas
        if (is_dir($path) == false) {
            mkdir($path, 0777);
            $fields = $database->get_fields($table);
            generate_language($table, $fields, $path, 'fr');
            generate_language($table, $fields, $path, 'en');
        }
    }
}
?>
