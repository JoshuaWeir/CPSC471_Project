<?php

require_once("Controller.php");
include_once dirname(__DIR__). "/loader.php";

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

        $result = self::find_this_query("SELECT * FROM PurchaseOrder WHERE ID LIKE '%$id%'");
        if (!empty($result)) {
            $order = new PurchaseOrder($pOrder["RegUserFlag"], $pOrder["ID"],
                $pOrder["Price"], $pOrder["Address"], $pOrder["NumberOfBooks"]);
            $_SESSION["purchaseId"] = $order->getId();
            return $order;
        } else {
            echo "No order found.";
            return NULL;
        }
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
            $uid = $id;
        } else {
            $flag = 0;
            $uid = 0;
        }
        $uniqueId = rand(100000, 999999);
        self::insert("INSERT INTO PurchaseOrder VALUES ('$uniqueId', '$uid', '$price', '$address', '$flag')");
        $this->getPurchaseOrderByID($uniqueId);
        return true;
    }
    public function addReturnOrder($pid, $id) {
        $result = self::find_this_query("SELECT * FROM PurchaseOrder WHERE ID = '$pid'");
        if (empty($result)) {
            echo 'Order not found.';
            return null;
        } else {
            $booksSold = 1;
            $porder = new PurchaseOrder($result[0]["RegUserFlag"], $result[0]["ID"], $result[0]["Price"],
            $result[0]["Address"], $booksSold);
            if($id != NULL) {
                $flag = 1;
                $uid = $id;
            } else {
                $flag = 0;
                $uid = 0;
            }
            $price = $porder->getPrice();
            $uniqueId = rand(100000, 999999);
            $creditId = rand(1000,9999);
            self::insert("INSERT INTO ReturnOrder VALUES ('$uniqueId', '$uid', '$price', '$flag', '$price', '$creditId')");
            $this->getPurchaseOrderByID($uniqueId);
            return true;
        }
    }
}