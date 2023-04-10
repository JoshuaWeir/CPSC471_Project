<!--Loads all the model/controllers needed-->
<?php
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);
session_start();
// Commented for Testing
//require_once("model/User.php");
//require_once("model/RegisteredUser.php");
//require_once("model/Book.php");
//require_once("model/FantasyBook.php");
//require_once("model/HistoryBook.php");
//require_once("model/SciFiBook.php");
//require_once("model/OtherBook.php");
//require_once("model/Publisher.php");
//require_once("model/Author.php");
//require_once("model/PurchaseOrder.php");
//require_once("model/ReturnOrder.php");
//require_once("model/Credit.php");

//TODO: Add 'require_once' Controllers & Databasing
function redirect($location, $get = "") {
    header("location:  {$location}".$get);
}