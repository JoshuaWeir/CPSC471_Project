<?php

class SciFiBook extends Book{
    private $theme;

    //ctor
    public function SciFiBook(&$rDate, &$iDate, &$price, &$isbn, &$id, &$title, &$publisher, &$author, &$theme){
        parent::Book($rDate, $iDate, $price, $isbn, $id, $title, $publisher, $author);
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