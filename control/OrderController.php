<?php

require_once("Controller.php");

class OrderController extends Controller {

    function __construct(){}
    public function getAllPurchaseOrders(){
        $pOrders = array();
        $results = self::find_this_query("SELECT * FROM PurchaseOrder");
        foreach($results as $pOrder){
            $pOrders[] = new PurchaseOrder($pOrder["RegUserFlag"], $pOrder["ID"],
                $pOrder["Price"], $pOrder["Address"], $pOrder["NumberOfBooks"]);
        }
        return $pOrders;
    }
    public function getAllReturnOrders(){
        $rOrders = array();
        $results = self::find_this_query("SELECT * FROM ReturnOrder");
        foreach($results as $rOrder){
            array_push($rOrders, new ReturnOrder($rOrder["RegUserFlag"], $rOrder["ID"], 
                $rOrder["Price"], $rOrder["CreditValue"], $rOrder["NumberOfBooks"]));
        }
        return $rOrders;
    }
    public function getPurchaseOrderByID($id){
        $pOrders = array();
        $results = self::find_this_query("SELECT * FROM PurchaseOrder WHERE PurchaseOrder.ID = $id");
        foreach($results as $pOrder){
            array_push($pOrders, new PurchaseOrder($pOrder["RegUserFlag"], $pOrder["ID"], 
                $pOrder["Price"], $pOrder["Address"], $pOrder["NumberOfBooks"]));
        }
        return $pOrders;
    }
    public function getReturnOrderByID($id){
        $rOrders = array();
        $results = self::find_this_query("SELECT * FROM ReturnOrder WHERE ReturnOrder.ID = $id");
        foreach($results as $rOrder){
            array_push($rOrders, new ReturnOrder($rOrder["RegUserFlag"], $rOrder["ID"], 
                $rOrder["Price"], $rOrder["CreditValue"], $rOrder["NumberOfBooks"]));
        }
        return $rOrders;
    }
    public function getPurchaseOrderByUser($UserID){
        $pOrders = array();
        $results = self::find_this_query("SELECT * FROM PurchaseOrder WHERE PurchaseOrder.UserID = $UserID");
        foreach($results as $pOrder){
            array_push($pOrders, new PurchaseOrder($pOrder["RegUserFlag"], $pOrder["ID"], 
                $pOrder["Price"], $pOrder["Address"], $pOrder["NumberOfBooks"]));
        }
        return $pOrders;
    }
    public function getReturnOrderByUser($UserID){
        $rOrders = array();
        $results = self::find_this_query("SELECT * FROM ReturnOrder WHERE ReturnOrder.UserID = $UserID");
        foreach($results as $rOrder){
            array_push($rOrders, new ReturnOrder($rOrder["RegUserFlag"], $rOrder["ID"], 
                $rOrder["Price"], $rOrder["CreditValue"], $rOrder["NumberOfBooks"]));
        }
        return $rOrders;
    }
    public function addPurchaseOrder($id,$price,$address) {
        if($id != NULL) {
            $flag = 1;
        } else {
            $flag = 0;
        }
        $uniqueId = rand(100000, 999999);
        self::insert("INSERT INTO PurchaseOrder VALUES ('$uniqueId', '$id', '$price', '$address', '$flag')");
        return true;

    }
    public function addReturnOrder($pid, $uid) {
        $results = self::find_this_query("SELECT * FROM PurchaseOrder WHERE ID = $pid");
        if (empty($result)) {
            echo 'Order not found';
            return null;
        } else {
            $booksSold = 1;
            $porder = new PurchaseOrder($result[0]["RegUserFlag"], $result[0]["ID"], $result[0]["Price"],
            $result[0]["Address"], $booksSold);
            if ($porder->getId() != NULL) {
                $flag = 1;
            } else {
                $flag = 0;
            }
            $price = $porder->getPrice();
            $uniqueId = rand(100000, 999999);
            $creditId = rand(1000, 9999);
            self::insert("INSERT INTO ReturnOrder VALUES ('$uniqueId', '$uid', '$price', '$flag', '$price', '$creditId')");
            return true;
        }
    }
}