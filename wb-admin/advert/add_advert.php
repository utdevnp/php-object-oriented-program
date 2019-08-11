<div class="message_area">
<?php
if(isset($_POST['add_image_button']))
{
	$advertisement_id=$_GET['advertisement_id'];
	$title=$_POST['title'];
	$url=$_POST['url'];
	$caption=$_POST['caption'];
	$is_active=$_POST['is_active'];
	
	//for upload file
		$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
		$ext=strtolower($ext);
		
		//call add() function & pass parameter & store returned value
		$result =  $Advert->add($advertisement_id,$title,$url,$caption,$is_active,$ext);
		
		//$random = microtime();
		$new_id = $Conn->insertid();
		$new_name = $new_id . "." . $ext;

	if($result==1)
	{
		move_uploaded_file($_FILES['ext']['tmp_name'],GALLERY_IMG_DIR.$new_name);
		$advertisement_id=$_GET['advertisement_id'];
		header("Location: index.php?folder=advert&file=list_advert.php&advertisement_id=$advertisement_id&msg=Added Successfully!");
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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/gallery_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Gallery Management >> Images >> Add New </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=advert&file=list_advert.php&advertisement_id=<?php echo $_GET['advertisement_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=advert&file=add_advert.php&advertisement_id=<?php echo $_GET['advertisement_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>
  
  
	<form method="post" enctype="multipart/form-data"  class="">

			 <div class="form_item">
  					<div class="form_label">
					<strong> Title</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="40" name="title" required />
   		 			</div>
			</div>
			 <div class="form_item">
  					<div class="form_label">
					<strong> Url</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="40" name="url"   />
   		 			</div>
			</div>
			
			
					
					
    					
			 <div style="display:none;"  class="form_item">
  					<div class="form_label">
    					<strong>  Caption</strong>
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
			
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Is Active</strong>
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
    					<strong> Choose Photo </strong><small>( 720 X 541 )</small>
    				</div>
    				<div class="form_field">
    					<input type="file" name="ext" />
   		 			</div>
			</div>
			<div class="form_item">
  					
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Add Photo" name="add_image_button" />
   		 			</div>
			</div>

			
		
	</form>
</div><!-- form_area ends-->
