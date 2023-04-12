<!--This is a separate page for admins to log in.-->
<?php
include_once dirname(__DIR__). "/loader.php";
//TODO: Connect to Controller --PLACEHOLDERS BELOW--
    if (isset($_GET["action"]) && $_GET["action"] == "logout") {
        AuthenticationController::logOut();
    }

    if (isset($_GET["action"]) && $_GET["action"] == "add") {
        AuthenticationController::logOut();
    }

    if (isset($_GET["action"]) && $_GET["action"] == "remove") {
        AuthenticationController::logOut();
    }

    if (isset($_GET["action"]) && $_GET["action"] == "update") {
        AuthenticationController::logOut();
    }
?>
<style><?php include "style.css"; ?> </style>

<!--TODO: Implement Admin Functionalities-->
