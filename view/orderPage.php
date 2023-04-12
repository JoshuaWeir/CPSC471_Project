<!--Cart page that shows the books in the current session, or in the cart.-->
<?php
include_once dirname(__DIR__). "/loader.php";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <nav class="navbar">
        <a class="active"
           href="index.php">Calgary Local Books</a>
        <a href="bookSearchPage.php">Search Books</a>
        <a href="salePage.php">On Sale</a>
        <a href="featurePage.php">New Releases</a>
        <a href="orderPage.php">Cart</a>
    </nav>

    <style>
        /* Style to center grid column */
        .col-centered{
            float: none;
            margin: 0 auto;
        }

        /* Some custom styles to beautify this example */
        .row{
            background: #dbdfe5;
        }
        .demo-content{
            padding: 25px;
            font-size: 18px;
            background: #abb1b8;
        }
    </style>
</head>
<body>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <img src="https://cdn-icons-png.flaticon.com/512/5465/5465858.png"
                         class="card-img-top" alt="Apple Computer" />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title"></h5>
                        </div>

                        <h5>Book details: </h5>
                        <ul class="list-group">
                            <li class="list-group-item">Book: <b><?= stripslashes($_SESSION["currentBook"])?></b></li>
                            <li class="list-group-item">Price: $<b><?= round($_SESSION["Price"], 2)?></b></li>
                        </ul>
                        <br>

<!--                        <form method="post" action="orderPage.php">-->
<!--                            <div>-->
<!--                                <input type="text" name="creditID" class="form-control" id="inputPassword2" placeholder="Credit ID">-->
<!--                            </div>-->
<!--                            <br>-->
<!--                            <button type="submit" class="btn btn-primary mb-2">Apply Credit</button>-->
<!--                        </form>-->

                        <?php
                        if (isset($message)) {
                            echo "<div class='alert alert-warning' role='alert'>
                                     $message
                                </div>";
                        }
                        ?>
                        <br>
                        <a type="submit" class="nav-link active btn btn-success" href="paymentPage.php"> <i class="fas fa-credit-card mr-2"></i> Payment </a>
                        <br>

                        <br>

                        <form method="post" action="bookSearchPage.php">
                            <input type="text" name="cancel" hidden>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>

                        <?php
                        if (isset($message)){
                            echo "<div class='alert alert-warning' role='alert'>
                                                      $message 
                                                   </div>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

