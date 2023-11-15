<?php
session_start();
if(isset($_SESSION["user_email"])) {
    // Include your database connection code here
    include 'db_connection.php';

    // Get the user's email from the session
    $userEmail = $_SESSION["user_email"];

    // Fetch user information from the database
    $sql = "SELECT user_name, user_email, gender, phone_number FROM register WHERE user_email = '$userEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userName = $row['user_name'];
        $userGender = $row['gender'];
        $userPhone = $row['phone_number'];
    } else {
        // Handle the case where the user's information is not found
        // You can redirect the user or display an error message
    }
}

// Generate the current date in the desired format (e.g., YYYY-MM-DD)
$currentDate = date("d-M-Y");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Information</title>
    <link rel="stylesheet" href="./create_ticket.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    
    <style>
         /* Apply the background color to the entire form */
         .gray-bg {
            background-color: #65d9c1;
            padding: 20px;
            border-radius: 5px;
        }
        body, html {
            height: 100%;
        }
        
        .container form {
            width: 100%;
            margin: 0 auto;
            max-width: 600px; /* Set a maximum width to prevent it from becoming too wide on larger screens */
        }
        .button
        {
            background-color: brown;
            color: aliceblue;
        }
    </style>
</head>
<body class="">
<div id="blurred-background">
<div class="container">
        <form action="db_connect_create_ticket.php" method="post" class="needs-validation" id="ticket-form" novalidate>
            <nav>
                <h1>Query form</h1>
                <p>Kindly fill this form in case of any query</p>
                <p class="required">*Required</p>
            </nav>
            <hr>
            <h2>Contact information</h2>
            <!-- First Name -->
            <div class="col-12">
                <input class="form-control mb-3" type="text" placeholder="Name" name="user_name" required value="<?= isset($userName) ? $userName : '' ?>">
            </div>
            <!-- Email -->
            <div class="col-12">
                <input class="form-control mb-3" type="email" placeholder="Email" name="user_email" value="<?= isset($userEmail) ? $userEmail : '' ?>" readonly>
            </div>
            <!-- Gender -->
            <div class="col-12">
                <input class="form-control mb-3" type="text" name="gender" value="<?= isset($userGender) ? $userGender : '' ?>" readonly>
            </div>
            <!-- Mobile Number -->
            <div class="col-12">
                <input class="form-control mb-3" type="number" placeholder="Phone Number" name="phone_number" required value="<?= isset($userPhone) ? $userPhone : '' ?>">
            </div>
            <!-- Date -->
            <div class="col-12">
                <input class="form-control mb-3" type="text" name="ticket_date" placeholder="Enter date" required value="<?= $currentDate ?>">
            </div>
            <!-- Ticket Regarding -->
            <div class="col-12">
                <select class="form-control mb-3" name="ticket_to" required>
                    <option value="" disabled selected>--select any of the options--</option>
                    <option value="Bus Ticketing">Bus Ticketing</option>
                    <option value="Airway Ticketing">Airway Ticketing</option>
                    <option value="Train Ticketing">Train Ticketing</option>
                </select>
                <div class="invalid-feedback">Please select the ticket type.</div>
            </div>
            <!-- Subject -->
            <div class="col-12">
                <select class="form-control mb-3" name="user_issue" required>
                    <option value="" disabled selected>--select any of the options--</option>
                    <option value="Ticket Cancelling">Ticket Cancellation</option>
                    <option value="Change Passenger information">Change passenger information</option>
                    <option value="Payment Related">Payment issue</option>
                    <option value="Booking Problem">Booking Problem</option>
                    <option value="others">other problem......</option>
                </select>
                <div class="invalid-feedback">Please select the subject.</div>
            </div>
            <!-- Your Query -->
            <div class="col-12">
                <textarea class="form-control mb-3" name="user_problem" cols="30" rows="10"
                    placeholder="Please give a brief about the Problem...." required></textarea>
                <div class="invalid-feedback">Please enter your query.</div>
            </div>
            <button type="button" class="button" onclick="showConfirmation()">Rise Ticket</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<script>
    // Function to validate the form 
    const passengerForm = document.getElementById('ticket-form');

        // Handle form submission
        passengerForm.addEventListener('submit', function (event) {
            let isFormValid = true;
            const requiredFields = passengerForm.querySelectorAll('[required]');

            requiredFields.forEach(function (field) {
                if (!field.checkValidity()) {
                    isFormValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isFormValid) {
                event.preventDefault(); // Prevent form submission
            }
        });

        function showConfirmation() {
        const blurredBackground = document.getElementById('blurred-background');
        blurredBackground.style.filter = 'blur(5px)'; // Apply background blur

        if (confirm("Are you sure you want to submit this ticket?")) {
            // If the user clicks "Yes," submit the form
            document.getElementById('ticket-form').submit();
        } else {
            blurredBackground.style.filter = 'none'; // Remove background blur
        }
    }
</script>