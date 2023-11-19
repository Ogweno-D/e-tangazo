<?php include_once("./includes/header.php");

$is_invalid = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

	$mysqli = require __DIR__ ."./database/logic.php";

	// TO COUNTERCHECK THE SUBMITTED LOGIN CREDENTIALS FROM THE DATABASE

	$sql = sprintf("SELECT * FROM users
				WHERE email ='%s'",
			$mysqli->real_escape_string($_POST["email"])
				);
	$result = $mysqli->query($sql);
	$user= $result ->fetch_assoc();


	if($user) {
	   if(password_verify($_POST["password"], $user["password"])){
		   session_start();
			session_regenerate_id();

		   $_SESSION["user_id"] = $user["id"];

		   if($user["id"] == 21 || $user["id"]== 22){
			header("Location: ./admin/index.php");
		   }else{
		   header("Location: index.php") ;
		   }
		   exit;
	   };
	}


	$is_invalid=true;
}


?>

<main>
   <section class="h-100">  
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-3">
						<img src="./admin/etangazo (2).png" alt="logo" width="200">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
								<?php if($is_invalid): ?>
								<em> Invalid Login details</em> 
								<?php endif;?>

							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								
							<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Email Address</label>
									<input id="email" type="email" class="form-control" name="email"
									 value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"
									 required autofocus>
									
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
										<a href="resetpassword.php" class="float-end">
											Forgot Password?
										</a>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    
								</div>

								<div class="d-flex align-items-center">
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="form-check-input">
										<label for="remember" class="form-check-label">Remember Me</label>
									</div>
									<button type="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="signup.php" class="text-dark">Register</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2023 &mdash; e-tangazo 
					</div>
				</div>
			</div>
		</div>
</section>
<script src="js/login.js"></script>
   </main>


    <!-- <form action="./includes/login.inc.php" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control input-lg" id="inputEmail3" placeholder="Email" name="email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control input-lg" id="inputPassword3" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
            <label>
            <input type="checkbox" name="remember"> Remember me
            </label>
        </div>
        </div>
    </div>
    <div  class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-primary value="Login" name="login">
        <button type="submit" class="btn btn-primary" name="login">Login</button> -->
        <!-- </div>
    </div>
    </form> --> 
</m>
<?php include_once("./includes/footer.php") ?>