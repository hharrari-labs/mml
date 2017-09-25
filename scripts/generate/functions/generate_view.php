<?php

function generate_index_view($table, $fields, $path) {
    //init variable
    $path .= "index.php";
    $variable = get_variable_model(explode('_', $table));
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    //debut du fichier
    fwrite($file, "<div id=\"" . $table . "\" > \r\n");
    fwrite($file, "\t <div class=\"actions-content\"> \r\n");
    fwrite($file, "\t\t <button id=\"js-new\" class=\"js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only\"> \r\n");
    fwrite($file, "\t\t\t <span class=\"ui-button-text\"><?php echo I18n(\"new_" . $variable . "\");?></span> \r\n");
    fwrite($file, "\t\t </button> \r\n");
    fwrite($file, "\t\t <div class=\"both\"></div> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "\t <div id=\"waiting\" ></div> \r\n");
    fwrite($file, "\t <table id=\"table-" . $table . "\" class=\"display ex_highlight_row js-table-sorter\"> \r\n");
    //entete du tableau
    fwrite($file, "\t\t <thead> \r\n");
    fwrite($file, "\t\t\t <tr class=\"ui-widget-header \"> \r\n");
    fwrite($file, "\t\t\t\t <th class=\"column-action\"></th> \r\n");
    $field_id = '';
    foreach ($fields as $field) {
        if ($field['Field'] != "id" && $field['Field'] != "created_at" && $field['Field'] != "updated_at") {
            $class = str_replace('_', '-', $field['Field']);
            fwrite($file, "\t\t\t\t <th class=\"column-" . $class . "\"><?php echo I18n(\"" . $field['Field'] . "\");?></th> \r\n");
        } else {
            $field_id = $field['Field'];
        }
    }
    fwrite($file, "\t\t\t </tr> \r\n");
    fwrite($file, "\t\t </thead> \r\n");
    //lignes du tableau
    fwrite($file, "\t\t <tbody> \r\n");
    fwrite($file, "\t\t <?php \r\n");
    fwrite($file, "\t\t if(\$" . $table . "){ \r\n");
    fwrite($file, "\t\t\t foreach (\$" . $table . " as \$" . $variable . ") { ?> \r\n");
    fwrite($file, "\t\t\t\t <tr class=\"line js-over\"");
    if ($field_id != '') {
        fwrite($file, " id=\"line-<?php echo \$" . $variable . "->get_id(); ?>\"");
    }
    fwrite($file, " > \r\n");
    fwrite($file, "\t\t\t\t\t <td class=\"column-action \"> \r\n");
    fwrite($file, "\t\t\t\t\t\t <div class=\"action-icons\"> \r\n");
    fwrite($file, "\t\t\t\t\t\t\t <div class=\"delete js-delete js-button ui-widget-content ui-corner-all\"> \r\n");
    fwrite($file, "\t\t\t\t\t\t\t\t <span class=\"ui-icon ui-icon-close\" title=\"<?php echo I18n(\"delete\");?>\"></span> \r\n");
    fwrite($file, "\t\t\t\t\t\t\t </div> \r\n");
    fwrite($file, "\t\t\t\t\t\t\t <div class=\"update js-update js-button ui-state-default ui-corner-all\" > \r\n");
    fwrite($file, "\t\t\t\t\t\t\t\t <span class=\"ui-icon ui-icon-pencil\" title=\"<?php echo I18n(\"edit\");?>\"></span> \r\n");
    fwrite($file, "\t\t\t\t\t\t\t </div> \r\n");
    fwrite($file, "\t\t\t\t\t\t </div> \r\n");
    fwrite($file, "\t\t\t\t\t </td> \r\n");
    foreach ($fields as $field) {
        if ($field['Field'] != "id" && $field['Field'] != "created_at" && $field['Field'] != "updated_at") {
            $class = str_replace('_', '-', $field['Field']);
            $split_field = explode('_', $field['Field']);
            if ($split_field[count($split_field) - 1] == 'id' && $field['Field'] != "id") {
                array_splice($split_field, count($split_field) - 1);
                //foreign key
                $foreign_key = join_array($split_field, '_');
                $class = str_replace('_', '-', $foreign_key);
                fwrite($file, "\t\t\t\t\t <td class=\"" . $class . " \"><?php echo \$" . $variable . "->get_" . $foreign_key . "()->get_id(); ?></td> \r\n");
            } else {
                if (get_cleaned_type($field['Type']) == "date") {
                    fwrite($file, "\t\t\t\t\t <td class=\"" . $class . " \"><?php echo localize(\$" . $variable . "->get_" . $field['Field'] . "()); ?></td> \r\n");
                } elseif (get_field_type($field['Type']) == 'checkbox') {
                    fwrite($file, "\t\t\t\t\t <td class=\"" . $class . " icon-check js-icon-check <?php if(\$" . $variable . "->get_" . $field['Field'] . "() == '1'){echo 'is-checked';} ?>\"><?php echo \$" . $variable . "->get_" . $field['Field'] . "(); ?></td> \r\n");
                } else {
                    fwrite($file, "\t\t\t\t\t <td class=\"" . $class . " \"><?php echo \$" . $variable . "->get_" . $field['Field'] . "(); ?></td> \r\n");
                }
            }
        }
    }
    fwrite($file, "\t\t\t\t </tr> \r\n");
    fwrite($file, "\t\t\t <?php } \r\n");
    fwrite($file, "\t\t\t } ?> \r\n");
    fwrite($file, "\t\t </tbody> \r\n");
    fwrite($file, "\t </table> \r\n");
    fwrite($file, " </div> \r\n");
    fwrite($file, " <div id=\"js-dialog-form\"></div> \r\n");
    fwrite($file, " <div id=\"js-dialog-delete\"></div> \r\n");
    fwrite($file, " <div id=\"js-path\" class=\"hidden\"><?php echo \$controller.\"/\"; ?></div> \r\n");
    fwrite($file, " <div id=\"js-message-delete\" class=\"hidden\"><?php echo I18n(\"delete_" . $variable . "\");?></div> \r\n");
    fwrite($file, " <div id=\"js-table-no-data\" class=\"hidden\"><?php echo I18n(\"table_no_data\");?></div> \r\n");
    fclose($file);
}

function generate_edit_view($table, $fields, $path) {
    //init variable
    $path .= "edit.php";
    $variable = get_variable_model(explode('_', $table));
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    //debut du fichier
    fwrite($file, "<form method=\"POST\" id=\"form\" action=\"" . $table . "/update/<?php echo \$id; ?>\" > \r\n");
    fwrite($file, "\t <?php require_once(\"_form.php\"); ?> \r\n");
    fwrite($file, "\t <div id=\"content-button\"> \r\n");
    fwrite($file, "\t\t <div id=\"form-button\"> \r\n");
    fwrite($file, "\t\t\t <div id=\"save-form\" class=\"js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only\"> \r\n");
    fwrite($file, "\t\t\t\t <span class=\"ui-button-text\"><?php echo I18n(\"save\"); ?></span> \r\n");
    fwrite($file, "\t\t\t </div> \r\n");
    fwrite($file, "\t\t </div> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "</form> \r\n");
    fclose($file);
}

function generate_new_view($table, $fields, $path) {
    //init variable
    $path .= "new.php";
    $variable = get_variable_model(explode('_', $table));
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    //debut du fichier
    fwrite($file, "<form method=\"POST\" id=\"form\" action=\"" . $table . "/create\" > \r\n");
    fwrite($file, "\t <?php require_once(\"_form.php\"); ?> \r\n");
    fwrite($file, "\t <div id=\"content-button\"> \r\n");
    fwrite($file, "\t\t <div id=\"form-button\"> \r\n");
    fwrite($file, "\t\t\t <div id=\"save-form\" class=\"js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only\"> \r\n");
    fwrite($file, "\t\t\t\t <span class=\"ui-button-text\"><?php echo I18n(\"save\"); ?></span> \r\n");
    fwrite($file, "\t\t\t </div> \r\n");
    fwrite($file, "\t\t </div> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "</form> \r\n");
    fclose($file);
}

function generate_form_partial($table, $fields, $path) {
    //init variable
    $path .= "_form.php";
    $variable = get_variable_model(explode('_', $table));
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    //Création des lignes du formulaire
    foreach ($fields as $field) {
        $id_name = str_replace('_', '-', $field['Field']);
        if ($field['Field'] != 'id' && $field['Field'] != 'created_at' && $field['Field'] != 'updated_at') {
            fwrite($file, "<div class=\"line-form \"> \r\n");
            fwrite($file, "\t <label class=\"label-form\"> \r\n");
            fwrite($file, "\t\t <?php echo I18n(\"" . $field['Field'] . "\"); ?> : <span class=\"mandatory \">*</span>\r\n");
            fwrite($file, "\t </label> \r\n");
            fwrite($file, "\t <div class=\"content-input-form\" > \r\n");
            $split_field = explode('_', $field['Field']);
            if ($split_field[count($split_field) - 1] == 'id' && $field['Field'] != "id") {
                array_splice($split_field, count($split_field) - 1);
                //foreign key
                $foreign_key = join_array($split_field, '_');
                $id_name = str_replace('_', '-', $foreign_key);
                $foreign_variable = get_variable_foreign_model(explode('_', $foreign_key));
                // Création d'un select
                fwrite($file, "\t\t <select name=\"" . $variable . "[" . $field['Field'] . "]\" id=\"input-" . $id_name . "\" class=\"ui-widget-content ui-corner-all js-form js-mandatory js-show-view \" > \r\n");
                fwrite($file, "\t\t\t <option value=\"\"><?php echo I18n(\"select_" . $field['Field'] . "\"); ?></option> \r\n");
                fwrite($file, "\t\t\t <?php \$" . $foreign_variable . " = \$" . $variable . "->get_" . $foreign_key . "()->all(); \r\n");
                fwrite($file, "\t\t\t if (\$" . $foreign_variable . ") { \r\n");
                fwrite($file, "\t\t\t\t foreach (\$" . $foreign_variable . " as \$" . $foreign_key . ") { ?> \r\n");
                fwrite($file, "\t\t\t\t\t <option <?php if (\$" . $foreign_key . "->get_id() == \$" . $variable . "->get_".$field['Field']."()) { echo  \"selected='selected'\"; } ?> value=\"<?php echo \$" . $foreign_key . "->get_id(); ?>\"><?php echo \$" . $foreign_key . "->get_id(\$encoding); ?></option> \r\n");
                fwrite($file, "\t\t\t\t <?php } ?> \r\n");
                fwrite($file, "\t\t\t <?php } ?> \r\n");
                fwrite($file, "\t\t </select> \r\n");
            } else {
                // Création d'un input text
                if ($field['Field'] == 'password') {
                    // Création d'un textarea
                    fwrite($file, "\t\t <input type=\"password\" name=\"" . $variable . "[" . $field['Field'] . "]\" id=\"input-" . $id_name . "\" class=\"ui-widget-content ui-corner-all js-form js-mandatory js-show-view js-password\" value=\"<?php echo \$" . $variable . "->get_" . $field['Field'] . "(\$encoding); ?>\" /> \r\n");
                } elseif (get_field_type($field['Type']) == 'text') {
                    $class = "";
                    if (get_cleaned_type($field['Type']) == "date") {
                        $class = "js-date";
                    } elseif (get_cleaned_type($field['Type']) == "int") {
                        $class = "js-numeric";
                    } elseif ($field["Field"] == "email") {
                        $class = "js-email";
                    } elseif (get_cleaned_type($field['Type']) == "float" || get_cleaned_type($field['Type']) == "double") {
                        $class = "js-decimal";
                    }
                    fwrite($file, "\t\t <input type=\"text\" name=\"" . $variable . "[" . $field['Field'] . "]\" id=\"input-" . $id_name . "\" class=\"ui-widget-content ui-corner-all js-form js-mandatory js-show-view " . $class . "\" ");
                    if (get_cleaned_type($field['Type']) == "date") {
                        fwrite($file, "value=\"<?php echo localize(\$" . $variable . "->get_" . $field['Field'] . "(\$encoding)); ?>\" /> \r\n");
                    } else {
                        fwrite($file, "value=\"<?php echo \$" . $variable . "->get_" . $field['Field'] . "(\$encoding); ?>\" /> \r\n");
                    }
                } elseif (get_field_type($field['Type']) == 'textarea') {
                    // Création d'un password
                    fwrite($file, "\t\t <textarea name=\"" . $variable . "[" . $field['Field'] . "]\" id=\"input-" . $id_name . "\" class=\"ui-widget-content ui-corner-all js-form js-mandatory js-show-view \" ><?php echo \$" . $variable . "->get_" . $field['Field'] . "(\$encoding); ?></textarea> \r\n");
                } elseif (get_field_type($field['Type']) == 'checkbox') {
                    // Création d'un checkbox
                    fwrite($file, "\t\t <?php if(\$" . $variable . "->get_" . $field['Field'] . "() == '1') { \$checked=\"checked\"; } else { \$checked=\"\"; }  ?> \r\n");
                    fwrite($file, "\t\t <input type=\"hidden\" name=\"" . $variable . "[" . $field['Field'] . "]\" class=\"\" value=\"0\" /> \r\n");
                    fwrite($file, "\t\t <input <?php echo \$checked; ?> type=\"checkbox\" name=\"" . $variable . "[" . $field['Field'] . "]\" id=\"input-" . $id_name . "\" class=\"ui-widget-content ui-corner-all js-form js-show-view js-checkbox\" value=\"1\" /> \r\n");
                } else {
                    fwrite($file, "\t\t <input type=\"text\" name=\"" . $variable . "[" . $field['Field'] . "]\" id=\"input-" . $id_name . "\" class=\"ui-widget-content ui-corner-all js-form js-mandatory js-show-view \" value=\"<?php echo \$" . $variable . "->get_" . $field['Field'] . "(\$encoding); ?>\" /> \r\n");
                }
            }

            fwrite($file, "\t </div> \r\n");
            // Création des erreurs
            fwrite($file, "\t <div class=\"content-error-form ui-state-highlight ui-corner-all hidden\"> \r\n");
            fwrite($file, "\t\t <span class=\"icon-error-form ui-icon ui-icon-alert\"></span> \r\n");
            fwrite($file, "\t\t <div class=\"error-form hidden\" id=\"error-not-null-" . $id_name . "\"><?php echo I18n(\"error_not_null\"); ?></div> \r\n");
            if ($field["Key"] == "UNI") {
                fwrite($file, "\t\t <div class=\"error-form hidden\" id=\"error-unique-" . $id_name . "\"><?php echo I18n(\"error_unique\"); ?></div> \r\n");
            }
            if ($field["Field"] == "password") {
                fwrite($file, "\t\t <div class=\"error-form hidden\" id=\"error-password-" . $id_name . "\"><?php echo I18n(\"error_password\"); ?></div> \r\n");
            }
            if ($field["Field"] == "email") {
                fwrite($file, "\t\t <div class=\"error-form hidden\" id=\"error-email-" . $id_name . "\"><?php echo I18n(\"error_email\"); ?></div> \r\n");
            }
            fwrite($file, "\t </div> \r\n");
            fwrite($file, "</div> \r\n");
        } elseif ($field['Field'] == 'id') {
            // Création d'un champs hidden pour l'id
            fwrite($file, "<input type=\"hidden\" name=\"" . $variable . "[" . $field['Field'] . "]\" id=\"input-" . $id_name . "\" class=\"ui-widget-content ui-corner-all js-form \" value=\"<?php echo \$" . $variable . "->get_" . $field['Field'] . "(); ?>\" /> \r\n");
        }
    }
    fclose($file);
}

function generate_view_login($path){
    $path .= "login.php";
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }

    //debut du fichier
    fwrite($file, "<div id=\"content-login\" class=\"ui-dialog ui-widget ui-widget-content ui-corner-all\"> \r\n");
    fwrite($file, "\t <div class=\"ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix\"> \r\n");
    fwrite($file, "\t\t <span class=\"ui-dialog-title ui-dialog-title-dialog-form\"> <?php echo I18n(\"login_title\"); ?></span> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "\t <div id=\"login\" class=\"ui-dialog-content ui-widget-content\"> \r\n");
    fwrite($file, "\t\t <div id=\"error-login\" class=\"ui-state-highlight ui-corner-all <?php if (\$error == false) { echo \"hidden\"; } ?>\"> \r\n");
    fwrite($file, "\t\t\t <span style=\"float: left; margin-right: 0.3em;\" class=\"ui-icon ui-icon-alert\"></span> \r\n");
    fwrite($file, "\t\t\t <?php echo I18n('error_login'); ?> \r\n");
    fwrite($file, "\t\t </div> \r\n");
    fwrite($file, "\t\t <form id=\"login-form\" action=\"users/connect\" method=\"POST\"> \r\n");
    fwrite($file, "\t\t\t <div class=\"login-line\"> \r\n");
    fwrite($file, "\t\t\t\t <label class=\"login-label\"><?php echo I18n(\"login_email\"); ?>:</label> \r\n");
    fwrite($file, "\t\t\t\t <input type=\"text\" class=\"js-enter-login left ui-widget-content ui-corner-all\" name=\"login_email\" id=\"login-email\" value=\"\" tabindex=\"1\" /> \r\n");
    fwrite($file, "\t\t\t </div> \r\n");            
    fwrite($file, "\t\t\t <div class=\"login-line\"> \r\n");
    fwrite($file, "\t\t\t\t <label class=\"login-label\"><?php echo I18n(\"login_password\"); ?>:</label> \r\n");
    fwrite($file, "\t\t\t\t <input type=\"password\" class=\"js-enter-login left ui-widget-content ui-corner-all\" name=\"login_password\" id=\"login-password\" value=\"\" tabindex=\"2\" /> \r\n");
    fwrite($file, "\t\t\t </div> \r\n");
    fwrite($file, "\t\t\t <div class=\"login-line\"> \r\n");
    fwrite($file, "\t\t\t\t <a href=\"/users/captcha\"> <?php echo I18n(\"forgotten_password\"); ?></a> \r\n");
    fwrite($file, "\t\t\t\t <div id=\"submit-login\" class=\"js-button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only\"><span class=\"ui-button-text\"><?php echo I18n(\"connect\"); ?></span></div> \r\n");
    fwrite($file, "\t\t\t </div> \r\n");  
    fwrite($file, "\t\t </form> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "</div> \r\n");

    fclose($file);
}

function generate_view_captcha($path){
    //init variable
    $path .= "captcha.php";
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    //debut du fichier
    fwrite($file, "<div id=\"content-captcha\" class=\"ui-dialog ui-widget ui-widget-content ui-corner-all\"> \r\n");
    fwrite($file, "\t <div class=\"ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix\"> \r\n");
    fwrite($file, "\t\t <span class=\"ui-dialog-title ui-dialog-title-dialog-form\"> \r\n");
    fwrite($file, "\t\t\t <?php echo I18n(\"captcha_title\"); ?> \r\n");
    fwrite($file, "\t\t\t <a href=\"<?php echo \$return; ?>\" class=\"back_home\" ><?php echo I18n(\"back_home\"); ?></a> \r\n");
    fwrite($file, "\t\t </span> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "\t <div id=\"captcha\" class=\"ui-dialog-content ui-widget-content\"> \r\n");
    fwrite($file, "\t\t <form id=\"captcha-form\" action=\"/users/captcha\" method=\"post\"> \r\n");
    fwrite($file, "\t\t\t <div class=\"content-captcha-image\"> \r\n");
    fwrite($file, "\t\t\t\t <?php dsp_crypt(0, 1); ?> \r\n");
    fwrite($file, "\t\t\t </div> \r\n"); 
    fwrite($file, "\t\t\t <div class=\"captcha-line\"> \r\n");
    fwrite($file, "\t\t\t\t <label class=\"captcha-label\"><?php echo I18n('captcha'); ?> :</label> \r\n");
    fwrite($file, "\t\t\t\t <input type=\"text\" name=\"code\" class=\"ui-widget-content ui-corner-all\"> \r\n");
    fwrite($file, "\t\t\t </div> \r\n"); 
    fwrite($file, "\t\t\t <div class=\"captcha-line\"> \r\n");
    fwrite($file, "\t\t\t\t <button class=\"ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only\"><span class=\"ui-button-text\"><?php echo I18n('send'); ?></span></button> \r\n");
    fwrite($file, "\t\t\t </div> \r\n"); 
    fwrite($file, "\t\t </form> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "</div> \r\n");
}

function generate_view_forgotten_password($path){
    //init variable
    $path .= "forgotten_password.php";
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    //debut du fichier
    fwrite($file, "<div id=\"content-forgotten-password\" class=\"ui-dialog ui-widget ui-widget-content ui-corner-all\"> \r\n");
    fwrite($file, "\t <div class=\"ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix\"> \r\n");
    fwrite($file, "\t\t <span class=\"ui-dialog-title ui-dialog-title-dialog-form\"> \r\n");
    fwrite($file, "\t\t\t <?php echo I18n(\"forgotten_password_title\"); ?> \r\n");
    fwrite($file, "\t\t\t <a href=\"<?php echo \$return; ?>\" class=\"back_home\" ><?php echo I18n(\"back_home\"); ?></a> \r\n");
    fwrite($file, "\t\t </span> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "\t <div id=\"forgotten-password\" class=\"ui-dialog-content ui-widget-content\"> \r\n");
    fwrite($file, "\t\t <div class=\"ui-state-highlight ui-corner-all <?php if (\$error == false) { echo \"hidden\"; } ?>\" id=\"error-forgotten-password\"> \r\n");
    fwrite($file, "\t\t\t <span style=\"float: left; margin-right: 0.3em;\" class=\"ui-icon ui-icon-alert\"></span> \r\n");
    fwrite($file, "\t\t\t <?php echo I18n('error_forgotten-password'); ?> \r\n");
    fwrite($file, "\t\t </div> \r\n");
    fwrite($file, "\t\t <form id=\"forgotten-password-form\" action=\"/users/update_password\" method=\"post\"> \r\n");
    fwrite($file, "\t\t\t <div class=\"forgotten-password-line\"> \r\n");
    fwrite($file, "\t\t\t\t <label class=\"forgotten-password-label\"><?php echo I18n('email'); ?> :</label> \r\n");
    fwrite($file, "\t\t\t\t <input type=\"text\" name=\"email\" class=\"ui-widget-content ui-corner-all js-email\"> \r\n");
    fwrite($file, "\t\t\t </div> \r\n"); 
    fwrite($file, "\t\t\t <div class=\"forgotten-password-line\"> \r\n");
    fwrite($file, "\t\t\t\t <button class=\"ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only\"><span class=\"ui-button-text\"><?php echo I18n('send'); ?></span></button> \r\n");
    fwrite($file, "\t\t\t </div> \r\n"); 
    fwrite($file, "\t\t </form> \r\n");
    fwrite($file, "\t </div> \r\n");
    fwrite($file, "</div> \r\n");
}

?>
