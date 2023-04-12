<?php

require_once("Controller.php");

class BookController extends Controller {

    public function getAllBooks(){
        $books = array();
        $results = self::find_this_query("SELECT * FROM Book");
        foreach($results as $book){
            array_push($books, new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]));
        }
        return $books;
    }

    public function getGenreBooks($genre){
        $table = "{$genre}Book";
        $books = array();
        $results = self::find_this_query("SELECT * FROM {$table}, Book WHERE {$table}.ID = Book.ID");
        switch($genre){

        }
        foreach($results as $book){
            array_push($books, new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]));
        }
        return $books;
    }

    public function getNewBooks(){
        $newBooks = array();
        $today = date("Y-m-d");
        $yesterday = date("Y-m-d",strtotime("-1 days"));
        $twodays = date("Y-m-d",strtotime("-2 days"));
        $results = self::find_this_query("SELECT * FROM Book WHERE ReleaseDate LIKE '%$today%' OR 
            ReleaseDate LIKE '%$yesterday' OR ReleaseDate = '%$twodays'");
        
        foreach($results as $book){
            array_push($newbooks, new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]));
        }
        return $newbooks;
    }

    public function getSaleBooks(){
        $saleBooks = array();
        $threeweeks = date("Y-m-d",strtotime("-21 days"));
        $results = self::find_this_query("SELECT * FROM Book WHERE InventoryDate LIKE '%$threeweeks%'");
        
        foreach($results as $book){
            array_push($salebooks, new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]));
        }
        return $saleBooks;
    }

    public function searchBooks($search){
        $isbn = str_replace('-', '', $search);
        $foundbooks = array();
        if((strlen($isbn) == 10 || strlen($isbn) == 13) && is_numeric($isbn)){
            $result = self::find_this_query("SELECT * FROM Book WHERE ISBN LIKE '%$search%'");
        }
        else{
            $result = self::find_this_query("SELECT * FROM Book WHERE Title LIKE '%$search%' OR AuthorName LIKE '%$search%'");
        }

        foreach($result as $book){
            array_push($foundbooks, new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]));
        }
    }


}
