<!-- This is where the tangazo will be processed and validations done -->

<?php 

    mysqli_report(MYSQLI_REPORT_OFF);

    if (empty($_POST["fname"])){
        die("Your first name is required");
    }
    if (empty($_POST["lname"])){
        die("Your last name is required");
    }

    if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        die("Valid email is required");
    }

    if(strlen($_POST["number"]) < 10){
       die("Enter a valid number");
    }


    $mysqli= require __DIR__ ."./database/logic.php";

    $sql = "INSERT INTO tangazo ( first_name, last_name, email, phone, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->stmt_init();

   if(!$stmt = $mysqli->prepare($sql)){
        die("SQL Error :". $mysqli->error);
   }

        // Bind parameters to the placeholders
     $stmt->bind_param("sssss", $_POST["fname"] , $_POST["lname"] ,$_POST["email"] , $_POST["number"] , $_POST["msg"]);

        // Execute the statement
        if ($stmt->execute()) {
           
          // header("Location: index.php") ;
          header("Location: ./api/api.php  ");
        } else {
           die("MySQL Error: ". $mysqli->error);
        }

    // Close the statement
    $stmt->close();
?>