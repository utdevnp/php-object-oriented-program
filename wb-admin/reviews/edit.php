<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=reviews&file=list.php");
 }
?>

<?php
	$result = $Review->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header("Location: index.php?folder=reviews&file=list.php");
		}
			$row = $Conn->fetchArray($result);
				$content_id=$row['content_id'];
				$name=$row['name'];
				$email=$row['email'];
				$rating=$row['rating'];
				$review=$row['review'];
				$is_active = $row['is_active'];
?>
<div class="message_area">
<?php
if(isset($_POST['editrt']))
{
	$id = $_GET['id'];
	$content_id=$_POST['content_id'];
				$name=$_POST['name'];
				$email=$_POST['email'];
				$rating=$_POST['rating'];
				$review=$_POST['review'];
				$is_active = $_POST['is_active'];

	$result = $Review->update($id,$content_id,$name,$email,$rating,$review,$is_active);

	if($result==1)
	{
		header("Location: index.php?folder=reviews&file=list.php&msg=Updated Succes!");
		?>
				<style>.niceform{display:none;}</style>
			<?php
	}
	else
	{
		?>
        <div class="error_box">
			<?php echo "Error <br />".mysqli_error($Connect->link);?>
        </div>
       <?php
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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Reviews Management >> Edit </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=reviews&file=list.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=reviews&file=add.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>
  
	<form method="post" class="niceform" >
	
	<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label> Content Id </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="content_id" size="30" value="<?php echo $content_id; ?>" />
   		 			</div>
			</div>
					
			<div class="form_item">
  					<div class="form_label">
    					<label>  Name </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="name" size="30" value="<?php echo $name; ?>" />
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<label>  Email </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="email" size="30" value="<?php echo $email; ?>" />
   		 			</div>
			</div>
			
			
			<div class="form_item">
  					<div class="form_label">
    					<label>  Rating </label>
    				</div>
    				<div class="form_field">
    				<select name="rating">
							<?php
								$values=array("One"=>1,"Two"=>2,"Three"=>3,"Four"=>4,"Five"=>5);
								 foreach ($values as $v)
								 {
									if($rating==$v)
									{
										echo "<option value='$v' selected>$v  </option>";
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
  					<div class="form_label">
    					<label>  Review</label>
    				</div>
    				<div class="form_field">
    					<textarea name="review" cols="50" rows="6"><?php echo $row['review'];?></textarea>
   		 			</div>
			</div>
			
			

			<div class="form_item">
  					<div class="form_label">
    					<label>Is Active  </label>
    				</div>
    				<div class="form_field">
						<select name="is_active">
							<?php
								$values=array('Yes*', 'No');
								 foreach ($values as $v)
								 {
									if($is_active==$v)
									{
										echo "<option value='$v' selected>$v * </option>";
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
    					<input class="submit_bitton" type="submit" value="Save & Update " name="editrt" />
   		 			</div>
			</div>
	</form>
</div><!-- form_area ends-->