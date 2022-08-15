<?php

class EmailValidation extends \PHPUnit\Framework\TestCase

{
    public function testEmail(){

        $email1 = "jim.bob@gmail.com";
        $email2 = "11111@111";



        $this->assertNotSame($email1, $email2);

    }
}
?>