<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id&msg=File Not Found");
 }

	//get feedback information in respect of Id
	$result = $Middleadvert->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id&msg=Not Found");
		}
			$row = $Conn->fetchArray($result);
				$middlead_id=$row['middlead_id'];
				$title=$row['title'];
				$is_active=$row['is_active'];
				$ext=$row['ext'];
				
				$file = DOWNLOAD_IMG_DIR.$row['id'].".".$row['ext'];
?>

<div class="message_area">
<?php
if(isset($_POST['edit_image_button']))
{
	if($_FILES['ext']['name'] != "")
	{
		$id = $_GET['id'];
		$middlead_id=$_POST['middlead_id'];
		$title=$_POST['title'];
		$is_active=$_POST['is_active'];
		//for upload file
			$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
			$ext=strtolower($ext);
			
			$size=$_FILES['ext']['size'];// bytes// 1 MB = 1000000 bytes
			$allowed=array('pdf', 'txt', 'dox', 'docx');
			if(!empty($ext))
			{
				if(!in_array($ext, $allowed))
				{
					$error_file_upload="Please upload Image in 'pdf', 'txt', 'dox', 'docx'";		
				}
				else if($size>1000000)
				{
					echo $error_file_upload="File size should be less then 1mb";
				}
			}
			else
			{
				echo $error_file_upload=" No file Selection ";
			}
		
		
				//delete old photo   
							if(file_exists($file))
							{
							  @unlink($file);
							}
                        $new_file_name = $id.".".$ext;
						
			
			$result = $Middleadvert-> update($id,$middlead_id,$title,$is_active,$ext);
			
			
			$new_id = $_GET['id'];
			$new_name = $new_id . "." . $ext;
			move_uploaded_file($_FILES['ext']['tmp_name'],DOWNLOAD_IMG_DIR.$new_name);

		if($result==1)
		{
			$middlead_id=$_GET['middlead_id'];
			header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id&msg=Updated Successfully!");
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
	else
	{
			

			$id = $Conn->clean($_GET['id']);
			$counter = $Middleadvert->checkExistence($id);
			$result = $Middleadvert->getById($id);
			$row = $Conn->fetchArray($result);
		  
			$id = $_GET['id'];
			$middlead_id=$_POST['middlead_id'];
			$title=$_POST['title'];
			$is_active=$_POST['is_active'];
			
			$new_id = $_GET['id'];
			$new_name = $row['id'].".".$row['ext'];
			
			//call add() function & pass parameter & store returned value
			$result = $Middleadvert-> update($id,$middlead_id,$title,$is_active,$ext);
			
			
		if($result==1)
		{
			$middlead_id=$_GET['middlead_id'];
			header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id&msg=Updated Successfully!");

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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/downloads.gif) no-repeat; text-indent:40px; Padding:5px;">Download Manager >> Files >> Edit</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=middleadvert&file=add_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>
  


<div class="">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?> 
	<form method="post" enctype="multipart/form-data"  class="">
				
				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>  Group </strong>
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
    					<strong> Name</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" name="title" size="50" value="<?php echo $title; ?>" />
   		 			</div>
				</div>
				
				
			
				<div style="display:none;" class="form_item">
  					<div class="form_label">
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
					<div class="form_label">
    					<strong> File </strong>
    				</div>
					<div class="form_field">
   		 			</div>
					<div class="form_field">
					
						<input align="left" type="file" name="ext"  /><small> Exist File <b>[ <?php echo $row['id'].".".$row['ext'];?> ]</b></small>
						
   		 			</div>
				</div>
				
				<div class="form_item">
					<div class="form_label">
    					<strong> </strong>
    				</div>
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Save & Update" name="edit_image_button" />
   		 			</div>
				</div>

		
	</form>
</div><!-- form_area ends-->
