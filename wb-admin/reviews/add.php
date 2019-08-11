<div class="message_area">
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
	$content_id=$_POST['content_id'];
	$is_active=$_POST['is_active'];
	
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
			header("Location: index.php?folder=reviews&file=list.php&msg=Added Success!!");
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
</div><!-- message_area ends -->

<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
 
 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Review Management >> Add </h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

  <div style="clear:both;"></div>
  
	<form method="post"  class="niceform">
		
			<div style="" class="form_item">
  					<div class="form_label">
    					<label> Content Id  </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="content_id" size="30" />
   		 			</div>
			</div>
			
            <div class="form_item">
  					<div class="form_label">
    					<label>  Name</label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="name" size="30" />
   		 			</div>
			</div>
			
			
            <div class="form_item">
  					<div class="form_label">
    					<label>  Email</label>
    				</div>
    				<div class="form_field">
    					<input type="email" name="email" size="30" />
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
    					<textarea name="review" cols="50" rows="6"></textarea>
   		 			</div>
			</div>
			
            <div class="form_item">
  					<div class="form_label">
    					<label> Is Active </label>
    				</div>
    				<div class="form_field">
    				<select name="is_active">
						<?php
                            $values=array('Yes', 'No');
                             foreach ($values as $v)
                             {
                                if($is_active==$v)
                                {
                                    echo "<option value='$v' selected>$v *</option>";
                                }
                                else 
                                {
                                echo "<option value='$v'>$v</option>";
                                }
                             }
                         ?>
					</select>
   		 			</div>
			</div>
			
			<div class="form_item">
  				
    				<div class="">
    						<input class="submit_bitton" type="submit" value="Add New Reviews " name="adddatarvw" />
   		 			</div>
			</div>
		</form>
</div><!-- form_area ends-->
