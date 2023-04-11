<?php

require_once("config.php");

class Database {

    public $connection = new mysqli(SQL_HOST, SQL_UN, SQL_PW, SQL_NAME);

    function __construct(){

        if($this->connection->connect_error){
            die("Database conncetion failed: " . $this->connection->connect_error);
        }
        echo("Connected Successfully");
    }

    public function query($query){
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    public function insert($sql){
        return $this->connection->query($sql);
    }
}

$database = new Database();
