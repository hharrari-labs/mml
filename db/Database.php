<?php 

class Database {
    
    private $connection;

// Local
    public $db_server = 'localhost';
    public $db_pass = 'root';
    public $db_user = 'root';
    public $db_name = 'dev_mml';

// Dev
//    public $db_server = 'localhost';
//    public $db_pass = 'Sgdm78100';
//    public $db_user = 'dbo442789853';
//    public $db_name = 'db442789853';
    
    function Database() {
        $this->connection = new mysqli($this->db_server, $this->db_user, $this->db_pass, $this->db_name, '3306', '/tmp/mysql5.sock') or die(mysqli_error());
    }

    public function get_db_server() {
        return $this->db_server;
    }

    public function get_db_user() {
        return $this->db_user;
    }

    public function get_db_pass() {
        return $this->db_pass;
    }

    public function get_db_name() {
        return $this->db_name;
    }

    public function get_connection() {
        return $this->connection;
    }

    function query($request) {
        return mysqli_query($this->connection, $request);
    }

    function num_rows($query) {
        return mysqli_num_rows($query);
    }

    function fetch_assoc(&$stmt, &$out) {
        $data = mysqli_stmt_result_metadata($stmt);
        $fields = array();
        $out = array();
        $fields[0] = $stmt;
        $count = 1;

        while ($field = mysqli_fetch_field($data)) {
            $fields[$count] = &$out[$field->name];
            $count++;
        }
        
        $tmp = array();
        foreach($fields as $key => $value) $tmp[$key] = &$fields[$key];
        call_user_func_array(mysqli_stmt_bind_result, $tmp);
    }
    
    function get_tables(){
        $mysqli = $this->connection;
        $request = "SHOW TABLES FROM ".$this->db_name;
        $stmt = $mysqli->prepare($request);
        $stmt->execute();
        $row = array();
        $this->fetch_assoc($stmt, $row);
        $i = 0;
        while ($stmt->fetch()) {
            foreach ($row as $key => $value) {
                $tables[$i] = $value;
            }
            $i++;
        }
        return $tables;
    }
    
    function get_fields($table){
        $mysqli = $this->connection;
        $request = "SHOW COLUMNS FROM $table ";
        $stmt = $mysqli->prepare($request);
        $stmt->execute();
        $row = array();
        $this->fetch_assoc($stmt, $row);
        $i = 0;
        while ($stmt->fetch()) {
            foreach ($row as $key => $value) {
                $fields[$i][$key] = $value;
            }
            $i++;
        }
        return $fields;
    }
   
}
?>
