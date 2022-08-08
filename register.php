<?php
require "configLogin.php";

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

require __DIR__ . '/vendor/autoload.php';

$username = "";
$password = "";
?>

<html>
<head>
<link rel="stylesheet" href="./style.css" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
          <li><a href="./databaseSearch.php">Search</a></li>
          <li class="active"><a href="./register.php">Register</a></li>
          <li><a href="./login.php">Login</a></li>
        </ul>
      </div>
    </nav>
    <div class="registration-container">
    <form class="form-register" action="" method="post">
        <div class="registration-table">
            <h2 id="header">Create an Account</h2>
            <table >
                <tr>
                    <td>Username</td><td><input type="text" name="username" placeholder="Username"></td></tr>
                    <tr><td>Email</td><td><input type="text" name="email" placeholder="Email"></td></tr>
                    <tr><td>Password</td><td><input type="text" name="password" placeholder="Password"></td></tr>
                    <tr><td>Confirm Password</td><td><input type="text"  name="confirm" placeholder= "Confirm Password"></td></tr>
                    <tr><td></td><td ><input type="submit" name="submit" value="Submit" class="table-submit"></td>
                </tr>
            </table>
            <?php
    if(isset ($_POST["submit"])){
      if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm']) && !empty($_POST['email'])) { 
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm = $_POST["confirm"];
            $email = $_POST["email"];

        $validator = new EmailValidator();
        if ($validator->isValid("$email", new RFCValidation())){
        if ($password === $confirm){
        $existingUsername = "SELECT username  FROM users WHERE username = '$username'";
        $usernameResult = mysqli_query($conn, $existingUsername);
        $numrows = mysqli_fetch_assoc($usernameResult);
        if ($numrows == 0){
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);
        }
        else {
          ?><p class="warning">Username is not available</p>
          <?php
        }
        }
        
        else {
          ?><p class="warning">Passwords do not match</p>
          <?php
        
        }
      }else {
        ?><p class="warning">You must enter a valid email</p>
          <?php
      }
      }
    else {
      ?><p class="warning">You must enter a username and password</p>
      <?php
    }}

        $conn->close();
    ?>
            <h4 id="addendum">Already have an account? <a href="./login.php">Log In!</a></h4>
</div>
        </form>
</div>
    </body>
</html>

