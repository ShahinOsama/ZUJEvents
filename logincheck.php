<?php 
session_start();

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    header("location: login.php");
}

 ?>
