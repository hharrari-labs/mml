<?php

function generate_origin_model($table, $fields) {
    // Récupération du nom du modèle
    $file_name = get_name_model(explode('_', $table));
    $model = $file_name . 'Class';
    $variable = get_variable_model(explode('_', $table));

    // Création du chemin
    $path = $_SERVER["DOCUMENT_ROOT"] . "/app/models/origin_models/" . $file_name . ".class.php";

    // Création du fichier
    if (file_exists($path)) {
        unlink($path);
    }
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }

    // Début du fichier
    fwrite($file, "<?php \r\n");
    fwrite($file, "class " . $model . " { \r\n\n");
    // Déclaration des constantes
    fwrite($file, "\t const TBL = '" . $table . "'; \r\n\n");

    // Déclaration des Attribut
    $split_field = array();
    $field_constructor = array();
    $primary_keys = array();
    $primary_keys_index = 0;
    $key = 0;
    foreach ($fields as $field) {

        $split_field = explode('_', $field['Field']);

        if ($split_field[count($split_field) - 1] == 'id' && $field['Field'] != "id") {

            array_splice($split_field, count($split_field) - 1);
            //foreign key
            $foreign_key = join_array($split_field, '_');

            $field_constructor[$key]['field'] = $foreign_key;
            $field_constructor[$key]['field_name'] = $field['Field'];
            $field_constructor[$key]['foreign_model'] = get_name_foreign_model($split_field);
            $field_constructor[$key]['type'] = 'foreign_key';
            if ($field_constructor[$key]['foreign_model'] != $file_name) {
                fwrite($file, "\t public $" . $foreign_key . "; \r\n");
            }
            $key++;
        }

        if ($field['Key'] == "PRI") {
            $primary_keys[$primary_keys_index]['field'] = $field['Field'];
            $primary_keys[$primary_keys_index]['type'] = $field["Type"];
            $primary_keys_index++;
        }
        $field_constructor[$key]['field'] = $field['Field'];
        $field_constructor[$key]['field_name'] = $field['Field'];
        $field_constructor[$key]['type'] = 'field';
        fwrite($file, "\t public $" . $field['Field'] . "; \r\n");
        $key++;
    }

    // Déclaration du constructeur
    fwrite($file, "\n\t function __construct(\$params = array()) { \r\n");
    foreach ($field_constructor as $key => $field) {
        if ($field['type'] == 'field') {
            fwrite($file, "\t\t \$this->" . $field['field'] . " = \$params['" . $field["field"] . "']; \r\n");
        } elseif ($field['type'] == 'foreign_key' && $field["foreign_model"] != $file_name) {
            fwrite($file, "\t\t \$" . $field["field"] . " = new " . $field["foreign_model"] . "(); \r\n");
            fwrite($file, "\t\t if(\$params['" . $field["field_name"] . "'] != '') { \r\n");
            fwrite($file, "\t\t\t \$this->" . $field["field"] . " = \$" . $field["field"] . "->find(\$params['" . $field["field_name"] . "']); \r\n");
            fwrite($file, "\t\t } else { \r\n");
            fwrite($file, "\t\t\t \$this->" . $field["field"] . " = \$" . $field["field"] . "; \r\n");
            fwrite($file, "\t\t } \r\n");
        }
    }
    fwrite($file, "\t } \r\n");


    // Déclaration des getters et des setters
    foreach ($field_constructor as $key => $field) {

        // Getter
        if ($field['type'] == 'foreign_key' && $field["field"] != $file_name) {
            fwrite($file, "\n\t public function get_" . $field["field"] . "() { \r\n");
            fwrite($file, "\t\t return \$this->" . $field["field"] . "; \r\n");
            fwrite($file, "\t } \r\n");
        } else {
            fwrite($file, "\n\t public function get_" . $field["field"] . "(\$encoding = '') { \r\n");
            fwrite($file, "\t\t \$return = ''; \r\n");
            fwrite($file, "\t\t if (\$encoding == 'encode') { \r\n");
            fwrite($file, "\t\t\t \$return = utf8_encode(\$this->" . $field["field"] . "); \r\n");
            fwrite($file, "\t\t } elseif (\$encoding == 'decode') { \r\n");
            fwrite($file, "\t\t\t \$return = utf8_decode(\$this->" . $field["field"] . "); \r\n");
            fwrite($file, "\t\t } else { \r\n");
            fwrite($file, "\t\t\t \$return = \$this->" . $field["field"] . "; \r\n");
            fwrite($file, "\t\t } \r\n");
            fwrite($file, "\t\t return stripslashes(\$return); \r\n");
            fwrite($file, "\t } \r\n");
        }

        // Setter
        if ($field["type"] == "field") {
            fwrite($file, "\n\t public function set_" . $field["field"] . "($" . $field["field"] . ") { \r\n");
            fwrite($file, "\t\t \$this->" . $field["field"] . " = $" . $field["field"] . "; \r\n");
            fwrite($file, "\t } \r\n");
        } elseif ($field["type"] == "foreign_key" && $field["field"] != $file_name) {
            fwrite($file, "\n\t public function set_" . $field["field"] . "($" . $field["field_name"] . ") { \r\n");
            fwrite($file, "\t\t \$" . $field["field"] . " = new " . $field['foreign_model'] . "(); \r\n");
            fwrite($file, "\t\t \$this->" . $field["field"] . " = \$" . $field["field"] . "->find($" . $field["field_name"] . "); \r\n");
            fwrite($file, "\t } \r\n");
        }
    }

    // Déclaration du type de données des champs
    foreach ($fields as $field) {
        fwrite($file, "\n\t public function get_field_type_" . $field["Field"] . "() { \r\n");
        fwrite($file, "\t\t return '" . get_field_type_for_mysqli($field["Type"]) . "'; \r\n");
        fwrite($file, "\t } \r\n");
    }

    // Fonction qui retourne tout les types de données des champs
    fwrite($file, "\n\t public function get_fields_type() { \r\n");
    fwrite($file, "\t\t \$type_fields = ''; \r\n");
    foreach ($fields as $field) {
        fwrite($file, "\t\t \$type_fields .= \$this->get_field_type_" . $field["Field"] . "(); \r\n");
    }
    fwrite($file, "\t\t return \$type_fields; \r\n");
    fwrite($file, "\t } \r\n");

    // Requête de sélection de toute la table
    fwrite($file, "\n\t public function all(\$order_by = '') { \r\n");
    fwrite($file, "\t\t \$database = new Database(); \r\n");
    fwrite($file, "\t\t \$mysqli = \$database->get_connection(); \r\n");
    fwrite($file, "\t\t \$request =  \"SELECT * FROM  \".self::TBL ; \r\n");
    fwrite($file, "\t\t if (\$order_by != '') { \r\n");
    fwrite($file, "\t\t\t \$request .=  \" ORDER BY \$order_by ;\"; \r\n");
    fwrite($file, "\t\t } else { \r\n");
    fwrite($file, "\t\t\t \$request .=  \";\"; \r\n");
    fwrite($file, "\t\t } \r\n");
    fwrite($file, "\t\t \$stmt = \$mysqli->prepare(\$request); \r\n");
    fwrite($file, "\t\t \$stmt->execute(); \r\n");
    fwrite($file, "\t\t \$row = array(); \r\n");
    fwrite($file, "\t\t \$database->fetch_assoc(\$stmt, \$row); \r\n");
    fwrite($file, "\t\t while (\$stmt->fetch()) { \r\n");
    fwrite($file, "\t\t\t \$" . $table . "[] = new " . $file_name . "(\$row); \r\n");
    fwrite($file, "\t\t } \r\n");
    fwrite($file, "\t\t return \$" . $table . "; \r\n");
    fwrite($file, "\t } \r\n");

    // Requête de sélection par la ou les clé(s) primaire(s)
    foreach ($primary_keys as $key => $primary_key) {
        if ($key == 0) {
            $param_find = '$' . $primary_key['field'];
        } else {
            $param_find .= ', $' . $primary_key['field'];
        }
    }
    fwrite($file, "\n\t public function find(" . $param_find . ") { \r\n");
    fwrite($file, "\t\t \$database = new Database(); \r\n");
    fwrite($file, "\t\t \$mysqli = \$database->get_connection(); \r\n");
    fwrite($file, "\t\t \$request =  \"SELECT * FROM  \".self::TBL.\"  WHERE ");
    foreach ($primary_keys as $key => $primary_key) {
        $fields_type .= get_field_type_for_mysqli($primary_key['type']);
        if ($key == 0) {
            fwrite($file, $primary_key['field'] . " = ? ");
        } else {
            fwrite($file, "AND " . $primary_key['field'] . " = ? ");
        }
    }
    fwrite($file, "\"; \r\n");
    fwrite($file, "\t\t \$fields_type = \"\"; \r\n");
    if (count($primary_keys) > 1){
        foreach ($primary_keys as $key => $primary_key) {
            fwrite($file, "\t\t \$fields_type .= \$this->get_field_type_" . $primary_key['field'] . "(); \r\n");
        }
    } else {
        fwrite($file, "\t\t \$fields_type .= \$this->get_field_type_id(); \r\n");
    }
    fwrite($file, "\t\t \$stmt = \$mysqli->prepare(\$request); \r\n");
    fwrite($file, "\t\t \$stmt->bind_param(\$fields_type, " . $param_find . "); \r\n");
    fwrite($file, "\t\t \$stmt->execute(); \r\n");
    fwrite($file, "\t\t \$row = array(); \r\n");
    fwrite($file, "\t\t \$database->fetch_assoc(\$stmt, \$row); \r\n");
    fwrite($file, "\t\t \$stmt->fetch(); \r\n");
    fwrite($file, "\t\t return new " . $file_name . "(\$row); \r\n");
    fwrite($file, "\t } \r\n");

    // Déclaration des requêtes pour chaque champs
    foreach ($fields as $field) {
        fwrite($file, "\n\t public function find_by_" . $field["Field"] . "(\$" . $field["Field"] . ", \$order_by = '') { \r\n");
        fwrite($file, "\t\t \$database = new Database(); \r\n");
        fwrite($file, "\t\t \$mysqli = \$database->get_connection(); \r\n");
        fwrite($file, "\t\t \$request =  \"SELECT * FROM  \".self::TBL.\" WHERE " . $field["Field"] . " = ? \"; \r\n");
        fwrite($file, "\t\t if (\$order_by != '') { \r\n");
        fwrite($file, "\t\t\t \$request .=  \" ORDER BY \$order_by ;\"; \r\n");
        fwrite($file, "\t\t } else { \r\n");
        fwrite($file, "\t\t\t \$request .=  \";\"; \r\n");
        fwrite($file, "\t\t } \r\n");
        fwrite($file, "\t\t \$stmt = \$mysqli->prepare(\$request); \r\n");
        fwrite($file, "\t\t \$stmt->bind_param(\$this->get_field_type_" . $field["Field"] . "(), \$" . $field["Field"] . "); \r\n");
        fwrite($file, "\t\t \$stmt->execute(); \r\n");
        fwrite($file, "\t\t \$row = array(); \r\n");
        fwrite($file, "\t\t \$database->fetch_assoc(\$stmt, \$row); \r\n");
        if ($field["Key"] == "UNI" || ( $field["Key"] == "PRI" && count($primary_keys) == 1)) {
            fwrite($file, "\t\t \$stmt->fetch(); \r\n");
            fwrite($file, "\t\t return new " . $file_name . "(\$row); \r\n");
        } else {
            fwrite($file, "\t\t while (\$stmt->fetch()) { \r\n");
            fwrite($file, "\t\t\t \$" . $table . "[] = new " . $file_name . "(\$row); \r\n");
            fwrite($file, "\t\t } \r\n");
            fwrite($file, "\t\t return \$" . $table . "; \r\n");
        }
        fwrite($file, "\t } \r\n");
    }

    // Déclaration de la fonction save qui permet de modifier dans la base de donnée
    fwrite($file, "\n\t public function init_update_attributes(\$params = array()) { \r\n");
    foreach ($fields as $key => $field) {
        fwrite($file, "\t\t if (isset(\$params['".$field['Field']."'])) { \r\n");
        fwrite($file, "\t\t\t \$this->" . $field['Field'] . " = \$params['".$field['Field']."']; \r\n");
        fwrite($file, "\t\t } \r\n");
    }
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction save qui permet de modifier dans la base de donnée
    fwrite($file, "\n\t public function update_attributes(\$params = array(), &\$error = array(), \$encoding = '', \$init = array()) { \r\n");
    fwrite($file, "\t\t \$this->init_update_attributes(\$init); \r\n");
    fwrite($file, "\t\t \$this->before_save(\$params, \$error, \$encoding ); \r\n");
    fwrite($file, "\t\t\t \$this->before_update(\$params, \$error, \$encoding); \r\n");
    fwrite($file, "\t\t\t \$this->update(\$encoding); \r\n");
    fwrite($file, "\t\t\t \$this->after_update(\$params, \$error, \$encoding); \r\n");
    fwrite($file, "\t\t \$this->after_save(\$params, \$error, \$encoding); \r\n");
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction save qui permet de sauvegarderdans la base de donnée
    fwrite($file, "\n\t public function save(\$params = array(), &\$error = array(), \$encoding = '') { \r\n");
    fwrite($file, "\t\t \$this->before_save(\$params, \$error, \$encoding); \r\n");
    fwrite($file, "\t\t \$this->before_insert(\$params, \$error, \$encoding); \r\n");
    fwrite($file, "\t\t \$save = \$this->insert(\$encoding); \r\n");
    fwrite($file, "\t\t \$this->after_insert(\$params, \$error, \$encoding); \r\n");
    fwrite($file, "\t\t \$this->after_save(\$params, \$error, \$encoding); \r\n");
    fwrite($file, "\t\t return \$save; \r\n");
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction before_save
    fwrite($file, "\n\t public function before_save(\$params = array(), &\$error = array(), \$encoding = '') { \r\n");
    foreach ($fields as $key => $field) {
        if ($field['Key'] == "UNI") {
            fwrite($file, "\t\t \$" . $variable . " = \$this->check_unique_" . $field['Field'] . "(\$this->" . $field['Field'] . ", \$this->id); \r\n");
            fwrite($file, "\t\t if (\$" . $variable . ") { \r\n");
            fwrite($file, "\t\t\t \$error['unique'] = \"" . $field['Field'] . "\"; \r\n");
            fwrite($file, "\t\t\t \$error['error'] = 'true'; \r\n");
            fwrite($file, "\t\t } \r\n");
        }
        if ($field['Type'] == "date") {
            fwrite($file, "\t\t \$this->" . $field['Field'] . " = to_db(\$this->" . $field['Field'] . "); \r\n");
        }
    }
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction after_save
    fwrite($file, "\n\t public function after_save(\$params = array(), &\$error = array(), \$encoding = '') { \r\n");
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction before_insert
    fwrite($file, "\n\t public function before_insert(\$params = array(), &\$error = array(), \$encoding = '') { \r\n");
    foreach ($fields as $field) {
        if ($field['Field'] == "created_at") {
            fwrite($file, "\t\t \$this->created_at = date('Y-m-d H:i:s'); \r\n");
        } elseif ($field['Field'] == "updated_at") {
            fwrite($file, "\t\t \$this->updated_at = date('Y-m-d H:i:s'); \r\n");
        }
        if ($field['Field'] == "password") {
            fwrite($file, "\t\t \$this->" . $field['Field'] . " = md5(\$this->" . $field['Field'] . "); \r\n");
        }
    }
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction after_insert
    fwrite($file, "\n\t public function after_insert(\$params = array(), &\$error = array(), \$encoding = '') { \r\n");
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction before_update
    fwrite($file, "\n\t public function before_update(\$params = array(), &\$error = array(), \$encoding = '') { \r\n");
    fwrite($file, "\t\t \$" . $variable . " = new " . $file_name . "(); \r\n");
    fwrite($file, "\t\t \$" . $variable . " = \$" . $variable . "->find(\$this->id); \r\n");
    foreach ($fields as $field) {
        if ($field['Field'] == "password") {
            fwrite($file, "\t\t if(\$" . $variable . "->password != \$this->password) { \r\n");
            fwrite($file, "\t\t\t \$this->password = md5(\$this->password); \r\n");
            fwrite($file, "\t\t } \r\n");
        }
        if ($field['Field'] == "updated_at") {
            fwrite($file, "\t\t \$this->updated_at = date('Y-m-d H:i:s'); \r\n");
        }
    }
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction after_update
    fwrite($file, "\n\t public function after_update(\$params = array(), &\$error = array(), \$encoding = '') { \r\n");
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction insert
    fwrite($file, "\n\t public function insert(\$encoding = '') { \r\n");
    fwrite($file, "\t\t \$database = new Database(); \r\n");
    fwrite($file, "\t\t \$mysqli = \$database->get_connection(); \r\n");
    fwrite($file, "\t\t \$request =  \"INSERT INTO \".self::TBL.\" VALUES (");
    foreach ($fields as $key => $field) {
        if ($key == 0) {
            fwrite($file, " ?");
        } else {
            fwrite($file, ", ? ");
        }
    }
    fwrite($file, ");\"; \r\n");
    fwrite($file, "\t\t \$stmt = \$mysqli->prepare(\$request); \r\n");
    fwrite($file, "\t\t \$stmt->bind_param(\$this->get_fields_type()");
    foreach ($fields as $field) {
        fwrite($file, ", trim(\$this->get_" . $field['Field']."(\$encoding))");
    }
    fwrite($file, "); \r\n");
    fwrite($file, "\t\t \$stmt->execute(); \r\n");
    fwrite($file, "\t\t return \$mysqli->insert_id; \r\n");
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction update
    fwrite($file, "\n\t public function update(\$encoding = '') { \r\n");
    fwrite($file, "\t\t \$database = new Database(); \r\n");
    fwrite($file, "\t\t \$mysqli = \$database->get_connection(); \r\n");
    fwrite($file, "\t\t \$request =  \"UPDATE \".self::TBL.\" SET ");
    $nb_field = 0;
    $update_params = array();
    if (count($primary_keys) > 1) {
        foreach ($fields as $field) {
            $find_field = false;
            foreach ($primary_keys as $primary_key) {
                if ($field['Field'] == $primary_key['field']) {
                    $find_field = true;
                }
            }
            if ($find_field == false) {
                if ($nb_field == 0) {
                    fwrite($file, $field['Field'] . " = ? ");
                } else {
                    fwrite($file, ", " . $field['Field'] . " = ? ");
                }
                $nb_field++;
                $update_params[] = $field['Field'];
            }
        }
        fwrite($file, " WHERE ");
        foreach ($primary_keys as $key => $primary_key) {
            if ($key == 0) {
                fwrite($file, $primary_key['field'] . " = ? ");
            } else {
                fwrite($file, " AND " . $primary_key['field'] . "  = ? ");
            }
            $update_params[] = $primary_key['field'];
        }
    } else {
        foreach ($fields as $field) {
            if ($field['Field'] != $primary_keys[0]['field']) {
                if ($nb_field == 0) {
                    fwrite($file, $field['Field'] . " = ? ");
                } else {
                    fwrite($file, ", " . $field['Field'] . " = ? ");
                }
                $nb_field++;
                $update_params[] = $field['Field'];
            }
        }
        $update_params[] = $primary_keys[0]['field'];
        fwrite($file, " WHERE " . $primary_keys[0]['field'] . " = ? ");
    }
    fwrite($file, "\"; \r\n");
    
    fwrite($file, "\t\t \$fields_type = \"\"; \r\n");
    foreach ($update_params as $update_param) {
        fwrite($file, "\t\t \$fields_type .= \$this->get_field_type_" . $update_param . "(); \r\n");
    }
    fwrite($file, "\t\t \$stmt = \$mysqli->prepare(\$request); \r\n");
    fwrite($file, "\t\t \$stmt->bind_param(\$fields_type");
    foreach ($update_params as $update_param) {
        fwrite($file, ", trim(\$this->get_" . $update_param."(\$encoding))");
    }
    fwrite($file, "); \r\n");
    fwrite($file, "\t\t \$stmt->execute(); \r\n");
    fwrite($file, "\t\t if (\$mysqli->affected_rows > 0) { \r\n");
    fwrite($file, "\t\t\t return true; \r\n");
    fwrite($file, "\t\t } else { \r\n");
    fwrite($file, "\t\t\t return false; \r\n");
    fwrite($file, "\t\t } \r\n");
    fwrite($file, "\t } \r\n");

    // Déclaration de la fonction delete
    fwrite($file, "\n\t public function delete() { \r\n");
    fwrite($file, "\t\t \$database = new Database(); \r\n");
    fwrite($file, "\t\t \$mysqli = \$database->get_connection(); \r\n");
    fwrite($file, "\t\t \$request = \"DELETE FROM \".self::TBL.\" WHERE ");
    $nb_field = 0;
    $delete_params = array();
    if (count($primary_keys) > 1) {
        foreach ($primary_keys as $key => $primary_key) {
            if ($key == 0) {
                fwrite($file, $primary_key['field'] . " = ? ");
            } else {
                fwrite($file, " AND " . $primary_key['field'] . "  = ? ");
            }
            $delete_params[] = $primary_key['field'];
        }
    } else {
        $delete_params[] = $primary_keys[0]['field'];
        fwrite($file, $primary_keys[0]['field'] . " = ? ");
    }
    fwrite($file, "\"; \r\n");
    fwrite($file, "\t\t \$fields_type = \"\"; \r\n");
    if (count($primary_keys) > 1){
        foreach ($primary_keys as $key => $primary_key) {
            fwrite($file, "\t\t \$fields_type .= \$this->get_field_type_" . $primary_key['field'] . "(); \r\n");
        }
    } else {
        fwrite($file, "\t\t \$fields_type .= \$this->get_field_type_id(); \r\n");
    }
    fwrite($file, "\t\t \$stmt = \$mysqli->prepare(\$request); \r\n");
    fwrite($file, "\t\t \$stmt->bind_param(\$fields_type");
    foreach ($delete_params as $delete_param) {
        fwrite($file, ", \$this->" . $delete_param);
    }
    fwrite($file, "); \r\n");
    fwrite($file, "\t\t \$stmt->execute(); \r\n");
    fwrite($file, "\t\t return \$mysqli->affected_rows; \r\n");
    fwrite($file, "\t } \r\n");

    // Création de requete de recherche pour les champs uniques
    foreach ($fields as $field) {
        if ($field["Key"] == "UNI") {
            fwrite($file, "\n\t public function check_unique_" . $field["Field"] . "(\$" . $field["Field"] . ", \$id) { \r\n");
            fwrite($file, "\t\t \$database = new Database(); \r\n");
            fwrite($file, "\t\t \$mysqli = \$database->get_connection(); \r\n");
            fwrite($file, "\t\t \$request =  \"SELECT * FROM  \".self::TBL.\" WHERE " . $field["Field"] . " = ? AND id != ? \"; \r\n");
            fwrite($file, "\t\t \$stmt = \$mysqli->prepare(\$request); \r\n");
            fwrite($file, "\t\t \$field_type = \$this->get_field_type_" . $field["Field"] . "().\$this->get_field_type_id(); \r\n");
            fwrite($file, "\t\t \$stmt->bind_param(\$field_type, \$" . $field["Field"] . ", \$id); \r\n");
            fwrite($file, "\t\t \$stmt->execute(); \r\n");
            fwrite($file, "\t\t \$stmt->store_result(); \r\n");
            fwrite($file, "\t\t if (\$stmt->num_rows == 1) { \r\n");
            fwrite($file, "\t\t\t return true; \r\n");
            fwrite($file, "\t\t } else { \r\n");
            fwrite($file, "\t\t\t return false; \r\n");
            fwrite($file, "\t\t } \r\n");
            fwrite($file, "\t } \r\n");
        }
    }

    // Fonction du système de login
    if ($table == "users") {

        // Déclaration de la fonction de recherche par email et password
        fwrite($file, "\n\t public function find_by_email_and_password(\$email, \$password, \$order_by = '') { \r\n");
        fwrite($file, "\t\t \$database = new Database(); \r\n");
        fwrite($file, "\t\t \$mysqli = \$database->get_connection(); \r\n");
        fwrite($file, "\t\t \$request =  \"SELECT * FROM  \".self::TBL.\" WHERE email = ? AND password = ? \"; \r\n");
        fwrite($file, "\t\t if (\$order_by != '') { \r\n");
        fwrite($file, "\t\t\t \$request .=  \" ORDER BY \$order_by ;\"; \r\n");
        fwrite($file, "\t\t } else { \r\n");
        fwrite($file, "\t\t\t \$request .=  \";\"; \r\n");
        fwrite($file, "\t\t } \r\n");
        fwrite($file, "\t\t \$stmt = \$mysqli->prepare(\$request); \r\n");
        fwrite($file, "\t\t \$stmt->bind_param(\$this->get_field_type_email().\$this->get_field_type_password(), \$email, \$password); \r\n");
        fwrite($file, "\t\t \$stmt->execute(); \r\n");
        fwrite($file, "\t\t \$row = array(); \r\n");
        fwrite($file, "\t\t \$database->fetch_assoc(\$stmt, \$row); \r\n");
        fwrite($file, "\t\t \$stmt->fetch(); \r\n");
        fwrite($file, "\t\t return new " . $file_name . "(\$row); \r\n");
        fwrite($file, "\t } \r\n");

        // Génération d'un mot de passe automatique
        fwrite($file, "\n\t  public function random_password(\$length) { \r\n");
        fwrite($file, "\t\t  \$randstr = '';  \r\n");
        fwrite($file, "\t\t  for (\$i = 0; \$i < \$length; \$i++) {  \r\n");
        fwrite($file, "\t\t\t  \$randnum = mt_rand(0, 61); \r\n");
        fwrite($file, "\t\t\t  if (\$randnum < 10) { \r\n");
        fwrite($file, "\t\t\t\t  \$randstr .= chr(\$randnum + 48); \r\n");
        fwrite($file, "\t\t\t } else if (\$randnum < 36) { \r\n");
        fwrite($file, "\t\t\t\t  \$randstr .= chr(\$randnum + 55); \r\n");
        fwrite($file, "\t\t\t } else { \r\n");
        fwrite($file, "\t\t\t\t  \$randstr .= chr(\$randnum + 61); \r\n");
        fwrite($file, "\t\t\t } \r\n");
        fwrite($file, "\t\t } \r\n");
        fwrite($file, "\t\t return \$randstr; \r\n");
        fwrite($file, "\t } \r\n");

        // Envoi du nouveau mot de passe
        fwrite($file, "\n\t  public function send_new_password(\$new_password) { \r\n");
        fwrite($file, "\t\t  \$subject = I18n(\"subject_new_password\"); \r\n");
        fwrite($file, "\t\t  \$body = I18n(\"content_new_password\"); \r\n");
        fwrite($file, "\t\t  \$body = str_replace(\"[username]\", \$this->last_name . \" \" . \$this->first_name, \$body); \r\n");
        fwrite($file, "\t\t  \$body = str_replace(\"[user]\", \$this->email, \$body); \r\n");
        fwrite($file, "\t\t  \$body = str_replace(\"[password]\", \$this->password, \$body); \r\n");
        fwrite($file, "\t\t  \$body = str_replace(\"[URL]\", URL, \$body); \r\n");
        fwrite($file, "\t\t  return mail(\$this->email, \$subject, \$body, \"From: \" . EMAILADMIN); \r\n");
        fwrite($file, "\t } \r\n");
    }

    // Fin du fichier
    fwrite($file, "} \r\n?>");
    fclose($file);
}

?>
