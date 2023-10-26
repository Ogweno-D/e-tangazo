<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-tangazo | Admin </title>
</head>
<body>

<form action="index.php" method="post">
    <p> E-tangazo </p>
    <div>
        <label> First Name</label>
        <input type="text" name="fname" placeholder="Enter your first name!" id="">
    </div>

    <div>
        <label> Last Name</label>
        <input type="text" name="lname" placeholder="Enter your second name!" id="">
    </div>

    <div>
        <label> Email Address</label>
        <input type="email" name="email" placeholder="Enter your email address!" id="">
    </div>

    <div>
        <label> Phone Number</label>
        <input type="text" name="number" placeholder="Enter your phone number!" id="">
    </div>

    <div>
        <label> Message</label>
       <textarea name="msg" id="" cols="30" rows="10"></textarea>
    </div>

    
</form>
    
</body>
</html>