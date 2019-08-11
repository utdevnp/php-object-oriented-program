<div class="message_area">
<?php
if(isset($_POST['add_data']))
{
	$error = NULL;
	
	$branch_id = $_GET['branch_id'];
	$name = $_POST['name'];
	$loaction = $_POST['loaction'];
	$tele = $_POST['tele'];
	$fax = $_POST['fax'];
	$is_active = $_POST['is_active'];
	
	
	if(!empty($error))
	{
		echo "Error";
	
	}else{
	
	$result =  $B->add($branch_id,$name,$loaction,$tele,$fax,$is_active);
		
	if($result==1)
	{
		$branch_id=$_GET['branch_id'];
		header("Location: index.php?folder=branches&file=list.php&branch_id=$branch_id&msg=AddedSuccess!");
		
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
	
}
		include('fckeditor/fckeditor.php'); 
?>
</div><!-- message_area ends -->

<div class="form_area">

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Trip Glance >> Glances  >>  Add New </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=branches&file=list.php&branch_id=<?php echo $_GET['branch_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=branches&file=add.php&branch_id=<?php echo $_GET['branch_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

	
  <div style="clear:both;"></div>	
	
	<form method="post" enctype="multipart/form-data"  class="">
	
			 <div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label>Group</label>
    				</div>
    				<div class="form_field">
						<select name="branch_id">
							<option value="0">Self</option>
							<?php
								$sql = 'SELECT * FROM branch WHERE parent_id>=0';
								$result = $Conn->execute($sql);
								while($row_p = $Conn->fetchArray($result))
								{	 
								   if($_GET['branch_id']==$row_p['id'])
											{
									?>
										<option value="<?php echo $row_p['id']; ?>" selected> * <?php echo $row_p['name']; ?> </option>
									<?php
											}
											else
											{
											?>
												<option value="<?php echo $row_p['id']; ?>"><?php echo $row_p['name']; ?> </option>
											<?php }
								}
							?>
					   </select>
   		 			</div>
			</div>

             <div class="form_item">
  					<div class="form_label">
    					<label>  Title </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="name" size="50" />
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
                        $oFCKeditor->Value = "" ;
                        $oFCKeditor->Create() ;
					?>
   		 		</div>	
			</div>
			
			
			
			 <div style="display:none;"  class="form_item">
  					<div class="form_label">
    					<label>  Tele </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="tele" size="30"  />
   		 			</div>
			</div>
			<div  style="display:none;"  class="form_item">
  					<div class="form_label">
    					<label>  Fax </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="fax" size="30"  />
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
    					<input class="submit_bitton" type="submit" value="Add New " name="add_data" />
   		 			</div>
			</div>

			
		
	</form>
</div>
