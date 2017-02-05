<?php include_once 'resources/database.php'?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <h2>User auth system</h2>

    <h3> Login form</h3>

    <form class="form-inline">
              <label class="sr-only" for="inlineFormInput">Name</label>
              <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Jane Doe">

              <label class="sr-only" for="inlineFormInputGroup">Username</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon"></div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
              </div>


              <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <p><a href="index.php"> Back </a> </p>

  </body>
</html>
