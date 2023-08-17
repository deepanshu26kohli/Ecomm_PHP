<?php
    include './admin_inc/config.inc.php';
    session_start();
    if(isset($_SESSION['true'])){
      header("Location: {$host}/AdminLTE-3.2.0/index.php");
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<body style='background-image: url(Images/login-background.jpg); background-repeat: no-repeat; background-size:cover ;' class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to Admin Panel</p>

      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username_a" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_a" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-4">
            <button type="submit" name='login' class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<?php 
if(isset($_POST['login'])){
  include './admin_inc/config.inc.php';
  $admin_name = mysqli_real_escape_string($conn,$_POST['username_a']);
  $admin_password = md5($_POST['password_a']);
  $sql = sprintf("SELECT `admin_name`,`admin_id` FROM `admin` WHERE `admin_name` = '%s' and `admin_password` = '%s'",$admin_name,$admin_password);
  $result = mysqli_query($conn,$sql) or die("Query failed");
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION["admin_name"] = $row["admin_name"];
    $_SESSION["admin_id"] = $row["admin_id"]; 
    $_SESSION["true"] = true;
    header("Location: {$host}/AdminLTE-3.2.0/index.php");
}
else{
  echo "<p style='color:red;'>Invalid Credentials<p>";
}
}
?>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
