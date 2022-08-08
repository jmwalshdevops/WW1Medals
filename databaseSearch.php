<?php
require "configMedals.php";
require "validateLogin.php";


$table = $_SESSION['databaseSearch'];
$fInitial = $_SESSION['fInitial'];
$mInitial = $_SESSION['mInitial'];
$surname = $_SESSION['surname'];
$regiment = $_SESSION['regiment'];
$regNumber = $_SESSION['regNumber'];

$sql = "SELECT * FROM $table WHERE fInitial = '$fInitial' OR mInitial = '$mInitial' OR surname = '$surname' OR regiment = '$regiment' OR regNumber = '$regNumber';";
$result = mysqli_query($conn, $sql);

    if ($table == '15star'){
        $tableName = '1914/15 Star';
    }
    else if ($table == 'victory'){
        $tableName = 'Victory'; 
    }   
    else {
        $tableName = 'British War Medal';
    }    
      
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
    <div class="search-banner">
      <h1 >Bring them Home</h1>
          </div>
    <div class="flexbox-container">
        <div class="container5">
        <table class="db2-table">
            <h2  class="table-header">Results for <?php  echo $tableName; ?></h2>
        <?php
        while ($r = mysqli_fetch_array($result))
            {
        ?>
    <tr class="table-tr">
            <td class="initial-cell"><?php echo $r[1]; ?></td>
            <td class="initial-cell"><?php echo $r[2]; ?></td> 
            <td><?php echo $r[3]; ?></td> 
            <td><?php echo $r[4]; ?></td> 
            <td><?php echo $r[5]; ?></td>
            <td> 
      <a href="foundMessage.php?id=<?php echo $r[0]; ?>&&table=<?php echo $table; ?>" ><button>Found</button></a>
    </td> 
        </tr>
        <?php
    }
    ?>
</table>
</div>
<div class="container6"><h2>New Search</h2>    <form action="" method="post">
    <label for="medal">Select a Medal:</label>

    <select name="medal" id="medal">
        <?php 
            if ($table == '15star'){
                ?>
                <option value="15star">1914/15 Star</option>
        <option value="bwm">British War Medal</option>
        <option value="victory">Victory</option>
        <?php
            }
            else if ($table == 'victory'){
                ?>
                <option value="victory">Victory</option>
                <option value="15star">1914/15 Star</option>
                <option value="bwm">British War Medal</option>
        
        <?php
            }   
            else {
                ?>
                <option value="bwm">British War Medal</option>
                <option value="victory">Victory</option>
                <option value="15star">1914/15 Star</option>
                <?php
            }    
        ?>
        
    </select>
<h3>Soldier's Details</h3>
            <table>
            <tr><td>First Initial<span class="required"> *</span></td><td><input type="text" name="fInitial"></td></tr>
                    <tr><td>Middle Initial</td><td><input type="text"  name="mInitial"></td></tr>
                    <tr><td>Surname<span class="required"> *</span></td><td><input type="text"  name="surname"></td>
                    <tr><td>Regiment<span class="required"> *</span></td><td><input type="text"  name="regiment"></td>
                    <tr><td>Regimental Number<span class="required"> *</span></td><td><input type="text"  name="regNumber"></td>
                    <tr><td></td><td><input type="submit" name="submit" value="Submit" class="table-submit"></td>

            </table>
        </form></div>
</div>
        </div>
</body>
</html>
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
        
        header("Refresh:0");
    }
    ?>