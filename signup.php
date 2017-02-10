<?php include_once 'resources/database.php';

//getting values users enter into form
if(isset($_POST['username'])){

    $username        = $_POST['username'];
    $email           = $_POST['email'];
    $password        = $_POST['password'];
    $password2       = $_POST['password2'];

    $encryp_password = 

    //building query to insert
    $insertqry  = "INSERT INTO users (username, password, email, join_date)
                  VALUES (:username, :password, :email, now())";

    //prepare query - sanitize
    $statement = $db->prepare($insertqry);

    //execute sql stmt
    try{
    $statement->execute(array(':username' => $username,
                              ':email'    => $email,
                              ':password' => $password
                              ));

      if($statement->rowCount() == 1){
          $result = "<p> Registered succeffully!</p>";
      }

    }catch(PDOException $ex){
        $result = "<p> Registered succeffully!</p>".$ex->getMessage();
    }

}

?>

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

    <?php if(isset($result)){

        echo $result;

    } ?>

    <form method="post" action="">

        <div class="form-group">
            <label for="userName">UserName</label>
            <input type="text" class="form-control" id="userName" placeholder="userName" name="username">
        </div>

        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
        </div>

        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>

        <div class="form-group">
            <label for="inputPassword">Verify Password</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="Password2" name="password2">
        </div>

        <button type="submit" class="btn btn-primary">SignUp</button>
    </form>

    <p><a href="index.php"> Back </a> </p>

  </body>
</html>
