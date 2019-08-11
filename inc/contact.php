<?php
		error_reporting(0);
		
  // form handler
  if($_POST && isset($_POST['submit_email'], $_POST['name'], $_POST['email'], $_POST['phoneno'], $_POST['address'], $_POST['message'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
	$address = $_POST['address'];
    $message = $_POST['message'];

    if(!$name) {
      $errorMsg = "Please enter your Name";
    } elseif(!$email || !preg_match("/^\S+@\S+$/", $email)) {
      $errorMsg = "Please enter a valid Email address";
    } elseif(!$message) {
      $errorMsg = "Please enter your comment in the Message box";
    } else {
       
	
	
	$messageFirst = "Message: ".$message."\n".$messageFirst;
	$messageFirst= "Address: ".$address."\n"."\n".$messageFirst;
	$messageFirst = "Email: ".$email ."\n".$messageFirst;
	$messageFirst = "Phone: ".$phoneno."\n".$messageFirst;
	$messageFirst = "Name: ".$name."\n".$messageFirst;

	 $subjestTtl = "Online Enquary";
	
	
	
	//$reply ='$email';
	$headers = "From: ".$email. "\r\n" .
    "Reply-To: ".$email. "\r\n" .
    "X-Mailer: PHP/" . phpversion();
    
     //$tottl ="nepal.epf@gmail.com";
     $tottl ="utshabluitel.utshab@gmail.com";
	mail($tottl, $subjestTtl, $messageFirst, $headers);
	  
      header("Location: success");
      exit;
    }

  }
?>

		<div class="contact">	
				<form method="post" id="form1" >
				
				 <div class="form_item">
  					<div class="form_label">
					<div style="padding:1%; font-size:18px;" class="form_label">
    					<small>Name</small>
    				</div>
    					
    				</div>
    				<div class="form_field">
    					<input style="padding:1%; width:98%;" required  name="name" type="text" id="name"  value="<?php echo $_GET['name'];?>"/>
   		 			</div>
				</div>
				
				 <div class="form_item">
  					<div style="padding:1%; font-size:18px;" class="form_label">
    					<small>Email</small>
    				</div>
    				<div class="form_field">
    					<input style="padding:1%; width:98%;" required  name="email" type="text" id="from"  value="<?php echo $_GET['email'];?>"/>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div style="padding:1%; font-size:18px;" class="form_label">
    					<small>Phone No</small>
    				</div>
    				<div class="form_field">
    						<input style="padding:1%; width:98%;" required  name="phoneno" type="number" id="order"  value="<?php echo $_GET['phoneno'];?>"/>
   		 			</div>
				</div>
				
				 <div class="form_item">
  					<div style="padding:1%; font-size:18px;" class="form_label">
    					<small>Address</small>
    				</div>
    				<div class="form_field">
    					<input style="padding:1%; width:98%;" required  name="address" type="text" id="subject"  value="<?php echo $_GET['address'];?>"/>
   		 			</div>
				</div>
				
				 
				
				 <div class="form_item">
  					<div style="padding:1%; font-size:18px;" class="form_label">
    					<small>Message</small>
    				</div>
    				<div class="form_field">
    						<textarea style="padding:1%; width:98%;" name="message" required  cols="6" rows="5" id="message" ><?php echo $_GET['message'];?></textarea><br /><br />
   		 			</div>
				</div>
				
				 
				<div class="form_item">
			<div style="padding:1%;font-size:18px; "  class="form_label">
    					<small>Verification </small>
    				</div>
				<div class="form_field">
					<input type="text" disabled="disabled" id="txtCaptcha" style="background:blue;padding:5px;width:30%;" />
					<input type="button"  style="padding:5px; width:20%;" id="btnrefresh" value="Refresh" onclick="DrawCaptcha();" />
					<input type="text" name="box"  style="padding:5px; width:35%;"  oninput="check(this)" required  id="txtInput"/>  <span style="color:red;">  * </span>
				</div>
			</div>
				
			<div class="form_item">
    				<div class="form_field">
    					<button  style="padding:2%; "class="submit_bitton" type="submit" title="Click Here To Send Your Equerries" type="submit" value="Send " name="submit_email" />Submit Your Enquiry</button>
   		 			</div>
			</div>	
				
				
		</form>	
		</div>