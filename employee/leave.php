<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Leave</title>
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
<h3>All Leave List <ul class="nav navbar-nav navbar-right"><a href="appliedleave.php" class="btn btn-outline-secondary" style="margin-right: 15px;">All applied Leave</a></ul></h3>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sl No.</th>
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
  $id = $_SESSION['id'];
  $query ="SELECT * FROM `assign_leave` t1 join `user_tbl` t2 on t1.assign_to=t2.id WHERE t2.id='$id'"; //inner joining
  $res=mysqli_query($con, $query);
  $count=mysqli_num_rows($res);
  if($count>0){
  while($row=mysqli_fetch_array($res))
  {
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td class="eleave"><?php echo $row['e_leave'];?></td>
      <td class="mleave"><?php echo $row['m_leave'];?></td>
      <td class="cleave"><?php echo $row['c_leave'];?></td>
      <td class="v_from"><?php echo $row['v_from'];?></td>
      <td class="v_to"><?php echo $row['v_to'];?></td>
    </tr>
    <?php $i++;}}else{
      echo "No Data Found!!!";
    } ?>
  </tbody>
</table>

<div class="col-lg-6 col-xs-push-3" style="background-color: #e6e6e6; padding: 15px;">
<form class="form-horizontal" method="post" action="applyleave.php" onsubmit="return formvalidation();">
  <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
    <fieldset>
    <legend>Apply for Leave</legend>
    <p><?php 
    if(isset($_SESSION['success'])){
      echo $_SESSION['success'];
      unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
      echo $_SESSION['error'];
      unset($_SESSION['error']);
    } 
    ?>
      
    </p>
    <!--right box-->
    <div class="col-lg-11">

  
      <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Leave From:</b></label>
      <div class="col-lg-9">
        <input type="date" class="form-control" id="inputVfrm" name="l_from" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
      </div>
      </div>

     <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Leave To:</b></label>
      <div class="col-lg-9">
        <input type="date" class="form-control" id="inputVto" name="l_to" placeholder="dd/mm/yyyy" onblur="checkDate(this.value)">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Earning Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputElv" name="eleave" placeholder="Number of Leave" onblur="checkeleavequan(this.value)">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Medical Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputMlv" name="mleave" placeholder="Number of Leave" onblur="checkmleavequan(this.value)">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-3"><b>Casual Leave:</b></label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="inputClv" name="cleave" placeholder="Number of Leave" onblur="checkcleavequan(this.value)">
      </div>
    </div>
    </div>
   
    <div class="form-group" style="margin-left: 118px;">
      <div class="col-lg-12">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" name="inputsubmit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
  </form>
</div>

</div>
</div>

<script type="text/javascript">
 function checkDate(str){
  var vfrm=$('.v_from').text();
  var vto=$('.v_to').text();
  var lfrm=str;

  var date1 =new Date(vfrm);
  var date2 =new Date(lfrm);
  var diffDays1 = parseInt((date2 - date1)/(1000*60*60*24));

  var date3 =new Date(lfrm);
  var date4 =new Date(vto);
  var diffDays2 = parseInt((date4 - date3)/(1000*60*60*24));
  if (diffDays1>=0 && diffDays2>=0) {
    return true;
  }else{
    alert('please enter valid date');
    return false;
  }
 }

 function checkeleavequan(str){
  var vfrm=$('.eleave').text();
  var lqty=str;
  if (vfrm>=lqty) {
    return true;
  }else{
    alert('Please enter valid earning leave');
    return false;
  }
 }

 function checkmleavequan(str){
  var vfrm=$('.mleave').text();
  var lqty=str;
  if (vfrm>=lqty) {
    return true;
  }else{
    alert('Please enter valid madical leave');
    return false;
  }
 }

 function checkcleavequan(str){
  var vfrm=$('.cleave').text();
  var lqty=str;
  if (vfrm>=lqty) {
    return true;
  }else{
    alert('Please enter valid casual leave');
    return false;
  }
 }
</script>

</body>
</html>