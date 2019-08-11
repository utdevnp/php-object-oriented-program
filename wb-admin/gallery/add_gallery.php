<div class="message_area">
<?php
if(isset($_POST['add_gallery_button']))
{
	$error = null;
	
	$name=$_POST['name'];
	//validate name
	$error.= $Validator->validate_empty($name,"Full Name");
	$error.=$Validator->validate_text_range($name,5,20,"Full Name");
	$order_by=$_POST['order_by'];
	$howmany=$_POST['howmany'];
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
		$result = $Gallery-> add($parent_id,$name,$order_by,$howmany,$is_active,$description);
	
		if($result==1)
		{
			header("Location: index.php?folder=gallery&file=list_gallery.php&msg=Record-added-successfully!");
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

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Slider Management >> Add Gallery</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=gallery&file=list_gallery.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=gallery&file=add_gallery.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	<div style="clear:both;"></div>

	<form method="post"  class="niceform">
			
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label> Parent</label>
    				</div>
    				<div class="form_field" >
    					<select name="parent_id">
                        <option value="0">Self</option>
                        <?php
                            $sql = 'SELECT * FROM gallery WHERE parent_id=0';
                            $result = mysqli_query($Connect->link,$sql);
                            while($row = mysqli_fetch_array($result))
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
    					<input size="30"  required  type="text" name="name" id="name" autofocus />
						 <script>
							if (!("autofocus" in document.createElement("input"))) {
							  document.getElementById("name").focus();
							}
						  </script>
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
					<input name="howmany" type="number" autocomplete="on"  size="25" maxlength="100"  id="howmany" value="5"/>
						
				</div>
			</div>

  <div class="form_item">
  				<div class="form_label">
    				<label> Description</label>
    			</div>
    			<div class="form_field">
    				<?php   
                        $ctrl_name  = 'description';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('description') ;
						$oFCKeditor->Height = "250px";
                        $oFCKeditor->Width = "580px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "Content Being Updated ............" ;
                        $oFCKeditor->Create() ;
					?>
   		 		</div>	
			</div>
			
			 <div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label> Is Active</label>
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
    						<input class="submit_bitton" type="submit" value="Add New Gallery" name="add_gallery_button" />
   		 			</div>
			</div>
		</fieldset>
	</form>
</div><!-- form_area ends-->
