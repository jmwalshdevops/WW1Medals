<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "notifications";


$connMsg = new mysqli($servername, $username, $password, $dbname);

if ($connMsg->connect_error){
    die("Connection Failed:".$connMsg->onnect_error);
}
  ?>







