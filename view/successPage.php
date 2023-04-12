<!--Page to confirm a order has been placed, and resets the session.-->
<?php
include_once dirname(__DIR__). "/loader.php";
//TODO: Connect Controllers
$purchaseOrderCreation = PurchaseController::purchaseOrderCreation(/*TODO: Create Order*/);

//TODO: Unset current variables
//    unset($_SESSION[""]);
//    unset($_SESSION[""]);
//    unset($_SESSION[""]);
//    unset($_SESSION[""]);

    ?>
<style><?php include "style.css"; ?> </style>

    <html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Center Align Buttons in Bootstrap</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <nav class="navbar">
            <a class="active"
               href="index.php">Calgary Local Books</a>
            <a href="bookSearchPage.php">Search Books</a>
            <a href="salePage.php">On Sale</a>
            <a href="featurePage.php">New Releases</a>
            <a href="orderPage.php">Cart</a>
        </nav>

    </head>
    <style>
        body {
            text-align: center;
            padding: 40px 0;
            background: #EBF0F5;
        }
        h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }
        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size:20px;
            margin: 0;
        }
        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left:-15px;
        }
        .card {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
        }
    </style>
    <body>
    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <h3>We received your payment;</h3>
        <br/>
        <h5>Order ID: <?=$order->getUniqueId()?></h5>
        <br/>
        <h5>Please keep the Order ID for returns and cancellation!</h5>
        <br/>
    </div>
    </body>
    </html>

