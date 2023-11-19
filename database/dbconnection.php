<?php

    $dbServer = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "cs_bulksms";

    // Create a database connection
    $conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

return $conn;

?>