<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $user_from = $_POST['user_from'];
    $user_to = $_POST['user_to'];
    $user_phone = $_POST['user_phone'];
    $travel_date = $_POST['travel_date'];
    $user_mode = $_POST['user_mode'];
    // Create a database connection
    $conn = new mysqli('localhost', 'root', '', 'projects');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        // SQL query to insert the travel information
        $stmt = $conn->prepare("INSERT INTO travel_info_train (user_from, user_to, user_phone,travel_date,user_mode) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $user_from, $user_to, $user_phone,$travel_date,$user_mode);
        $exeval = $stmt->execute();
        if ($exeval) {
            // Successfully inserted travel information
            header("Location: route_train.php");
            exit(); 
        } else {
            echo "Insertion failed: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Invalid request method.";
}
?>
