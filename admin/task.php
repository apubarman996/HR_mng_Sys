<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Assign Task</title>
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
  <script type="text/javascript" src="../lib/jquery.min.js"></script>
  <script type="text/javascript">
    function formvalidation(){
        var message=$('#inputMessage').val();
        if (message=='') 
        {
          alert('Please enter your message.');
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
  <div class="col-lg-9 col-xs-push-2 well">
    <?php
    if (isset($_SESSION['success'])) {
      echo $_SESSION['success'];
      unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
      echo $_SESSION['error'];
      unset($_SESSION['error']);
    }
    ?>
    <form class="form-horizontal" method="post" action="inserttask.php" onsubmit="return formvalidation();">
    <fieldset>
    <legend>Assing Task <ul class="nav navbar-nav navbar-right"><a href="alltask.php" class="btn btn-outline-secondary" style="margin-right: 10px;">All Task</a></ul></legend>
    <!--left box-->
    <div class="col-lg-3" style="background-color: #e6e6e6; padding: 15px;">
      <div class="form-group">
      <label class="col-lg-12"><b>Employee List</b></label>
      <input type="hidden" name="assign_by" value="<?php echo $_SESSION['id']; ?>">
      <div class="col-lg-12">
        <?php
        $query ="SELECT * FROM user_tbl WHERE `role`='employee' order by id DESC";
        $res=mysqli_query($con, $query);
        $count=mysqli_num_rows($res);
        while($row=mysqli_fetch_array($res))
        {
        ?>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="emp[]" value="<?php echo $row['id'];?>">
            <?php echo $row['name'];?>
          </label>
        </div>
        <?php } ?>
      </div>
    </div> 
  </div>

    <!--right box-->
    <div class="col-lg-9">
      <div class="form-group">
      <label for="inputEmail" class="col-lg-12"><b>Message</b></label>
      <div class="col-lg-12">
        <textarea name="message" id="inputMessage" class="form-control" rows="10" placeholder="Message/Task" style="background-color: #e6e6e6; padding: 5px;"></textarea>
      </div>
    </div>  
    </div>
   
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-3">
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