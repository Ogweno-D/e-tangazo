<?php include_once("../frontend/header.php");?>
   <main>
   <form action="../includes/signup.inc.php" method="post" class="form-horizontal">

   <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">First name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control input-lg" id="firstname" placeholder="first name" name="firstname">
    </div>
  </div>

  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">Last name </label>
    <div class="col-sm-10">
      <input type="lastname" class="form-control input-lg" id="lastname" placeholder="last name" name="lastname">
    </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control input-lg" id="email" placeholder="Email" name="email">
    </div>
  </div>

  <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Phone number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control input-lg" id="phone" placeholder="enter phone number" name="phone">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password1">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">confirm Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control input-lg" id="password2" placeholder="confirm Password" name="password2">
    </div>
  </div>
  <div  class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="signup">Sign up</button>
    </div>
  </div>
</form>
   </main>
<?php include_once("../frontend/footer.php") ?>