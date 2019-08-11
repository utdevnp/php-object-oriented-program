<?php
$group_id = $_GET['group_id'];


?>
    	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Altitude Management >> Add New </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=altitude&file=all_list.php&id=<?php echo $group_id; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=altitude&file=add_altitude.php&ex=<?php echo $group_id; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

  <div style="clear:both;"></div>

<div class="message_area">
<?php
$id = $_GET['id'];
$pre_result = $Altitude -> getById($id);
$pre_row = $Conn -> fetchArray($pre_result);
if(isset($_POST['add_video_button']))
{
	$error = null;
	$group_id=$_POST['group_id'];
	
	$day=$_POST['day'];
	$place_name=$_POST['place_name'];
	$altitude=$_POST['altitude'];
	$temperature = $_POST['temperature'];

	if(!empty($error))
	{
	?>
		<div class="error_box">
			<?php echo $error; ?>
		 </div>  		 
	<?php		
	}
	else
	{
		//call add() function & pass parameter & store returned value
		$result = $Altitude->update($id,$group_id,$day,$place_name,$altitude,$temperature);
	
		if($result==1)
		{
			header("Location: index.php?folder=altitude&file=all_list.php&id=$group_id&msg=Added Successfully!");
			?>
				<style>.niceform{display:none;}</style>
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

<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 

  
	<form method="post"  class="niceform">
			
		    <div class="form_item">
  					<div class="form_label">
    					<strong>  Product </strong>
    				</div>
    				<div class="form_field">
    					<select name="group_id">
                        <?php 
						$group_list = $Content -> getAllGroup();
						while($group_row = $Conn -> fetchArray($group_list)){
							if($group_row['id']== $pre_row['group_id']){ ?>
								
							<option value="<?php echo $group_row['id']; ?>" selected="selected"><?php echo $group_row['menu_name']; ?></option>	
								
						<?php	} else{

						?>
                        	<option value="<?php echo $group_row['id']; ?>"><?php echo $group_row['menu_name']; ?></option>
                        <?php  }} ?>
                        </select>
   		 			</div>
			</div>
			
			
			<div class="form_item">
  				<div class="form_label">
    				<strong> Day</strong>
    			</div>
    			<div class="form_field">
    				<input type="text" name="day" value="<?php echo $pre_row['day']; ?>" />
   		 		</div>	
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Place Name </strong>
    				</div>
    				<div class="form_field">
    				<input type="text" name="place_name" value="<?php echo $pre_row['place_name']; ?>" />
   		 			</div>
			</div>
            
            	<div class="form_item">
  					<div class="form_label">
    					<strong>Altitude </strong>
    				</div>
    				<div class="form_field">
    				<input type="number" name="altitude" value="<?php echo $pre_row['altitude']; ?>" />
   		 			</div>
			</div>
            	<div class="form_item">
  					<div class="form_label">
    					<strong>Temperature </strong>
    				</div>
    				<div class="form_field">
    				<input type="text" name="temperature" value="<?php echo $pre_row['temperature']; ?>" />
   		 			</div>
			</div>
			
			
			<div class="form_item">
  				
    				<div class="">
    						<input class="submit_bitton" type="submit" value="Update" name="add_video_button" />
   		 			</div>
			</div>
	</form>
</div>