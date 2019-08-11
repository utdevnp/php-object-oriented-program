<div class="message_area">
<?php
if(isset($_POST['send_data']))
{
	$name=$_POST['name'];
	$is_active=$_POST['is_active'];
	$parent_id=$_POST['parent_id'];
	
		//call add() function & pass parameter & store returned value
		$result =  $Branch->add($name,$is_active,$parent_id);

	if($result==1)
	{		
		header("Location: index.php?folder=branch&file=list.php&msg=Added Successfully!");
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
		
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;"> Trip Glance Management >>  Add New </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=branch&file=add.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=branch&file=add.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New "  /></a> 
	</div>

	
  <div style="clear:both;"></div>	
	
	<form method="post" enctype="multipart/form-data"  class="">
			 
			 
			 <div class="form_item">
  					<div class="form_label">
    					<strong> Parent</strong>
    				</div>
    				<div class="form_field">
    					<select name="parent_id">
                        <option value="0">SELF</option>
                       	<?php
                            $result = $Content->getAll('y');
                            while($row = $Conn->fetchArray($result))
                            {
                        ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['content_title']; ?> </option>
                        <?php
                            }//while
                        ?>       
	               </select>
   		 			</div>
			</div>
			
			

             <div class="form_item">
  					<div class="form_label">
    					<label>  Title </label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="name" />
   		 			</div>
			</div>
			
			
			
			<div class="form_item">
  					<div class="form_label">
    					<label> Active </label>
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
    					<input class="submit_bitton" type="submit" value="Add New " name="send_data" />
   		 			</div>
			</div>

			
		
	</form>
</div><!-- form_area ends-->
