<div class="error_message">
<?php
	if(isset($_POST['add_user_button']))
	{
		$error=null;
		
		//access user posted data
		$name=$_POST['name'];
			$error.= $Validator-> validate_empty($name,"Name");
		$username=$_POST['username'];
			$error.= $Validator-> validate_empty($username,"Username");
		$email=$_POST['email'];
			$error.= $Validator-> validate_empty($email,"Email");
		$adress = $_POST['adress'];
			$error.= $Validator-> validate_empty($email,"Address");
		$password = $_POST['password'];
			$error.= $Validator-> validate_empty($password,"Password");
		$is_active = $_POST['is_active'];
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
			$result = $User->add($name,$username,$email,$adress,$password,$is_active);
				
				if($result==1)
				{
					header("Location: index.php?folder=user&file=list_user.php&message=User Added Successfully");
				}
				else
				{
					echo "<h1> Error </h1>".mysql_error();	
				}
				//show output based on success/failure of the query
		}
	}
?>
</div>
	<div align="right">
		<h2 style="float:left; text-indent:5px; Padding:5px;">Add User</h2>
		 <a style="float:right;" href="index.php?folder=user&file=list_user.php">
		  <img src="graphics/go-back.png" height="30" width="50" alt="Go Back" title="Click Here To Go Back" /></a> 
	</div>
	
	<div style="clear:both;"></div>
	
	<hr>
	
<form id="form1" name="form1" method="post" action="">

<div class="form_item">
  	<div class="form_label">
    	<label> Name </label>
    </div>
    <div class="form_field">
    	<input name="name" type="text" size="25" maxlength="100" id="name"
			value="<?php if(isset($name)){ echo $name; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>User Name </label>
    </div>
    <div class="form_field">
    	<input name="username" type="text" size="25" maxlength="100" id="username"
			value="<?php if(isset($username)){ echo $username; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>E-Mail </label>
    </div>
    <div class="form_field">
    	<input name="email" type="text" size="25" maxlength="100" id="email"
			value="<?php if(isset($email)){ echo $email; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>Address</label>
    </div>
    <div class="form_field">
    	<input name="adress" type="text" size="25" maxlength="100" id="adress"
			value="<?php if(isset($adress)){ echo $adress; } ?>">
    </div>
  </div>
  
  
   <div class="form_item">
  	<div class="form_label">
    	<label>Password</label>
    </div>
    <div class="form_field">
    	<input name="password" type="text" size="25" maxlength="100" id="password"
			value="<?php if(isset($password)){ echo $password; } ?>">
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label>Active </label>
    </div>
    <div class="form_field">
    </div>
    <?php 
	$arr =array('Y'=>'Yes','N'=>'No');
	?>
    <select name="is_active">
    <?php
	foreach($arr as $k=>$v)
		{
			if(isset($_POST['is_active'])==$k)
			{
				echo "<option value=\"$k\" selected> $v * </option>";
			}
			else
			{
				echo "<option value=\"$k\"> $v </option>";
			}
		}
	?>
   </select>
   </div>
  
  
  <div class="form_item">

    <div class="form_field">
    	<input name="add_user_button" class="submit_bitton" type="submit" value="Add New User">
    </div>
  </div>      
  
</form>
