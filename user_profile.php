<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <link rel="stylesheet" href="./user_profile.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <div class="navbar-top">
        <div class="title">
            <h1>User - Profile</h1>
        </div>     
    </div>

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="./assets/logo.png" alt="" width="70" height="60">
            <div class="url">
                <a href="./user dashboard.html">Dashboard</a>
            </div>            
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="#profile" class="active">Profile</a>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <form action = "edit_user_profile.php" method="post" >
                    <div class="form-row">
                    <?php
                        session_start();
                    ?>                                    
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="inputname" name="user_name" placeholder="Name" value="<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" id="inputEmail" name="user_email" placeholder="Email" value="<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="inputPhone" name="phone_number" placeholder="phone" value="<?php echo isset($_SESSION['phone_number']) ? $_SESSION['phone_number'] : ''; ?>">
                        </div>
                        </div>
                        <button type="submit" name="update_profile">Update Profile</button>
                        </div>
                  </form>
            </div>
        </div>     
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit" ></i>
                <div class="social-media">
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-invision fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>