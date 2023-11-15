<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Information</title>
    <link rel="stylesheet" href="./style.css">
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
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto"> 
                    </ul>
                </div>
            </div>
        </nav>       
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6 pt-4 ">
                <div class="reg-bg gray-bg">
                    <div class="wrapper p-5">
                        <div class="registration_form gray-bg">
                            <div class="title text-white">
                               <h2 class="text-center p-1">
                                Travel Form
                               </h2>
                            </div>
                            <form action="db_travel_connect_air.php" method="post" id="travel-form" class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" id="inputname" placeholder="From" name="user_from" required>
                                        <div class="invalid-feedback">Please fill out 'From' field.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="To" name="user_to" required>
                                        <div class="invalid-feedback">Please fill out 'To' field.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" id="inputPhone" placeholder="Phone" name="user_phone" required>
                                        <div class="invalid-feedback">Please fill out 'Phone' field.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <select id="inputState" class="form-control" name="dek" required>
                                            <option  value="" disabled selected>Select Class</option>
                                            <option value="First class">First class</option>
                                            <option value="Economic Tickets">Economic Tickets</option>
                                            <option value="Normal Tickets">Normal Tickets</option>
                                        </select>
                                        <div class="invalid-feedback">Please Select your Ticket Luxury.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                    <select class="form-control mb-3" name="gender" id="gender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                    </select>
                                        <div class="invalid-feedback">Please Select your travelling Mode.</div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" id="inputdate" placeholder="Journey Date" name="travel_date" required>
                                        <div class="invalid-feedback">Please fill out 'Journey Date' field.</div>
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
        <div class="container p-4 pb-0">
        </div>
        <div class="text-center p-3" style="background: #E5D594; background:  #0e0e0c">
            <a class="text-white" font="text-bold">THIS PROJECT IS DONE BY AJAY</a>
        </div>
    </footer>
</body>
</html>

<script>
    // Function to validate the form 
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
