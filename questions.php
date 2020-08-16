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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Ask questions</title>
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
        <a class="nav-link" href="answers.php">Give Answers</a>
      </li>
    </ul>

    <?php
    if(isset($_SESSION['username']))
    {
    ?>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
    </ul>


    <?php
    }
    else 
    {
        
    ?>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i> Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php"><i class="fas fa-users-cog"></i> Admin</a>
      </li>
    </ul>

    <?php
    }
    ?>

  </div>
</nav>








<div class="forum">
<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
  <div class="form-group">
    <label for="question">Question</label>
    <textarea name="ques" id="" cols="50" rows="10" class="form-control"></textarea>
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
    if(isset($_SESSION['username']))
    {
        $message=$_POST['ques'];
        $username=$_SESSION['username'];
        if($message=='')
        echo '<script type="text/javascript">quesempty();</script>';
        else
        {
            $conn=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);

        if ($conn->connect_error)
        {
          die("Connection failed: " . $conn->connect_error);
        }

        $query="SELECT id FROM user WHERE username='$username' LIMIT 1";
        $result=$conn->query($query);
        $row=$result->fetch_assoc();
        $uid=$row['id'];
        $query="INSERT INTO question(idq, ques) VALUES('$uid','$message')";
        if($conn->query($query))
        {
            echo '<script type="text/javascript">quesubmit();</script>';
        }
        else
        {
            echo '<script type="text/javascript">unque();</script>';
        }
        }
    }
    else
    {
        echo '<script type="text/javascript">queslogged();</script>';

    }
}


?>