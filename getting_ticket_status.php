<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ticket Status</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Add your custom CSS styles here */
    body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }
    navbar-top {
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
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin-bottom: 20px;
        text-align: center;
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
            background-color: #070307;
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
            <h1></h1>
        </div> 
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="./assets/logo.png" alt="" width="100" height="100">            
        </div>
        <div class="">
        <a href="help.php" class="btn-corner">GET LIVE INTERACTION SUPPORT HERE</a>  
        </div>  
    </div>
  <?php
    // Include your database connection file (e.g., db_connection.php)
    include 'db_connection.php';

    // Capture the user's email from the form
    $user_email = $_POST['user_email'];

    // Function to fetch ticket information from a specific table
    function fetchTicketInfo($conn, $table, $user_email) {
      $sql = "SELECT user_name, gender, phone_number, ticket_date, user_issue, user_problem, ticket_status FROM $table WHERE user_email = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('s', $user_email);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fetch ticket information for each type (bus, air, train)
    $bus_ticket_info = fetchTicketInfo($conn, 'ticket_info_bus', $user_email);
    $air_ticket_info = fetchTicketInfo($conn, 'ticket_info_air', $user_email);
    $train_ticket_info = fetchTicketInfo($conn, 'ticket_info_train', $user_email);

    // Close the database connection
    $conn->close();
  ?>

  <!-- Display bus ticket information -->
  <?php
    if (count($bus_ticket_info) > 0) {
      echo '<table>';
      echo '<tr>';
      echo '<th>User Name</th>';
      echo '<th>Gender</th>';
      echo '<th>User Phone</th>';
      echo '<th>Ticket Date</th>';
      echo '<th>User Issue</th>';
      echo '<th>Ticket Status</th>';
      echo '</tr>';

      foreach ($bus_ticket_info as $ticket) {
        echo '<tr>';
        echo '<td>' . $ticket['user_name'] . '</td>';
        echo '<td>' . $ticket['gender'] . '</td>';
        echo '<td>' . $ticket['phone_number'] . '</td>';
        echo '<td>' . $ticket['ticket_date'] . '</td>';
        echo '<td>' . $ticket['user_issue'] . '</td>';
        echo '<td>' . $ticket['ticket_status'] . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo '';
    }
  ?>

  <!-- Display air ticket information -->
  <?php
    if (count($air_ticket_info) > 0) {
      echo '<table>';
      echo '<tr>';
      echo '<th>User Name</th>';
      echo '<th>Gender</th>';
      echo '<th>User Phone</th>';
      echo '<th>Ticket Date</th>';
      echo '<th>User Issue</th>';
      echo '<th>Ticket Status</th>';
      echo '</tr>';

      foreach ($air_ticket_info as $ticket) {
        echo '<tr>';
        echo '<td>' . $ticket['user_name'] . '</td>';
        echo '<td>' . $ticket['gender'] . '</td>';
        echo '<td>' . $ticket['user_phone'] . '</td>';
        echo '<td>' . $ticket['ticket_date'] . '</td>';
        echo '<td>' . $ticket['user_issue'] . '</td>';
        echo '<td>' . $ticket['ticket_status'] . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo '';
    }
  ?>

  <!-- Display train ticket information -->
  <?php
    if (count($train_ticket_info) > 0) {
      echo '<table>';
      echo '<tr>';
      echo '<th>User Name</th>';
      echo '<th>Gender</th>';
      echo '<th>User Phone</th>';
      echo '<th>Ticket Date</th>';
      echo '<th>User Issue</th>';
      echo '<th>Ticket Status</th>';
      echo '</tr>';

      foreach ($train_ticket_info as $ticket) {
        echo '<tr>';
        echo '<td>' . $ticket['user_name'] . '</td>';
        echo '<td>' . $ticket['gender'] . '</td>';
        echo '<td>' . $ticket['user_phone'] . '</td>';
        echo '<td>' . $ticket['ticket_date'] . '</td>';
        echo '<td>' . $ticket['user_issue'] . '</td>';
        echo '<td>' . $ticket['ticket_status'] . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo '';
    }
  ?>
</body>
</html>