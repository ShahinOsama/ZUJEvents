<?php
include 'conn.php';
session_start();

if (isset($_SESSION['id'])) {
  $event = $_GET['key'];

  // Retrieve the event details and attendees' information
  $sql = "SELECT * FROM `attendees` AS a
          INNER JOIN `events` AS e ON a.a_event_id = e.event_id
          INNER JOIN `attendance_info` AS ai ON a.a_user_id = ai.id
          WHERE a.a_event_id = $event";
  $result = mysqli_query($connect, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $to = $row['email'];
      $subject = 'Reminder: ' . $row['event_name'];
      $content = 'This is a reminder to attend the event "' . $row['event_name'] . '" on ' . $row['event_datetime'];

      // Prepare the email headers
      $headers = "From: zuj.events@gmail.com\r\n";

      // Send the reminder email
      if (mail($to, $subject, $content, $headers)) {
        // Email sent successfully, redirect to the event page
        header("location: SelectedEvent.php?key=" . $event);
        exit();
      } else {
        echo "Failed to send reminder email.";
      }
    }
  } else {
    echo "No attendees found for the event.";
  }
} else {
  echo "User session not found.";
}
?>
