<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
	<script type="text/javascript" src="../lib/jquery.min.js"></script>
</head>

<body>

<?php include "header.php";?> 
<div class="container">
  <div class="col-lg-12 col-xs-push-0 well">
	<h1>User Records</h1>
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr No.</th>
      <th>Name</th>
      <th>Email</th>
      <th>Department</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$i=1;
    $query ="SELECT * FROM user_tbl";
	$res=mysqli_query($con, $query);
	$count=mysqli_num_rows($res);
	if($count>0){
	while($row=mysqli_fetch_array($res))
	{
  	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['department'];?></td>
      <td><?php echo $row['role'];?></td>
      <td><a href="edituser.php?id=<?php echo $row['id'];?>">Edit</a> | 
      	<a href="deleteuser.php?id=<?php echo $row['id'];?>">Delete</a></td>
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