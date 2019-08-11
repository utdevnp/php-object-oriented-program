<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=branch&file=list.php");
 }

	//get feedback information in respect of Id
	$result = $Branch->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			//header("Location: index.php?folder=video&file=list_videos.php");
		}
			$row = $Conn->fetchArray($result);
				$id=$row['id'];
				$name=$row['name'];
				$parent_id=$row['parent_id'];
				$is_active=$row['is_active'];
?>

<div class="message_area">
<?php
if(isset($_POST['update_data']))
{
	
		$id = $_GET['id'];
		$name=$_POST['name'];
		$is_active=$_POST['is_active'];
		$parent_id=$_POST['parent_id'];
		
		
		
                    
			//call add() function & pass parameter & store returned value
			$result = $Branch-> update($id,$name,$is_active,$parent_id);

		if($result==1)
		{
			$id=$_GET['id'];
			header("Location: index.php?folder=branch&file=list.php&id=$id&msg= $name Updated Success");
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

?>
</div><!-- message_area ends -->
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Trip Glance Management >> Edit  </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=branch&file=list.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=branch&file=list.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
  <div style="clear:both;"></div>

<div class="">
	<form method="post" enctype="multipart/form-data"  class="">
				
				
				
				
				<div class="form_item">
  					<div class="form_label">
    					<strong> Parent </strong>
    				</div>
    				<div class="form_field">
    					<select name="parent_id">
            	
				<?php
				  if($parent_id==0)
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
							
							if($parent_id==$pid)
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
    					<input type="text" name="name" value="<?php echo $name; ?>" />
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
    					<input class="submit_bitton" type="submit" value="Save & Update" name="update_data" />
   		 			</div>
				</div>

		
	</form>
</div><!-- form_area ends-->
