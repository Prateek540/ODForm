<script src="script.js"></script>
<?php 

require 'db.php';

$id= $_POST['id'];


$conn=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $query = "DELETE FROM question WHERE qid=$id";


  $result=$conn->query($query);

  if($result)
  {
    echo '<script type="text/javascript">delq();</script>';
  }
  else
  {
    echo '<script type="text/javascript">undelq();</script>';
  }

?>