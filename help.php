<?php
session_start();
if(isset($_SESSION["user_email"]) && isset($_SESSION["phone_number"])) 
{
    // Include your database connection code here
    include 'db_connection.php';

    // Check if the user has submitted a message
    if(isset($_POST['user_message']) && !empty($_POST['user_message'])) {
        $userEmail = $_SESSION["user_email"];
        $userMessage = $_POST['user_message'];

        // Insert the message into the client_message table
        $sql = "INSERT INTO client_message (user_email, user_message) VALUES ('$userEmail', '$userMessage')";
        if ($conn->query($sql) === TRUE) {
            // Message inserted successfully
        } else {
            // Error occurred while inserting message
            echo "Error: " . $conn->error;
        }
    }

    // Fetch user messages from the database
    $sqlUser = "SELECT user_email, user_message FROM client_message ORDER BY user_time"; // Replace 'timestamp_column' with your actual timestamp column
    $resultUser = $conn->query($sqlUser);

    // Create a variable to store the HTML for displaying user messages
    $userMessageHtml = '';

    if ($resultUser->num_rows > 0) {
        while ($row = $resultUser->fetch_assoc()) {
            $userMessage = $row['user_message'];

            // Format the user message for display
            $formattedUserMessage = "<div class='message-box'></strong> $userMessage</div>";

            // Append the formatted user message to the user message HTML
            $userMessageHtml .= $formattedUserMessage;
        }
    } else {
        // No user messages found
        $userMessageHtml = "No messages found.";
    }

    // Fetch admin messages from the database
    $sqlAdmin = "SELECT admin_email, admin_messages FROM admin_message ORDER BY admin_time"; // Replace 'timestamp_column' with your actual timestamp column
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatRoom</title>
    <link rel="stylesheet" href="help.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body background="white">
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                    <img src="./assets/logo.png" alt="">
                    <span class="nav-item">Dashboard</span>
                </a></li>
                <li><a href="./user dashboard.html">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="create_ticket.php">
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Create Ticket</span>
                </a></li>
                <li><a href="./index.html" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a></li>
            </ul>
        </nav>
        <div class="chat">
            <h2>Welcome <span><?= $_SESSION["user_email"] ?></span></h2>
            <div class="msg">
                <h3>User Messages</h3>
                <!-- Display previous user messages here -->
                <?= $userMessageHtml ?>
                <h3>Admin Messages</h3>
                <!-- Display previous admin messages here -->
                <?= $adminMessageHtml ?>
            </div>
            <form method="post" action="">
                <div class="input_msg">
                    <input type="text" name="user_message" placeholder="We are Here for you" id="input_msg">
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
    header("location: VS-LOG IN PAGE.html"); 
}
?>
