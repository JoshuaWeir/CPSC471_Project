<?php

class RegisteredUser extends User{
    private $points = 0;
    private $paymentMethod;
    private $purchaseOrders = array();
    private $returnOrders = array();

    //ctor
    public function __construct(&$id, &$n, &$a, &$un, &$pw, &$e, &$bd, &$p, &$pm,
                                &$po, &$ro){
        parent::__construct($id, $n, $a, $un, $pw, $e, $bd);
        $this->points = $p;
        $this->paymentMethod = $pm;
        $this->purchaseOrders = $po;
        $this->returnOrders = $ro;
    }

    //getters
    public function getPoints(){ return $this->points; }
    public function getPaymentMethods(){ return $this->paymentMethod; }
    public function getPurchaseOrders(){ return $this->purchaseOrders; }
    public function getReturnOrders(){ return $this->returnOrders; }
    //add methods to find orders based on id?

    //setters
    public function setPoints(&$p){ $this->points = $p; }
    public function setPaymentMethods(&$pm){ $this->paymentMethod = $pm; }
    public function setPurchaseOrders(&$po){ $this->purchaseOrders = $po; }
    public function setReturnOrders(&$ro){ $this->returnOrders = $ro; }

    public function addPoints(&$p){
        $this->points += $p;
    }

    public function removePoints(&$p){
        $this->points -= $p;
    }

    public function addPurchase(&$p){
        array_push($this->purchaseOrders, $p);
    }

    public function addReturn(&$r){
        array_push($this->returnOrders, $r);
    }
}

?>
