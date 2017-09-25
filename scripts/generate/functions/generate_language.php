<?php
function generate_language($table, $fields, $path, $file){
   
    //init variable

    $path .= $file.".php";
    $variable = get_variable_model(explode('_', $table));
    
    //creation du fichier
    touch($path);
    if (file_exists($path)) {
        $file = fopen($path, "w+"); // Ouverture du fichier avec le mode ecriture
    }
    
    //debut du fichier
    fwrite($file, "<?php \r\n");
    fwrite($file, "return array( \r\n");
    
    foreach ($fields as $field) {
        
        $split_field = explode('_', $field['Field']);
        // Select de la clé étrangère
        if ($split_field[count($split_field) - 1] == 'id' && $field['Field'] != "id") { 
            array_splice($split_field, count($split_field) - 1);
            $foreign_key = join_array($split_field, '_');
            fwrite($file, "\t \"".$field['Field']."\" => \"".str_replace('_', ' ', $foreign_key)."\", \r\n");
            fwrite($file, "\t \"select_".$field['Field']."\" => \"Select a ".str_replace('_', ' ', $foreign_key)."\", \r\n");
        } else {
            fwrite($file, "\t \"".$field['Field']."\" => \"".str_replace('_', ' ', $field['Field'])."\", \r\n");
        }
    }
    fwrite($file, "\t \"new_".$variable."\" => \"New ".str_replace('_', ' ', $variable)."\", \r\n");
    fwrite($file, "\t \"delete_".$variable."\" => \"Do you want to ||action|| the ".str_replace('_', ' ', $variable)." : ||var||\", \r\n");
    
    //Fin du fichier
    fwrite($file, " ); \r\n");
    fwrite($file, "?>");
    fclose($file); 
}
?>
