<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=img&file=list_img.php");
 }

	//get feedback information in respect of Id
	$result = $Img->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			header("Location: index.php?folder=img&file=list_img.php");
		}
			$row = $Conn->fetchArray($result);
				$picture_id=$row['picture_id'];
				$title=$row['title'];
				$url=$row['url'];
				$email=$row['email'];
				$caption=$row['caption'];
				$position=$row['position'];
				$is_active=$row['is_active'];
				$ext=$row['ext'];
?>

<div class="message_area">
<?php
if(isset($_POST['edit_image_button']))
{
	if($_FILES['ext']['name'] != "")
	{
		$id = $_GET['id'];
		$picture_id=$_POST['picture_id'];
		$title=$_POST['title'];
		$url=$_POST['url'];
		$email=$_POST['email'];
		$caption=$_POST['caption'];
		$position=$_POST['position'];
		$is_active=$_POST['is_active'];
		
		
		//for upload file
			$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
			$ext=strtolower($ext);
				//delete old photo   
							if(file_exists($file))
							{
							  //@ is error suppression operator
							  //unlink() deletes file and folder
							  @unlink($file);
							}
                        //create new file name
                        $new_file_name = $id.".".$extension;
                    
			//call add() function & pass parameter & store returned value
			$result = $Img-> update($id,$picture_id,$title,$email,$url,$caption,$position,$is_active,$ext);
			
			//$random = microtime();
			$new_id = $_GET['id'];
			$new_name = $new_id . "." . $ext;
			move_uploaded_file($_FILES['ext']['tmp_name'],"upload/img/".$new_name);

		if($result==1)
		{
			$picture_id=$_GET['picture_id'];
			header("Location: index.php?folder=img&file=list_img.php&picture_id=$picture_id&msg=Record-updated-successfully!");
				?>
					
				<?php
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
		$id = $_GET['id'];
		$picture_id=$_POST['picture_id'];
		$title=$_POST['title'];
		$url=$_POST['url'];
		$email=$_POST['email'];
		$caption=$_POST['caption'];
		$position=$_POST['position'];
		$is_active=$_POST['is_active'];
		
		//call add() function & pass parameter & store returned value
			$result = $Img->update($id,$picture_id,$title,$email,$url,$caption,$position,$is_active);
			
		if($result==1)
		{
			$picture_id=$_GET['picture_id'];
			header("Location: index.php?folder=img&file=list_img.php&picture_id=$picture_id&msg=Record-updated-successfully!");
			?>
				
			<?php
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
</div><!-- message_area ends -->

<div align="right">
	<a href="index.php?folder=img&file=list_img.php&picture_id=<?php echo $_GET['picture_id']; ?>"> 
   	<img src="graphics/go-back.png" height="30" width="50" alt="Go Back" title="Go Back" /> </a>
</div>

<div class="">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?> 
	<form method="post" enctype="multipart/form-data"  class="">
		<fieldset>
			<legend>
				<strong>Edit Photo</strong>
			</legend>
				
				<div style="display:none;" class="form_item">
  					<div class="form_strong">
    					<strong>  Gallery </strong>
    				</div>
    				<div class="form_field">
						<select name="picture_id">
							<option value="0">Self</option>
							<?php
								$sql = 'SELECT * FROM picturs WHERE parent_id=0';
								$result = $Conn->execute($sql);
								while($rowtr = $Conn->fetchArray($result))
								{	 
								   if($_GET['picture_id']==$rowtr['id'])
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
  					<div class="form_strong">
    					<strong> Name</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="50" name="title" value="<?php echo $title; ?>" />
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_strong">
    					<strong> Address</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="40" name="url" value="<?php echo $url; ?>" />
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_strong">
    					<strong>Contact No</strong>
    				</div>
    				<div class="form_field">
						<input type="text" size="50" name="caption" value="<?php echo $caption; ?>" />
						
   		 			</div>
				</div>
				
				
				<div class="form_item">
  					<div class="form_strong">
    					<strong>Email</strong>
    				</div>
    				<div class="form_field">
						<input type="text" size="50" name="caption" value="<?php echo $caption; ?>" />
						
   		 			</div>
				</div>
				
				
				<div class="form_item">
  					<div class="form_strong">
    					<strong> Position</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="40" name="position" value="<?php echo $position; ?>" />
   		 			</div>
				</div>
			
				<div class="form_item">
  					<div class="form_strong">
    					<strong>Is Active</strong>
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
				
				<div align="left"  class="form_item">
					<div class="form_strong">
    					<strong> Photo </strong>
    				</div>
					<div class="form_field">
    					<img align="right" src="upload/img/<?php echo $row['id'].'.'.$row['ext'];?>"  height="60" width="110"  />
   		 			</div>
					<div class="form_field">
						<input align="left" type="file" name="ext" />
   		 			</div>
				</div>
				
				<div class="form_item">
					<div class="form_strong">
    					<strong> </strong>
    				</div>
    				<div class="form_field">
    					<input  class="submit_bitton" type="submit" title="Click Here To Save & Upadte " value="Save & Update" name="edit_image_button" />
   		 			</div>
				</div>

		
	</form>
</div><!-- form_area ends-->
