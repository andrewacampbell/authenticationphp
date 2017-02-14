<?php include_once 'resources/database.php';

if(isset($_POST['signupBtn'])){

//array to store form errors
  $form_errors = array();

  $required_fields = array('username','email','password','password2');

//loop through each required field.
  foreach($required_fields as $field_name){
    if(!isset($_POST[$field_name) || $field_name == NULL]){
        $form_errors[] = $field_name
    }
  }

   if(empty($form_errors)){

     $username        = $_POST['username'];
     $email           = $_POST['email'];
     $password        = $_POST['password'];
     $password2       = $_POST['password2'];


     if($password == $password2){

     }

   }



}



//getting values users enter into form
if(isset($_POST['username'])){

    $username        = $_POST['username'];
    $email           = $_POST['email'];
    $password        = $_POST['password'];
    $password2       = $_POST['password2'];

    if($password == $password2){


        $encryp_password = password_hash($password, PASSWORD_DEFAULT);

        //building query to insert
        $insertqry  = "INSERT INTO users (username, password, email, join_date)
                      VALUES (:username, :password, :email, now())";

        //prepare query - sanitize
        $statement = $db->prepare($insertqry);

        //execute sql stmt
        try{
        $statement->execute(array(':username' => $username,
                                  ':email'    => $email,
                                  ':password' => $encryp_password
                                  ));

          if($statement->rowCount() == 1){
              $result = "<p> Registered succeffully!</p>";
          }

        }catch(PDOException $ex){
            $result = "<p> Registered succeffully!</p>".$ex->getMessage();
        }
    }else{
      echo "  password dosen't match ";
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

        <button type="submit" class="btn btn-primary" name="signupBtn">SignUp</button>
    </form>

    <p><a href="index.php"> Back </a> </p>

  </body>
</html>
