<?php
session_start();

if (isset($_SESSION["user_phone"])) {
    $user_phone = $_SESSION["user_phone"];
    $admin_id = ""; // Set the admin's ID when sending a message to the admin.

    // Create a database connection (modify with your credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projects";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch chat messages from the chat_messages table
    $sql = "SELECT * FROM chat_messages WHERE (user_id = ? OR admin_id = ?) AND room_id = ? ORDER BY timestamp ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user_phone, $admin_id, $room_id); // Assuming you have a $room_id variable

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            // Output the messages here, e.g., as HTML
            echo '<div>';
            echo 'User: ' . $row['user_id'] . '<br>';
            echo 'Message: ' . $row['message_text'] . '<br>';
            echo 'Timestamp: ' . $row['timestamp'] . '<br>';
            echo '</div>';
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
