<div id="container">

  <ul class="tabs"> 
        <li class="active" rel="tab1">  Overview</li>
        <li rel="tab2">Itinerary</li>
		  <li rel="tab5">Include / Exclude</li>
        <li rel="tab3">Write Review</li>
        <li rel="tab4">  Enquiry</li>
		 <li rel="tab6">  Route Map</li>
    </ul>

<div class="tab_container"> 


 
	 
     <div id="tab1" class="tab_content active"> 
		<?php include('inc/trip_overview.php');?>

     </div>
	 
	 <div id="tab6" class="tab_content"> 
		<?php echo $derow['route_map'];?>
		

     </div>
	 
     <div id="tab2" class="tab_content"> 

   
	<div class="itinery">
		<?php 
		$tinary = $itineary->GetItnaryInContent($id,1);
		while($show = $Conn->fetchArray($tinary)){
		?>
			<p><?php echo $show['descrip'];?></p>
	<?php
		}
	?>
	</div>
	

     </div>
	  <div id="tab5" class="tab_content"> 
		<div class="include-exclude">
			<h4>Included</h4>
			<p><?php echo $derow['included'];?></p>
			<br>
			<h4>Not Included</h4>
			<p><?php echo $derow['itnary'];?></p>
		</div>
     </div>
	 
     <div id="tab3" class="tab_content"> 
	 
	 <?php
if(isset($_POST['adddatarvw']))
{
	$error = null;
	$name=$_POST['name'];
	$error.= $Validator->validate_empty($name,"Full Name");
	$name=$_POST['name'];
	$email=$_POST['email'];
	$rating=$_POST['rating'];
	$review=$_POST['review'];
	$content_id=$derow['id'];
	$is_active='N';
	
	if(!empty($error))
	{
	?>
		<div class="error_box">
			<?php echo $error; ?>
		 </div>  		 
	<?php		
	}
	else
	{
		$result = $Review-> add($content_id,$name,$email,$rating,$review,$is_active);
	
		if($result==1)
		{
			header("Location: home");
			?>
				<style>.niceform{display:none;}</style>
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
}
?>


	<form method="post">
		
            <div class="form_item">
  					<div class="form_label">
    					<label>  Name</label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="name" size="30" placeholder="Full Name" />
   		 			</div>
			</div>
			
			
            <div class="form_item">
  					<div class="form_label">
    					<label>  Email</label>
    				</div>
    				<div class="form_field">
    					<input type="email" name="email" size="30" placeholder="Enter your email" />
   		 			</div>
			</div>
			
			
            <div class="form_item">
  					<div class="form_label">
    					<label>  Ratings</label>
    				</div>
    				<div class="form_field">
    					<select name="rating">
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
							<option value="4">Four</option>
							<option value="5">Five</option>
					</select>
   		 			</div>
			</div>
			
			
            <div class="form_item">
  					<div class="form_label">
    					<label>  Review</label>
    				</div>
    				<div class="form_field">
    					<textarea name="review" cols="50" rows="6" placeholder="write your own reviews"></textarea>
   		 			</div>
			</div>
			
           
			
			<div class="form_item">
  				
    				<div class="">
    						<input class="submit_bitton" type="submit" value="Submit.." name="adddatarvw" />
   		 			</div>
			</div>
		</form>
		
		<h3 style="color:#AC3426;">Reviews</h3>
		<hr>
		<br>
		
		<?php
					$mresul=$Review->getReviews($_GET['id']);	
				while($mrow=$Conn->fetchAssoc($mresul))
				{
				?>
				<div class="bnews">
				<h4><a href=""><?php echo $mrow['name'];?></a></h4>
				<p style="font-size:14px"><?php echo $mrow['review'];?></p>
				<a style="float:right;font-size:12px" href=""><?php echo S_READ_MORE;?></a>
				</div>
				
				
				<?php
				}
				?>
				

     </div>
     <div id="tab4" class="tab_content"> 

     <?php include('inc/booking_form.php');?>

     </div>
	 
	
     
 </div> 

</div> 