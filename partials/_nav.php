<?php
$loggedin = false;
if ((isset($_SESSION['username']))) {
  $loggedin = true;
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/loginsys">iSecure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/loginsys/welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
      if (!$loggedin) { ?>
        <li class="nav-item">
          <a class="nav-link" href="/loginsys/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/loginsys/signup.php">SignUp</a>
        </li><?php
            } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="/loginsys/logout.php">LogOut</a>
        </li>
      <?php } ?>
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
