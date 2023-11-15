<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["user_email"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if the new password matches the confirm password
    if ($new_password != $confirm_password) {
        echo "Passwords do not match. Please try again.";
        exit();
    }

    // Create a database connection (modify with your credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projects";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user's email exists in the database
    $stmt = $conn->prepare("SELECT user_id FROM register WHERE user_email = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Email not found in the database. Please enter a valid email address.";
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's password in the database
    $stmt = $conn->prepare("UPDATE register SET user_password = ? WHERE user_email = ?");
    $stmt->bind_param("ss", $hashed_password, $user_email);

    if ($stmt->execute()) {
        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();

        // Display a success message and redirect the user after a delay
        echo "<p>Password reset successfully. You will be redirected to the login page shortly.</p>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'VS-LOG IN PAGE.html'; // Replace with your actual login page URL
                }, 2000); // Redirect after 3 seconds (adjust as needed)
              </script>";
    } else {
        echo "Error resetting the password: " . $conn->error;
    }
}
?>
