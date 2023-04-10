<!--Page to confirm that the users return/cancellation has been finalized-->
<?php
    include_once "loader.php";
    if (isset($_SESSION["login"])) {
        $user = true;
    } else {
        $user = false;
    }

    $cc = new orderCancellingController();
    $cc->searchTicketById($_SESSION["cancellationOrderID"]);
    $order = $cc->getOrder();
    $cc->creditCreation($order->getPrice(), $user);
    $credit = $cc->getCredit();
    $cc->orderDeleting(); /*Also will need to re-add book stock*/
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
    <h3>We cancelled your ticket</h3>
    <br/>
    <h5>Credit ID: <b><?=$credit->getUniqueId()?></b></h5>
    <br/>
    <h5>Credit Amount: $<b><?=round($credit->getAmount(), 2)?></b></h5>
    <br/>

    <h5>Please keep the Credit ID safe to use it in your next purchase!</h5>
    <br/>
<!--    Might not need due to navbar-->
<!--    <form method="get" action="index.php">-->
<!--        <button type="submit" class="btn btn-primary">Return</button>-->
<!--    </form>-->
</div>
</body>
</html>

