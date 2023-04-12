<?php

class PurchaseController extends Controller {

    private $book;
    public function searchBooks($search = "") {
        $result = self::find_this_query("SELECT * FROM Book WHERE Title LIKE '%$search%'");

        if (!empty($result)) {
            $this->book = new Book($book["ReleaseDate"], $book["InventoryDate"], $book["Price"],
                $book["ISBN"], $book["ID"], $book["Title"], $book["PublisherName"], $book["AuthorName"]);
        } else {
            echo "No Books Found";
        }
    }

    public function getBook()
    {
        return $this->book;
    }
}
