<?php
if(isset($_POST['user_email'])) 
{
    $user_email = $_POST['user_email'];

    $conn = new mysqli('localhost', 'root', '', 'projects');

    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM register WHERE user_email = ?");
        $stmt->bind_param("s", $user_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            // You can add session variables here if needed
            // For example, if you want to store user name and phone number:
            session_start();
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['phone_number'] = $row['phone_number'];

            header("Location: user_profile.php");
            exit();
        } else {
            echo "Login failed. User not found.";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "Required fields not provided.";
}
?>