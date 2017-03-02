<?php
    include_once 'resources/database.php';
    include_once 'resources/session.php';
    include_once 'resources/functions.php';


    if(isset($_POST['loginBtn'])){

        $form_errors = array();

        $required_fields = array('username', 'password');

        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

        //check form to make sure there are no errors
        if(empty($form_errors)){

          $user      = $_POST['username'];
          $password  = $_POST['password'];


          $query     = "SELECT *
                        FROM users
                        WHERE username=:username";

          $statement = $db->prepare($query);
          $statement->execute(array(':username'=> $user));

          while($row = $statement->fetch()){
              $id = $row['id'];

              $hashed_password = $row['password'];
          }


        }else{

          if(count($form_errors) == 1){

              $result = "<p style='color:red;'>There was one error in the form</p>";

          }else{
              $result = "<p style='color:red;'> There are " .count($form_errors)." errors in the form </p>";
          }
        }
    }

?>

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
    <?php if(isset($result)) echo $result; ?>
    <?php if(!empty($form_errors)) echo display_errors($form_errors); ?>

    <form method="post" action="">

        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" placeholder="Username" name="username">
        </div>

        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>

        <input type="submit" class="btn btn-primary" name="loginBtn"></input>

    </form>

    <p><a href="index.php"> Back </a> </p>

  </body>
</html>
