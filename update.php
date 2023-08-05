<?php


require('conn.php');



     $id=$_GET['key'];
     $q="UPDATE events SET status = 'accepted' where event_id = '$id'";
     mysqli_query($connect,$q);
     header('location:acceptedevents.php');
     die();

?>