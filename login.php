<?php
session_start();
require "configLogin.php";

$username = "";
$password = "";
$confirmPassword = $password;
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
          <li ><a href="./index.php">Home</a></li>
          <li><a href="./databaseSearch.php">Search</a></li>
          <li><a href="./register.php">Register</a></li>
          <li class="active"><a href="./login.php">Login</a></li>
        </ul>
      </div>
    </nav>
    <body>
    <div class="registration-container">
        <form class="form-login" action="" method="post">
        <div class="registration-table">
        <h2 id="header">Log In</h2>
            <table>
                <tr>
                    <td><input type="text" name="username" placeholder="Username"></td></tr>
                    <tr><td><input type="text" name="password" placeholder="Password"></td></tr>
                    <tr><td ><input class="button" type="submit" name="submit" value="Login" class="table-submit"></td>
                </tr>
            </table>
            <?php
if(isset ($_POST["submit"])){
  if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

$sql = "SELECT username, password  FROM users WHERE username = '$username' AND password = '$password';";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_fetch_assoc($result);
if ($numrows != 0){
  $_SESSION['username'] = $username;
    header("Location: ./home.php");
}

else {
  ?><p class="warning">Username or password is incorrect</p>
  <?php
}}
else {
  ?><p class="warning">You must enter a username and a password</p>
  <?php

}}

  $conn->close();
  ?> 
            <h4 id="addendum">Don't have an account? <a href="./register.php">Register!</a></h4>

</div>
        </form>
</div>
    </body>
</html>

