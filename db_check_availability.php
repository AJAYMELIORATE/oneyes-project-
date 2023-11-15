<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user_email'], $_POST['user_from'], $_POST['user_to'], $_POST['user_seats_required'], $_POST['user_phone'], $_POST['travel_date'])) {
        $user_email = $_POST['user_email'];
        $user_from = $_POST['user_from'];
        $user_to = $_POST['user_to'];
        $user_seats_required = $_POST['user_seats_required'];
        $user_phone = $_POST['user_phone'];
        $travel_date = $_POST['travel_date'];

        $conn = new mysqli('localhost', 'root', '', 'projects');

        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO booking_info (user_email, user_from, user_to, user_seats_required, user_phone, travel_date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $user_email, $user_from, $user_to, $user_seats_required, $user_phone, $travel_date);
            $exeval = $stmt->execute();

            if ($exeval) {
                header("Location: passenger_details.php");
                exit();
            } else {
                echo "Registration failed: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Required fields are missing.";
    }
}
?>
