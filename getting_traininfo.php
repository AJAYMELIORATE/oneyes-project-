<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train_Details</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
        /* Add your custom CSS styles here */
        body {
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

        .main {
            padding: 20px;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            padding: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-corner {
            position: absolute;
            top: 10px; /* Adjust the top position as needed */
            right: 10px; /* Adjust the right position as needed */
            background-color: #b55ccd;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Train-Information</h1>
        </div>
        <a href="newtrain_registering.html" class="btn-corner">Add Train </a>    
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="./assets/logo.png" alt="" width="100" height="100">
        </div>
    </div>
    <div class="main">
        <h2>Train DETAILS</h2>
        <div class="card">
            <div class="card-body">
                <?php
                    // Include the database connection file
                    include 'db_connection.php';

                    // Query to fetch data from the "bus_detail" table
                    $sql = "SELECT train_name, seat_count, train_number, coach_count FROM train_info";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        // Handle query error
                        echo "Error: " . $conn->error;
                    } elseif ($result->num_rows > 0) {
                        // Display data in a table
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Train Name</th>';
                        echo '<th>Seat Count</th>';
                        echo '<th>Train Number</th>';
                        echo '<th>Coach Count</th>';
                        echo '</tr>';

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['train_name'] . '</td>';
                            echo '<td>' . $row['seat_count'] . '</td>';
                            echo '<td>' . $row['train_number'] . '</td>';
                            echo '<td>' . $row['coach_count'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo "No bus details found.";
                    }

                    // Close the database connection
                    $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
