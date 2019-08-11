<div class="message_area">
<?php
if(isset($_POST['add_video_button']))
{
	$error = null;
	
	$name=$_POST['name'];
	//validate name
	$error.= $Validator->validate_empty($name,"Full Name");
	
	$parent_id=$_POST['parent_id'];
	$is_active=$_POST['is_active'];
	
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
		$result = $Video-> add($parent_id,$name,$is_active);
	
		if($result==1)
		{
			header("Location: index.php?folder=video_album&file=list_video.php&msg=Record-added-successfully!");
			?>
				<style>.niceform{display:none;}</style>
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
}
?>
</div><!-- message_area ends -->

<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
 
 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Videos Management >> Add Gallery</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=video_album&file=list_video.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=video_album&file=add_video.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

  <div style="clear:both;"></div>
  
	<form method="post"  class="niceform">
		
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label> Parent Id  </label>
    				</div>
    				<div class="form_field">
    					<select name="parent_id">
                        <option value="0">Self</option>
                        <?php
                            $sql = 'SELECT * FROM video WHERE parent_id=0';
                            $result = mysql_query($sql);
                            while($row = mysql_fetch_array($result))
                            {
                        ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                        <?php
                            }//while
                        ?>
	               </select>
   		 			</div>
			</div>
			
            <div class="form_item">
  					<div class="form_label">
    					<label>  Name</label>
    				</div>
    				<div class="form_field">
    					<input type="text" name="name" size="30" />
   		 			</div>
			</div>
			
            <div class="form_item">
  					<div class="form_label">
    					<label> Is Active </label>
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
  				
    				<div class="">
    						<input class="submit_bitton" type="submit" value="Add New Gallery " name="add_video_button" />
   		 			</div>
			</div>
		</form>
</div><!-- form_area ends-->
