<!-- This is where the signup will be processed and validations done -->

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

    if(strlen($_POST["password"]) < 8){
       die("Your password must con tain atleast 8 characters");
    }
    if(! preg_match("/[a-z]/i", $_POST["password"])){
        die("Your password must contain atleast one letter");
    } 

    if(! preg_match("/[0-9]/", $_POST["password"])){
        die("Password must contain atleast one letter");
    }

    if($_POST["password"] != $_POST["pwd"]){
    die("Passwords must match"); 
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


    $mysqli= require __DIR__ ."./logic.php";

    $sql = "INSERT INTO users ( fname, lname, email, number, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->stmt_init();

   if(!$stmt = $mysqli->prepare($sql)){
        die("SQL Error :". $mysqli->error);
   }

        // Bind parameters to the placeholders
     $stmt->bind_param("sssss", $_POST["fname"] , $_POST["lname"] ,$_POST["email"] , $_POST["number"] , $password_hash );

        // Execute the statement
        if ($stmt->execute()) {
           
           header("Location: index.php") ;
        } else {
            if($mysqli->errno === 1062){
                die("Email already taken:");
               } else{
                die($mysqli->error." " .$mysqli->errno);
                }
        }

    // Close the statement
    $stmt->close();
?>