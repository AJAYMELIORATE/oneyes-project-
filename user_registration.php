<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <!-- Bootstrap Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Icon LInk -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Custom Style Sheets -->
    <link rel="stylesheet" href="{% static 'authentication/css/login-style.css' %}">
    <link rel="stylesheet" href="{% static 'authentication/css/reset-style.css' %}">
    <link rel="stylesheet" href="user_registration.css">


    <!-- Success Page Icon -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<body>  
<div class="login-body">
  <div class="login-container" id="container">
    <div class="form-container sign-up-container">
      <form action="connect.php" method="POST" class="login-form needs-validation" id="registration-form"
        enctype="multipart/form-data" novalidate>
        <h3>CREATE ACCOUNT</h3>
        <!--  -->
        <div class="col-12">
        <input class="form-control mb-3" type="text" placeholder="Name" name="user_name" id="username"
        pattern="[A-Za-z]+" title="Only Alphabets Allowed" alert="Kindly enter your name" required />  
        <div class="invalid-feedback">Please enter your name.</div>      
        </div>
        <!--  -->
        <div class="col-12">
          <input class="form-control mb-3" type="email" placeholder="Email" name="user_email" id="email" required />
          <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>
        <!--  -->
        <div class="col-12">
        <input class="form-control mb-3" type="password" placeholder="Password" name="user_password" id="password"
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
            title="Password must have at least one uppercase, one lowercase, one special character, one digit, and a minimum length of 8 characters"
            required />
            <div class="invalid-feedback">Password requirements not met.</div>
        </div>
        
        <!--  -->
        <div class="col-12">
          <select class="form-control mb-3" name="gender" id="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
          <div class="invalid-feedback">Please select your gender.</div>
        </div>
        <!--  -->
        <div class="col-12">
          <input class="form-control mb-3" type="date" name="date_of_birth" id="date_of_birth" required />
          <div class="invalid-feedback">Please enter your date of birth.</div>
        </div>

        <!--  -->
        <div class="col-12">
        <input class="form-control mb-3" type="text" placeholder="Age" name="age" id="age" required />
        </div>
        
        <!--  -->
        <div class="col-12">
          <input class="form-control mb-3" type="number" placeholder="Aadhaar Number" id="aadhaar_number"
            name="aadhaar_number" required />  
          <div class="invalid-feedback">Please enter your Aadhaar Number.</div>
        </div>
        <!--  -->
        <div class="col-12">
          <input class="form-control mb-3" type="number" placeholder="Phone Number" id="phone_number" name="phone_number"
            required />
          <div class="invalid-feedback">Please enter your phone number.</div>

        </div>
        <!--  -->
        <div class="col-12">
          <input class="form-control mb-3" type="file" name="id_proof" id="id_proof" accept=".jpg, .jpeg, .png, .pdf"
            required />
        </div>
        <button type="submit" class="login-button">Sign Up</button>
      </form>

    </div>
    <div class="form-container sign-in-container">
      <form action="checkinfo.php" method="POST" class="login-form needs-validation" id="login-form" novalidate>
        <h1>SIGN IN</h1>
        <div class="col-12">
          <input class="form-control mt-3 mb-3" type="email" placeholder="UserEmail" name="user_email"  required />
          <div class="invalid-feedback">Please enter a valid email address.</div>
        </div>
        <div class="col-12">
          <input class="form-control" type="password" placeholder="Password" name="password" required />
          <div class="invalid-feedback">Please enter a valid Password.</div>
        </div>
        <a href="./reset_password.html">Forgot your password?</a>
        <button type="submit" class="login-button">Sign In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="login-button ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start the journey with us</p>
          <button class="login-button ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script>
        // LOGIN PAGE SCRIPT
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});


// Enable Bootstrap form validation
(function () {
    'use strict';

    var forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);
    });
  })();
  
    // Call the function to handle messages when the document is ready
    document.addEventListener("DOMContentLoaded", function () {
      handleMessages();
    });
    /// Function to calculate age and update the "Age" field
  function calculateAge() {
    const dobInput = document.getElementById('date_of_birth');
    const ageInput = document.getElementById('age');
    if (dobInput.value) {
      const dob = new Date(dobInput.value);
      const today = new Date();
      const age = today.getFullYear() - dob.getFullYear();
      ageInput.value = age;
    } else {
      ageInput.value = ''; // Reset the age field if Date of Birth is empty
    }
  }

  // Attach the calculateAge function to the Date of Birth input's change event
  const dateOfBirthInput = document.getElementById('date_of_birth');
  dateOfBirthInput.addEventListener('change', calculateAge);
  
</script>
</body>


</html>