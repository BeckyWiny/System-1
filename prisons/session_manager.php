<?php
session_start();

// Check if the user is logged in and the current page is the login page
if (isset($_SESSION['username']) && basename($_SERVER['PHP_SELF']) == 'login.php') {
    // Redirect the user to the desired page
    header("Location: view_prisoner.php");
    exit();
}

// Check if the user is not logged in and the current page is not the login or signup page
if (!isset($_SESSION['username']) && (basename($_SERVER['PHP_SELF']) != 'login.php' && basename($_SERVER['PHP_SELF']) != 'user.php')) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

?>
