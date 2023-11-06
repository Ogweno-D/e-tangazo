<?php include_once("../frontend/header.php");?>
<main>
    <form class="form-horizontal">
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
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </div>
    </div>
    </form>
</main>
<?php include_once("../frontend/footer.php") ?>