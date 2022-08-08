<?php
// help received from here: https://stackoverflow.com/questions/41994305/how-to-use-if-else-condition-for-login-logout-in-php I then figured that I could create a required file to use it everywhere required
session_start();

if(isset($_SESSION['username'])){
    $validity = true;
}else{
    $validity = false;
}

?>