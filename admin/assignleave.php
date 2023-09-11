<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Assign Employee Leave</title>
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
  <script type="text/javascript" src="../lib/jquery.min.js"></script>
  <script type="text/javascript">
    function formvalidation(){
        var vfrom=$('#inputVfrm').val();
        var vto=$('#inputVto').val();
        var velv=$('#inputElv').val();
        var vmlv=$('#inputMlv').val();
        var vclv=$('#inputClv').val();
        if (vfrom=='') 
        {
          alert('Please select your valid from.');
          return false;
        }
        if (vto=='') 
        {
          alert('Please select your valid to.');
          return false;
        }
        if (velv=='') 
        {
          alert('Please insert your earning leave.');
          return false;
        }
        if (vmlv=='') 
        {
          alert('Please insert your medical leave.');
          return false;
        }
        if (vclv=='') 
        {
          alert('Please insert your casual leave.');
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
    <form class="form-horizontal" method="post" action="insertleave.php" onsubmit="return formvalidation();">
    <fieldset>
    <legend>Assing Leave <ul class="nav navbar-nav navbar-right"><a href="allleave.php" class="btn btn-primary" style="margin-right: 15px;">All Leave</a> <a href="allappliedleave.php" class="btn btn-outline-secondary" style="margin-right: 15px;">All applied Leave</a></ul></legend>
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
      <label for="inputEmail" class="col-lg-3"><b>Valid From:</b></label>
      <div class="col-lg-9">
        <input type="date" class="form-control" id="inputVfrm" name="validfrm" placeholder="dd/mm/yyyy">
      </div>
    </div>

     <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Valid To:</b></label>
      <div class="col-lg-9">
        <input type="date" class="form-control" id="inputVto" name="validto" placeholder="dd/mm/yyyy">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Earning Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputElv" name="eleave" placeholder="Number of Leave">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Medical Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputMlv" name="mleave" placeholder="Number of Leave">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Casual Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputClv" name="cleave" placeholder="Number of Leave">
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