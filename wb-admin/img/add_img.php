<div class="message_area">
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
	$pickup=$_POST['pickup'];
	$pamentmode=$_POST['pamentmode'];
	
	//for upload file
		$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
		$ext=strtolower($ext);
		
		//call add() function & pass parameter & store returned value
		$result =  $Img->add($packages,$name,$email,$address,$country,$is_active,$ext,$amonths,$aday,
		$ayear,$dmonths,$dday,$dyear,$airlines,$flightno,$pickup,$pamentmode,$description);
		
		//$random = microtime();
		$new_id = $Conn->insertId();
		$new_name = $new_id . "." . $ext;

	if($result==1)
	{
		move_uploaded_file($_FILES['ext']['tmp_name'],"upload/img/".$new_name);
		$id=$_GET['id'];
		header("Location: index.php?folder=img&file=list_img.php&msg=Added Successfully!");
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
</div><!-- message_area ends -->
  <div style="clear:both;"></div>
  
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Booking Management >> Add New</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=img&file=list_img.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=img&file=add_img.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

  
<div style="clear:both;"></div>	

<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 

	<form method="post" enctype="multipart/form-data"  class="">
			
			<div class="personal_info">
			<fieldset>
				 <legend>Packages</legend>
				 
				 <div class="form_item">
  					<div class="form_label">
    					<strong> Packages </strong>
    				</div>
    				<div class="form_field">
    					<select name="packages">
							<option value="7 Days">7 Days</option>
							<option value="10 Days">10 Days</option>
							<option value="15 Days">15 Days</option>
							<option value="1 Months">1 Months</option>
							<option value="6 Months">6 Months</option>
						</select>
   		 			</div>
				</div>
				
				
			</fieldset>
			<fieldset>
			 <legend>Personal Info</legend>
             <div class="form_item">
  					<div class="form_label">
    					<strong>  Name </strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="40" name="name" />
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					<strong>  E Mail </strong>
    				</div>
    				<div class="form_field">
    					<input type="email" size="40" name="email" />
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					<strong>Address </strong>
    				</div>
    				<div class="form_field">
						<input type="text" size="40" name="address" />
   		 			</div>
			</div>
			 <div class="form_item">
  					<div class="form_label">
    					<strong> Country </strong>
    				</div>
    				<div class="form_field">
						<input type="text" size="40" name="country" />
   		 			</div>
			</div>
			
		</fieldset>
		
		<fieldset>
			 <legend>Arrival Details</legend>
			 
			  <div class="form_item">
  					<div class="form_label">
    					<strong> Arrival Date  </strong>
    				</div>
    				<div class="form_field">
						<select name="amonths">
							<option selected value='Janaury'>Janaury</option>
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
						<?php 
							for($i=1; $i<32; $i++)
							{
							?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
							
							<?php } ?>	
						</select>
						<select name="ayear">
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
    					<strong>Departure Date  </strong>
    				</div>
    				<div class="form_field">
						<select name="dmonths">
							<option selected value='Janaury'>Janaury</option>
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
						<?php 
							for($i=1; $i<32; $i++)
							{
							?>
							<option value="<?php echo $i;?>"><?php echo $i;?></option>
							
							<?php } ?>	
						</select>
						<select name="dyear">
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
    					<strong> Airlines </strong>
    				</div>
    				<div class="form_field">
						<input type="text" size="40" name="airlines" />
   		 			</div>
			</div>
			
			
		 <div class="form_item">
  					<div class="form_label">
    					<strong> Flight No </strong>
    				</div>
    				<div class="form_field">
						<input type="text" size="40" name="flightno" />
   		 			</div>
			</div>
		 <div class="form_item">
  					<div class="form_label">
    					<strong> Airport Pick up  </strong>
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
    					<strong> Mode Of Payment </strong>
    				</div>
    				<div class="form_field">
						<select name="pamentmode">
							<option value="Credit Card">Credit Card</option>
							<option value="Cash/Cheque ">Cash/Cheque </option>
							<option value="Bank Transfer">Bank Transfer</option>
							<option value="Travellers Cheque">Travellers Cheque</option>
						</select>
   		 			</div>
			</div>
	</fieldset>	
	</div>
	
	
			
			
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Description</strong>
    				</div>
    				<div class="form_field">
    					<?php   
                        $ctrl_name  = 'description';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('description') ;
                        $oFCKeditor->Height = "250px";
                        $oFCKeditor->Width = "600px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "" ;
                        $oFCKeditor->Create() ;
                ?>	
   		 			</div>
				</div>

			<div class="form_item">
  					<div class="form_label">
    					<strong> Browse File </strong>
    				</div>
    				<div class="form_field">
    					<input type="file" name="ext" />
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Is Active </strong>
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
    					<input class="submit_bitton" title="Click Here To Add New Photo" type="submit" value="Add New" name="add_image_button" />
   		 			</div>
			</div>

			
		
	</form>
</div><!-- form_area ends-->
