<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'db_connection.php';

    // Get the form data
    $airbus_name = $_POST["airbus_name"];
    $airbus_number = $_POST["airbus_number"];
    $airbus_use = $_POST["airbus_use"];
    $rc_number = $_POST["rc_number"];

    // Insert data into the airbus_info table
    $sql = "INSERT INTO airbus_info (airbus_name, airbus_number, airbus_use, rc_number) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Handle the error if the statement preparation fails
        echo "Statement preparation error: " . $conn->error;
    } else {
        $stmt->bind_param("ssss", $airbus_name, $airbus_number, $airbus_use, $rc_number);

        if ($stmt->execute()) {
            // Data inserted successfully into the airbus_info table

            // Close the prepared statement
            $stmt->close();

            // Close the database connection
            $conn->close();

            // Redirect to a success page or show a success message
            header("Location: getting_airbusinfo.php");
            exit;
        } else {
            // Handle errors
            echo "Error: " . $conn->error;
        }
    }
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request.";
}
?>
