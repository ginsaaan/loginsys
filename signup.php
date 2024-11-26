<?php

/**
 * signup
 * @package loginsys
 * 
 */
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include "partials/_dbconnect.php";
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $sql = "SELECT * FROM `users` WHERE `username` = '$username';";
  $exists = mysqli_query($conn, $sql);
  $numrowExists = mysqli_num_rows($exists);
  if ($numrowExists == 1) {
    $showError = "The username already exists";
  } else {
    if (($cpassword == $password)) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES (NULL, '$username' , '$hash' , current_timestamp());";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showAlert = true;
      }
    } else {
      $showError = "The passwords don't match";
      // echo "confirm password and password doesnot match";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous" />

  <title>SignUp</title>
</head>

<body>
  <?php require "partials/_nav.php";
  if ($showAlert) {
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> You have successfully signed in now you can go and login
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php }
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>' . $showError . '
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
  }
  // if ($) {
  //   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  //     <strong>Error</strong> Username already exists use a different username.
  //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  //       <span aria-hidden="true">&times;</span>
  //     </button>
  //   </div>';
  // }
  ?>



  <!-- // Form for signup -->
  <div class="container my-4">
    <h3>SignUp</h3>
    <form action="/loginsys/signup.php" method="POST">
      <div class="form-group col-md-4">
        <label for="username">Username</label>
        <input
          maxlength="13"
          type="text"
          class="form-control"
          id="username"
          name="username" />
      </div>
      <div class="form-group col-md-4">
        <label for="exampleInputPassword1">Password</label>
        <input
          maxlength="33"
          type="password"
          class="form-control"
          id="password"
          name="password" />
      </div>
      <div class="form-group col-md-4">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input
          type="password"
          class="form-control"
          id="cpassword"
          name="cpassword" />
        <small id="emailHelp" class="form-text text-muted">Make sure to write the same password</small>
      </div>

      <button type="submit" class="btn btn-primary btn-success">SignUp</button>
    </form>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script
    src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>