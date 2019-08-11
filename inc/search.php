<div class="search"> 

	
	<div class="testimonial animatedElement">
		<div class="bestsaller_head">
	<h2>TESTIMONIAL</h2>  
	</div>
	<?php
			$mresult=$Content->getByGroupIdlistParentWithLimits(3);	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
				?>
				<h3 align="center"><?php echo $mrow['content_title'];?> </h3>
				<?php
				$result1 = $Attachment->GetAttachmentOfContent($mrow['id'],1);
				while($row1 =$Conn->fetchArray($result1))
				{
				$Image1 = S_ATTACH_FILE_DIR.$row1['id'].".".$row1['myfile'];
				?>
				<div class="testi_content" align="center">
			<img src="<?php echo $Image1;?>" title="<?php echo $row1['title'];?>" alt="<?php echo $row1['title'];?>"/>
			</div>
			<?php
				}
			?>
				
				<p><?php echo $Conn->textWithLimit($mrow['short_description'],180);?> </p>
				<p align="right"> <a class="readmore" href="pages-testimunial-<?php echo $mrow['id'];?>" alt="">  <?php echo S_READ_MORE;?>  </a> </p> 
			<?php
				}
				
			?>
	
	</div>
	
	<div class="testimonial animatedElement">
		<div class="bestsaller_head">
	<h2>OUR VIDEO</h2>  
	</div>
	<?php
				$result = $Videos->getByVideoIdWithLimit(1,1,"DESC");
		while($row1=$Conn->fetchArray($result))
		{
		?>
		<iframe width="100%" height="250" style="padding:5px;" src="https://www.youtube.com/embed/<?php echo $row1['url'];?>?rel=0" frameborder="0" allowfullscreen></iframe>
		<?php
		}
		?>
	</div>
	
	<div class="googlemap animatedElement">
		<div class="bestsaller_head">
	<h2>SPORTS ACTIVITIES</h2>  
	</div>
	
	<?php
				$result = $Advert->GetGallerydWithLimit(8);
				while($row = $Conn->fetchArray($result)){
				$link_image = S_GALLERY_DIR.$row['id'].".".$row['ext'];
				?>
				<img style="margin-top:1%;" width="100%" src="<?php echo $link_image ;?>" title="<?php echo $row['title'];?>">
				<?php
				}
				?>
		 
		 
	</div>
	
						
		</div>



		<!------------ NEXT ------->

		
		
		<div class="search neextBlock"> 

	
	<div class="NextBox1 animatedElement">
		<div class="bestsaller_head">
	<h2>Feature</h2>  
	</div>
	<?php
				$result = $Advert->GetGallerydWithLimit(9);
				while($row = $Conn->fetchArray($result)){
				$link_image = S_GALLERY_DIR.$row['id'].".".$row['ext'];
				?>
				<img style="margin-top:1%;" width="100%" height="315px;" src="<?php echo $link_image ;?>" title="<?php echo $row['title'];?>">
				<?php
				}
				?>
		 
	
	</div>
	
	<div class="NextBox1 animatedElement">
		<div class="bestsaller_head">
	<h2>Feature</h2>  
	</div>
	<?php
				$result = $Advert->GetGallerydWithLimit(11);
				while($row = $Conn->fetchArray($result)){
				$link_image = S_GALLERY_DIR.$row['id'].".".$row['ext'];
				?>
				<img style="margin-top:1%;" width="100%" height="315px;" src="<?php echo $link_image ;?>" title="<?php echo $row['title'];?>">
				<?php
				}
				?>
		 
	
	</div>
	
	
	
	<div class="getfreequote animatedElement short_quote">
		<div class="bestsaller_head">
	<h2>GET A FREE QUOTE</h2>  
	</div>
	
		<div style="margin-top:2%; width:97%;" class="map">
			
			<?php
		error_reporting(0);
		
  // form handler
  if(isset($_POST['sendquote'])) {

    $name = $_POST['name'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$duration = $_POST['duration'];
	$dateoftravel = $_POST['dateoftravel'];
    $descrip = $_POST['descrip'];
	session_start();
	if($_POST['captcha'] != $_SESSION['digit']){
		unset($_SESSION['digit']);
			echo  "<b style='color:red;'>Verification Wrong !!!</b>";
	}else{
					
    if(!$name) {
      $errorMsg = "Please enter your Name";
    } elseif(!$email || !preg_match("/^\S+@\S+$/", $email)) {
      $errorMsg = "Please enter a valid Email address";
    } elseif(!$descrip) {
      $errorMsg = "Please enter your comment in the Message box";
    } else {
       
	
	
	$messageFirst = "Message: ".$descrip."\n".$messageFirst;
	$messageFirst = "Email: ".$email ."\n".$messageFirst;
	$messageFirst = "Phone: ".$phone."\n".$messageFirst;
	$messageFirst = "Duration: ".$duration."\n".$messageFirst;
	$messageFirst = "Date of Travel: ".$dateoftravel."\n".$messageFirst;
	$messageFirst = "Country: ".$country."\n".$messageFirst;
	$messageFirst = "Name: ".$name."\n".$messageFirst;

	 $subjestTtl = "Online Enquary";
	
	
	
	//$reply ='$email';
	$headers = "From: ".$email. "\r\n" .
    "Reply-To: ".$email. "\r\n" .
    "X-Mailer: PHP/" . phpversion();
    
     
     //$tottl ="utshabluitel.utshab@gmail.com";
     $tottl ="webbanknepal@gmail.com";
	mail($tottl, $subjestTtl, $messageFirst, $headers);
	  
      echo  "<b style='color:green;'>Success !!!</b>";
    }
	}
	
  }
?>




			<form method="post">
					<div class="form_item">
						<div class="form_field" style="margin:5px;">
							<input style="padding:1%; width:98%;" required="" name="name" placeholder="Name" type="text" id="name" value="">
						</div>
					</div>
					<div class="form_item">
						<div class="form_field"  style="margin:5px;">
							
							<select style="padding:1%; width:100%;" required   name="country"> 
								<option>Country</option>
								<?php include('inc/country.php');?>
							</select>
						</div>
					</div>
					<div class="form_item">
						<div class="form_field" style="margin:5px;">
							<input style="padding:1%; width:100%;" required="" name="dateoftravel" placeholder="Date of Travel" type="text" id="name" value="">
						</div>
					</div>
					<div class="form_item">
						<div class="form_field"  style="margin:5px;">
							<select style="padding:1%; width:100%;" required   name="duration"> 
								<option>Duration</option>
								<option>1-5</option>
								<option>1-10</option>
								<option>1-20</option>
								<option>1-30</option>
							</select>
						</div>
					</div>
					<div class="form_item">
						<div class="form_field" style="margin:5px;">
							<input style="padding:0.5%; width:98%;" required="" name="phone" placeholder="Phone No" type="text" id="name" value="">
						</div>
					</div>
					<div class="form_item">
						<div class="form_field"  style="margin:5px;">
							<input style="padding:1%; width:100%;" required="" name="email" placeholder="Email Id" type="text" id="name" value="">
						</div>
					</div>
					<div class="form_item">
						<div class="form_field"  style="margin:5px;">
							<textarea style="padding:1%; width:100%;" required="" name="descrip" placeholder="Recurments" type="text" id="name" value=""></textarea>
						</div>
					</div>
					
					<div class="form_item">
					<div class="form_field"  style="margin:5px;">
						<p><img style="float:left;" src="inc/captcha.php" width="120" height="30" border="1" alt="CAPTCHA">  <input style="padding:1%; width:40%; float:right;" type="text" size="6" maxlength="5" name="captcha" value=""></p>
						<small id="type" style="float:right;">Type Above Number</small><br>
						</p>
					</div>
					</div>
					
					
					<div class="form_item">
						<div class="">
    						<input class="submit_bitton1 form_item" type="submit"   value="Submit"  name="sendquote">
    						<input class="submit_bitton1 form_item" type="reset" value="Reset">
						</div>
					</div>
			</form>
		</div>
		 
		 
	</div>
	
	
						
		</div>