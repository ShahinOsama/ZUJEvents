<?php
// *** To Email ***
include 'conn.php';
session_start();

    // Select data from events table
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    // Use the $username variable as needed

    // Session variable not set, handle the situation accordingly
    $sql = "SELECT * FROM `attendance_info` , `events` ";
    $result = mysqli_query($connect, $sql);

    // Display data in events container
    
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {

$to = $row['email'];
//
// *** Subject Email ***
$subject = 'A new event has been released!';
//
// *** Content Email ***
$content = 'A new event has been released cheack it out now!';
//
//*** Head Email ***
$headers = "From: zuj.events@gmail.com\r\n";
//
//*** Show the result... ***
if (mail($to, $subject, $content, $headers))
{
 header("location:SelectedEvent.php?key=".$_GET['key']);
}
else 
{
   	echo "error";
}



      }
    }
} else { echo "error";}



?>