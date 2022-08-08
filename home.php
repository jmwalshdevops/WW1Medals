<?php 
require "configMedals.php";
require "configNotifications.php";


session_start();
$user = $_SESSION['username'];


$star15Search = "SELECT * FROM 15star WHERE username = '$user';" ;
$star15Result = mysqli_query($conn, $star15Search);
$victorySearch = "SELECT * FROM victory WHERE username = '$user';" ;
$victoryResult = mysqli_query($conn, $victorySearch);
$bwmSearch = "SELECT * FROM bwm WHERE username = '$user';" ;
$bwmResult = mysqli_query($conn, $bwmSearch);


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
          <li class="active"><a href="">Profile</a></li>
          <li><a href="./logout.php">Log Out</a></li>
        </ul>
      </div>
    </nav>
    <div>
    <h1 class="userWelcome">Welcome <?php echo $user; ?></h1>
</div>
    <div class='flexbox-container'>
      <div class="container7">

      <h2>Your Active Search</h2>
      <p>Below are listed all the medals you are currently searching for</p>
      
    <h3  class="table-header">1914/15 Star</h3>
    <div class="star">
    <table class="home-table">
    <?php
    $numrows1 = mysqli_fetch_assoc($star15Result);
    if ($numrows1 == 0){ ?>
      <div class="no-medals">
      <h4 >No Medals Added</h4>
    </div>
      <?php }else{
    while ($r = mysqli_fetch_array($star15Result))
    {
        ?>
    <tr class="table-tr">
    <td class="initial-cell"><?php echo $r[1]; ?></td>
        <td class="initial-cell"><?php echo $r[2]; ?></td>
        <td><?php echo $r[3]; ?></td> 
        <td><?php echo $r[4]; ?></td>
        <td><?php echo $r[5]; ?></td> 
        <td> 
      <a href="delete.php?id=<?php echo $r[0]; ?>&&table=15star" ><button>Delete</button></a>
    </td>
        </tr> 
        <?php
    }
  }
    ?>

    </table>
</div>
    
    
    <h3  class="table-header" >Victory</h3>
    <div class="victory">
    <table class="home-table">
    <?php
    $numrows2 = mysqli_fetch_assoc($victoryResult);
    if ($numrows2 == 0){ ?>
      <div class="no-medals">
      <h4 >No Medals Added</h4>
    </div>
      <?php }else{
    while ($r = mysqli_fetch_array($victoryResult))
    {
        ?>
    <tr class="table-tr">
    <td class="initial-cell"><?php echo $r[1]; ?></td>
        <td class="initial-cell"><?php echo $r[2]; ?></td>
        <td><?php echo $r[3]; ?></td> 
        <td><?php echo $r[4]; ?></td>
        <td><?php echo $r[5]; ?></td> 
        <td class="button-td"> 
      <a href="delete.php?id=<?php echo $r[0]; ?>&&table=victory" ><button>Delete</button></a>
    </td>
        </tr> 
        <?php
    }
  }
    ?>
    </table>
</div>
    <table  >
    <h3 class="table-header">British War Medal</h3>
    <?php
    $numrows3 = mysqli_fetch_assoc($bwmResult);
    if ($numrows3 != 0){
      while ($r = mysqli_fetch_array($bwmResult))
      {
          ?>
    <tr class="table-tr">
      <td class="initial-cell"><?php echo $r[1]; ?></td>
          <td class="initial-cell"><?php echo $r[2]; ?></td>
          <td ><?php echo $r[3]; ?></td> 
          <td><?php echo $r[4]; ?></td>
          <td><?php echo $r[5]; ?></td> 
          <td class="button-td"> 
        <a href="delete.php?id=<?php echo $r[0]; ?>&&table=bwm" ><button>Delete</button></a>
      </td>
          </tr>  
        <?php
    }
    }
    else
      { 
        ?>
        <div class="no-medals bwm">
        <h4 >No Medals Added</h4>
      </div>
        <?php
  }
    ?>

    </table>
  </div>
  <div class="container8">
    <div class="search-actions">
    <h2>Search Actions</h2>
    <p>Complete additional actions</p>
  <a href="./newMedal.php"><button>Add New Medal</button></a>
</div>
  <h2>Notifications</h2>
  <p>You'll receive notifications on any medals you're looking for here.</p>
  <div class="flexbox-container2">
  <?php 
  $messageSearch = "SELECT * FROM messages WHERE user = '$user';";
  $messageResult = mysqli_query($connMsg, $messageSearch);
      while ($r = mysqli_fetch_array($messageResult))
      {
          ?>          <div class="notification-container">

            <table class="notification-table">
      <tr><td><span class="label-notification">From:</span></td><td><?php echo $r[1]; ?><td></tr>
          <tr><td><span class="label-notification">Contact:</span></td><td><?php echo $r[2]; ?></td></tr>
      </table>
          <p class="notification-message"><?php echo $r[3]; ?><p>
        <a class="button-notification" href="deleteMessage.php?id=<?php echo $r[0]; ?>" ><button>Delete</button></a>
      </div>  
        <?php
    }
  ?>
  </div>
  </div>

  </div>
    </body>
    </html>
