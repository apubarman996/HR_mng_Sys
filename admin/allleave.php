<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Leave</title>
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
  <script type="text/javascript" src="../lib/jquery.min.js"></script>
</head>

<body>

<?php include "header.php";?> 

<div class="container">
<div class="col-lg-12 col-xs-push-0 well">
<h3>All Employees Leave List <ul class="nav navbar-nav navbar-right"><a href="assignleave.php" class="btn btn-info" style="margin-right: 10px;">Back</a></ul></h3>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr No.</th>
      <th>Employee Name</th>
      <th>Earning Leave</th>
      <th>Medical Leave</th>
      <th>Casual Leave</th>
      <th>Valid From</th>
      <th>Valid To</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $query ="SELECT * FROM `assign_leave` t1 join `user_tbl` t2 on t1.assign_to=t2.id"; //inner joining
  $res=mysqli_query($con, $query);
  $count=mysqli_num_rows($res);
  if($count>0){
  while($row=mysqli_fetch_array($res))
  {
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['e_leave'];?></td>
      <td><?php echo $row['m_leave'];?></td>
      <td><?php echo $row['c_leave'];?></td>
      <td><?php echo $row['v_from'];?></td>
      <td><?php echo $row['v_to'];?></td>
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