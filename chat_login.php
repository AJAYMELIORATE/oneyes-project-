<?php
include "db_connection.php";
session_start();

if(isset($_POST["user_email"]) && isset($_POST["user_phone"])){
  
  $user_email=$_POST["user_email"];
  $user_phone=$_POST["user_phone"];

  $q="SELECT * FROM `register` WHERE user_email='$user_email' && user_phone='$user_phone'";
  
  if($rq=mysqli_query($db,$q)){

    if(mysqli_num_rows($rq)==1){
      
      $_SESSION["user_email"]=$user_email;
      $_SESSION["user_phone"]=$user_phone;
      header("location: help.php");

    }else{


      $q="SELECT * FROM `register` WHERE user_phone='$user_phone'";
      if($rq=mysqli_query($db,$q)){
        if(mysqli_num_rows($rq)==1){
          echo "<script>alert($user_phone+' is already taken by another person')</script>";
        }else{

          $q="INSERT INTO `register`(`user_email`, `user_phone`) VALUES ('$user_email','$user_phone')";
          if($rq=mysqli_query($db,$q)){
            $q="SELECT * FROM `register` WHERE user_email='$user_email' && user_phone='$user_phone'";
            if($rq=mysqli_query($db,$q)){
              if(mysqli_num_rows($rq)==1){

                $_SESSION["user_email"]=$user_email;
                $_SESSION["user_phone"]=$user_phone;
                header("location: help.php");

              }
            }

          }

        }
      }
    }
  }


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChatRoom</title>
  <link rel="stylesheet" href="chat_login.css">
</head>
<body>
  <h1>ChatRoom</h1>
  <div class="login">
    <h2>Login</h2>
    <p>This login process is made to store the user'S information whom use chat option  </p>
    <form action="" method="post">

      <h3>User Email</h3>
      <input type="text" placeholder="Email" name="user_email">

      <h3>Mobile No:</h3>
      <input type="number" placeholder="with country code" min="1111111" max="999999999999999" name="user_phone">

      <button>Login</button>

    </form>
  </div>
</body>
</html>