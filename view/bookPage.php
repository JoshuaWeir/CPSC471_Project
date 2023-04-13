<!--Page to display book info, along with the ability to add it to the cart.-->
<?php
include_once dirname(__DIR__). "/loader.php";
$bc = new BookController();
$_SESSION["currentBook"] = $_GET['book'];
$book = $bc->getBook($_SESSION["currentBook"]);
$_SESSION["Price"] = $book->getPrice();


?>
<style><?php include "style.css"; ?> </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="SeatsTemplate/style.css">
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
        .col-centered{
            float: none;
            margin: 0 auto;
        }
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
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title text-dark"><?= $book->getTitle()?></h5>
                            <p class="text-muted mb-4">Order Book?</p>
                        </div>

                            <h5 class="text-dark">Book: <?= $book->getTitle()?></h5>
                            <form method="post" action="orderPage.php">

                                <button type="submit" class="btn btn-primary" href>Check Out</button>
                            </form>

                            <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                <span>Total</span><span><?= $book->getPrice()?></span>
                            </div>
                        <?php
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<?php
?>
