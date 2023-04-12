<?php

require_once("Controller.php");

class OrderController extends Controller {
    public function getAllPurchaseOrders(){
        $pOrders = array();
        $results = self::find_this_query("SELECT * FROM PurchaseOrder");
        foreach($results as $pOrder){
            array_push($pOrders, new PurchaseOrder($pOrder["RegUserFlag"], $pOrder["ID"], 
                $pOrder["Price"], $pOrder["Address"], $pOrder["NumberOfBooks"]));
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
    public function addPurchaseOrder($id, $uid, $p, $a, $flag, $num){
        self::insert("INSERT INTO PurchaseOrder VALUES ('$id','$uid','$p','$a','$flag','$num')");
    }
    public function addReturnOrder($id, $uid, $p, $flag, $cv, $cid, $num){
        self::insert("INSERT INTO ReturnOrder VALUES ('$id','$uid','$p','$flag','$cv','$cid','$num')");
    }
}