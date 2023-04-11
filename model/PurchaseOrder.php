<?php
class PurchaseOrder {
    private $regUserFlag;
    private $id;
    private $price;
    private $address;
    private $booksSold;

    // Constructor

    public function ReturnOrder(&$regUserFlag, &$id, &$price, &$address, &$booksSold) {
        $this->regUserFlag = $regUserFlag;
        $this->id = $id;
        $this->price = $price;
        $this->address = $address;
        $this->booksSold = $booksSold;
    }

    // Getters and Setters

    public function getRegUserFlag() {
        return $this->regUserFlag;
    }

    public function setRegUserFlag(&$regUserFlag) {
        $this->regUserFlag = $regUserFlag;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(&$id) {
        $this->id = $id;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice(&$price) {
        $this->price = $price;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress(&$address) {
        $this->address = $address;
    }

    public function getBooksSold() {
        return $this->booksSold;
    }

    public function setBooksSold(&$booksSold) {
        $this->booksSold = $booksSold;
    }

    public function addBook(&$book){
        array_push($this->booksSold, $book);
    }
}

?>
