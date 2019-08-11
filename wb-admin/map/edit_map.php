<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=map&file=list_map.php&msg=Updated Successfully!");
 }

	//get feedback information in respect of Id
	$result = $Map->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			header("Location: index.php?folder=map&file=list_map.php&msg=Updated Successfully!");
		}
			$row = $Conn->fetchArray($result);
				$advertisement_id=$row['advertisement_id'];
				$title=$row['title'];
				$url=$row['url'];
				$caption=$row['caption'];
				$is_active=$row['is_active'];
				$ext=$row['ext'];

				$file = MAP_IMG_DIR.$row['id'].".".$row['ext'];
?>

<div class="message_area">
<?php
if(isset($_POST['edit_image_button']))
{
	if($_FILES['ext']['name'] != "")
	{
		$id = $_GET['id'];
		$advertisement_id=$_POST['advertisement_id'];
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
			$result = $Map-> update($id,$advertisement_id,$title,$url,$caption,$is_active,$ext);
			
			//$random = microtime();
			$new_id = $_GET['id'];
			$new_name = $new_id . "." . $ext;
			move_uploaded_file($_FILES['ext']['tmp_name'],MAP_IMG_DIR.$new_name);

		if($result==1)
		{
			$advertisement_id=$_GET['advertisement_id'];
			header("Location: index.php?folder=map&file=list_map.php&msg=Updated Successfully!");
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
				//query database for existence
			$counter = $Map->checkExistence($id);
				//if record exists, retrieve record pointed by id
			$result = $Map->getById($id);
				//convert resultset into associative array
				// $row = mysql_fetch_array($result);
			$row = $Conn->fetchArray($result);
		  
			$id = $_GET['id'];
			$advertisement_id=$_POST['advertisement_id'];
			$title=$_POST['title'];
			$url=$_POST['url'];
			$caption=$_POST['caption'];
			$is_active=$_POST['is_active'];
			
			$new_id = $_GET['id'];
			$new_name = $row['id'].".".$row['ext'];
			
			//call add() function & pass parameter & store returned value
			$result = $Map-> update($id,$advertisement_id,$title,$url,$caption,$is_active,$ext);
			
			
		if($result==1)
		{
			$advertisement_id=$_GET['advertisement_id'];
			header("Location: index.php?folder=map&file=list_map.php&msg=Updated Successfully!");
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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/map.png) no-repeat; text-indent:40px; Padding:5px;">Map Management >> Edit</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=map&file=list_map.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=map&file=add_map.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New "  /></a> 
	</div>
  <div style="clear:both;"></div>

<div class="">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
	 
     ?> 
	<form method="post" enctype="multipart/form-data"  class="">
						
				<div style="" class="form_item">
  					<div class="form_label">
    					<strong> Content Name </strong>
    				</div>
    				<div class="form_field">
						<select name="advertisement_id">
				<?php
				  if($advertisement_id==0)
				  {
					  echo '<option value="0" selected>'; 
						  echo "* SELF ";
					  echo "</option>";	
				  }
				  else
				  {
					  echo '<option value="0">'; 
						  echo " SELF ";
					  echo "</option>";	
				  }
				?>                
                
                <?php
					$parent_list = $Content->getAll();
					while($parent_row = $Conn->fetchArray($parent_list))
					{		
						$pid= $parent_row['id'];
							
							if($advertisement_id==$pid)
							{
								
								echo "<option value=\"$pid\" selected>"; 
									echo "* ".$parent_row['content_title'];
								echo "</option>";	
							}
							else
							{
								echo "<option value=\"$pid\">";	
									echo $parent_row['content_title'];
								echo "</option>";	

							}

					}
				?>
            </select>
   		 			</div>
				</div>
				
				
				
			
					
					<div class="form_item">
						<div class="form_label">
							<strong> Title</strong>	
						</div>
    				<div class="form_field">
    					<input type="text" size="40" name="title" value="<?php echo $title; ?>" />
   		 			</div>
				</div>
				
					<div class="form_item">
						<div class="form_label">
							<strong> Url</strong>
						</div>
    				<div class="form_field">
    					<input type="text" size="40" name="url" value="<?php echo $url; ?>" />
   		 			</div>
				</div>
			
				
				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Caption</strong>
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
			
				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Is Active</strong>
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
    					<strong>Choose Photo</strong>
    				</div>
					<div class="form_field">
    					<img align="right" src="<?php echo MAP_IMG_DIR.$row['id'].'.'.$row['ext'];?>"  height="60" width="110"  />
   		 			</div>
					<div class="form_field">
						<input align="left" type="file" name="ext" />
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
