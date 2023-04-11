<!--A landing page for the user once logged in.-->
<?php
    include_once('loader.php');
    //TODO: If logged in create fetch user to display name - Placeholder methods
//    if ($_SESSION["login"]):
//        $dc = new DashboardController();
//        $dc->userLoad();
//        $user = getUser();

    if (isset($_GET["action"]) && $_GET["action"] == "logout") {
        AuthenticationController::logOut();
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
            <h1 class="display-6">Welcome to Calgary Local Books</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="tab-content">
                        <div id="userinfo" class="tab-pane fade show active pt-3">
                            <ul class="list-group">
                                <li class="list-group-item">Welcome <b><?= $user->getName()?></b>!</li>
                                <li class="list-group-item">Linked Email: <b><?= $user->getEmail()?></b></li>
                                <li class="list-group-item">Linked Address: <b><?= $user->getAddress()?></b></li>
                                <li class="list-group-item">Linked Birthdate: <b><?= $user->getBirthdate()?></b></li>
                            </ul>
                        </div> <!-- End -->
                        <!-- End -->
                    </div>
                </div>
                <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">

                    <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                        <li class="nav-item"> <a type="submit" class="nav-link active btn btn-danger" href="welcomePage.php?action=logout"> <i class="fas fa-credit-card mr-2"></i> Log Out </a> </li>
                    </ul>

            </div>
</body>
</html>