<?php

	session_start();
	$_SESSION

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-tangazo | Dasboard</title>
</head>
<body>
	<?php if (isset($_SESSION["user_id"])): ?> 
		<p> You are logged in</p>

	<?php else: ?>
		<p><a href="login.php"> Log in</a> or <a href="./signup.php"></a> </p>
	
	<?php endif; ?>

	
</body>
</html>