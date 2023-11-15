<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger_Detail_admin</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="./style.css">

    <!-- FontAwesome 5 -->
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
        .action-buttons {
            display: flex;
            justify-content: space-between;
        }
        .action-buttons {
        display: flex;
        justify-content: space-between;
    }

    .action-buttons a {
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .action-buttons a.edit {
        background: linear-gradient(90deg, #00FF00, #008000);
        color: #fff;
    }

    .action-buttons a.delete {
        background-color: #FF0000;
        color: #fff;
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
    <div class="main">
        <h2>Passenger Detail</h2>
        <div class="card">
            <div class="card-body">
                <?php
                    // Include the database connection file
                    include 'db_connection.php';

                    // Query to fetch data from the "bus_detail" table
                    $sql = "SELECT user_email, passenger_name, gender, age ,phone_number FROM passenger_info";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        // Handle query error
                        echo "Error: " . $conn->error;
                    } elseif ($result->num_rows > 0) {
                        // Display data in a table
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>User Email</th>';
                        echo '<th>Passenger Name</th>';
                        echo '<th>Gender</th>';
                        echo '<th>Age</th>';
                        echo '<th>Phone Number</th>';
                        echo '<th>Action</th>';
                        echo '</tr>';
                        
                        while ($row = $result->fetch_assoc()) 
                        {
                            echo '<tr>';
                            echo '<td>' . $row['user_email'] . '</td>';
                            echo '<td>' . $row['passenger_name'] . '</td>';
                            echo '<td>' . $row['gender'] . '</td>';
                            echo '<td>' . $row['age'] . '</td>';
                            echo '<td>' . $row['phone_number'] . '</td>';
                            echo '<td class="action-buttons">';
                if (isset($row['user_email'])) {
                echo '<a class="edit" href="edit_passenger_detail.php?user_email=' . $row['user_email'] . '">Edit</a>';
                echo '<a class="delete" href="admin_delete_passengerdetail.php?user_email=' . $row['user_email'] . '">Delete</a>';
            }
                else {
            echo 'N/A';
            }
            echo '</td>';
            echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "No user details found.";
            }
            $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
