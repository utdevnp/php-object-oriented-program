<?php
 if(!isset($_GET['id']))
 {
	//header('Location: index.php?folder=image&file=list_image.php');
 }
	
	//get feedback information in respect of Id
	$result = $Img->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			header('Location: index.php?folder=img&file=list_img.php');
		}
			$row = $Conn->fetchArray($result);
				$packages=$row['packages'];
				$name=$row['name'];
				$address=$row['address'];
				$email=$row['email'];
				$country = $row['country'];
				$description=$row['description'];
				$is_active=$row['is_active'];
				$amonths=$row['amonths'];
				$aday=$row['aday'];
				$ayear=$row['ayear'];
				$dmonths=$row['dmonths'];
				$dday=$row['dday'];
				$dyear=$row['dyear'];
				$airlines=$row['airlines'];
				$flightno=$row['flightno'];
				$pickup=$row['pickup'];
				$pamentmode=$row['pamentmode'];
				$dateadded=$row['dateadded'];
	?>

<div class="form_area">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?> 
  <div style="clear:both;"></div>
  
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Booking Management >> View</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=img&file=list_img.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=img&file=add_img.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

  
<div style="clear:both;"></div>	
	
	
<form method="post" class="niceform">

	<div class="form_item">
  					<div class="form_label">
    					<strong>Added  Date </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $dateadded; ?>
   		 			</div>
			</div>
				<fieldset>
				 <legend>Packages</legend>
				<div class="form_item">
  					<div class="form_label">
    					<strong>Packages </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $packages; ?>
   		 			</div>
			</div>
			
			</fieldset>
			
			<fieldset>
				 <legend>Personal Info</legend>
			<div class="form_item">
  					<div class="form_label">
    					<strong>Name </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $name; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Email </strong>
    				</div>
    				<div class="form_field">
						<?php echo $email; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Address </strong>
    				</div>
    				<div class="form_field">
						<?php echo $address; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Country </strong>
    				</div>
    				<div class="form_field">
						<?php echo $country; ?>
   		 			</div>
			</div>
			</fieldset>
			
			<fieldset>
				 <legend>Personal Info</legend>
			<div class="form_item">
  					<div class="form_label">
    					<strong>Arrival Date </strong>
    				</div>
    				<div class="form_field">
						<?php echo $amonths; ?>
   		 			</div>
					<div class="form_field">
						<?php echo $aday; ?>
   		 			</div>
					<div class="form_field">
						<?php echo $ayear; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Departure Date </strong>
    				</div>
    				<div class="form_field">
						<?php echo $dmonths; ?>
   		 			</div>
					<div class="form_field">
						<?php echo $dday; ?>
   		 			</div>
					<div class="form_field">
						<?php echo $dyear; ?>
   		 			</div>
			</div>
			<div class="form_item">
  					<div class="form_label">
    					<strong>Airlines </strong>
    				</div>
    				<div class="form_field">
						<?php echo $airlines; ?>
   		 			</div>
			</div>
			<div class="form_item">
  					<div class="form_label">
    					<strong>Flight No </strong>
    				</div>
    				<div class="form_field">
						<?php echo $flightno; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Airport Pick up  </strong>
    				</div>
    				<div class="form_field">
						<?php echo $pickup; ?>
   		 			</div>
			</div>
			<div class="form_item">
  					<div class="form_label">
    					<strong>Payment Mode </strong>
    				</div>
    				<div class="form_field">
						<?php echo $pamentmode; ?>
   		 			</div>
			</div>
			
			</fieldset>
			
			<fieldset>
			 <legend>Other Info</legend>
			<div class="form_item">
  					<div class="form_label">
    					<strong>Description </strong>
    				</div>
    				<div class="form_field">
						<?php echo $description; ?>
   		 			</div>
			</div>
			
			
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Is Active </strong>
    				</div>
    				<div class="form_field">
						<?php echo $is_active; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Photo </strong>
    				</div>
    				<div class="form_field">
					<img src="upload/img/<?php echo $row['id'].".".$row['ext'];?>" height="150" width="150"/> <br />
							<a href="upload/img/<?php echo $row['id'].".".$row['ext'];?>" target="_blank">
                    	Download
                    </a>
   		 			</div>
			</div>
			</fieldset>
			
			

</form>
</div><!-- form_area ends-->
