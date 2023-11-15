<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'db_connection.php';

    // Get the form data
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $gender = $_POST["gender"];
    $phone_number = $_POST["phone_number"];
    $ticket_date = $_POST["ticket_date"];
    $ticket_to = $_POST["ticket_to"];
    $user_issue = $_POST["user_issue"];
    $user_problem = $_POST["user_problem"];

    // Insert data into the ticket_info table
    $sql = "INSERT INTO ticket_info (user_name, user_email, gender, phone_number, ticket_date, user_issue, user_problem, ticket_to) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Handle the error if the statement preparation fails
        echo "Statement preparation error: " . $conn->error;
    } else {
        $stmt->bind_param("ssssssss", $user_name, $user_email, $gender,$phone_number, $ticket_date, $user_issue, $user_problem, $ticket_to);

        if ($stmt->execute()) {
            // Data inserted successfully into the ticket_info table

            // Check if "Ticket Regarding" is "Bus Ticketing" and insert into the ticket_info_bus table
            if ($ticket_to === "Bus Ticketing") {
                $sql_bus = "INSERT INTO ticket_info_bus (user_name, user_email, gender, phone_number, ticket_date, user_issue, user_problem) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt_bus = $conn->prepare($sql_bus);

                if (!$stmt_bus) {
                    // Handle the error if the statement preparation fails
                    echo "Statement preparation error: " . $conn->error;
                } else {
                    $stmt_bus->bind_param("sssssss", $user_name, $user_email, $gender,$phone_number, $ticket_date, $user_issue, $user_problem);
                    $stmt_bus->execute();
                }
            } else if ($ticket_to === "Airway Ticketing") {
                // Insert into the ticket_info_airway table
                $sql_airway = "INSERT INTO ticket_info_air (user_name, user_email, gender, phone_number, ticket_date, user_issue, user_problem) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt_airway = $conn->prepare($sql_airway);

                if (!$stmt_airway) {
                    // Handle the error if the statement preparation fails
                    echo "Statement preparation error: " . $conn->error;
                } else {
                    $stmt_airway->bind_param("sssssss", $user_name, $user_email, $gender, $phone_number, $ticket_date, $user_issue, $user_problem);
                    $stmt_airway->execute();
                }
            } else if ($ticket_to === "Train Ticketing") {
                // Insert into the ticket_info_train table
                $sql_train = "INSERT INTO ticket_info_train (user_name, user_email, gender, phone_number, ticket_date, user_issue, user_problem) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt_train = $conn->prepare($sql_train);

                if (!$stmt_train) {
                    // Handle the error if the statement preparation fails
                    echo "Statement preparation error: " . $conn->error;
                } else {
                    $stmt_train->bind_param("sssssss", $user_name, $user_email, $gender, $phone_number, $ticket_date, $user_issue, $user_problem);
                    $stmt_train->execute();
                }
            }

            // Close prepared statements
            $stmt->close();
            if (isset($stmt_bus)) {
                $stmt_bus->close();
            }
            if (isset($stmt_airway)) {
                $stmt_airway->close();
            }
            if (isset($stmt_train)) {
                $stmt_train->close();
            }

            // Close the database connection
            $conn->close();

            // Redirect to a success page or show a success message
            header("Location: user dashboard.html");
            exit;
        } else {
            // Handle errors
            echo "Error: " . $conn->error;
        }
    }
} else {
    // Handle cases where the request method is not POST
    echo "Invalid request.";
}

?>
