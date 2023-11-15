<?php
session_start();

// Include the database connection file
include 'db_connection.php';

// Check if the delete button was clicked and user_email parameter is set
if (isset($_GET['user_email'])) {
    $user_email = $_GET['user_email'];

    // Delete user's information from relevant tables
    $sql1= "DELETE FROM passenger_info_air WHERE user_email = '$user_email'";
    // Add more delete queries for other tables as needed

    if ($conn->query($sql1) === TRUE) {
        // Successfully deleted user's information
        header('Location: getting_bookinginfo_air.php');
        exit();
    } else {
        // Handle error if deletion fails
        echo "Error deleting record: " . $conn->error;
    }
}

// Query to fetch data from the "register" table
$sql = "SELECT user_email, passenger_name, gender, age ,phone_number FROM passenger_info_air";
$result = $conn->query($sql);

if ($result === false) {
    // Handle query error
    echo "Error: " . $conn->error;
} elseif ($result->num_rows > 0) {
    // Display data in a table
    echo '<table>';
    echo '<tr>';
    echo '<th>User Name</th>';
    echo '<th>Email</th>';
    echo '<th>Gender</th>';
    echo '<th>Phone</th>';
    echo '<th>Password</th>';
    echo '<th>Actions</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['user_name'] . '</td>';
        echo '<td>' . $row['user_email'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['phone_number'] . '</td>';
        echo '<td>' . $row['user_password'] . '</td>';
        echo '<td class="action-buttons">';
        if (isset($row['user_email'])) {
            echo '<a class="edit" href="./VS-LOG IN PAGE.html?user_email=' . $row['user_email'] . '">Edit</a>';
            echo '<a class="delete" href="?user_email=' . $row['user_email'] . '">Delete</a>';
        } else {
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
