<?php
session_start();

if (isset($_POST['update_profile'])) 
{
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $phone_number = $_POST['phone_number'];

    $conn = new mysqli('localhost', 'root', '', 'projects');

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // To Update the user's profile in the database
    $stmt = $conn->prepare("UPDATE register SET user_name = ?, user_email = ?, phone_number = ? WHERE user_email = ?");
    $stmt->bind_param("ssss", $user_name, $user_email, $phone_number, $_SESSION['user_email']);

    if ($stmt->execute()) {
        // Profile updated successfully
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['phone_number'] = $phone_number;

        header('Location:user_profile.php');
        exit();
    } else {
        // Error updating profile
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Required fields not provided.";
}
?>
