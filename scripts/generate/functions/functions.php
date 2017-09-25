<?php 

function get_name_model($words) {
    $model = '';
    foreach ($words as $key => $word) {
        $word = ucfirst($word);
        if ($key == count($words)-1){
            if (substr($word, "-3") == "ies") { // Mise au singulier du modèle
                $model .= substr($word, '0', strlen($word) - 3) . 'y';
            } elseif (substr($word, "-8") == "Status") { // Mise au singulier du modèle
                $model .= $word;
            } else {
                $model .= substr($word, '0', strlen($word) - 1);
            }
        } else {
            $model .= $word;
        }
    }
    return $model;
}

function get_variable_model($words) {
    $model = '';
    foreach ($words as $key => $word) {
        if ($key == count($words)-1){
            if (substr($word, "-3") == "ies") { // Mise au singulier du modèle
                $model .= substr($word, '0', strlen($word) - 3) . 'y';
//            } elseif (substr($word, "-6") == "status") { // Mise au singulier du modèle
//                $model .= $word.'_';
            } else {
                $model .= substr($word, '0', strlen($word) - 1);
            }
        } else {
            $model .= $word.'_';
        }
    }
    return $model;
}

function get_variable_foreign_model($words) {
    $model = '';
    foreach ($words as $key => $word) {
        if ($key == count($words)-1){
            if (substr($word, "-1") == "y") { // Mise au pluriel du modèle
                $model .= substr($word, '0', strlen($word) - 1) . 'ies';
//            } elseif (substr($word, "-6") == "status") { // Mise au singulier du modèle
//                $model .= $word.'_';
            } else {
                $model .= $word.'s';
            }
        } else {
            $model .= $word.'_';
        }
    }
    return $model;
}

function get_name_foreign_model($words) {
    $model = '';
    foreach ($words as $word) {
        $model .= ucfirst($word);
    }
    return $model;
}

function join_array($array, $separator){
    foreach ($array as $key => $value) {
        if ($key == 0) {
            $return = $value;
        } else {
            $return .= $separator.$value;
        }
    }
    return $return;
}

function get_field_type($type) {
    $type = explode('(', $type);
    $return = '';
    if ($type[0] == 'date') {
        $return = 'text';
    } elseif ($type[0] == 'varchar') {
        $return = 'text';
    } elseif ($type[0] == 'mediumtext') {
        $return = 'textarea';
    } elseif ($type[0] == 'longtext') {
        $return = 'textarea';
    } elseif ($type[0] == 'int') {
        $return = 'text';
    } elseif ($type[0] == 'double') {
        $return = 'text';
    } elseif ($type[0] == 'tinyint') {
        $return = 'checkbox';
    } else {
        $return = 'text';
    }
    return $return;
}

function get_cleaned_type($type) {
    $type = explode('(', $type);
    return $type[0];
}

function get_field_type_for_mysqli($type) {
    $type = explode('(', $type);
    $return = '';
    if ($type[0] == 'date') {
        $return = 's';
    } elseif ($type[0] == 'varchar') {
        $return = 's';
    } elseif ($type[0] == 'mediumtext') {
        $return = 's';
    } elseif ($type[0] == 'int') {
        $return = 'i';
    } elseif ($type[0] == 'double') {
        $return = 'd';
    } elseif ($type[0] == 'float') {
        $return = 'd';
    } elseif ($type[0] == 'tinyint') {
        $return = 'i';
    } else {
        $return = 's';
    }
    return $return;
}
