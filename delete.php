<?php
// got a bit of help from here but had to figure a lot out: https://stackoverflow.com/questions/47495344/delete-specific-row-of-table-using-php

require "configMedals.php";

$id = $_GET['id'];
$table = $_GET['table'];

$sql = "DELETE FROM $table WHERE medalId = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location: home.php");
  }else{
    header("location: home.php");
  }
  
  $conn->close();
  ?>



