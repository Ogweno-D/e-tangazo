<?php
    include_once("./resource/session.php");
    include_once("./resource/database.php");
    include_once("./resource/utilities.php");


    if(isset($_POST["login"])){
        //array to hld errors 
        $form_errors= array();

        //validate thr form 

        $required_fields =array("username","password");

        $form_errors =array_merge($form_errors,check_empty_fields($required_fields));

        //form passed all the validation steps 
        if(empty($form_errors)){
           
            //collect form data
            $user =$_POST['username'];
            $password =$_POST['password'];
             //check if user exist in the database
             $sql ="SELECT * FROM users WHERE username =:username";
             $statement =$db->prepare($sql);
             $statement->execute(array(":username"=>$user));

             while($rows=$statement->fetch()){
                $id = $rows['id'];
                $hashed_password =$rows['password'];
                $username =$rows['username'];


                if(password_verify($password,$hashed_password)){
                    $_SESSION["id"]=$id;
                    $_SESSION['username'] =$username;
                    header("Location:index.php");

                }else{
                    $result ="Invalid username or password";
                    $result =flash_message("Invalid username or password");
                }

             }

        }else{
            if(count($form_errors)==1){
                $result =flash_message("there was one error in the form");//"there was one error in the form";
            }else{
                // $result = "there were " .count($form_errors) ." errors in the form";
                $result =flash_message( "there were " .count($form_errors) ." errors in the form");
            }
        }
    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>User Authentication system </h2>
    <h3>Login form</h3>
    <?php if(isset($result)) echo $result; ?>
    <?php if(!empty($form_errors)) echo show_error($form_errors); ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>username</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td><a href="#">forgoten  password</a></td>
                <td><input style="float: right;" type="submit" name="login" value="Signin"></td>
            </tr>
        </table>
    </form>
    <p><a href="index.php">Back</a></p>
</body>
</html>