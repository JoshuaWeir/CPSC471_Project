<?php

require_once("Controller.php");
include_once dirname(__DIR__). "/loader.php";


class UserController extends Controller {

    //private $orders;

    function userLogin($username, $password){
        $result = self::find_this_query("SELECT * FROM RegisteredUser WHERE Username LIKE '%$username%' AND Password LIKE '%$password%'");

    
        if(empty($result)) {
            echo 'Log in failed. Username or password is incorrect';
            return null;
        }
        else {
            $returnorders = NULL;
            $purchaseorders = NULL;
            $user = new RegisteredUser($result[0]["ID"], $result[0]["Name"], $result[0]["Address"], $result[0]["Username"], $result[0]["Password"], $result[0]["Email"], $result[0]["BirthDate"],
                $result[0]["Points"], $result[0]["CardNum"], $returnorders[0], $purchaseorders[0]);
            $_SESSION["loginu"] = true;
            unset($_SESSION["logina"]);
            $_SESSION["userId"] = $user->getID();
            return $user;
        }
    }

    function adminLogin($username, $password){
        $result = self::find_this_query("SELECT * FROM Admin WHERE Username LIKE '%$username%' AND Password LIKE '%$password%'");
        if(empty($result)){
            echo 'Log in failed. Username or password is incorrect.';
            return null;
        }
        else {
            $user = new Admin($result["ID"], $result["Name"], $result["Address"], $result["Username"], $result["Password"], $result["Email"], $result["BirthDate"]);
            $_SESSION["logina"] = true;
            unset($_SESSION["loginu"]);
            $_SESSION["userId"] = $user->getID();
            return $user;
        }
    }

   function register($n, $a, $e, $bd, $un, $pw, $pm){
        $result = self::find_this_query("SELECT * FROM RegisteredUser WHERE Username LIKE '%$un'");
        if(!empty($result)){
            echo 'Registration failed. Username already taken.';
            return null;
        }
        else{
            $uniqueId = rand(100000, 999999);
            self::insert("INSERT INTO RegisteredUser VALUES ('$uniqueId', '$un', '$e', '$pw', '$n', '$a', '$bd', 0, '$pm', NULL, NULL, 1)");
            return true;
        }
    }

    public function getUser($id) {
        $returnorders = NULL;
        $purchaseorders = NULL;
        $result = self::find_this_query("SELECT * FROM RegisteredUser WHERE ID LIKE '%$id%'");
        return new RegisteredUser($result[0]["ID"], $result[0]["Name"], $result[0]["Address"], $result[0]["Username"], $result[0]["Password"], $result[0]["Email"], $result[0]["BirthDate"],
            $result[0]["Points"], $result[0]["CardNum"], $returnorders, $purchaseorders);
    }

    public function getAdmin($id) {
        $result = self::find_this_query("SELECT * FROM Admin WHERE ID LIKE '%$id'");
        return new Admin($result[0]["ID"], $result[0]["Name"],$result[0]["Address"],$result[0]["Username"],
        $result[0]["Password"],$result[0]["Email"],$result[0]["BirthDate"]);
    }

    public static function logOut() {
        unset($_SESSION["logina"]);
        unset($_SESSION["loginu"]);
        unset($_SESSION["userId"]);
        redirect("index.php");
    }
}
        
