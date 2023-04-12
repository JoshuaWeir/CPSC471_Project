<?php

class FantasyBook extends Book{
    private $theme;

    //ctor
    public function FantasyBook(&$rDate, &$iDate, &$price, &$isbn, &$id, &$title, &$publisher, &$author, &$theme){
        parent::__construct($rDate, $iDate, $price, $isbn, $id, $title, $publisher, $author);
        $this->theme = $theme;
    }

    //getter and setter for theme

    public function getTheme() {
        return $this->theme;
    }
    public function setTheme($theme) {
        $this->theme = $theme;
    }
}
?>