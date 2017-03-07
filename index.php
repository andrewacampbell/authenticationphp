<?php include_once 'resources/session.php';?>
<?php include_once 'includes/header.php'; ?>
    <!-- <h2>User auth system</h2> -->

  <?php if(!isset($_SESSION['username'])): ?>
    <p> You are currently not signin <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signup</a> </p>
  <?php else: ?>
    <p> You are logged in as <?php echo $_SESSION['username']; ?><a href="logout.php"> Logout </a> </p>
  <?php endif ?>
<?php include_once 'includes/footer.php'; ?>
