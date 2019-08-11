<div class="message_area">
<?php
if(isset($_POST['add_video_button']))
{
	$error = null;
	
	$name=$_POST['name'];
	//validate name
	$error.= $Validator->validate_empty($name,"Full Name");
	$error.=$Validator->validate_text_range($name,5,200,"Full Name");
	
	$parent_id=$_POST['parent_id'];
	$order_by=$_POST['order_by'];
	$howmany=$_POST['howmany'];
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
		$result = $Advertisement-> add($parent_id,$name,$order_by,$howmany,$is_active,$description);
	
		if($result==1)
		{
			header("Location: index.php?folder=advertisement&file=list_advertisement.php&advertisement_id=$id&msg=Added Successfully!");
			?>
				<style>.niceform{display:none;}</style>
			<?php
		}
		else
		{
		?>
			<div class="error_box">
				<?php echo "Error <br />".mysqli_error($Connect->link);?>
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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/gallery_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Gallery Management >> Add Gallery</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=advertisement&file=list_advertisement.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=advertisement&file=add_advertisement.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Gallery"  /></a> 
	</div>
	
	 <div style="clear:both;"></div>

	<form method="post"  class="niceform">
	
			<div class="form_item">
  					<div class="form_label">
    					<strong> Parent</strong>
    				</div>
    				<div class="form_field">
    					<select name="parent_id">
                        <option value="0">SELF</option>
                       	<?php
                            $result = $Content->getAll();
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
    					<strong> Gallery Name</strong>
    				</div>
    				<div class="form_field">
    					<input size="30" autocomplete="on" type="text" name="name" required  />
   		 			</div>
			</div>
			
			
			<div class="form_item">
				<div class="form_label">
					<strong>Image Order</strong>
				</div>
				<div class="form_field">
				<select name="order_by">
						  <option value="ASC" selected="selected" >Ascending</option>
						  <option value="DESC">Descending</option>
						</select>  
			  </div>
			 </div>
  
			
  
			<div class="form_item">
				<div class="form_label">
					<label> Show Items </label>
				</div>
				<div class="form_field">
					<input name="howmany" type="number"  size="25" maxlength="100"  id="howmany" value="5" />
						
				</div>
			</div>
			
			
           
			<div class="form_item">
  				<div class="form_label">
    				<strong> Description </strong>
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
			
			 <div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong> Is Active  </strong>
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
  				
    				<div class="">
    						<input class="submit_bitton" type="submit" value="Add Gallery" name="add_video_button" />
   		 			</div>
			</div>
		</fieldset>
	</form>
</div><!-- form_area ends-->
