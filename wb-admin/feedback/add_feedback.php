
<?php
	if(isset($_POST['add_feedback_button']))
	{
		$error=null;
		
		//access user posted data
		$name=$_POST['name'];
		$error.= $Validator-> validate_empty($name,"Name");
		
		$email = $_POST['email'];
		$error.= $Validator-> validate_empty($email,"Email");
		$error.= $Validator-> validate_email($email,"Email");		
		
		$message=$_POST['message'];
		$error.= $Validator-> validate_empty($message,"Message");
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
			$result =$Feedback-> add($name,$email,$message);
				
				if($result==1)
				{
					header("Location:index.php?folder=feedback&file=list_feedback.php&message=Record Added Successfully");
				}
				else
				{
					echo "<h1> Error </h1>".mysql_error();	
				}
				//show output based on success/failure of the query
		}
	}
?>
	<div align="right">
		<h2 style="float:left; text-indent:5px; Padding:5px;">Add Feedback</h2>
		 <a style="float:right;" href="index.php?folder=feedback&file=list_feedback.php">
		  <img src="graphics/go-back.png" height="30" width="50" alt="Go Back" title="Click Here To Go Back" /></a> 
	</div>
	
	<div style="clear:both;"></div>

	<hr />
	
	
<form id="form1" name="form1" method="post" action="">
  <div class="form_item">
  	<div class="form_label">
    	<label> Your Name </label>
    </div>
    <div class="form_field">
    	<input name="name" type="text" size="25" maxlength="100" id="name"
			value="<?php if(isset($name)){ echo $name; } ?>">
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Your Email </label>
    </div>
    <div class="form_field">
    	<input name="email" type="text" size="25" maxlength="100" id="email" 
			value="<?php if(isset($email)){ echo $email; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Your Message </label>
    </div>
    <div class="form_field">
      <textarea name="message" cols="25" rows="5"><?php if(isset($message)){ echo $message; } ?></textarea>
    </div>
  </div>
  
  <div class="form_item">

    <div class="form_field">
    	<input class="submit_bitton" name="add_feedback_button" type="submit" value="Add Feedback">
    </div>
  </div>      
  
</form>
