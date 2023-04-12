<?php

require_once("config.php");

class Database {

    public $connection;

    function __construct(){

        $this->connection = new mysqli(SQL_HOST, SQL_UN, SQL_PW, SQL_NAME);

        if($this->connection->connect_error){
            die("Database connection failed: " . connection->connect_error);
        }
    }

    public function query($query){
        return mysqli_query($this->connection, $query);
    }

    public function escape_string($string) {
        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }
}

$database = new Database();
