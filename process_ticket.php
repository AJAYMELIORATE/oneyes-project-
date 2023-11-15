<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $gender = $_POST["gender"];
    $user_phone = $_POST["user_phone"];
    $ticket_date = $_POST["ticket_date"];
    $ticket_to = $_POST["ticket_to"];
    $user_issue = $_POST["user_issue"];
    $user_problem = $_POST["user_problem"];

    // Email recipient
    $recipient_email = "ajayphj5625@gmail.com"; // Change this to your recipient's email address

    // Email subject
    $subject = "New Ticket Created";

    // Email message
    $message = "A new ticket has been created:\n\n";
    $message .= "User Name: " . $user_name . "\n";
    $message .= "User Email: " . $user_email . "\n";
    $message .= "Gender: " . $gender . "\n";
    $message .= "User Phone: " . $user_phone . "\n";
    $message .= "Ticket Date: " . $ticket_date . "\n";
    $message .= "Ticket Regarding: " . $ticket_to . "\n";
    $message .= "User Issue: " . $user_issue . "\n";
    $message .= "User Problem: " . $user_problem . "\n";

    // Send the email
    $mailSuccess = mail($recipient_email, $subject, $message);

    if ($mailSuccess) {
        echo "Ticket created successfully, and an email has been sent to $recipient_email.";
    } else {
        echo "Ticket created successfully, but the email could not be sent. Please check your email configuration.";
    }
}
?>
