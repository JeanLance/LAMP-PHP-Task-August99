<?php
    class DB {
        public $conn;
        public $DB_HOST = 'localhost';
        public $DB_USER = 'root';
        public $DB_PASS = 'JA0202';
        public $DB_NAME = 'mydb';

        public function __construct() {
            $this->conn = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

            if (mysqli_connect_errno()) {
                die("Failed to connect to MySQL: (". mysqli_connect_errno() . ")". mysqli_connect_errno());
            }
        }

        public function fetch_all($query) {
            $result = mysqli_query($this->conn, $query);
            $rows = array();
    
            foreach($result as $row) {
                $rows[] = $row;
            }
            
            return $rows;
        }
    
        public function run_mysqli_query($query) {
            $result = mysqli_query($this->conn, $query);
            if (preg_match("/insert/i", $query)) {
                // Returns id of inserted row
                return mysqli_insert_id($this->conn);
            }
            // Returns boolean (true/false) if query is update or delete
            return $result;
        }

        public function escape_string($data) {
            return mysqli_real_escape_string($this->conn, $data);
        }
    }
?>