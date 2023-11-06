<?php 

    include_once("./resource/database.php");
    include_once("./resource/utilities.php");



    //with validation
    if(isset($_POST['signupbtn'])){
        $form_errors =array();

    //required fields 
    $required_fields = array('email','username','password');
    

    //check for empty field and add the return result to user interface 
    $form_errors = array_merge($form_errors,check_empty_fields($required_fields ));

    $field_to_check_length=array('username'=>4,'password'=>6);

    //minimum length

    $form_errors =array_merge($form_errors,check_min_length($field_to_check_length));

    //validate the email
    $form_errors = array_merge($form_errors,check_email($_POST));
  

    //collect | get  data posted  from the form 
    if(empty($form_errors)){
        $email =$_POST['email'];
        $username =$_POST['username'];
        $password =$_POST['password'];

        $hashed_password = password_hash($password,PASSWORD_DEFAULT);

        try{
        //sql query
        $sql= "INSERT INTO users(username,email,password,joined_date)
                VALUES (:username,:email,:password, now()";
        //sanitize sql statement 
        $statements = $db->prepare($sql);
        //execute
        $statements->execute(array(":username"=>$username,"email"=>$email,":password"=>$hashed_password));
        if($statements->rowCount()==1){
            // $results=  "<p>registration successfull</p>";
            $results=flash_message("registration successfull",'pass');
        }

        }catch(PDOException $e){
            // $results= "Error something went wrong ". $e->getMessage();
            $results=flash_message("Error something went wrong");
        }
    }else{
        if(count($form_errors)==1){
            $results =" there was one error in the form";
            foreach($form_errors as $error){
                $results .=$error;
            }
        }else{
            // $results ="there were " . count($form_errors) ." errors in the form";
            $results=flash_message("errors in the form");
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
    <h3>register form</h3>

    <?php if(!empty($form_errors)) echo show_error($form_errors); ?>

    <form action="" method="post">
        <table>
            <tr>

            <tr>
                <td>Email</td>
                <td><input type="text" name="email" id=""></td>
            </tr>

                <td>username</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            
            <tr>
                <td>password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <!-- <tr>
                <td>password Repeat</td>
                <td><input type="password" name="" id=""></td>
            </tr> -->
            <tr>
                <td></td>
                <td><input style="float: right;" type="submit" name="signupbtm" value="Signup"></td>
            </tr>
        </table>
    </form>
    <p><a href="index.php">Back</a></p>
</body>
</html>