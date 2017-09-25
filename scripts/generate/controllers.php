<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/connection.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_controller.php");

$tables = $database->get_tables();

foreach ($tables as $table) {
    $table_array = explode('_', $table);
    if ($table_array[0] != "view") {
        // Génération du contrôleur
        if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/app/controllers/" . $table . "_controller.php") == false) {
            generate_controller($table);
        }
    }
}
?>
