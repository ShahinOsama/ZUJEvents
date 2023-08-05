<?php 
session_start();

// Check if the user is logged in
if (!isset($_SESSION["Admin_id"])) {
    header("location: adminlogin.php");
}

 ?>
