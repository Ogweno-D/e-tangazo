<?php 

$mysqli = require __DIR__ ."./database/dbconnection.php";

// TO COUNTERCHECK THE SUBMITTED EMAIL FROM THE DATABASE
$sql = sprintf("SELECT * FROM users
            WHERE email ='%s'",
        $mysqli->real_escape_string($_GET["email"]));

$result = $mysqli->query($sql);

$is_available = $result -> num_rows===0;

header("Content-Type: application/json");
echo json_encode(["available"=> $is_available]);

// // TO COUNTERCHECK THE SUBMITTED EMAIL FROM THE DATABASE
// $sql = "SELECT * FROM users WHERE email = ?";
// $stmt = $mysqli->prepare($sql);

// // Bind the email parameter
// $stmt->bind_param("s", $_GET["email"]);

// // Execute the query
// $stmt->execute();

// // Get the result
// $result = $stmt->get_result();

// // Check if the email is available
// $is_available = $result->num_rows === 0;

// // Close the statement
// $stmt->close();

// // Set the response headers
// header("Content-Type: application/json");

// // Send the JSON response
// echo json_encode(["available" => $is_available]);
