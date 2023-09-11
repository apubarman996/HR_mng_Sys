<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit user details</title>
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
    }
  </script>
</head>
<body>
<?php
include "header.php";
?>    
<div class="container">
  <div class="col-lg-6 col-xs-push-3 well">
    <form class="form-horizontal" method="post" action="updateuser.php" onsubmit="return formvalidation();">
  <fieldset>
    <legend>Edit User Details  <ul class="nav navbar-nav navbar-right"><a href="dashboard.php" class="btn btn-info" style="margin-right: 15px;">Back</a></ul></legend>
    <?php
    if (isset($_SESSION['success'])) {
    	echo $_SESSION['success'];
    	unset($_SESSION['success']);
    }
    ?>
    <?php
    $id=$_GET['id'];
    $query ="SELECT * FROM user_tbl WHERE id='$id'";
    $res=mysqli_query($con, $query);
    $data=mysqli_fetch_array($res);
    ?>
    <input type="hidden" name="id" value="<?php echo $id;?>">
   <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" name="inputname" class="form-control" id="inputName" placeholder="Name" value="<?php echo $data['name'];?>">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $data['email'];?>">
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
            <input type="radio" name="role" id="role" value="admin" <?php if($data['role']=='admin'){echo "Checked";} ?>>
            Admin
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="employee" <?php if($data['role']=='employee'){echo "Checked";} ?>>
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
            <input type="radio" name="depart" id="depart" value="web developer" <?php if($data['department']=='web developer'){echo "Checked";} ?> >
            Web Develpoer
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="seo" <?php if($data['department']=='seo'){echo "Checked";} ?> >
            SEO
          </label>
        </div>
      </div>
    </div>
   
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" name="inputsubmit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </fieldset>
</form>
  </div>
</div>

</div>
</body>
</html>