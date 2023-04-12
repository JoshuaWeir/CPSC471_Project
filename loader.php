<!--Loads all the model/controllers needed-->
<?php
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);
session_start();
 //Commented for Testing
require_once(dirname(__DIR__)."/CPSC471_Project/model/User.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/RegisteredUser.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/Book.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/Admin.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/FantasyBook.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/HistoryBook.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/SciFiBook.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/OtherBook.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/Publisher.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/Author.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/PurchaseOrder.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/ReturnOrder.php");
require_once(dirname(__DIR__)."/CPSC471_Project/model/Credit.php");
require_once(dirname(__DIR__)."/CPSC471_Project/control/BookController.php");
require_once(dirname(__DIR__)."/CPSC471_Project/control/OrderController.php");
require_once(dirname(__DIR__)."/CPSC471_Project/control/PurchaseController.php");
require_once(dirname(__DIR__)."/CPSC471_Project/control/AuthenticationController.php");
require_once(dirname(__DIR__)."/CPSC471_Project/db/Database.php");
require_once(dirname(__DIR__)."/CPSC471_Project/db/config.php");

//TODO: Add 'require_once' Controllers & Databasing
function redirect($location, $get = "") {
    header("location:  {$location}".$get);
}