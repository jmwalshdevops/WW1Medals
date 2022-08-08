<?php

class Example extends \PHPUnit\Framework\TestCase

{
    public function testLoginFunctionality(){
        require "configLogin.php";

        $username = "test";
        $password = "test";

        $insertTest = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $insertResult = mysqli_query($conn, $insertTest);
        echo "Inserted correctly";

        $selectTest = "SELECT id, username, password  FROM users WHERE username = '$username' AND password = '$password';";
        $selectResult = mysqli_query($conn, $selectTest);
        echo "Selected correctly";
        while ($r = mysqli_fetch_array($selectResult))
            {
                $r[0] = $id;
            }
        
        $deleteTest ="DELETE FROM users WHERE Id = '$id'";
        $deleteResult = mysqli_query($conn, $deleteTest);
        echo "Delete correctly";
    }
}
?>