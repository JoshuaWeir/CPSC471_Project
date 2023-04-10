<?php

class Author {
    private $name;
    private $birthDate;
    private $countryOfOrigin;
    private $shortBib;
    private $numOfBooks;

    //ctor
    public function Author(&$name, &$birthDate, &$origin, &$shortBib, &$numOfBooks){ 
        $this->name = $name;
        $this->birthDate = $birthDate;
        $this->countryOfOrigin = $origin;
        $this->shortBib = $shortBib;
        $this->numOfBooks = $numOfBooks;
    }

    //getters and setters

    public function getName() {
        return $this->name;
    }
    public function getBirthDate() {
        return $this->birthDate;
    }  
    public function getCountryOfOrigin() {
        return $this->countryOfOrigin;
    }
    public function getShortBib() {
        return $this->shortBib;
    }
    public function getNumOfBooks() {
        return $this->numOfBooks;
    }

    public function setName(&$name) {
        $this->name = $name;
    }
    public function setBirthDate(&$birthDate) {
        $this->birthDate = $birthDate;
    }
    public function setCountryOfOrigin(&$countryOfOrigin) {
        $this->countryOfOrigin = $countryOfOrigin;
    }
    public function setShortBib(&$shortBib) {
        $this->shortBib = $shortBib;
    }
    public function setNumOfBooks(&$numOfBooks) {
        $this->numOfBooks = $numOfBooks;
    }
}

?>