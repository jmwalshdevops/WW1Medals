<?php
require "configMedals.php";
require "validateLogin.php";

?>

<!DOCTYPE html>
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
          <li class="active"><a href="./index.php">Home</a></li>
          <li><a href="./databaseSearch.php">Search</a></li>
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
    <div class="flexbox-container">
      <div class="container1">
        <h1>Your Ancestors Fought...</h1>
        <h1 id="second-header">...And Were Honoured</h1>

        <img id="small-image" src="./trio.png" alt="" />
        <h4>
          We're here to help you find your ancestor's medals and bring them back
          to where they belong - your family.
        </h4>
        <h4>
          Tens of millions of medals were awarded to the men and women who
          fought for the British Army in the First World War. If you don't have
          them, they're out their somewhere.
        </h4>
        <div class="small-container">
          <a href="#database-search"><button>Search the Database</button></a>&nbsp;&nbsp;<a
          href="./medalcheck.php"
          ><button>Add a Medal</button></a
            >
        </div>
      </div>
      <div class="container2"><img src="./ott.avif" alt="" /></div>
    </div>
    <div class="divider" id="database-search">
      <h2 class="descriptor">Search for a Medal</h2>
    </div>
    <div class="flexbox-container">
      <div class="container3"><img src="./dcm.jpeg" /></div>
      <div class="container4"><p>Got a medal and think someone might be searching for it? Well, run it through our database!</p>
      <form action="" method="post">
        <label for="medal">Select a Medal:</label>

    <select name="medal" id="medal">
        <option value="15star">1914/15 Star</option>
        <option value="bwm">British War Medal</option>
        <option value="victory">Victory</option>
    </select>
            <br />
            <br />

    <table>
                    <tr><td>First Initial<span class="required"> *</span></td><td><input type="text" name="fInitial"></td></tr>
                    <tr><td>Middle Initial</td><td><input type="text"  name="mInitial"></td></tr>
                    <tr><td>Surname<span class="required"> *</span></td><td><input type="text"  name="surname"></td>
                    <tr><td>Regiment<span class="required"> *</span></td><td><input type="text"  name="regiment"></td>
                    <tr><td>Regimental Number<span class="required"> *</span></td><td><input type="text"  name="regNumber"></td>

            
      <tr><td></td><td><input class="button" type="submit" name="submit" value="Submit" class="table-submit"></td>
</table>
      </form>
      <?php
      if(isset ($_POST["submit"])){
        $table = $_POST["medal"];

        $fInitial = $_POST["fInitial"];
            $mInitial = $_POST["mInitial"];
            $surname = $_POST["surname"];
            $regiment = $_POST["regiment"];
            $regNumber = $_POST["regNumber"];

        $_SESSION['databaseSearch'] = $table;
        $_SESSION['fInitial'] = $fInitial;
        $_SESSION['mInitial'] = $mInitial;
        $_SESSION['surname'] = $surname;
        $_SESSION['regiment'] = $regiment;
        $_SESSION['regNumber'] = $regNumber;

        header("Location: ./databaseSearch.php");
    }
    ?></div>
      <div class="container3"><img src="./dsc.jpeg" /></div>
    </div>
  </body>
</html>


