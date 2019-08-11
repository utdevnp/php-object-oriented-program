<?php
if(isset($_POST['add_image_button']))
{
	$packages=$_POST['packages'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$country = $_POST['country'];
	$description=$_POST['description'];
	$is_active=$_POST['is_active'];
	$amonths=$_POST['amonths'];
	$aday=$_POST['aday'];
	$ayear=$_POST['ayear'];
	$dmonths=$_POST['dmonths'];
	$dday=$_POST['dday'];
	$dyear=$_POST['dyear'];
	$airlines=$_POST['airlines'];
	$flightno=$_POST['flightno'];
	$numof_traveller=$_POST['numof_traveller'];
	$pickup=$_POST['pickup'];
	$pamentmode=$_POST['pamentmode'];
	
	
	//for upload file
		$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
		$ext=strtolower($ext);
		
		//call add() function & pass parameter & store returned value
		$result =  $Img->add($packages,$name,$email,$address,$country,$is_active,$ext,$amonths,$aday,
		$ayear,$dmonths,$dday,$dyear,$airlines,$flightno,$numof_traveller,$pickup,$pamentmode,$description);
		
		//$random = microtime();
		$new_id = $Conn->insertId();
		$new_name = $new_id . "." . $ext;

	if($result==1)
	{
		move_uploaded_file($_FILES['ext']['tmp_name'],"wb-admin/upload/img/".$new_name);
		$name= $rw['pseudo_name'];
		header("Location: $name");
		?>
			
		<?php
	}
	else
	{
	?>
		<div class="error_box">
			<?php echo "Error <br />".mysqli_error();?>
		</div>
	<?php
	}
	
}
?>

<form method="post" enctype="multipart/form-data"  class="">
			
			<div class="personal_info">
			
			
			<p>All <span style="color:red;"> * </span> is required fields</p>
			
		
				 
				 <div class="form_item">
  					<div class="form_label">
    					 Packages 
    				</div>
    				<div class="form_field">
					<input disabled  style="width:80%; cursor: not-allowed;" type="text"  required name="packages" value="<?php echo $derow['content_title']?>" /> <span style="color:red;"> * </span>
   		 			</div>
				</div>
				
				
		
             <div class="form_item">
  					<div class="form_label">
    					 Name 
    				</div>
    				<div class="form_field">
    					<input type="text" style="width:50%;" required  title="Please Type Your Full Name "  name="name" /> <span style="color:red;"> * </span>
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					E Mail 
    				</div>
    				<div class="form_field">
    					<input type="email" style="width:50%;"  required  title="Please Type Your Valid Email Address [ example@gmail.com ] " name="email" /> <span style="color:red;"> * </span>
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    				Address 
    				</div>
    				<div class="form_field">
						<input type="text" style="width:50%;"  required  title="Please Type Your Address " name="address" /> <span style="color:red;"> * </span>
   		 			</div>
			</div>
			 <div class="form_item">
  					<div class="form_label">
    					 Country 
    				</div>
    				<div class="form_field">
						<select style="width:50%;" title="Please Choose Your Country " name="country">
							<?php include('inc/country_list.php');?>
						</select>
   		 			</div>
			</div>
		
			 
			  <div class="form_item">
  					<div class="form_label">
    					 Arrival Date  
    				</div>
    				<div class="form_field">
						<select name="amonths">
							<option selected value='Not Select'>Months</option>
							<option value='Janaury'>Janaury</option>
							<option value='February'>February</option>
							<option value='March'>March</option>
							<option value='April'>April</option>
							<option value='May'>May</option>
							<option value='June'>June</option>
							<option value='July'>July</option>
							<option value='August'>August</option>
							<option value='September'>September</option>
							<option value='October'>October</option>
							<option value='November'>November</option>
							<option value='December'>December</option>
						</select>
						
						<select name="aday">
						<option value="Not Select">Day</option>
						<?php 
							for($i=1; $i<32; $i++)
							{
							?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
							
							<?php } ?>	
						</select>
						<select name="ayear">
						<option value="Not Select">Year</option>
							<?php 
							for($i=2011; $i<2020; $i++)
							{
							?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
							
							<?php } ?>	
						</select>
   		 			</div>
			</div>
		
	
	
	<div class="form_item">
	<div class="form_label">
    					Departure Date 
    				</div>
    				<div class="form_field">
						<select name="dmonths">
							<option value="Not Select">Months</option>
							<option  value='Janaury'>Janaury</option>
							<option value='February'>February</option>
							<option value='March'>March</option>
							<option value='April'>April</option>
							<option value='May'>May</option>
							<option value='June'>June</option>
							<option value='July'>July</option>
							<option value='August'>August</option>
							<option value='September'>September</option>
							<option value='October'>October</option>
							<option value='November'>November</option>
							<option value='December'>December</option>
						</select>
						
						<select name="dday">
						<option value="Not Select">Day</option>
						<?php 
							for($i=1; $i<32; $i++)
							{
							?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
							
							<?php } ?>	
						</select>
						<select name="dyear">
						<option value="Not Select">Year</option>
							<?php 
							for($i=2011; $i<2016; $i++)
							{
							?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
							
							<?php } ?>	
						</select>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					 No of Travellers 
    				</div>
    				<div class="form_field">
						<input style="width:50%;" type="number_format" required  name="numof_traveller" /> <span style="color:red;"> * </span>
   		 			</div>
			</div>
			
			
		 <div class="form_item">
  					<div class="form_label">
    					 Airlines 
    				</div>
    				<div class="form_field">
						<input style="width:50%;" type="text"  name="airlines" /> <span style="color:red;"> * </span>
   		 			</div>
			</div>
			
			
		 <div class="form_item">
  					<div class="form_label">
    					 Flight No 
    				</div>
    				<div class="form_field">
						<input style="width:50%;" type="text"  name="flightno" /> <span style="color:red;"> * </span>
   		 			</div>
			</div>
		 <div class="form_item">
  					<div class="form_label">
    					Airport Pick up 
    				</div>
    				<div class="form_field">
						<select name="pickup">
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					Mode Of Payment 
    				</div>
    				<div class="form_field">
						<select style="width:50%;" name="pamentmode">
							<option selected value="Not Select">Mode</option>
							<option value="Credit Card">Credit Card</option>
							<option value="Cash/Cheque ">Cash/Cheque </option>
							<option value="Bank Transfer">Bank Transfer</option>
							<option value="Travellers Cheque">Travellers Cheque</option>
						</select>
   		 			</div>
			</div>

	</div>
	
	
			
			
			
			<div class="form_item">
  					<div class="form_label">
    					Description
    				</div>
    				<div class="form_field">	
						<textarea style="width:80%;" rows="5" cols="50" name="description"></textarea>
   		 			</div>
				</div>

			<div class="form_item">
  					<div class="form_label">
    					 Browse File  <small>[ If you want to upload Your Photo ]</small>
    				</div>
    				<div class="form_field">
    					<input type="file" name="ext" />
   		 			</div>
			</div>
			
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					Is Active 
    				</div>
    				<div class="form_field">
    					<select name="is_active">
							<option value="Y">Yes</option>
							<option value="N">No</option>
						</select>
   		 			</div>
			</div>
			
			
			<div class="form_item">
    				<div class="form_field">
    					<button class="submit_bitton" type="submit" title="Click Here To Send Your Equerries" type="submit" value="Send " name="add_image_button" />Submit <i class="icon-location-arrow"></i></button>
   		 			</div>
			</div>

			
		
	</form>