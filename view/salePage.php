<!--Similar to bookSearchPage, but only shows books that are new-->
<?php
include_once dirname(__DIR__). "/loader.php";

$bookController = new BookController();
unset($_SESSION["selectedBook"]);

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
                <h1>On Sale Books</h1>
            </div>
        </div>
        <?php
        $books = $bookController->getSaleBooks();
        ?>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Author</th>
                <th class="th-sm">ISBN</th>
                <th class="th-sm">Price</th>
                <th class="th-sm">Release Date</th>
            </tr>
            </thead>

            <tbody>

            <?php
            foreach ($books as $book):
                ?>
                <tr>
                    <td>
                        <a href="bookPage.php?book=<?= $book->getTitle();?>" methods="get">
                            <?= $book->getTitle(); ?>
                        </a>
                    </td>
                    <td><?= ($book->getAuthor()); ?></td>
                    <td><?= $book->getISBN(); ?></td>
                    <td>$<?= number_format($book->getPrice(),2,'.','');?></td>
                    <td><?= date('m/d/Y', $book->getReleaseDate()); ?></td>
                </tr>
            <?php
            endforeach;
            ?>

            </tbody>
        </table>
    </div>
</div>
