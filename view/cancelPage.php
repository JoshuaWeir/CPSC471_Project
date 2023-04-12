<!--Page to find a return order number-->
<?php
include_once dirname(__DIR__). "/loader.php";
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
<button class="btn btn-primary" type="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</span>
                    </div>
                </div>
            </form>
        </div>

        <?php

        $cc = new orderCancellingController();
        if (isset($_GET["orderID"])):
                    $_SESSION["cancellationOrderID"] = $_GET["orderID"];
                    $message = "<div class='alert alert-success' role='alert'>
                              <a href='confirmationPage.php'>
                              Order found. Click here to process the cancellation!
                              </a>
                            </div>";
                    echo ($message);
            else:
                ?>
                <div class="alert alert-danger" role="alert">
                    Order was not found! Please try again.
                </div>
            <?php
        endif;
        ?>
    </div>
</div>

