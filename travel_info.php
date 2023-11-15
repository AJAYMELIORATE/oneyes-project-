<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel_Information</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkwGdU/7JoC6Gxu8GM5BxHB8jYY7NjFy3oz9zo4bWxMqF4a06E3z6Em5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        /* Apply the background color to the entire form */
        .gray-bg {
            background-color: #65d9c1;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="aj-navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="./assets/logo.png" alt="" width="100px" height="90px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" 
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        </nav>       
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 pt-5">
                <div class="reg-bg gray-bg">
                    <div class="wrapper p-5">
                        <div class="registration_form gray-bg">
                            <div class="title text-white">
                                <h2 class="text-center p-1">Travel Form</h2>
                            </div>
                            <form action="db_travel_connect.php" method="post"  id="travel-form" class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control"  placeholder="From" name="user_from" required>
                                        <div class="invalid-feedback">Please fill out 'From' field.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" placeholder="To" name="user_to" required>
                                        <div class="invalid-feedback">Please fill out 'TO' field.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control"  placeholder="Phone" name="user_phone" required>
                                        <div class="invalid-feedback">Please fill out Phone Number field.</div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="date" class="form-control"  placeholder="Journey Date" name="travel_date" required>
                                        <div class="invalid-feedback">Please fill out the Travel.</div>

                                    </div>
                                </div>
                                <button type="submit">Check Buses</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-light text-center text-white">
        <div class="container p-4 pb-0"></div>
        <div class="text-center p-3" style="background: #E5D594; background:  #0e0e0c">
            <a class="text-white" font="text-bold">THIS PROJECT IS DONE BY AJAY</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const passengerForm = document.getElementById('travel-form');

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
