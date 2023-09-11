<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap.min.css">
	<script type="text/javascript" src="lib/jquery.min.js"></script>
  <script type="text/javascript">
    function formvalidation(){
      var email=$('#inputEmail').val();
      var password=$('#inputPassword').val();
      var passlength=$('#inputPassword').val().length;
      if(email=='')
      {
        alert('Please enter your email.');
        return false;
      }
      if(password=='')
      {
        alert('Please enter your password.');
        return false;
      }
      if(passlength<=4)
      {
        alert('Please enter minimum 5 digits password.');
        return false;
      }
    }
  </script>
</head>
</head>
<body>

<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="login.php">HR Management System</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Back</a></li>
      </ul>
    </div>
    </div>
</nav>
</header>

<div class="container">
  <div class="col-lg-6 col-xs-push-3 well">
    <form class="form-horizontal" method="post" action="loginaccount.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Login</legend>
    <?php
    if (isset($_SESSION['error'])) {
    	echo $_SESSION['error'];
    	unset($_SESSION['error']);
    }
    ?>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </fieldset>
</form>
  </div>
</div>

</div>

</body>
</html>