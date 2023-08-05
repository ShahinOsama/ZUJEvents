<?php


require('conn.php');



     $id=$_GET['key'];
     $q="UPDATE events SET status = 'rejected' where  event_id = '$id'";
     mysqli_query($connect,$q);
     header('location:rejectedevents.php');
     die();

?>