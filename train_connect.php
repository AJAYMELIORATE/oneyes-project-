<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'db_connection.php';

    // Get the form data
    $train_name = $_POST["train_name"];
    $seat_count = $_POST["seat_count"];
    $train_number = $_POST["train_number"];
    $coach_count = $_POST["coach_count"];

    // Insert data into the train_info table
    $sql = "INSERT INTO train_info (train_name, seat_count, train_number, coach_count) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Handle the error if the statement preparation fails
        echo "Statement preparation error: " . $conn->error;
    } else {
        $stmt->bind_param("ssss", $train_name, $seat_count, $train_number, $coach_count);

        if ($stmt->execute()) {
            // Data inserted successfully into the train_info table

            // Close the prepared statement
            $stmt->close();

            // Close the database connection
            $conn->close();

            // Redirect to a success page or show a success message
            header("Location: getting_traininfo.php");
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
