
        	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Links Management >> Links >> Edit</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=links&file=list_links.php&link_id=<?php echo $_GET['link_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=links&file=add_links.php&link_id=<?php echo $_GET['link_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>



<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=links&file=list_links.php");
 }

	//get feedback information in respect of Id
	$result = $Links->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			header("Location: index.php?folder=links&file=list_links.php");
		}
			$row = $Conn->fetchArray($result);
				$link_id=$row['link_id'];
				$title=$row['title'];
				$url=$row['url'];
				$is_active=$row['is_active'];
				$ext=$row['ext'];
			$file = LINK_IMG_DIR.$row['id'].".".$row['ext'];
?>

<div class="message_area">
<?php
if(isset($_POST['edit_image_button']))
{
	if($_FILES['ext']['name'] != "")
	{
		$id = $_GET['id'];
		$link_id=$_POST['link_id'];
		$title=$_POST['title'];
		$url=$_POST['url'];
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
                        $new_file_name = $id.".".$ext;
                    
			//call add() function & pass parameter & store returned value
			$result = $Links-> update($id,$link_id,$title,$url,$is_active,$ext);
			
			//$random = microtime();
			$new_id = $_GET['id'];
			$new_name = $new_id . "." . $ext;
			move_uploaded_file($_FILES['ext']['tmp_name'],LINK_IMG_DIR.$new_name);

		if($result==1)
		{
			$link_id=$_GET['link_id'];
			header("Location: index.php?folder=links&file=list_links.php&link_id=$link_id&msg=Record-updated-successfully!");
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
		$link_id=$_POST['link_id'];
		$title=$_POST['title'];
		$url=$_POST['url'];
		$is_active=$_POST['is_active'];
		$new_id = $_GET['id'];
		$new_name = $row['id'].".".$row['ext'];
	
			$result = $Links->update($id,$link_id,$title,$url,$is_active,$ext);
			
		if($result==1)
		{
			$link_id=$_GET['link_id'];
			header("Location: index.php?folder=links&file=list_links.php&link_id=$link_id&msg=Updated Successfully!");
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

	
  <div style="clear:both;"></div>

<div class="">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?> 
	<form method="post" enctype="multipart/form-data"  class="">

				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Gallery</strong>
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
    					<strong> Title</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="50" name="title" value="<?php echo $title; ?>" />
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<strong> Url</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" name="url" value="<?php echo $url; ?>" size="50" />
   		 			</div>
				</div>
				
					
			 <div class="form_item">
  					<div class="form_label">
    					<strong>Image</strong>
    				</div>
    				<div class="form_field">
						<input type="file" name="ext" size="50" /><small> Exist file : <b>[ <?php echo $row['id'].".".$row['ext'];?> ]</b></small>
						
   		 			</div>
			</div>
				

				<div class="form_item">
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
