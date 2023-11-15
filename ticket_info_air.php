<?php
session_start();

if (isset($_SESSION['user_email']) && isset($_SESSION['phone_number'])) {
    $user_email = $_SESSION['user_email'];
    $phone_number = $_SESSION['phone_number'];

    // Connect to your database (you need to define this part)
    $conn = new mysqli('localhost', 'root', '', 'projects');

    // Function to fetch travel information based on the user's phone_number
    function fetchTravelInfo($conn, $phone_number) {
        $sql = "SELECT * FROM travel_info_air WHERE user_phone = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die('Error in SQL statement: ' . $conn->error);
        }

        $stmt->bind_param("s", $phone_number);
        $stmt->execute();

        if ($stmt->error) {
            die('Error in bind_param/execute: ' . $stmt->error);
        }

        return $stmt->get_result()->fetch_assoc();
    }

    // Function to fetch passenger details based on user_email and phone_number
    function fetchPassengerDetails($conn, $user_email, $phone_number) {
        $sql = "SELECT * FROM passenger_info_air WHERE user_email = ? AND phone_number = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die('Error in SQL statement: ' . $conn->error);
        }

        $stmt->bind_param("ss", $user_email, $phone_number);
        $stmt->execute();

        if ($stmt->error) {
            die('Error in bind_param/execute: ' . $stmt->error);
        }

        return $stmt->get_result()->fetch_assoc();
    }

    // Fetch travel information
    $travel_info = fetchTravelInfo($conn, $phone_number);

    // Fetch passenger details
    $passenger_details = fetchPassengerDetails($conn, $user_email, $phone_number);

    // Close the database connection
    $conn->close();

    if ($travel_info) {
        $user_from = $travel_info['user_from'];
        $user_to = $travel_info['user_to'];
        $travel_date = $travel_info['travel_date'];
    }

    if ($passenger_details) {
        $passenger_name = $passenger_details['passenger_name'];
        $gender = $passenger_details['gender'];
        $age = $passenger_details['age'];
    } else {
        echo "No passenger details found for this user.";
    }
} else {
    echo "User not logged in.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
        }

        h2 {
            color: #333;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <div class="card">
        <h2>Welcome, <?php echo $user_email; ?></h2>
        <form action="send.php" method="post">
            <fieldset>
                <legend>Travel Information</legend>
                <input type="hidden" name="user_email" value="<?php echo $user_email; ?>">
                <input type="hidden" name="user_from" value="<?php echo $user_from; ?>">
                <input type="hidden" name="user_to" value="<?php echo $user_to; ?>">
                <input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>">
                <input type="hidden" name="travel_date" value="<?php echo $travel_date; ?>">
                <!-- Include other hidden fields here -->
                <p>User From: <?php echo $user_from; ?></p>
                <p>User To: <?php echo $user_to; ?></p>
                <p>User Phone: <?php echo $phone_number; ?></p>
                <p>Travel Date: <?php echo $travel_date; ?></p>
            </fieldset>
            <?php if ($passenger_details): ?>
                <fieldset>
                    <legend>Passenger Details</legend>
                    <input type="hidden" name="passenger_name" value="<?php echo $passenger_name; ?>">
                    <input type="hidden" name="gender" value="<?php echo $gender; ?>">
                    <input type="hidden" name="age" value="<?php echo $age; ?>">
                    <p>Passenger Name: <?php echo $passenger_name; ?></p>
                    <p>Gender: <?php echo $gender; ?></p>
                    <p>Age: <?php echo $age; ?></p>
                    <p>YOUR TICKET HAS CONFIRMED AND THE CONFIRMATION MAIL HAS SEND TOO YOU </p>
                    <p>For Queries Regarding Contact Support</p> 
                </fieldset>
            <?php endif; ?>
            <button type="submit" class="btn">OK</button>
        </form>
    </div>
</body>
</html>
