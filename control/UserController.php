<?php

require_once("Controller.php");
require("OrderController.php");

class UserController extends Controller {

    private $orders = new OrderController();

    function userLogin($username, $password){
        $result = self::find_this_query("SELECT * FROM RegisteredUser WHERE Username LIKE '%$username' AND Password LIKE '%$password'");

    
        if(empty($result)){
            echo 'Log in failed. Username or password is incorrect';
            return null;
        }
        else{
            
            $returnorders = $this->orders->getReturnOrderByID($result["ID"]);
            $purchaseorders = $this->orders->getPurchaseOrderByID($result["ID"]); 
            $user = new RegisteredUser($result["ID"], $result["Name"], $result["Address"], $result["Username"], $result["Password"], $result["Email"], $result["BirthDate"],
                $result["Points"], $result["CardNum"], $returnorders, $purchaseorders);
            return $user;
        }
    }

    function adminLogin($username, $password){
        $result = self::find_this_query("SELECT * FROM Admin WHERE Username LIKE '%$username' AND Password LIKE '%$password'");
        if(empty($result)){
            echo 'Log in failed. Username or password is incorrect.';
            return null;
        }
        else {
            $user = new Admin($result["ID"], $result["Name"], $result["Address"], $result["Username"], $result["Password"], $result["Email"], $result["BirthDate"]);
            return $user;
        }
    }

    function register($n, $a, $e, $bd, $un, $pw, $pm){
        $result = self::find_this_query("SELECT * FROM RegistedUser WHERE Username LIKE '%$un'");
        if(!empty($result)){
            echo 'Registration failed. Username already taken.';
            return null;
        }
        else{
            self::insert("INSERT INTO RegisteredUser VALUES (NULL, '$un', '$e', '$pw', '$n', '$a', '$bd', NULL, NULL, NULL, NULL, 1)");
        }
    }
}
        
