<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Project";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection Failed:".$conn->onnect_error);
}
  ?>







