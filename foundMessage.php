<?php
require "configMedals.php";
require "validateLogin.php";
require "configNotifications.php";


use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

require __DIR__ . '/vendor/autoload.php';


$id = $_GET['id'];
$table = $_GET['table'];

?>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./style.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">MedalFinder</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="./index.php">Home</a></li>
          <li class="active"><a href="./databaseSearch.php">Search</a></li>
          <?php
          if($validity == true){
            ?><li><a href="./home.php">Profile</a></li><?php
          }
          else{ ?>
          <li><a href="./register.php">Register</a></li><?php } ?>
          <?php
          if($validity == true){
            ?><li><a href="./logout.php">Log Out</a></li><?php

          }
          else{ ?>
          <li>
            <a href="./login.php">Login</a></li><?php } ?>
        </ul>
      </div>
    </nav>
    <div class="found-banner">
      <h1 >Bring them Home</h1>
          </div>
    <div class="flexbox-container">
        <div class="container9">
            <h2  class="table-header">Selected Medal</h2>
            <table class="db2-table">
    <?php
    $sql = "SELECT * FROM $table WHERE medalId = '$id';";
    $result = mysqli_query($conn, $sql);
    while ($r = mysqli_fetch_array($result))
            {
        ?>
    <tr class="table-tr">
            <td class="initial-cell"><?php echo $r[1]; ?></td>
            <td class="initial-cell"><?php echo $r[2]; ?></td> 
            <td><?php echo $r[3]; ?></td> 
            <td><?php echo $r[4]; ?></td> 
            <td><?php echo $r[5]; ?></td>
        </tr>
        
        <?php
        $owner = $r[6];
    }
    ?>
    </table>
</div>
    <div class="container7">
    <h2>Contact the Person Looking For It</h2>
    <form action="" method="post" id="msgform">    

            <table>
                    <tr><td>Your Name<span class="required"> *</span></td><td><input type="text" name="name"></td></tr>
                    <tr><td>Your Email<span class="required"> *</span></td><td><input type="text"  name="email"></td></tr>
                    <tr><td>Message<span class="required"> *</span></td><td><textarea name="message" form="msgform" rows="4" cols="50" placeholder="Enter text here..."></textarea></td>
                    <tr><td></td><td><input type="submit" name="submit" value="Submit" class="table-submit"></td>

            </table>
        </form>
        <?php
        if(isset ($_POST["submit"])){
      if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];


            $validator = new EmailValidator();

        if ($validator->isValid("$email", new RFCValidation())){
            $submsg = "INSERT INTO messages (name, email, message, user) VALUES ('$name', '$email', '$message', '$owner');";
            $resultMsg = mysqli_query($connMsg, $submsg);
            ?>
            <h3>Message submitted!</h3>
            <?php
        }else{ ?><p class="warning">Invalid email</p>
          <?php
          }

      }else{
        ?><p class="warning">All fields are required</p>
          <?php
      }
    }
            ?>
</div>
</div>
