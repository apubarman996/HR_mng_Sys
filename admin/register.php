<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
  <script type="text/javascript" src="../lib/jquery.min.js"></script>
  <script type="text/javascript">
    function formvalidation(){
      var name=$('#inputName').val();
      var email=$('#inputEmail').val();
      var password=$('#inputPassword').val();
      var passlength=$('#inputPassword').val().length;
      if(name=='')
      {
        alert('Please enter your name.');
        return false;
      }
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
<body>
<?php
include "header.php";
?>    
<div class="container">
  <div class="col-lg-6 col-xs-push-3 well">
    <form class="form-horizontal" method="post" action="insertuser.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Registration</legend>
    <?php
    if (isset($_SESSION['success'])) {
    	echo $_SESSION['success'];
    	unset($_SESSION['success']);
    }
    ?>
   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" name="inputname" class="form-control" id="inputName" placeholder="Name">
      </div>
    </div>

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
      <label class="col-lg-2 control-label">Role</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="admin" checked="">
            Admin
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="employee">
            Employee
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Department</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="web developer" checked="">
            Web Develpoer
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="seo">
            SEO
          </label>
        </div>
      </div>
    </div>
   
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" name="inputsubmit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
  </div>
</div>

</div>
</body>
</html>