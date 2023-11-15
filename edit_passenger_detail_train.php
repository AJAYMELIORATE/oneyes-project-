<?php
include 'db_connection.php';

if (isset($_GET['user_email'])) {
    $user_email = $_GET['user_email'];

    // Fetch passenger details based on user_email
    $sql = "SELECT passenger_name, gender, age ,phone_numberFROM passenger_info_train WHERE user_email = '$user_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passenger_name = $row['passenger_name'];
        $gender = $row['gender'];
        $age = $row['age'];
        $phone_number = $row['phone_number'];

    }
} else {
    // Handle the case where 'user_email' is not set
    // You can display an error message or redirect to the previous page
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Passenger Detail</title>

    <!-- Include necessary CSS and styles -->
    <link rel="stylesheet" href="style.css"> <!-- Add your custom CSS file here -->
    <style>body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .navbar-top {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .sidenav {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .form-label {
            font-weight: bold;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-submit {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-submit:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Passenger_Detail_admin</h1>
        </div>     
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="./assets/logo.png" alt="" width="100" height="100">            
        </div>
    </div>
    <div class="container">
        <h2>Edit Passenger Detail</h2>
        <form action="update_passenger_detail_train.php" method="POST">
            <input type="hidden" name="user_email" value="<?php echo $user_email; ?>">

            <label class="form-label" for="passenger_name">Passenger Name:</label>
            <input class="form-input" type="text" name="passenger_name" value="<?php echo $passenger_name; ?>"><br>

            <label class="form-label" for="gender">Gender:</label>
            <input class="form-input" type="text" name="gender" value="<?php echo $gender; ?>"><br>

            <label class="form-label" for="age">Age:</label>
            <input class="form-input" type="text" name="age" value="<?php echo $age; ?>"><br>

            <label class="form-label" for="phone_number">Age:</label>
            <input class="form-input" type="number" name="age" value="<?php echo $phone_number; ?>"><br>

            <input class="form-submit" type="submit" name="update" value="Update Passenger Detail">
        </form>
    </div>
</body>
</html>
