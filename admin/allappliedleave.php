<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Applied Leave</title>
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
  <script type="text/javascript" src="../lib/jquery.min.js"></script>
</head>

<body>

<?php include "header.php";?> 

<?php
if (isset($_POST['apporved'])) {

  $status="apporved";
  $comment=$_POST['comment'];
  $a_id=$_POST['a_id'];

  $query = "UPDATE `apply_leave` SET `status`='$status', `comment`='$comment' WHERE `a_id`='$a_id'";
  $res=mysqli_query($con, $query);

  if ($res) {
    $_SESSION['success'] = "Row Update successfully!!!";
  }else{
    $_SESSION['error'] ="Row Not Update successfully";
  }
}

if (isset($_POST['rejected'])) {
  $status="rejected";
  $comment=$_POST['comment'];
  $a_id=$_POST['a_id'];

  $query = "UPDATE `apply_leave` SET `status`='$status', `comment`='$comment' WHERE `a_id`='$a_id'";
  $res=mysqli_query($con, $query);

  if ($res) {
    $_SESSION['success'] = "Rejected";
  }else{
    $_SESSION['error'] ="Row Not Update successfully";
  }
}

?>

<div class="container">
<div class="col-lg-12 col-xs-push-0 well">
<h3>All Employees Applied Leave List <ul class="nav navbar-nav navbar-right"><a href="assignleave.php" class="btn btn-info" style="margin-right: 10px;">Back</a></ul></h3>
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
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr No.</th>
      <th>Employee Name</th>
      <th>Earning Leave</th>
      <th>Medical Leave</th>
      <th>Casual Leave</th>
      <th>From</th>
      <th>To</th>
      <th>Status</th>
      <th>Comment</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $query ="SELECT * FROM `apply_leave` t1 join `user_tbl` t2 on t1.apply_by=t2.id"; //inner joining
  $res=mysqli_query($con, $query);
  $count=mysqli_num_rows($res);
  if($count>0){
  while($row=mysqli_fetch_array($res))
  {
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['eleave'];?></td>
      <td><?php echo $row['mleave'];?></td>
      <td><?php echo $row['cleave'];?></td>
      <td><?php echo $row['l_from'];?></td>
      <td><?php echo $row['l_to'];?></td>
      <td style="color: green;"><?php echo $row['status'];?></td>
      <td><form method="post" action="">
        <input type="hidden" name="a_id" value="<?php echo $row['a_id'];?>">
        <textarea name="comment"></textarea></td>
      <td>
        <button type="submit" name="apporved" class="btn btn-success">Apporved</button>
        <button type="submit" name="rejected" class="btn btn-danger">Reject</button>
        </form>
      </td>
    </tr>
    <?php $i++;}}else{
      echo "No Data Found!!!";
    } ?>
  </tbody>
</table>
</div>
</div>

</body>
</html>