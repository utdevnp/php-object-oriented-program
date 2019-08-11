<?php
	$id = $_GET['id'];
		$result =$User->getById($id);
			$row = $Conn-> fetchArray($result);
?>

	<div align="right">
		<h2 style="float:left; text-indent:5px; Padding:5px;">View User</h2>
		 <a style="float:right;" href="index.php?folder=user&file=list_user.php">
		  <img src="graphics/go-back.png" height="30" width="50" alt="Go Back" title="Click Here To Go Back" /></a> 
	</div>
	

	<div style="clear:both;"></div>
	
	<hr>
 <div class="form_item">
  	<div class="form_strong">
    	<strong> Name </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['name'];?>
    </div>
  </div>
	
  <div class="form_item">
  	<div class="form_strong">
    	<strong> User  Name </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['email'];?>
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_strong">
    	<strong> Password </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['password'];?>
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label>Active </label>
    </div>
    <div class="form_field">
    	<?php echo $row['is_active'];?>
    </div>
  </div>
