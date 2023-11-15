<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="user_registration.css">
</head>
<body>
    <div class="container">
        <div class="left-space">

        </div>
        <h2 class="text-center">Passenger Details</h2>
        <form action="db_passenger_info.php" method="post" id="passenger-form" class="needs-validation" novalidate>
            <?php
            session_start();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userSeatsRequired = (int)$_POST["user_seats_required"];
                if ($userSeatsRequired > 0) {
                    for ($i = 1; $i <= $userSeatsRequired; $i++) {
                        echo "<h3>Passenger $i</h3>";
                        echo '<div class="form-group">
                                <label for="user_email">Login Email:</label>
                                <input type="email" class="form-control" name="user_email[]" required/>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="form-group">
                                <label for="passenger_name">Name:</label>
                                <input type="text" class="form-control" name="passenger_name[]" required/>
                                <div class="invalid-feedback">Please enter the passenger name.</div>
                            </div>
                            <div class="form-group">
                                <label for="passenger_age">Age:</label>
                                <input type="number" class="form-control" name="age[]" required/>
                                <div class="invalid-feedback">Please enter the passenger age.</div>
                            </div>
                            <div class="form-group">
                                <label for="passenger_phoneNumber">Passenger Number:</label>
                                <input type="number" class="form-control" name="phone_number[]" required/>
                                <div class="invalid-feedback">Please enter the passenger phone number.</div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control mb-3" name="gender" id="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                </select>
                                <div class="invalid-feedback">Please select your gender.</div>
                            </div>';
                    }
                } else {
                    echo "Invalid number of seats required.";
                }
            } else {
                // Handle non-POST requests
                header("Location: check_availability.php");
                exit();
            }
            ?>
            <button type="submit" class="btn btn-primary">Submit Passenger Details</button>
        </form>
        <div class="right-space">
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const passengerForm = document.getElementById('passenger-form');

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
    </script>
</body>
</html>
