<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Sign up</title>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="about.php">Discussion Forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="questions.php">Ask Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="answers.php">Give Answers</a>
      </li>
    </ul>
  </div>
</nav>




<h2 style="text-align: center; margin-top: 5vh"><i class="fas fa-user-plus 5x"></i> Sign up</h2>



<div class="forum">
<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
<div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="userId" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="emailId" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="passId" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>


</body>
</html>






<?php

require 'db.php';

if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];


  if($username=='' || $email=='' || $password=='')
  {
    echo '<script type="text/javascript">signupunfilled();</script>';
    exit();
  }

  $conn=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $query="INSERT INTO user(username, email, password) VALUES('".$_POST['username']."','".$_POST['email']."','".$_POST['password']."')";
  
  if($conn->query($query))
  {
    $_SESSION['username']=$username;
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    echo '<script type="text/javascript">submitted();</script>';
  }
  else
  {
    echo '<script type="text/javascript">notsubmitted();</script>';
  }
  





}    

?>