<script src="script.js"></script>
<?php
session_start();

require 'db.php';

 
if(isset($_POST['submit']))
{
    if(isset($_SESSION['username']))
    {
      $qid=$_POST['id'];
      $message=$_POST['ans'];
      $username=$_SESSION['username'];
      if($message=='')
      echo '<script type="text/javascript">ansempty();</script>';
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

        $query="INSERT INTO answer(qid, ida, ans) VALUES('$qid','$uid','$message')";
        if($conn->query($query))
        {
            echo '<script type="text/javascript">anssubmit();</script>';
        }
        else
        {
           echo '<script type="text/javascript">unans();</script>';
        }

      }

       
    }
    else
    {
        echo '<script type="text/javascript">anslog();</script>';

    }
}



?>


