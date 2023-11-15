<?php
session_start();
if(isset($_SESSION["admin_email"])) {
    // Include your database connection code here
    include 'db_connection.php';

    // Check if the admin has submitted a message
    if(isset($_POST['admin_message']) && !empty($_POST['admin_message'])) {
        $adminEmail = $_SESSION["admin_email"]; // Get the admin's email from the session
        $adminMessage = $_POST['admin_message'];

        // Insert the message into the admin_message table
        $sql = "INSERT INTO admin_message (admin_email, admin_messages) VALUES ('$adminEmail', '$adminMessage')";
        if ($conn->query($sql) === TRUE) {
            // Message inserted successfully
            header("Location: help_1.php"); // Redirect to the chat page to prevent resubmission
            exit;
        } else {
            // Error occurred while inserting admin message
            echo "Error: " . $conn->error;
        }
    }

    // Fetch admin messages from the database
    $sqlAdmin = "SELECT admin_email, admin_messages FROM admin_message ORDER BY admin_time";
    $resultAdmin = $conn->query($sqlAdmin);

    // Create a variable to store the HTML for displaying admin messages
    $adminMessageHtml = '';

    if ($resultAdmin->num_rows > 0) {
        while ($row = $resultAdmin->fetch_assoc()) {
            $adminMessage = $row['admin_messages'];

            // Format the admin message for display
            $formattedAdminMessage = "<div class='message-box'></strong> $adminMessage</div>";

            // Append the formatted admin message to the admin message HTML
            $adminMessageHtml .= $formattedAdminMessage;
        }
    } else {
        // No admin messages found
        $adminMessageHtml = "No messages found.";
    }

    // Fetch client messages from the database
    $sqlClient = "SELECT user_message FROM client_message ORDER BY user_time"; // Replace 'timestamp_column' with your actual timestamp column
    $resultClient = $conn->query($sqlClient);

    // Create a variable to store the HTML for displaying client messages
    $clientMessageHtml = '';

    if ($resultClient->num_rows > 0) {
        while ($row = $resultClient->fetch_assoc()) {
            $clientMessage = $row['user_message'];

            // Format the client message for display
            $formattedClientMessage = "<div class='message-box'></strong> $clientMessage</div>";

            // Append the formatted client message to the client message HTML
            $clientMessageHtml .= $formattedClientMessage;
        }
    } else {
        // No client messages found
        $clientMessageHtml = "No messages found.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chat</title>
    <link rel="stylesheet" href="help.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                    <img src="./assets/logo.png" alt="">
                    <span class="nav-item">Dashboard</span>
                </a></li>
                <li><a href="./admin_dashboard.html">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="getting_ticketinfo_admin.php">
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Back</span>
                </a></li>
                <li><a href="./admin log in.html" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a></li>
            </ul>
        </nav>
        <div class="chat">
            <h2>Messaging to user</h2>
            <div class="msg">
                <h3>Admin Messages</h3>
                <!-- Display previous admin messages here -->
                <?= $adminMessageHtml ?>
                <h3>Client Messages</h3>
                <!-- Display previous client messages here -->
                <?= $clientMessageHtml ?>
            </div>
            <form method="post" action="">
                <div class="input_msg">
                    <input type="text" name="admin_message" placeholder="Reply to the user" id="input_msg">
                    <button type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    // Close the database connection
    $conn->close();
} else {
    header("location: admin log in.html"); 
}
?>
