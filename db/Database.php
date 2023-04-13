<?php

require_once("config.php");

class Database {

    public $connection;

    function __construct(){
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->connection = new mysqli(SQL_HOST, SQL_UN, SQL_PW, SQL_NAME);

        if($this->connection->connect_error){
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($query){
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    public function insert($sql){
        return $this->connection->query($sql);
        //return mysqli_query($this->connection, $query);
    }

    public function delete($sql) {
        mysqli_query($this->connection,$sql);
    }
}

$database = new Database();
