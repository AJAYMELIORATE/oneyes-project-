<?php
// Include the database connection file
include 'db_connection.php';

// Check if the user email parameter is set
if (isset($_GET['user_email'])) {
    $userEmail = $_GET['user_email'];

    // Update the ticket status in the database to mark it as closed
    $sql = "UPDATE ticket_info_bus SET ticket_status = ' Ticket Closed '  WHERE user_email = '$userEmail'";
    if ($conn->query($sql) === TRUE) {
        // Ticket closed successfully, set a success message
        $message = "Ticket with email $userEmail has been closed successfully and the problem is resolved.";
    } else {
        // Error occurred while closing the ticket
        $message = "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Redirect back to the getting_ticketinfo_admin.php page with the message
    header("Location: getting_ticketinfo_bus.php?message=" . urlencode($message));
    exit();
} else {
    // If the user email parameter is not set, handle the error or redirect to an error page
    echo "Invalid request.";
}
?>
