<?php
session_start();

// Check if the user is logged in
// if (!isset($_SESSION['id'])) {
//     // Redirect to the login page or show an error message
//     header("Location: login.php");
//     exit();
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer ></script>
	<script src="./static/validation.js" defer ></script>
    <title>e-tangazo | Tangazo </title>
</head>
<body>

<section>
     <div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-6 col-xl-8 col-lg-8 col-md-10 col-sm-12">
					<div class="text-center ">
						<img src="./admin/etangazo (2).png " alt="logo" width="200">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-4">
							<h1 class="fs-4 card-title fw-bold mb-2 text-center">Tangazo Details</h1>
							<form method="POST" class="needs-validation" action="./process_tangaza.php" id="tangazo" autocomplete="off">
								
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">First Name</label>
									<input id="fname" type="text" class="form-control" name="fname" 
                                    value="" required autofocus>
									
								</div>

                                <div class="mb-3">
									<label class="mb-2 text-muted" for="name">Last Name</label>
									<input id="lname" type="text" class="form-control" name="lname" 
                                    value="" required autofocus>
									
								</div>


								<div class="mb-2">
									<label class="mb-2 text-muted" for="email">Email Address</label>
									<input id="email" type="email" class="form-control" name="email" 
                                    value="" required autofocus>
									
								</div>

                                <div class="mb-2">
									<label class="mb-2 text-muted" for="Phone Number">Phone Number</label>
									<input id="number" type="text" class="form-control" name="number"
                                     value="" required autofocus>
									
								</div>

								<div class="mb-2">
									<label class="mb-2 text-muted" for="message">Message </label>
									<textarea class="form-control"  name="msg" id="msg" cols="30" rows="5"></textarea>
								    
								</div>
                

								<p class="form-text text-muted mb-3">
								This message will be sent to atleast five people or more 
                                depending on the subscription.
								</p>

								<div class="text-center ">
									<button type="submit" class="btn btn-primary">
										Send	
									</button>
								</div>
                               
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								<a href="index.php" class="text-dark">Dashboard</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy;2023 &mdash; e-tangazo
					</div>
				</div>
			</div>
		</div>
</section>

</body>
</html>