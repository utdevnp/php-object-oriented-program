<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=branches&file=list.php");
 }

	//get feedback information in respect of Id
	$result = $B->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			header("Location: index.php?folder=branches&file=list.php");
		}
			$row = $Conn->fetchArray($result);
				$branch_id=$row['branch_id'];
				$name=$row['name'];
				$loaction=$row['loaction'];
				$tele=$row['tele'];
				$fax=$row['fax'];
				$is_active=$row['is_active'];
?>

<div class="message_area">
<?php
if(isset($_POST['update_data']))
{
	if($_FILES['ext']['name'] != "")
	{
		$id = $_GET['id'];
		$branch_id=$_POST['branch_id'];
		$name=$_POST['name'];
		$loaction=$_POST['loaction'];
		$tele=$_POST['tele'];
		$fax=$_POST['fax'];
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
			$result = $B-> update($id,$branch_id,$name,$loaction,$tele,$fax,$is_active);
			
			//$random = microtime();
			$new_id = $_GET['id'];
			$new_name = $new_id . "." . $ext;
			move_uploaded_file($_FILES['ext']['tmp_name'],"../upload/branches/".$new_name);

		if($result==1)
		{
			$branch_id=$_GET['branch_id'];
			header("Location: index.php?folder=branches&file=list.php&branch_id=$branch_id&msg= Update Success !!");
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
		$branch_id=$_GET['branch_id'];
		$name=$_POST['name'];
		$loaction=$_POST['loaction'];
		$tele=$_POST['tele'];
		$fax=$_POST['fax'];
		$is_active=$_POST['is_active'];
		
		//call add() function & pass parameter & store returned value
			$result = $B->update($id,$branch_id,$name,$loaction,$tele,$fax,$is_active);
			
		if($result==1)
		{
			$branch_id=$_GET['branch_id'];
			header("Location: index.php?folder=branches&file=list.php&branch_id=$branch_id&msg= Update Success !!");
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
		include('fckeditor/fckeditor.php'); 
?>
</div><!-- message_area ends -->
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Trip Glance >> Glances >> Edit</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=branches&file=list.php&branch_id=<?php echo $_GET['branch_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=branches&file=add.php&branch_id=<?php echo $_GET['branch_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New "  /></a> 
	</div>
	
  <div style="clear:both;"></div>

<div class="">

	<form method="post" enctype="multipart/form-data"  class="">
				
				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Group</strong>
    				</div>
    				<div class="form_field">
						<select name="branch_id">
							<option value="0">Self</option>
							<?php
								$sql = 'SELECT * FROM branch WHERE parent_id>=0';
								$result = $Conn->execute($sql);
								while($rowtr = $Conn->fetchArray($result))
								{	 
								   if($_GET['branch_id']==$rowtr['id'])
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
    					<input type="text" name="name" value="<?php echo $name; ?>" />
   		 			</div>
				</div>
				
				
				<div class="form_item">
  				<div class="form_label">
    				<strong> Description</strong>
    			</div>
    			<div class="form_field">
    				<?php   
                        $ctrl_name  = 'loaction';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('loaction') ;
                        $oFCKeditor->Height = "300px";
                        $oFCKeditor->Width = "580px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "$loaction" ;
                        $oFCKeditor->Create() ;
					?>
   		 		</div>	
			</div>
			
			
				
				
				
				
				<div style="display:none;"  class="form_item">
  					<div class="form_label">
    					<label> Tele</label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="tele" value="<?php echo $tele; ?>" size="30" />
   		 			</div>
				</div>
				
				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label> Fax</label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="fax" value="<?php echo $fax; ?>" size="30" />
   		 			</div>
				</div>
				
				
			
				<div class="form_item">
  					<div class="form_label">
    					<label>Active</label>
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
				
				<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label> Photo </label>
    				</div>
    				<div class="form_field">
    					<input type="file" name="ext"  size="30" />
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
