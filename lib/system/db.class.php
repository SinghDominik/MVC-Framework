<?php
    class db{
        public $mysql = null;

        public function __construct(){
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $this->mysql = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=" . DB_CHARSET . ";", DB_USER, DB_PASSWORD);
            $this->mysql->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        
        public function query($query, $args = array()){
            $statement = $this->mysql->prepare($query);
            $statement->execute($args);
            
            return $statement;
        }
}