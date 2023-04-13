<!--A homepage/landing page, also includes a login/signup button, and a cancellation button.-->
<?php
    include_once dirname(__DIR__). "/loader.php";
?>
<style><?php include "style.css"; ?> </style>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <nav class="navbar">
        <a class="active"
           href="index.php">Calgary Local Books</a>
        <a href="bookSearchPage.php">Search Books</a>
        <a href="salePage.php">On Sale</a>
        <a href="featurePage.php">New Releases</a>
        <a href="orderPage.php">Cart</a>
    </nav>
    <div class="main">
        <body>
            <h1 align="center">Welcome to Calgary Local Books</h1>
            <h2 align="center">Our Mission</h2>
            <font size="+2">
                Over recent years, online shopping has seen a huge increase in popularity. Consequently,
                local businesses are losing profit because they do not have an e-store to sell their products.
                We think that local businesses are an important part of the local economy and community,
                which is why we have endeavoured to solve this problem by developing an e-store for a bookstore selling
                print books. While people still want to help and support their local businesses, they often prefer the
                convenience that comes with shopping online. We want to create a website that can help local bookstores
                keep up with these big corporations and maintain the communities that have been created over the years
                at these stores. <br>
            </font>
            <div align="center">
                <a href="loginPage.php">
                    <button class="btn btn-outline-success">Login-SignUp</button>
                </a>
                <a href="cancelPage.php">
                    <button class="btn btn-outline-secondary">Cancel an Order</button>
                </a>
            </div>
        </body>
    </div>
    <title></title>

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html><?php
