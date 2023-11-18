<?php

include("../classes/logincontr.class.php");

$email = $_POST["email"];
$password=$_POST["password"];


//populate controler class
$login= new LoginContr($email,$password);


header("Location: ../index.php");