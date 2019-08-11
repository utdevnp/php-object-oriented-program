<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id&msg=Record-updated-successfully!");
 }

	//get feedback information in respect of Id
	$result = $Image->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id&msg=Record-updated-successfully!");
		}
			$row = $Conn->fetchArray($result);
				$gallery_id=$row['gallery_id'];
				$title=$row['title'];
				$url=$row['url'];
				$caption=$row['caption'];
				$is_active=$row['is_active'];
				$ext=$row['ext'];
				
				
				$file = SLIDER_IMG_DIR.$row['id'].".".$row['ext'];

?>

<div class="message_area">
<?php
if(isset($_POST['edit_image_button']))
{
	if($_FILES['ext']['name'] != "")
	{
		$id = $_GET['id'];
		$gallery_id=$_POST['gallery_id'];
		$title=$_POST['title'];
		$url=$_POST['url'];
		$caption=$_POST['caption'];
		$is_active=$_POST['is_active'];
		//for upload file
			$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
			$ext=strtolower($ext);
			
			$size=$_FILES['ext']['size'];// bytes// 1 MB = 1000000 bytes
			$allowed=array('jpg', 'jpeg', 'gif', 'png', 'bmw');
			if(!empty($ext))
			{
				if(!in_array($ext, $allowed))
				{
					$error_file_upload="Please upload Image in 'jpg', 'jpeg', 'gif', 'png', 'bmw' formats";		
				}
				else if($size>1000000)
				{
					$error_file_upload="File size should be less then 1mb";
				}
			}
			else
			{
				$error_file_upload=" No file Selection ";
			}
		
		
				//delete old photo   
							if(file_exists($file))
							{
							  //@ is error suppression operator
							  //unlink() deletes file and folder
							  @unlink($file);
							}
                        //create new file name
                        $new_file_name = $id.".".$ext;
						
			//call add() function & pass parameter & store returned value
			$result = $Image-> update($id,$gallery_id,$title,$url,$caption,$is_active,$ext);
			
			//$random = microtime();
			$new_id = $_GET['id'];
			$new_name = $new_id . "." . $ext;
			move_uploaded_file($_FILES['ext']['tmp_name'],SLIDER_IMG_DIR.$new_name);

		if($result==1)
		{
			$gallery_id=$_GET['gallery_id'];
			header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id&msg=Record-updated-successfully!");
		}
		else
		{
			?>
			<div class="error_box">
				<?php echo "Error <br />".mysqli_error($Conn->link);?>
			</div>
        <?php
		}
	}
	else
	{
			

			$id = $Conn->clean($_GET['id']);
			$counter = $Image->checkExistence($id);
			$result = $Image->getById($id);
			$row = $Conn->fetchArray($result);
		  
			$id = $_GET['id'];
			$gallery_id=$_POST['gallery_id'];
			$title=$_POST['title'];
			$url=$_POST['url'];
			$caption=$_POST['caption'];
			$is_active=$_POST['is_active'];
			
			$new_id = $_GET['id'];
			$new_name = $row['id'].".".$row['ext'];
			
			//call add() function & pass parameter & store returned value
			$result = $Image-> update($id,$gallery_id,$title,$url,$caption,$is_active,$ext);
			
			
		if($result==1)
		{
			$gallery_id=$_GET['gallery_id'];
			header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id&msg=Updated Success!!!");
		}
		else
		{
			?>
			<div class="error_box">
				<?php echo "Error <br />".mysqli_error($Conn->link);?>
			</div>
        <?php
		}
	}
}
?>
</div>

		<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Slider Management >> Photos >> Edit</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=image&file=list_image.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=image&file=add_image.php&gallery_id=<?php echo $_GET['gallery_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>
  


<div class="">
<?php 
     include('fckeditor/fckeditor.php'); 
     ?> 
	<form method="post" enctype="multipart/form-data"  class="">
				
				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label>  Gallery </label>
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
    					<label> Title</label>
    				</div>
    				<div class="form_field">
    					<input type="text" required name="title" size="40" value="<?php echo $title; ?>" />
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<label> URL</label>
    				</div>
    				<div class="form_field">
    					<input type="url" size="30"  name="url" value="<?php echo $url; ?>" />
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<label> Caption</label>
    				</div>
    				<div class="form_field">
						<?php   
							$ctrl_name  = 'caption';
							$sBasePath  = './fckeditor/';
							$oFCKeditor = new FCKeditor('caption') ;
							$oFCKeditor->Height = "250px";
							$oFCKeditor->Width = "580px";
							$oFCKeditor->BasePath = $sBasePath ;
							$oFCKeditor->Value = "$caption" ;
							$oFCKeditor->Create() ;
						?>
   		 			</div>
				</div>
			
				<div style="display:none" class="form_item">
  					<div class="form_label">
    					<label>Is Active</label>
    				</div>
    				<div class="form_field">
						<select name="is_active">
							<?php
								$values=array('Y', 'N');
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
				
				<div align="left"  class="form_item">
					<div class="form_label">
    					<label> Photo </label>
    				</div>
					<div class="form_field">
    					<img align="right" src="<?php echo  SLIDER_IMG_DIR.$_GET['id'].'.'.$row['ext'];?>"  height="60" width="110"  />
   		 			</div>
					<div class="form_field">
						<input align="left" type="file" name="ext" />
   		 			</div>
				</div>
				
				<div class="form_item">
					<div class="form_strong">
    					<label> </label>
    				</div>
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Save & Update" name="edit_image_button" />
   		 			</div>
				</div>

		
	</form>
</div><!-- form_area ends-->
