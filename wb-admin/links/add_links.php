
        	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Links Management >> Links >> Add New</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=links&file=list_links.php&link_id=<?php echo $_GET['link_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=links&file=add_links.php&link_id=<?php echo $_GET['link_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>



<div class="message_area">
<?php
if(isset($_POST['add_image_button']))
{
	$link_id=$_POST['link_id'];
	$title=$_POST['title'];
	$url=$_POST['url'];
	$is_active=$_POST['is_active'];
	
	//for upload file
		$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
		$ext=strtolower($ext);
		
		//call add() function & pass parameter & store returned value
		$result =  $Links->add($link_id,$title,$url,$is_active,$ext);
		
		//$random = microtime();
		$new_id = $Conn->insertid();
		$new_name = $new_id . "." . $ext;

	if($result==1)
	{
		move_uploaded_file($_FILES['ext']['tmp_name'],LINK_IMG_DIR.$new_name);
		$link_id=$_GET['link_id'];
		header("Location: index.php?folder=links&file=list_links.php&link_id=$link_id&msg=Added Success!!");
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

<div class="form_area">
	<?php include('fckeditor/fckeditor.php'); ?> 

	
  <div style="clear:both;"></div>	
	
	<form method="post" enctype="multipart/form-data"  class="">
			
			 <div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong> Gallery</strong>
    				</div>
    				<div class="form_field">
						<select name="link_id">
							<option value="0">Self</option>
							<?php
								$sql = 'SELECT * FROM link_album WHERE parent_id=0';
								$result = $Conn->execute($sql);
								while($rowtr = $Conn->fetchArray($result))
								{	 
								   if($_GET['link_id']==$rowtr['id'])
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
    					<strong>  Title </strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="50" name="title" />
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					<strong>  Url </strong>
    				</div>
    				<div class="form_field">
    					<input type="text"  name="url" size="50" value="http://"  />
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					<strong>Image</strong>
    				</div>
    				<div class="form_field">
						<input type="file" name="ext" size="50" />
   		 			</div>
			</div>
			
			
			<div class="form_item">
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
  					
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Add New  " name="add_image_button" />
   		 			</div>
			</div>

			
		
	</form>
</div><!-- form_area ends-->
