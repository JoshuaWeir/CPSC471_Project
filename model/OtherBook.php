<?php

class OtherBook extends Book{
    private $genre;

    //ctor
    public function OtherBook(&$rDate, &$iDate, &$price, &$isbn, &$id, &$title, &$publisher, &$author, &$genre){
        parent::Book($rDate, $iDate, $price, $isbn, $id, $title, $publisher, $author);
        $this->genre = $genre;
    }

    //getter and setter for genre

    public function getGenre() {
        return $this->genre;
    }
    public function setGenre($genre) {
        $this->genre = $genre;
    }
}

?>