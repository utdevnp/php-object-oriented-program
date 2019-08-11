<div class="message_area">
<?php
if(isset($_POST['add_image_button']))
{
	$middlead_id=$_POST['middlead_id'];
	$title=$_POST['title'];
	$is_active=$_POST['is_active'];
	$ext=$_POST['ext'];
	
	//for upload file
		$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
		$ext=strtolower($ext);
		
		//call add() function & pass parameter & store returned value
		$result =  $Middleadvert->add($middlead_id,$title,$is_active,$ext);
		
		//$random = microtime();
		$new_id = $Conn->insertId();
		$new_name = $new_id . "." . $ext;

	if($result==1)
	{
		move_uploaded_file($_FILES['ext']['tmp_name'],DOWNLOAD_IMG_DIR.$new_name);
		$middlead_id=$_GET['middlead_id'];
		header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id&msg=Updated Successfully!");
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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/downloads.gif) no-repeat; text-indent:40px; Padding:5px;">Download Manager >> Files >> Add New</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=middleadvert&file=add_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	<div style="clear:both;"></div>
<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 

	<form method="post" enctype="multipart/form-data"  class="">
			
			 <div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong> Group  </strong>
    				</div>
    				<div class="form_field">
						<select name="middlead_id">
							<option value="0">Self</option>
							<?php
								$sql = 'SELECT * FROM middlead WHERE parent_id=0';
								$result = $Conn->execute($sql);
								while($rowtr = $Conn->fetchArray($result))
								{	 
								   if($_GET['middlead_id']==$rowtr['id'])
											{
									?>
										<option value="<?php echo $rowtr['id']; ?>" selected> * <?php echo $rowtr['name']; ?> </option>
									<?php
											}
											else
											{
											?>
												<option value="<?php echo $rowtr['id']; ?>"><?php echo $rowtr['name']; ?> </option>
											<?php }
								}//while
							?>
					   </select>
   		 			</div>
			</div>

             <div class="form_item">
  					<div class="form_label">
    					<strong>  Name </strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="50" name="title" />
   		 			</div>
			</div>
			
			
			
			
			
			
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Is Active  </strong>
    				</div>
    				<div class="form_field">
    					<select name="is_active">
							<option value="Y">Yes</option>
							<option value="N">No</option>
						</select>
   		 			</div>
			</div>
			<div class="form_item">
  					<div class="form_label">
    					<strong> Files </strong>
    				</div>
    				<div class="form_field">
    					<input type="file" name="ext"  value="1048576"/> <small><b> [ Less then 1 MB] </b></small>
						
 		 			</div>
			</div>
			<div class="form_item">
  					
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Add New " name="add_image_button" />
   		 			</div>
			</div>

	</form>
</div><!-- form_area ends-->
