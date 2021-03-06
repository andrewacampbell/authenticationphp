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

          //get values user enter
          $user      = $_POST['username'];
          $password  = $_POST['password'];

          //check databasse to see if user exists
          $query     = "SELECT *
                        FROM users
                        WHERE username=:username";

          $statement = $db->prepare($query);
          $statement->execute(array(':username'=> $user));

          while($row = $statement->fetch()){
              $id               = $row['id'];

              $hashed_password  = $row['password'];

              $username         = $row['username'];
          }
              if(password_verify($password, $hashed_password)){
                  $_SESSION['id'] = $id;
                  $_SESSION['username'] = $username;
                  header("location: index.php");
              }else{
                $result = "<p style='padding: 20px; color: red; border:1px solid grey;'> Invalid username or password</p>";
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

<?php include_once 'includes/header.php'; ?>
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
<?php include_once 'includes/footer.php'; ?>
