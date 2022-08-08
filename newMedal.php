<?php
require "configMedals.php";

session_start();
$user = $_SESSION['username'];
?>
<html>
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
          <li class="active"><a href="./home.php">Profile</a></li>
          <li><a href="./logout.php">Log Out</a></li>
        </ul>
      </div>
    </nav>
    <div class="flexbox-container">
    <div class="container9">
      <h2>Search for a New Medal</h2>
      <p>Select a medal and then enter the soldier's details.</p>
    <form action="" method="post">
    <h3  class="table-header">Soldier's Details</h3>

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
                    <tr><td></td><td><input type="submit" name="submit" value="Submit" class="table-submit"></td>

            </table>
        </form>
        <?php
    if(isset ($_POST["submit"])){
      if(!empty($_POST['fInitial']) && !empty($_POST['surname']) && !empty($_POST['regiment']) && !empty($_POST['regNumber'])) {

            $table = $_POST["medal"];
            $fInitial = $_POST["fInitial"];
            $mInitial = $_POST["mInitial"];
            $surname = $_POST["surname"];
            $regiment = $_POST["regiment"];
            $regNumber = $_POST["regNumber"];


        if (strlen($fInitial) == 1 && strlen($mInitial) == 1 || strlen($mInitial) == 0){
        $existingSoldier = "SELECT * FROM $table WHERE regiment = '$regiment' AND regNumber = '$regNumber'";
        $soldierResult = mysqli_query($conn, $existingSoldier);
        $numrows = mysqli_fetch_assoc($soldierResult);
        if ($numrows == 0){
        $sql = "INSERT INTO $table (fInitial, mInitial, surname, regiment, regNumber, username) VALUES ('$fInitial', '$mInitial', '$surname', '$regiment', '$regNumber', '$user')";
        $result = mysqli_query($conn, $sql);
        ?>
        <h2>Medal Added!</h2>
        <?php
        }
        else{
          ?><p class="warning">Soldier is already in the database</p> 
      <?php
      while ($r = mysqli_fetch_array($soldierResult))
      {
          ?>
    <table>
    <tr class="table-tr">
      <td><?php echo $r[1]; ?></td>
          <td><?php echo $r[2]; ?></td>
          <td><?php echo $r[3]; ?></td> 
          <td><?php echo $r[4]; ?></td>
          <td><?php echo $r[5]; ?></td> 
  
          </tr> 
      </table>
      <p>Check the regiment and regiment number, which are unique to each soldier.</p>
          <?php
      }
        }
      }
      else {
        ?><p class="warning">An initial must be one letter long</p>
      <?php
      }
        
    }else {
      ?><p class="warning">You must enter all the required details</p>
      <?php
      
      }
    
    }

        $conn->close();
    ?>
</div>
<div class="container7">
  <h2>How to Find a Soldier's Details</h2>
  <p?>You'll need to know at least the soldier's first name and last name. This will allow you to search the Medal Index Cards of the First World War. Once you find the correct soldier, you'll receive the rest of his or her details. You'll then be able to add the medal here.</p>
  <p>The Medal Index Cards are available to be searched at the National Archives website <a href="https://www.nationalarchives.gov.uk/help-with-your-research/research-guides/british-army-medal-index-cards-1914-1920/">here</a>.
  <br />
  <br />
  <img src="./mic.jpeg" alt="" />
  <p>These details are impressed on the relevant medals, making each one uniquely identifiable.</p>
  </div>
  </div>
</body>
</html>

