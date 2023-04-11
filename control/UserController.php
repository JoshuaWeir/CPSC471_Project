<?php

require_once("Controller.php");

class UserController extends Controller {

    function userLogin($username, $password){
        $result = self::find_this_query("SELECT * FROM RegisteredUser WHERE Username LIKE '%$username' AND Password LIKE '%$password'");
    
        if(empty($result)){
            echo 'Log in failed. Username or password is incorrect';
            return null;
        }
        else{
            //add function in OrderController that returns array
            $returnorders = OrderController.getReturnOrderArray($result["ID"]);
            $purchaseorders = OrderController.getPurchaseOrderArray($result["ID"]);
            $user = new RegisteredUser($result["ID"], $result["Name"], $result["Address"], $result["Username"], $result["Password"], $result["Email"], $result["BirthDate"],
                $result["Points"], $result["CardNum"], $returnorders, $purchaseorders);
            return $user;
        }
    }

    function adminLogin($username, $password){
        $result = self::find_this_query("SELECT * FROM Admin WHERE Username LIKE '%$username' AND Password LIKE '%$password'");
        if(empty($result)){
            echo 'Log in failed. Username or password is incorrect';
            return null;
        }
        else {
            $user = new Admin($result["ID"], $result["Name"], $result["Address"], $result["Username"], $result["Password"], $result["Email"], $result["BirthDate"]);
            return $user;
        }
    }
}
        
