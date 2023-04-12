<?php
class ReturnOrder {
    private $regUserFlag;
    private $id;
    private $price;
    private $credit;
    private $booksReturned = array();

    // Constructor

    public function __construct(&$regUserFlag, &$id, &$price, &$credit, &$booksReturned) {
        $this->regUserFlag = $regUserFlag;
        $this->id = $id;
        $this->price = $price;
        $this->credit = $credit;
        $this->booksReturned = $booksReturned;
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

    public function getCredit() {
        return $this->credit;
    }

    public function setCredit(&$credit) {
        $this->credit = $credit;
    }

    public function getBooksReturned() {
        return $this->booksReturned;
    }

    public function setBooksReturned(&$booksReturned) {
        $this->booksReturned = $booksReturned;
    }

    public function addBook(&$book){
        array_push($this->booksReturned, $book);
    }
}

?>
