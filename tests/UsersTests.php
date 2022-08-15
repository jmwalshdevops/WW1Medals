<?php
// this video helped with writing tests: https://www.youtube.com/watch?v=kkU43JdJQBE


class UsersTests extends \PHPUnit\Framework\TestCase

{
    public function testLoginFunctionality(){
        require "configLogin.php";

        $username = "test";
        $password = "test";
        $testRef = 3;
        $testStatus = 0;


        $insertTest = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $insertResult = mysqli_query($conn, $insertTest);
        $testStatus += 1;

        
        echo "Inserted correctly";

        $selectTest = "SELECT id, username, password  FROM users WHERE username = '$username' AND password = '$password';";
        $selectResult = mysqli_query($conn, $selectTest);
        echo "Selected correctly";
        while ($r = mysqli_fetch_array($selectResult))
            {
                $id = $r[0];
                $testStatus += 1;
            }

        
        $deleteTest ="DELETE FROM users WHERE Id = '$id'";
        $deleteResult = mysqli_query($conn, $deleteTest);
        echo "Delete correctly";
        $testStatus += 1;

        $this->assertSame($testStatus, $testRef);
    }


    public function testEmailValidation(){

        $email1 = "jim.bob@gmail.com";
        $email2 = "11111@111";
        $email3 = "bobby";
        
        $this->assertNotSame($email1, $email2);

    }
}

?>