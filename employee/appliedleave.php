<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Applied Leave</title>
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

<?php include "header.php";?> 

<div class="container">
<div class="col-lg-12 col-xs-push-0 well">
<h3>Applied all Leave status</h3>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sl No.</th>
      <th>Earning Leave</th>
      <th>Medical Leave</th>
      <th>Casual Leave</th>
      <th>Leave From</th>
      <th>Leave To</th>
      <th>Status</th>
      <th>Comment</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  $id = $_SESSION['id'];
  $query ="SELECT * FROM `apply_leave` WHERE `apply_by`='$id'"; //inner joining
  $res=mysqli_query($con, $query);
  $count=mysqli_num_rows($res);
  if($count>0){
  while($row=mysqli_fetch_array($res))
  {
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['eleave'];?></td>
      <td><?php echo $row['mleave'];?></td>
      <td><?php echo $row['cleave'];?></td>
      <td><?php echo $row['l_from']; ?></td>
      <td><?php echo $row['l_to'];?></td>
      <td style="color: green;"><?php echo $row['status'];?></td>
      <td><?php echo $row['comment'];?></td>
    </tr>
    <?php $i++;}}else{
      echo "No Data Found!!!";
    } ?>
  </tbody>
</table>
</div>

</body>
</html>