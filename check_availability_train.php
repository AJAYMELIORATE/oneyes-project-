<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSeatsRequired = (int)$_POST["user_seats_required"];

    $_SESSION["user_seats_required"] = $userSeatsRequired;

    header("Location: passenger_details_train.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Booking Form</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="aj-navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="./assets/logo.png" alt="" width="100px" height="90px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>
                    <ul class="navbar-nav">
                    </ul>
                </div>
            </div>
        </nav>       
    </div>
    <div class="container mt-4" >
        <div class="row">
            <div class="col-md-6 offset-md-3 pt-2">
                <h2 class="text-center">Booking Form - Train</h2>
                <form action="passenger_details_train.php" method="post">
                    <div class="form-group">
                        <label for="user_seats_required">Number of Seats Required:</label>
                        <input type="number" class="form-control" id="user_seats_required" name="user_seats_required" min="1" max="4">
                    </div>
                    <button type="submit" class="btn btn-primary">Check Availability</button>
                </form>
            </div>
        </div>    
    </div>
<section class="main">
  <section class="main-Facilities">
    <h1>Facilities</h1>
    <div class="Facilities-box">
      
      <div class="Facilities-box">
            <ul>
              <li class="active"></li>
            </ul>
            <div class="Facilities">
              <div class="box">
                <div class="facility-title" >Free Food</div>
                <p></p>
                <button>continue</button>
                <i class="fab fa-html5 html"></i>
              </div>
              <div class="box">
                <div class="facility-title" >Free Snacks</div>
                <p></p>
                <button>continue</button>
                <i class="fab fa-css3-alt css"></i>
              </div>
              <div class="box">
                <div class="facility-title" >Emergency Facilities</div>
                <p></p>
                <button>continue</button>
                <i class="fab fa-js-square js"></i>
              </div>
            </div>
          </div>
    </div>
  </section>
</section>
    <footer class="bg-light text-center text-white">
        <div class="text-center" style="background: #0e0e0c"
        >
        <a class="text-white" font="text-bold">THIS PROJECT IS DONE BY AJAY</a>
        </div>

    </footer>
</body>

</html>
<style>

    body {
        background-color: linear-gradient(90deg, #0C4D3C, #cca91b);
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100px; 
    }
    .container {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        background-color: #73b2e9; /* Set the container background color */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .btn-primary {
        border: 1px solid #007bff;
    }

    .box:nth-child(1) {
    background-image: url('./assets/food.jpg');
  }

  .box:nth-child(2) {
    background-image: url('./assets/snacks.jpg');
  }

  .box:nth-child(3) {
    background-image: url('./assets/medikit.jpg');
  }
  .box {
    /* Add background image for each facility here */
    background-size: cover;
    color: rgb(2, 5, 12);
    text-align: center;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 10px;
  } 
    .footer {
        background: #E5D594;
        background: linear-gradient(90deg, #0C4D3C, #cca91b);
        color: white;
        text-align: center;
        padding: 30px 10px;
        margin-top: auto; /* Push the footer to the bottom */
    }
    .facility-title {
    background: rgba(255, 255, 255, 0.6); /* Adjust the transparency by changing the last value (0.6) */
    padding: 5px;
    border-radius: 5px;
    display:inline;
  }
  .box .facility-title {
    font-weight: bold; /* Make the facility titles bold */
}

/* Facility box button styling */
.box button {
    background: orange; /* Change the button background color to orange */
    color: #fff; /* Set text color to white */
}

/* Facility box button on hover */
.box button:hover {
    background: rgba(223, 70, 15, 0.856);
    color: #fff;
}
</style>