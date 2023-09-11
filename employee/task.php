<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Task</title>
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
	<script type="text/javascript" src="../lib/jquery.min.js"></script>
</head>

<body>

<?php include "header.php";?> 

<div class="container">
<div class="col-lg-12 col-xs-push-0 well">
<h3>All The Task List</h3>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr No.</th>
      <th>Task</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $query ="SELECT * FROM task WHERE `id`='".$_SESSION['id']."'";
  $res=mysqli_query($con, $query);
  $count=mysqli_num_rows($res);
  if($count>0){
  while($row=mysqli_fetch_array($res))
  {
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><a href="viewmessage.php?id=<?php echo $row['t_id'];?>"><?php echo substr($row['task'],0,50);?></a></td>
      <td><?php echo $row['date_time'];?></td>
      <td><a href="viewmessage.php?id=<?php echo $row['t_id'];?>">View</a></td>
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