<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection settings
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'projects';

    // Create a database connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Loop through the submitted data and insert it into the database
    if (isset($_POST['user_email']) && is_array($_POST['user_email'])) {
        for ($i = 0; $i < count($_POST['user_email']); $i++) {
            $userEmail = $conn->real_escape_string($_POST['user_email'][$i]);
            $passengerName = $conn->real_escape_string($_POST['passenger_name'][$i]);
            $gender = $conn->real_escape_string($_POST['gender'][$i]);
            $age = $conn->real_escape_string($_POST['age'][$i]);
            $phoneNumber = $conn->real_escape_string($_POST['phone_number'][$i]);

            // Insert data into the database
            $sql = "INSERT INTO passenger_info (user_email, passenger_name, gender, age, phone_number) 
                    VALUES ('$userEmail', '$passengerName', '$gender', '$age', '$phoneNumber')";

            if ($conn->query($sql) === TRUE) {
                // Data inserted successfully
                header("Location: travel_info.php");
                exit();            } else {
                // Handle errors, e.g., duplicate entries
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle non-POST requests
    header("Location: check_availability.php");
    exit();
}
?>
