<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user details from the form
    $user_email = $_POST["user_email"];
    $user_from = $_POST["user_from"];
    $user_to = $_POST["user_to"];
    $phone_number = $_POST["phone_number"];
    $travel_date = $_POST["travel_date"];
    $passenger_name = $_POST["passenger_name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];

    
    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();  // Send using SMTP
        $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = 'ajayphj5625@gmail.com';  // SMTP username (your email)
        $mail->Password = 'cqte yojl eryu kwzt';  // SMTP password (your email password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable implicit TLS encryption
        $mail->Port = 465;  // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('your_email@gmail.com', 'Your Name');  // Set the 'from' address
        $mail->addAddress($user_email);  // Add a recipient with user's email

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Your Ticket Details';  // Customize the subject
        $mail->Body = "
            <p><strong>Travel Information</strong></p>
            <p>User From: $user_from</p>
            <p>User To: $user_to</p>
            <p>User Phone: $phone_number</p>
            <p>Travel Date: $travel_date</p>
            
            <p><strong>Passenger Details</strong></p>
            <p>Passenger Name: $passenger_name</p>
            <p>Gender: $gender</p>
            <p>Age: $age</p>
        ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // Send the email
        $mail->send();
        header("Location: success.php"); // Change 'login.php' to the desired page
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request method";
}
?>
