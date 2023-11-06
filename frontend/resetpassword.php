<?php
    include_once "./resource/database.php";
    include_once "./resource/utilities.php";


    //if reset password is clicked 
    if(isset($_POST['passwordresetbtn'])){
        $form_errors =array();

        //validate 
        $required_fields =array('email','new_password','confirm_password');
        $form_errors = array_merge($form_errors,check_empty_fields($required_fields));


        //check minimum length
        $field_to_check_length = array("new_password"=>6,"confirm_password"=>6);

        $form_errors =array_merge($form_errors,check_min_length($field_to_check_length));

        //check email

        $form_errors =array_merge($form_errors,check_email($_POST));


        
        if(empty($form_errors)){
            //form is valid 
            $email =$_POST['email'];
            $password1=$_POST['new_password'];
            $password2 =$_POST['confirm_password'];


            if($password1!==$password2){

                $result = "password doesn't match";
            }else{
                try{
                    $sql ="SELECT email FROM users WHERE email =:email";
                    $statement = $db->prepare($sql);
                    $statement->execute(array(":email"=> $email));


                    //check if record exist

                    if($rows= $statement->rowCount()==1){
                        //hash the password
                        $hashed_password = password_hash($password1,PASSWORD_DEFAULT);

                        //update the database with the new password 
                        $sql ="UPDATE users SET password =:password     WHERE email =:email"; 

                        $statement =$db->prepare($sql);
                        $statement->execute(array(":password"=>$hashed_password,":email"=>$email));

                        $result = "password reset successfull";

                    }else{
                        $result ="the email address provided does not exist signup now ";
                    }



                }catch(PDOException $ex){
                    echo "error updting the database";
                }
            }
        }else{
            if(count($form_errors)){
                $result = "there was errors in the form ";
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
    <h3> Password Reset</h3>
    <?php if(isset($result)) echo $result; ?>
    <?php if(!empty($form_errors)) echo show_error($form_errors); ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>email</td>
                <td><input type="text" name="email" id=""></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="new_password" id=""></td>
            </tr>
            <tr>

            <tr>
                <td>Confirm password</td>
                <td><input type="password" name="confirm_password" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input style="float: right;" type="submit" name="passwordresetbtn" value="Signin"></td>
            </tr>
        </table>
    </form>
</body>
</html>