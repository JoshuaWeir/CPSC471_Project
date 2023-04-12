<!--Page to find a return order number-->
<?php
include_once dirname(__DIR__). "/loader.php";

if (isset($_POST["submit"])) {
    if((new OrderController())->addReturnOrder($_POST['orderID'], $_SESSION["userId"])){
        redirect("confirmationPage.php");
    } else {
        $message = "Something went wrong! Please try again.";
    }
}
?>

<style><?php include "style.css"; ?> </style>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar">
    <a class="active"
       href="index.php">Calgary Local Books</a>
    <a href="bookSearchPage.php">Search Books</a>
    <a href="salePage.php">On Sale</a>
    <a href="featurePage.php">New Releases</a>
    <a href="orderPage.php">Cart</a>
</nav>

<div class="container" style="margin-top: 8%;">
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <div id="logo" class="text-center">
                <h1>Please Enter your Order ID:</h1><p></p>
            </div>
            <form role="form" id="form-buscar" method="get" action="">
                <div class="form-group">
                    <div class="input-group">
                        <input id="1" class="form-control" type="number" name="orderID" placeholder="Order ID..."/>
                        <span class="input-group-btn">
</span>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
            <button type="submit" name="submit" class="btn btn-success btn-lg">Return Order</button>
        </div>
    </div>
</div>

