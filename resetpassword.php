<?php
    // include_once __DIR__."/resource/database.php";
    // include_once "./resource/utilities.php";


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
                    echo "error updating the database";
                }
            }
        }else{
            if(count($form_errors)){
                $result = "There were no errors in the form ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>E-tangazo| Reset password</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-2  ">
						<img src="./public/etangazo (2).png" alt="logo" width="200">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-3">Reset Password</h1>

                            <?php if(isset($result)) echo $result; ?>
                            <?php if(!empty($form_errors)) echo show_error($form_errors);?>


							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-2">
									<label class="mb-2 text-muted" for="password">New Password</label>
									<input id="password" type="password" class="form-control" name="password" value="" required autofocus>
									
								</div>

								<div class="mb-2">
									<label class="mb-2 text-muted" for="password-confirm">Confirm Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirm" required>
								    
								</div>

								<div class="d-flex align-items-center   ">
									<div class="form-check">
										<input type="checkbox" name="logout_devices" id="logout" class="form-check-input">
										<label for="logout" class="form-check-label">Logout all devices</label>
									</div>

									<button type="submit" class="btn btn-primary ms-auto">
										Reset Password	
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy;2023 &mdash;e-tangazo 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>


































<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> Password Reset</h3>
    <?php if(isset($result)) echo $result; ?>*
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
</html> -->