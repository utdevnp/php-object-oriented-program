<div class="message_area">
<?php
if(isset($_POST['add_image_button']))
{
	$gallery_id=$_POST['gallery_id'];
	$title=$_POST['title'];
	$url=$_POST['url'];
	$caption=$_POST['caption'];
	$is_active=$_POST['is_active'];
	
	//for upload file
		$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
		$ext=strtolower($ext);
		
		//call add() function & pass parameter & store returned value
		$result =  $Image->add($gallery_id,$title,$url,$caption,$is_active,$ext);
		
		//$random = microtime();
		$new_id = $Conn->insertId();
		$new_name = $new_id . "." . $ext;

	if($result==1)
	{
		move_uploaded_file($_FILES['ext']['tmp_name'],SLIDER_IMG_DIR.$new_name);
		$gallery_id=$_GET['gallery_id'];
		header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id&msg=Added Success!!!");
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

<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Slider Management >> Photos >> Add New</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=image&file=list_image.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=image&file=add_image.php&gallery_id=<?php echo $_GET['gallery_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>
  
	<form method="post" enctype="multipart/form-data"  class="">
			
			 <div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label>Gallery</label>
    				</div>
    				<div class="form_field">
						<select name="gallery_id">
							<option value="0">Self</option>
							<?php
								$sql = 'SELECT * FROM gallery WHERE parent_id=0';
								$result = $Conn->execute($sql);
								while($rowtr = $Conn->fetchArray($result))
								{	 
								   if($_GET['gallery_id']==$rowtr['id'])
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
    					<label>  Title</label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="title" required size="40" />
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					<label>  URL </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="url" size="30" value="http://" />
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					<label> Caption </label>
    				</div>
    				<div class="form_field">
						<?php   
							$ctrl_name  = 'caption';
							$sBasePath  = './fckeditor/';
							$oFCKeditor = new FCKeditor('caption') ;
							$oFCKeditor->Height = "300px";
							$oFCKeditor->Width = "580px";
							$oFCKeditor->BasePath = $sBasePath ;
							$oFCKeditor->Value = "" ;
							$oFCKeditor->Create() ;
						?>
   		 			</div>
			</div>
			
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label>Is Active  </label>
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
    					<label>Slider Photo </label><small>( weight 656 X 276 height )</small>
    				</div>
    				<div class="form_field">
    					<input type="file" name="ext" required />
   		 			</div>
			</div>
			<div class="form_item">
  					
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Add New Photo" name="add_image_button" />
   		 			</div>
			</div>

			
		
	</form>
</div><!-- form_area ends-->
