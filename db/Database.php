<?php

require_once("config.php");

class Database {

    public $connection;

    function __construct(){

        $this->connection = new mysqli(SQL_HOST, SQL_UN, SQL_PW, SQL_NAME);

        if($this->$connection->connect_error){
            die("Database conncetion failed: " . $connection->connect_error);
        }
        echo("Connected Successfully");
    }

    public function query($query){
        $result = mysqli_query($this->connection, $query);
    }
}

$database = new Database();
