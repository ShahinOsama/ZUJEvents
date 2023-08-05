<?php


require('conn.php');



     $id=$_GET['key'];
     $q="UPDATE attendance_info SET user_status = '' where  id = '$id'";
     mysqli_query($connect,$q);
     header('location:userspage.php');
     die();

?>