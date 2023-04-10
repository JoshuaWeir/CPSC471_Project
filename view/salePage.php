<!--Similar to bookSearchPage, but only shows books that are older and on sale-->
<?php
include_once('loader.php');

//TODO: Connect Controller - Currently have it set up so that the bookController can just get a list based on old books
//    $bookController = new bookSearchController();
//    @$bookController->searchMovieByName($_GET["search"]);
//    unset($_SESSION["selectedBook"]);

?>

<style><?php include "style.css"; ?> </style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
                <h1>Search For On Sale Books Here</h1>
            </div>
            <form role="form" id="form-buscar" method="get">
                <div class="form-group">
                    <div class="input-group">
                        <input id="1" class="form-control" type="text" name="search" placeholder="Search..."/>
                        <span class="input-group-btn">
<button class="btn btn-success" type="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</span>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if (!empty($bookController->getFeaturesList())):
            $books = $bookController->getFeaturesList();
            ?>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Author</th>
                    <th class="th-sm">Publisher</th>
                    <th class="th-sm">ISBN</th>
                    <th class="th-sm">Price</th>
                    <th class="th-sm">Release Date</th>
                </tr>

                <tbody>

                <?php
                foreach ($books as $book):
                    if ($book->getAvailable() == 1):
                        ?>
                        <tr>
                            <td>
                                <a href="bookPage.php?book=<?= $book->getName();?>" methods="get">
                                    <?= $book->getName(); ?>
                                </a>
                            </td>
                            <td>$<?= number_format($book->getPrice(),2,'.','');?></td>
                            <td><?= date('m/d/Y', $book->getReleaseDate()); ?></td>
                            <td>Public</td>
                        </tr>
                    <?php
                    elseif ($book->getAvailable() == 0 && isset($_SESSION["subscribed"]) && $_SESSION["subscribed"]):
                        ?>
                        <tr>
                            <td>
                                <a href="bookPage.php?book=<?= $book->getName();?>" methods="get">
                                    <?= $book->getName(); ?>
                                </a>
                            </td>
                            <td>$<?= number_format($book->getPrice(),2,'.','');?></td>
                            <td><?= date('m/d/Y', $book->getReleaseDate()); ?></td>
                            <td>Subscribers</td>
                        </tr>
                    <?php
                    endif;
                endforeach;
                ?>
                </tbody>
                </thead>
            </table>
        <?php
        endif;
        ?>
    </div>
</div>
