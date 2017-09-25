<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/connection.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_view.php");

$tables = $database->get_tables();

foreach ($tables as $table) {
    $table_array = explode('_', $table);
    if ($table_array[0] != "view") {
        $path = $_SERVER["DOCUMENT_ROOT"] . "/app/views/$table/";
        // Création du dossier
        if (is_dir($path) == false) {
            mkdir($path, 0777);
            $fields = $database->get_fields($table);
            // Génération des vues
            generate_index_view($table, $fields, $path);
            generate_edit_view($table, $fields, $path);
            generate_new_view($table, $fields, $path);
            generate_form_partial($table, $fields, $path);


            // Si la table est users création du systeme de login
            if ($table == "users") {
                generate_view_login($path);
                generate_view_captcha($path);
                generate_view_forgotten_password($path);
            }
        }
    }
}
?>
