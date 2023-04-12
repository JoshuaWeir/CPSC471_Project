<?php

class HistoryBook extends Book{
    private $era;

    //ctor
    public function __construct(&$rDate, &$iDate, &$price, &$isbn, &$id, &$title, &$publisher, &$author, &$era){
        parent::__construct($rDate, $iDate, $price, $isbn, $id, $title, $publisher, $author);
        $this->era = $era;
    }

    //getter and setter for era

    public function getEra() {
        return $this->era;
    }
    public function setEra(&$era) {
        $this->era = $era;
    }
}

?>
