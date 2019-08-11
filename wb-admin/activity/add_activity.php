
    	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Activity Management >> Add New </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=activity&file=list_activity.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=activity&file=add_activity.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

  <div style="clear:both;"></div>

<div class="message_area">
<?php
if(isset($_POST['add_video_button']))
{
	$error = null;
	
	$name=$_POST['name'];
	//validate name
	$error.= $Validator->validate_empty($name,"Link ");
	$error.=$Validator->validate_text_range($name,5,100,"Link ");
	
	$parent_id=$_POST['parent_id'];
	$is_active=$_POST['is_active'];
	$description=$_POST['description'];
	
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
		$result = $Activity-> add($parent_id,$name,$is_active,$description);
	
		if($result==1)
		{
			header("Location: index.php?folder=activity&file=list_activity.php&msg=Added Successfully!");
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
			
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong> Parent  </strong>
    				</div>
    				<div class="form_field">
    					<select name="parent_id">
                        <option value="0">Self</option>
                        <?php
                            $sql = 'SELECT * FROM activity WHERE parent_id=0';
                            $result = $Conn->execute($sql);
                            while($row = $Conn->fetcharray($result))
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
    					<strong>  Name </strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="50" name="name" />
   		 			</div>
			</div>
			
            
			<div class="form_item">
  				<div class="form_label">
    				<strong> Description</strong>
    			</div>
    			<div class="form_field">
    				<?php   
                        $ctrl_name  = 'description';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('description') ;
                        $oFCKeditor->Height = "250px";
                        $oFCKeditor->Width = "580px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "" ;
                        $oFCKeditor->Create() ;
					?>
   		 		</div>	
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong> Is Active  </strong>
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
    						<input class="submit_bitton" type="submit" value="Add New " name="add_video_button" />
   		 			</div>
			</div>
	</form>
</div>