<?php
require "validateLogin.php";

if($validity == true){
    header("location: newMedal.php");
}else{
    header("location: register.php");
}


?>