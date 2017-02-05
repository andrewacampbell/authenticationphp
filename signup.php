<?php include_once 'resources/database.php'?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register Page</title>
    <!--<script src="js/jquery-3.1.1.min.js"></script>-->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <!--<script src="css/bootstrap.css"></script>-->
  </head>

  <body>
    <h2>User auth system</h2>

    <h3> Register Area </h3>
    <form>

        <div class="form-group">
            <label for="userName">UserName</label>
            <input type="text" class="form-control" id="userName" placeholder="userName">
        </div>

        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="inputPassword">Verify Password</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="Password2">
        </div>

        <button type="submit" class="btn btn-primary">SignUp</button>
    </form>

    <p><a href="index.php"> Back </a> </p>

  </body>
</html>
