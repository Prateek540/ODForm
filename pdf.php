<?php


$output= '';

$output .='
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Q with A</title>
</head>
<body>

<div class="section">

<table class="table">

<tr>
    <th>Question</th>
    <th>Asked By</th>
</tr>';



require 'db.php';

$id=$_POST['id'];


$conn=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}


$query="SELECT question.ques, user.username FROM user,question WHERE qid='$id' AND idq=id LIMIT 1";

$result=$conn->query($query);

$row=$result->fetch_assoc();

        if ($conn->connect_error)
        {
          die("Connection failed: " . $conn->connect_error);
        }

        if($row > 0)
        {
        $output.= "<tr>"."<td>".$row['ques']."</td>"."<td>".$row['username']."</td>"."</tr>";
        }
        else
        {

        }





$output.='</table>



<table class="table">

<tr>
  <th>Answers</th>
  <th>Answered By</th>
</tr>';






require 'db.php';

$id=$_POST['id'];


$conn=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}


$query="SELECT answer.ans, user.username FROM user,answer WHERE answer.qid='$id' AND answer.ida=user.id";

$result=$conn->query($query);
if($result)
{

        if ($conn->connect_error)
        {
          die("Connection failed: " . $conn->connect_error);
        }

        if($row > 0)
        {
        while($row = $result->fetch_assoc()) 
        {
        $output.= "<tr>"."<td>".$row['ans']."</td>"."<td>".$row['username']."</td>"."</tr>";
        }
        }   
        else
        {

        }
    }



$output.='</div>

</table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script.js"></script>


</body>
</html>';






require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$document = new Dompdf();

$html = $output;

$document -> loadHtml($html);

$document -> setPaper('A4','landscape');

$document -> render();

$document ->stream("Online Discussion Forum", array("Attachment" => 0));




?>