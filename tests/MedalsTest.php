<?php
// this video helped with writing tests: https://www.youtube.com/watch?v=kkU43JdJQBE


class UsersTests extends \PHPUnit\Framework\TestCase

{
    public function testMedalsFunctionality(){
        require "configMedals.php";

        $fInitial = "p";
        $mInitial = "h";
        $surname = "test";
        $regNumber = 000000;
        $regiment = "test";
        $testRef = 3;
        $testStatus = 0;


        $insertTest = "INSERT INTO medals (fInitial, mInitial, surname, regNumber, regiment) VALUES ('$fInitial', '$mInitial', '$surname', '$regNumber', '$regiment')";
        $insertResult = mysqli_query($conn, $insertTest);
        $testStatus += 1;

        
        echo "Inserted correctly";

        $selectTest = "SELECT medalId  FROM medals WHERE regiment = '$regiment';";
        $selectResult = mysqli_query($conn, $selectTest);
        echo "Selected correctly";
        while ($r = mysqli_fetch_array($selectResult))
            {
                $id = $r[0];
                $testStatus += 1;
            }

        
        $deleteTest ="DELETE FROM users WHERE medalId = '$id'";
        $deleteResult = mysqli_query($conn, $deleteTest);
        echo "Delete correctly";
        $testStatus += 1;

        $this->assertSame($testStatus, $testRef);
    }


    public function testMedalsValidation(){

        $fInitial = "";
        $mInitial = "";
        $surname = "test";
        $regNumber = 000000;
        $regiment = "test";
        $testRef = 2;
        $testStatus = 0;


        $insertTest = "INSERT INTO medals (fInitial, mInitial, surname, regNumber, regiment) VALUES ('$fInitial', '$mInitial', '$surname', '$regNumber', '$regiment')";
        $insertResult = mysqli_query($conn, $insertTest);
        $testStatus += 1;
        
        $selectTest = "SELECT medalId  FROM medals WHERE regiment = '$regiment';";
        $selectResult = mysqli_query($conn, $selectTest);
        if ($selectResult == 0){
            $testStatus += 1;
        }

        $this->assertSame($testStatus, $testRef);

    }
}

?>