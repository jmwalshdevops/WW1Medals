<?php
require "configNotifications.php";

$id = $_GET['id'];

$sql = "DELETE FROM messages WHERE id = '$id'";

if ($connMsg->query($sql) === TRUE) {
    header("location: home.php");
  }else{
    header("location: home.php");
  }
  
  $conn->close();
  ?>



