<?php 

$mysqli = require __DIR__ ."./logic.php";

// TO COUNTERCHECK THE SUBMITTED EMAIL FROM THE DATABASE
$sql = sprintf("SELECT * FROM users
            WHERE email ='%s'",
        $mysqli-> real_escape_string($_GET["email"]));

$result = $mysqli->query($sql);

$is_available = $result -> num_rows===0;

header("Content-Type: application/json");
echo json_encode(["available"=> $is_available]);