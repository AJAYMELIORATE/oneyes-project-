<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="./admin_dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    <div class="aj-navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="./assets/logo.png" alt="" width="100px" height="90px">
            </a>
            <div class="navbar">    
                <h1>Bus Ticketing System </h1>   
            </div> 
        </nav>         
        </div> 
            <section id="dashboard">                
                <div id="status">
                    <div id="Booking" class="info-box status-item">
                        <div class="heading">
                            <h5>Bookings</h5>
                        <div class="info">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                    </div>
                    <div class="info-content">
                        <p>Total Bookings</p>
                        <p class="num" >
                        </p>
                    </div>
                    <a href="getting_bookinginfo.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Bus" class="info-box status-item">
                    <div class="heading">
                        <h5>Buses</h5>
                        <div class="info">
                            <i class="fas fa-bus"></i>
                        </div>
                    </div>
                    <div class="info-content">
                        <p>Total Buses</p>
                        <p class="num" >      
                        </p>
                    </div>
                    <a href="./getting_businfo.php">View More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div id="Route" class="info-box status-item">
                    <div class="heading">
                        <h5>Routes</h5>
                        <div class="info">
                            <i class="fas fa-road"></i>
                        </div>
                    </div>
                    <div class="info-content">
                        <p>Total Routes</p>
                        <p class="num" >
                        </p>
                    </div>
                    <a href="./route.php">View More <i class="fas fa-arrow-right"></i></a>
                </div>
                <div id="Booking" class="info-box status-item">
                    <div class="heading">
                        <h5>Tickets</h5>
                    <div class="info">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                </div>
                <div class="info-content">
                    <p>Total Tickets</p>
                    <p class="num" >
                    </p>
                </div>
                <a href="getting_ticketinfo_admin.php">View More <i class="fas fa-arrow-right"></i></a>
                </div>              
            </div>
            <div id="user">
                <div id="Customer" class="info-box user-item">
                    <div class="heading">
                        <h5>Customers</h5>
                        <div class="info">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="info-content">
                        <p>Total Customers</p>
                        <p class="num" >
                            
                        </p>
                    </div>
                    <a href="./getting_customerinfo.php">View More <i class="fas fa-arrow-right"></i></a>
                </div> 
            </div>
        </section>      
    </div>
</body>
</html>   