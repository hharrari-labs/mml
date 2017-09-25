<?php

require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/connection.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_origin_model.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_model.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/include.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_controller.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_view.php");
require_once ($_SERVER["DOCUMENT_ROOT"] . "/scripts/generate/functions/generate_language.php");

$tables = $database->get_tables();

foreach ($tables as $table) {
    $table_array = explode('_', $table);
    if ($table_array[0] != "view") {
        $fields = $database->get_fields($table);

        // Génération du modèle d'origine
        generate_origin_model($table, $fields);
        // Génération du modèle d'origine si il n'éxiste pas
        if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/app/models/" . get_name_model(explode('_', $table)) . ".php") == false) {
            generate_model($table);
        }

        // Génération du contrôleur
        if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/app/controllers/" . $table . "_controller.php") == false) {
            generate_controller($table);
        }

        // Génération des vues
        // Création du dossier
        $path = $_SERVER["DOCUMENT_ROOT"] . "/app/views/$table/";
        if (is_dir($path) == false) {
            mkdir($path, 0777);
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

        // Génération des fichiers de langue si il n'éxiste pas
        $path = $_SERVER["DOCUMENT_ROOT"] . "/config/locales/$table/";
        if (is_dir($path) == false) {
            mkdir($path, 0777);
            generate_language($table, $fields, $path, 'fr');
            generate_language($table, $fields, $path, 'en');
        }
    }
}

include_models($tables);
?>
