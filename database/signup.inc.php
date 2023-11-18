<?php

include("../classes/signupContr.class.php");
if(isset($_POST["firstname"])){
    $first_name =$_POST["firstname"];
    $last_name=$_POST["lastname"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $password=$_POST["password1"];
    $password=$_POST["password2"];
}

//populate controler class
$signup = new SignupContr();
$signup->addUser($first_name,$last_name,$email,$phone,$password);


//redirect user to home page 
header("Location: ../index.php");

// echo var_dump($_POST);