<?php
// *** To Email ***
include 'conn.php';
session_start();

    // Select data from events table
if (isset($_SESSION['id'])) {

$id = $_SESSION['id'];
$event_id = $_GET['key'];
$user_id = $id;

$sql1 = "INSERT INTO `attendees`( `a_user_id`, `a_event_id`) VALUES ('$id','$event_id')";

// Execute the SQL statement
if (mysqli_query($connect, $sql1)) {
    // Insertion successful
if (isset($_SESSION['id'])) {
    // Use the $username variable as needed

    // Session variable not set, handle the situation accordingly
    $sql = "SELECT * FROM attendance_info , events WHERE  attendance_info.id=$id ";
    $result = mysqli_query($connect, $sql);

    // Display data in events container
    
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {

$to = $row['email'];

// *** Subject Email ***
$subject = 'Thanks for joining!';
// *** Content Email ***
$content = 'You have been added successfully to the attenders list, thanks for joining the event';
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


      }
    

} else {
    // Error occurred
    echo "Error inserting event: " . mysqli_error($connect);
}

    // Session variable not set, handle the situation accordingly


    // Display data in events container

// Close the database connection






mysqli_close($connect);
?>