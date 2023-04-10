<?php

class Book{
    private $releaseDate;
    private $inventoryDate;
    private $price;
    private $ISBN;
    private $ID;
    private $title;
    private $publisher;
    private $author;

    //ctor
    public function Book(&$rDate, &$iDate, &$price, &$isbn, &$id, &$title, &$publisher, &$author){
            $this->releaseDate = $rDate;
            $this->inventoryDate = $iDate;
            $this->price = $price;
            $this->ISBN = $isbn;
            $this->ID = $id;
            $this->title = $title;
            $this->publisher = $publisher;
            $this->author = $author;
        }

        //setters and getters
    
        public function getReleaseDate() {
            return $this->releaseDate;
        }
        public function getInventoryDate() {
            return $this->inventoryDate;
        }
        public function getPrice() {
            return $this->price;
        }
        public function getISBN() {
            return $this->ISBN;
        }
        public function getID() {
            return $this->ID;
        }
        public function getTitle() {
            return $this->title;
        }
        public function getPublisher() {
            return $this->publisher;
        }
        public function getAuthor() {
            return $this->author;
        }

        public function setReleaseDate(&$releaseDate) {
            $this->releaseDate = $releaseDate;
        }
        public function setInventoryDate(&$inventoryDate) {
            $this->inventoryDate = $inventoryDate;
        }
        public function setPrice(&$price) {
            $this->price = $price;
        }
        public function setISBN(&$iSBN) {
            $this->ISBN = $iSBN;
        }
        public function setID(&$iD) {
            $this->ID = $iD;
        }
        public function setTitle(&$title) {
            $this->title = $title;
        }
        public function setPublisher(&$publisher) {
            $this->publisher = $publisher;
        }
        public function setAuthor(&$author) {
            $this->author = $author;
        }
}

?>