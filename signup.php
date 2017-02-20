<?php include_once 'resources/database.php';
      include_once 'resources/functions.php';


if(isset($_POST['signupBtn'])){

//array to store form errors
  $form_errors = array();

  $required_fields = array('username','email','password');

//check values passed in by users to see if they are empty
$form_errors = array_merge(check_empty_fields($required_fields));

$minimum_length_fields = array('username' => 4, 'password' => 8);

$form_errors = array_merge($form_errors, check_min_length($minimum_length_fields));

$form_errors = array_merge($form_errors, check_email($_POST));



   if(empty($form_errors)){

     $username               = $_POST['username'];
     $email                  = $_POST['email'];
     $password               = $_POST['password'];

          $encrypt_password = password_hash($password, PASSWORD_DEFAULT);

          $insertqry = "INSERT INTO users (username, password, email, join_date)
                        VALUES(:username, :password, :email, now())";

          $statement = $db->prepare($insertqry);

        try{

            $statement->execute(array(':username'     => $username,
                                      ':email'        => $email,
                                      ':password'     => $encrypt_password));

        if($statement->rowCount() == 1){
            $result = "<p>Registered succeffully</p>";
        }

      }catch(PDOException $ex){
          $result = "<p> An error as occur</p>".$ex->getMessage();
      }

  }else{

        if(count($form_errors) == 1){

            $result = "<p style ='color:red';> There are one error in the form <br>";


              $result.= "</ul></p>";
      }else{
              $result = "<p style='color:red;'> There were " .count($form_errors) . " there are errors in the form</br>";

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

    <?php if(isset($result))echo $result; ?>
    <?php if(!empty($form_errors)) echo display_errors($form_errors); ?>

    <h3> Login Area </h3>

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

        <button type="submit" class="btn btn-primary" name="signupBtn">SignUp</button>
    </form>

    <p><a href="index.php"> Back </a> </p>

  </body>
</html>
