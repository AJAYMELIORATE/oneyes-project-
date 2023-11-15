<?php
include 'db_connection.php';

if (isset($_POST['update'])) {
    $user_email = $_POST['user_email'];
    $passenger_name = $_POST['passenger_name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    // Update passenger details in the database
    $sql = "UPDATE passenger_info SET passenger_name = '$passenger_name', gender = '$gender', age = '$age' WHERE user_email = '$user_email'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the getting_bookinginfo.php page after successful update
        header("Location: getting_bookinginfo.php");
        exit();
    } else {
        // Handle the case where the update fails
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Handle the case where 'update' is not set
    // You can display an error message or redirect to the previous page
}

// Close the database connection
$conn->close();
?>
