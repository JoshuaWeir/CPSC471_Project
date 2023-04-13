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
        switch($genre) {

        }
        foreach($results as $book){
            $books[] = new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]);
        }
        return $books;
    }

    public function getNewBooks(){
        $newBooks = array();
        $results = self::find_this_query("SELECT * FROM Book WHERE ReleaseDate >= NOW() - INTERVAL 3 DAY");

        foreach($results as $book) {
            $newBooks[] = new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]);
        }
        return $newBooks;
    }

    public function getSaleBooks(){
        $saleBooks = array();
        $results = self::find_this_query("SELECT * FROM Book WHERE InventoryDate <= NOW() - INTERVAL 21 DAY");

        foreach($results as $book){
            $newPrice = $book["Price"] - 3;
            $saleBooks[] = new Book($book["ReleaseDate"], $book["InventoryDate"], $newPrice,
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]);
        }
        return $saleBooks;
    }

    public function searchBooks($search = "") {
        if($search = "") {
            $isbn = str_replace('-', '', $search);
            $foundBooks = array();
            if ((strlen($isbn) == 10 || strlen($isbn) == 13) && is_numeric($isbn)) {
                $result = self::find_this_query("SELECT * FROM Book WHERE ISBN LIKE '%$search%'");
            } else {
                $result = self::find_this_query("SELECT * FROM Book WHERE Title LIKE '%$search%' OR AuthorName LIKE '%$search%");
            }

            foreach ($result as $book) {
                $foundBooks[] = new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                    $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]);
            }
        } else {
            $foundBooks = $this->getAllBooks();
        }
        return $foundBooks;
    }

    public function addBook($pn, $an, $ISBN, $rd, $p, $t) {
        $checkp = self::find_this_query("SELECT * FROM Publisher WHERE Name LIKE '%$pn'");
        $checka = self::find_this_query("SELECT * FROM Author WHERE Name LIKE '%$an%'");
        $result = self::find_this_query("SELECT * FROM Book WHERE ISBN LIKE '%$ISBN%'");
        if(empty($result)) {
            $place = "";
            $date = date("Y/m/d");
            if (empty($checkp)) {
                self::insert("INSERT INTO Publisher VALUES ('$pn','$place' ,'$place')");
            }
            if (empty($checka)) {
                self::insert("INSERT INTO Author VALUES ('$an', '$date', '$place', 1)");
            }
            $uniqueId = rand(100000, 999999);
            self::insert("INSERT INTO Book VALUES ('$uniqueId',1, '$pn', '$an', '$ISBN','$rd','$date','$p','$t')");
            return true;
        } else {

            return null;
        }
    }

    public function removeBook($ISBN) {
        $result = self::find_this_query("SELECT * FROM Book WHERE ISBN LIKE '%$ISBN%'");
        if(empty($result)){
            return null;
        }
        else{
            self::delete("DELETE FROM Book WHERE ISBN LIKE '%$ISBN%'");
            return true;
        }
    }

    public function getBook($t) {
        $result = self::find_this_query("SELECT * FROM Book WHERE Title LIKE '%$t%'");
        if (!empty($result)) {
            return new Book($result[0]["ReleaseDate"], $result[0]["InventoryDate"], $result[0]["Price"],
                $result[0]["ISBN"], $result[0]["ID"], $result[0]["Title"], $result[0]["PublisherName"], $result[0]["AuthorName"]);
        } else {
            echo "No book found.";
            return null;
        }
    }


}