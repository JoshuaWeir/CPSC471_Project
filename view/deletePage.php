<!--Page to register for a new account by providing the needed information.-->
<?php
include_once dirname(__DIR__). "/loader.php";

//TODO: Connect to Controller
if (isset($_POST["submit"])) {
    if((new bookController)->removeBook($_POST['ISBN'])){
    } else {
        $message = "Something went wrong! Please try again.";
    }
}

?>
<style><?php include "style.css"; ?> </style>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <nav class="navbar">
        <a class="active"
           href="index.php">Calgary Local Books</a>
        <a href="bookSearchPage.php">Search Books</a>
        <a href="salePage.php">On Sale</a>
        <a href="featurePage.php">New Releases</a>
        <a href="orderPage.php">Cart</a>
    </nav>

    <section class="vh-100" style="background-color: #eee;">
        <div class="main">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Remove A Book</p>

                                    <form class="mx-1 mx-md-4" method="post" action="deletePage.php">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="ISBN">Enter The ISBN of the Book to Remove</label>
                                                <input type="text" name="ISBN" id="ISBN"
                                                       placeholder="ISBN..." class="form-control" />
                                            </div>
                                        </div>


                                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" name="submit" class="btn btn-success btn-lg">Remove Book</button>
                                            </div>
                                            <li class="nav-item"> <a type="submit" class="nav-link active btn btn-success" href="adminPage.php?"> <i class="fas fa-credit-card mr-2"></i> Return </a> </li>
                                        </ul>


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
            </div>
        </div>
    </section>
</head>

<body>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html><?php
