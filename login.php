<?php include_once 'resources/database.php';?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="css/bootstrap.css"></script>

  </head>

  <body>
    <h2>User auth system</h2>

    <h3> Login Area </h3>

    <form>

        <div class="form-group">
            <label for="Username">Email</label>
            <input type="text" class="form-control" id="Username" placeholder="Username">
        </div>

        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

    </form>

    <p><a href="index.php"> Back </a> </p>

  </body>
</html>
