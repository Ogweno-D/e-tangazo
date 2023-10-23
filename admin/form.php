<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your MySQL database connection details
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

    // Retrieve data from the form
    $fname = $_POST["fname"];
    $lname = $_POST ["lname"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $message = $_POST["message"];

    // SQL query to insert data into your table
    $sql = "INSERT INTO users ( fname, lname, email, number, message) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters to the placeholders
        $stmt->bind_param("sss", $fname , $lname, $email, $number, $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
    // header("Location:index.html");
}
?>