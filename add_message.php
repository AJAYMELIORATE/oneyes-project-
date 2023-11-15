<?php
session_start();

if (isset($_SESSION["user_phone"]) && isset($_POST["messages"])) {
    $user_phone = $_SESSION["user_phone"];
    $message = $_POST["message_text"];
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

    // Insert the message into the chat_messages table
    $sql = "INSERT INTO chat_messages (message_id,user_id,admin_id,message_text,timestamp,room_id) VALUES (?, ?, ?, ?, NOW(), ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $message_id,$user_id, $admin_id, $message_text,$room_id );

    if ($stmt->execute()) {
        echo "Message stored successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
