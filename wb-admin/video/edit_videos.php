<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=video&file=list_videos.php");
 }

	//get feedback information in respect of Id
	$result = $Videos->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			//header("Location: index.php?folder=video&file=list_videos.php");
		}
			$row = $Conn->fetchArray($result);
				$video_id=$row['video_id'];
				$p_id=$row['p_id'];
				$title=$row['title'];
				$url=$row['url'];
				$caption=$row['caption'];
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
		$video_id=$_POST['video_id'];
		$p_id=$_POST['p_id'];
		$title=$_POST['title'];
		$url=$_POST['url'];
		$caption=$_POST['caption'];
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
			$result = $Videos-> update($id,$video_id,$p_id,$title,$url,$caption,$is_active,$ext);
			
			//$random = microtime();
			$new_id = $_GET['id'];
			$new_name = $new_id . "." . $ext;
			move_uploaded_file($_FILES['ext']['tmp_name'],"upload/images/".$new_name);

		if($result==1)
		{
			$video_id=$_GET['video_id'];
			header("Location: index.php?folder=video&file=list_videos.php&video_id=$video_id&msg=Record-updated-successfully!");
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
		$video_id=$_POST['video_id'];
		$p_id=$_POST['p_id'];
		$title=$_POST['title'];
		$url=$_POST['url'];
		$caption=$_POST['caption'];
		$is_active=$_POST['is_active'];
		
		//call add() function & pass parameter & store returned value
			$result = $Videos->update($id,$video_id,$p_id,$title,$url,$caption,$is_active);
			
		if($result==1)
		{
			$video_id=$_GET['video_id'];
			header("Location: index.php?folder=video&file=list_videos.php&video_id=$video_id&msg=Record-updated-successfully!");
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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Videos Management >> Gallery >> Videos >> Edit  </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=video&file=list_videos.php&video_id=<?php echo $_GET['video_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=video&file=add_videos.php&video_id=<?php echo $_GET['video_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
    					<strong>Video Gallery</strong>
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
    					<strong> Content Name </strong>
    				</div>
    				<div class="form_field">
						<select name="p_id">
				<?php
				  if($p_id==0)
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
							
							if($p_id==$pid)
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
    					<label> Title</label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="title" size="50" value="<?php echo $title; ?>" />
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<label> Id</label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="url" value="<?php echo $url; ?>" size="30" />
   		 			</div>
				</div>
				
				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label> Description</label>
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
			
				<div class="form_item">
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
				
				
				
				<div class="form_item">
					<div class="form_label">
    					<label> </label>
    				</div>
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Save & Update" name="edit_image_button" />
   		 			</div>
				</div>

		
	</form>
</div><!-- form_area ends-->
