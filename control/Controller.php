<?php

class Controller {

    public static function find_this_query($sql)
    {
        global $database;

        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set))
        {
            $the_object_array[] = $row;
        }

        return $the_object_array;
    }

public static function insert($sql){
        global $database;

        if($database->insert($sql)) {
            echo "Successful";
        }
        else{
            echo "Database Failure";
        }
    }

    public static function delete($sql) {
        global $database;

        $database->delete($sql);

    }
}