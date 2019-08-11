<div class="message_area">
<?php
if(isset($_POST['add_image_button']))
{
	$video_id=$_POST['video_id'];
	$p_id=$_POST['p_id'];
	$title=$_POST['title'];
	$url=$_POST['url'];
	$caption=$_POST['caption'];
	$is_active=$_POST['is_active'];
	
	//for upload file
		$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
		$ext=strtolower($ext);
		
		//call add() function & pass parameter & store returned value
		$result =  $Videos->add($video_id,$p_id,$title,$url,$caption,$is_active,$ext);
		
		//$random = microtime();
		$new_id = $Conn->insertid();
		$new_name = $new_id . "." . $ext;

	if($result==1)
	{
		move_uploaded_file($_FILES['ext']['tmp_name'],"upload/images/".$new_name);
		$video_id=$_GET['video_id'];
		header("Location: index.php?folder=video&file=list_videos.php&video_id=$video_id&msg=Record-added-successfully!");
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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Videos Management >> Gallery >> Videos >> Add New </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=video&file=list_videos.php&video_id=<?php echo $_GET['video_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=video&file=add_videos.php&video_id=<?php echo $_GET['video_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

	
  <div style="clear:both;"></div>	
	
	<form method="post" enctype="multipart/form-data"  class="">
			 <div  style="display:none;"class="form_item">
  					<div class="form_label">
    					<label>Video Gallery</label>
    				</div>
    				<div class="form_field">
						<select name="video_id">
							<option value="0">Self</option>
							<?php
								$sql = 'SELECT * FROM video WHERE parent_id=0';
								$result = $Conn->execute($sql);
								while($rowtr = $Conn->fetchArray($result))
								{	 
								   if($_GET['video_id']==$rowtr['id'])
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
			
			<div style="" class="form_item">
  					<div class="form_label">
    					<strong> Gallery Name</strong>
    				</div>
    				<div class="form_field">
    					<select name="p_id">
                        <option value="0">SELF</option>
                       	<?php
                            $result = $Content->getAll();
                            while($row = $Conn->fetchArray($result))
                            {
                        ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['content_title']; ?> </option>
                        <?php
                            }//while
                        ?>       
	               </select>
   		 			</div>
			</div>

             <div class="form_item">
  					<div class="form_label">
    					<label>  Title </label>
    				</div>
    				<div class="form_field">
    					<input type="text" size="50" name="title" />
   		 			</div>
			</div>
			
			 <div class="form_item">
  					<div class="form_label">
    					<label>  Id </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="url" size="30"  />
   		 			</div>
			</div>
			
			 <div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label>Description</label>
    				</div>
    				<div class="form_field">
						<?php   
							$ctrl_name  = 'caption';
							$sBasePath  = './fckeditor/';
							$oFCKeditor = new FCKeditor('caption') ;
							$oFCKeditor->Height = "250px";
							$oFCKeditor->Width = "580px";
							$oFCKeditor->BasePath = $sBasePath ;
							$oFCKeditor->Value = "" ;
							$oFCKeditor->Create() ;
						?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<label>Is Active</label>
    				</div>
    				<div class="form_field">
    					<select name="is_active">
							<option value="Y">Yes*</option>
							<option value="N">No</option>
						</select>
   		 			</div>
			</div>
			
			<div class="form_item">
  					
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Add New " name="add_image_button" />
   		 			</div>
			</div>

			
		
	</form>
</div><!-- form_area ends-->
