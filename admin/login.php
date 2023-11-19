<?php

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

		   header("Location: index.php");
		   exit;
	   };
	}

	$is_invalid=true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <meta name="author" content="Muhamad Nauval Azhar"> -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>E-tangazo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer ></script>
	<script src="./static/validation.js" defer ></script>
</head>
<body>
<main>
   <section class="h-100">  
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-3">
						<img src="etangazo.png" alt="logo" width="200">
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
</body>
</html>