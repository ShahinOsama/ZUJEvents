<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $recipientEmail = $_POST['email'];
    
    // Define the email subject and message
    $subject = 'Action Notification';
    $message = 'This is to notify you that the action has been performed successfully.';
    
    // Set the email headers
    $headers = 'From: Your Name <yourname@example.com>' . "\r\n";
    $headers .= 'Reply-To: yourname@example.com' . "\r\n";
    
    // Send the email
    $mailSent = mail($recipientEmail, $subject, $message, $headers);
    
    // Check if the email was sent successfully
    if ($mailSent) {
        echo 'Email sent successfully.';
    } else {
        echo 'Error sending email.';
    }
}
?>

<!-- HTML form with a button to trigger email sending -->
<form method="POST" action="">
    <input type="email" name="email" placeholder="Enter recipient email">
    <button type="submit" name="sendEmail">Send Email</button>
</form>
