<!--Page for users to login using their username and password. Also routes to the welcome page if they log in.-->
<?php
include_once dirname(__DIR__). "/loader.php";
if (isset($_SESSION['loginu']) && $_SESSION['loginu']){
    redirect("adminPage.php");
}

$uc = new UserController();

if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!$uc->adminLogin($username, $password)){
        $message = "your username and/or password is incorrect, please try again.";
    } else {
        $user = $uc->userLogin($username, $password);
        redirect("adminPage.php");
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

<body>
<div class="main">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <form action="" method="post">
                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="adminUsername">Enter the Admin Username:</label>
                            <input type="text" name="username" id="adminUsername"
                                   placeholder="Username..." class="form-control" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="adminPassword">Enter the Admin Password: </label>
                            <input type="password" name="password" id="adminPassword"
                                   placeholder="Password..." class="form-control" />
                        </div>
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-success btn-block mb-4">Sign in</button>

                <?php
                if (isset($message)){
                    echo '<div class="alert alert-danger" role="alert">'
                        . $message .
                        '</div>';
                }
                ?>

            </div>
        </div>
    </div>
</div>
</head>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>