<?php
include "../auth/auth.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Message</title>
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

<?php include "header.php";?> 

<div class="container">
<div class="col-lg-10 col-xs-push-1 well">
<h3>View Full Message</h3>
    <?php
    $m_id = $_GET['id'];
    $query ="SELECT * FROM task WHERE `t_id`='".$m_id."'";
	$res=mysqli_query($con, $query);
	$count=mysqli_num_rows($res);
    $row=mysqli_fetch_array($res);
    ?>
    <div class="col-sm-12" style="background-color: #eaeaea; padding: 15px;">
    	<?php echo $row['task']; ?>
    </div>

    <div class="col-sm-12">
    	<br>
    	<?php
    	if (isset($_REQUEST['m_reply'])) {
    		$mid   = $_POST['m_id'];
    		$id    = $_POST['id'];
    		$reply = mysqli_real_escape_string($con,$_POST['m_reply']);

    		$query = "INSERT INTO `task_reply`(`r_id`, `reply`, `m_id`, `reply_by`) VALUES ('','$reply','$mid','$id')";
    		$res=mysqli_query($con, $query);
    		if ($res) 
    		{
    			echo "Reply Inserted Successfully";
    		}
    		else
    		{
    			echo "Error inserted message, please try again";
    		}
    	}
    	?>
    	<form action="" method="post" class="" onsubmit="return formvalidation();">
    	  <fieldset>
    		<input type="hidden" name="m_id" value="<?php echo $m_id;?>">
    		<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">

    		<div class="form-group">
               <label for="inputEmail" class="col-lg-2 control-label"><h4>Write your message</h4></label>
                <div class="col-lg-10">
    		     <textarea name="m_reply" id="inputMessage" rows="5" style="width: 100%; background-color: #eaeaea; padding: 15px;"></textarea>
    		    </div>
            </div>
    		     
    		<div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </div>

          </fieldset>
    	</form>
    	<fieldset>
    		<p>&nbsp;</p>
    		<div class="form-group">
               <label for="inputEmail" class="col-lg-2 control-label"><h4>&nbsp;</h4></label>
                <div class="col-lg-10">
                	<?php
                      $m_id = $_GET['id'];
                      $query1 ="SELECT * FROM `task_reply` WHERE `m_id`='".$m_id."' AND `reply_by`='".$_SESSION['id']."'";
	                  $res1=mysqli_query($con, $query1);
	                  $count1=mysqli_num_rows($res1);
                      while($row1=mysqli_fetch_array($res1)){
                    ?>
                    <div class="col-sm-12" style="background-color: #eaeaea; padding: 15px;">
    	              <?php echo $row1['reply']; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>    
    	</fieldset>
    </div>
</div>
</div>

</body>
</html>