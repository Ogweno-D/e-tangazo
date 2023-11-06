<?php 

include_once("../classes/signup.class.php");
class SignupContr extends Signup{

    //add users
    public function addUser($first_name,$last_name,$email,$phone,$password){
        $this->setUser($first_name,$last_name,$email,$phone,$password);
    }
}