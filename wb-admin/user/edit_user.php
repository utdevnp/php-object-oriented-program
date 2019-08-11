<?php
	$id = $_GET['id'];
		$result =$User->getById($id);
			$row = $Conn-> fetchArray($result);
				$name=$row['name'];
				$username=$row['username'];
				$email=$row['email'];
				$adress = $row['adress'];
				$password=$row['password'];
				$is_active=$row['is_active'];
?>

<div class="error_message">
<?php
	if(isset($_POST['edit_user_button']))
	{
		$error=null;
		//access user posted data
		$name=$_POST['name'];
		$error.= $Validator-> validate_empty($name,"Name");
		$username=$_POST['username'];
		$email=$_POST['email'];
		$error.= $Validator-> validate_empty($email,"Username");
		$adress =$_POST['adress'];
		$password = $_POST['password'];
		$error.= $Validator-> validate_empty($password,"Password");
		$is_active = $_POST['is_active'];
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
				
				$result =$User->update($id,$name,$username,$email,$adress,$password,$is_active);
				if($result==1)
				{
					header("Location: index.php?folder=user&file=list_user.php&message=Record Updated Successfully!");
				}
				else
				{
					echo "<h1> Error </h1>".mysqli_error();	
				}
		}
	}
?>
</div>
	<div align="right">
		<h2 style="float:left; text-indent:5px; Padding:5px;">Edit User</h2>
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
    	<input name="name" type="text" required size="25" maxlength="100" id="name"
			value="<?php if(isset($name)){ echo $name; } ?>">
	    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label> User Name </label>
    </div>
    <div class="form_field">
    	<input name="username" required type="text" size="25" maxlength="100" id="username"
			value="<?php if(isset($username)){ echo $username; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>E-Mail </label>
    </div>
    <div class="form_field">
    	<input name="email" type="text" required size="25" maxlength="100" id="email"
			value="<?php if(isset($email)){ echo $email; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>Address </label>
    </div>
    <div class="form_field">
    	<input name="adress" type="text" required size="25" maxlength="100" id="adress"
			value="<?php if(isset($adress)){ echo $adress; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Password</label>
    </div>
    <div class="form_field">
    	<input name="password" required type="text" size="25" maxlength="100" id="password"/>
    </div>
  </div>
  
  
  <div class="form_item">
  	
    <div class="form_label">
    	<label>Active </label>
    </div>
    <div class="form_field">
    <?php 
	$arr =array('Y'=>'Yes','N'=>'No');
	?>
    <select name="is_active">
    <?php
	foreach($arr as $k=>$v)
		{
			if($is_active==$k)
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
    </div>

  
  <div class="form_item">

    <div class="form_field">
    	<input name="edit_user_button" class="submit_bitton" type="submit" value="Save & Update">
    </div>
  </div>      
  
</form>
