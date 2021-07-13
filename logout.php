<?php

    session_start();
    unset($_SESSION["user_name"]);
    session_destroy();
    header("Location:home.php?message = You have been successfully logged out!");

?>