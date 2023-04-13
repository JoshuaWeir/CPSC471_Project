<!--Page to find a return order number-->
<?php
include_once dirname(__DIR__). "/loader.php";

if (isset($_POST["submit"])) {
    $orderId = intval($_POST["orderId"]);
    if((new OrderController)->addReturnOrder($orderId, $_SESSION["userId"])){
        redirect("confirmationPage.php");
    } else {
        $message = "Something went wrong! Please try again.";
    }
}
?>

<style><?php include "style.css"; ?> </style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Center Align Buttons in Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <nav class="navbar">
        <a class="active"
           href="index.php">Calgary Local Books</a>
        <a href="bookSearchPage.php">Search Books</a>
        <a href="salePage.php">On Sale</a>
        <a href="featurePage.php">New Releases</a>
        <a href="orderPage.php">Cart</a>
    </nav>

    <style>
        body{background: #f5f5f5}.rounded{border-radius: 1rem}.nav-pills .nav-link{color: #555}.nav-pills .nav-link.active{color: white}input[type="radio"]{margin-right: 5px}.bold{font-weight:bold}
    </style>

    <script>
    </script>
</head>
<body>

<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">Order Cancellation</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">


                            <form role="form" method="post">
                                <div class="form-group"> <label for="username">
                                        <h6>Order ID</h6>
                                    </label> <input type="number" name="orderId" placeholder="Purchase Order ID" required class="form-control "> </div>
                                <div class="form-group"> <label for="orderId">
                                </div>
                                <div class="card-footer"> <button type="submit" name="submit" class="subscribe btn btn-primary btn-block shadow-sm" > Confirm Payment </button>
                            </form>
                        </div>
                    </div> <!-- End -->
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>

