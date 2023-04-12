<?php

require_once ("Controller.php");
include_once dirname(__DIR__). "/loader.php";

class AuthenticationController extends Controller {

    private $user = User;
    public function verifyUser($username, $password)
    {
        if (self::UserLookUp($username, $password)){
            $_SESSION["login"] = true;
            redirect("welcomePage.php");

            return true;
        } else {
            return false;
        }
    }

    public function signUP($name, $address, $email, $birthdate, $username, $password, $paymentNum ){
        if(self::dbCreate()) {
            return true;
        } else {
            return false;
        }
    }

    public function logOut(){
        unset($_SESSION["login"]);
        unset($_SESSION["subscribed"]);
        unset($_SESSION["userId"]);
        redirect("index.php");
    }

    public function UserLookUp($username = "", $password = ""){

        global $database;

        if (!empty($username) && !empty($password)) {
            $username = $database->escape_string($username);
            $password = $database->escape_string($password);

            $result = self::find_this_query("SELECT * FROM RegisteredUser WHERE Username = '%$username%'
                AND Password = '%$password%'");

            if (!empty($result)) {
                $this->user = new User($result["ID"], $result["Name"], $result["Address"], $result["Username"],
                    $result["Password"], $result["Email"], $result["Birthdate"]);
                return true;
            } else {
                echo "No User found!";
                return false;
            }
        }
    }

//Add User
    private static function dbCreate() {
    }

    public function getUser()
    {
        return $this->user;
    }

}