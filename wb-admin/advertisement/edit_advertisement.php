<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=advertisement&file=list_advertisement.php");
 }

	//get feedback information in respect of Id
	$result = $Advertisement->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header("Location: index.php?folder=advertisement&file=list_advertisement.php");
		}
			$row = $Conn->fetchArray($result);
				$name=$row['name'];
				$parent_id=$row['parent_id'];
				$order_by=$row['order_by'];
				$howmany=$row['howmany'];
				$is_active = $row['is_active'];
				$description = $row['description'];
?>
<div class="message_area">
<?php
if(isset($_POST['edit_video_button']))
{
	$id = $_GET['id'];
	$name=$_POST['name'];
	$parent_id=$_POST['parent_id'];
	$order_by=$_POST['order_by'];
	$howmany=$_POST['howmany'];
	$is_active=$_POST['is_active'];
	$description = $_POST['description'];

	//call add() function & pass parameter & store returned value
	$result = $Advertisement->update($id,$name,$parent_id,$order_by,$howmany,$is_active,$description);

	if($result==1)
	{
		header("Location: index.php?folder=advertisement&file=list_advertisement.php&msg=Record-updated-successfully!");
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

<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
    
 
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/gallery_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Gallery Management >> Edit Gallery</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=advertisement&file=list_advertisement.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=advertisement&file=add_advertisement.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Gallery"  /></a> 
	</div>
	
	 <div style="clear:both;"></div>

	<form method="post" class="" >
	
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
    					<strong> Gallery Name</strong>
    				</div>
    				<div class="form_field">
    					<input size="30" type="text" required name="name" value="<?php echo $name; ?>" />
   		 			</div>
			</div>
			
			<div class="form_item">
  	<div class="form_label">
    	<label>  Image Order </label>
    </div>
    <div class="form_field">
    	<select name="order_by">
                <?php
                    $arr =array('ASC'=>'Ascending','DESC'=>'Descending');
                    foreach($arr as $k=>$v)
                             {
                                if($order_by==$k)
                                {
                                    echo "<option value='$k' selected>$v *</option>";
                                }
                                else 
                                {
                                echo "<option value='$k'>$v</option>";
                                }
                             }
                         ?>
              </select>
    </div>
  </div>
  
			
  
			<div class="form_item">
				<div class="form_label">
					<label> Show Items </label>
				</div>
				<div class="form_field">
					<input name="howmany" type="number"  size="25" maxlength="100"  id="howmany"  
					value="<?php echo $howmany; ?>"/>
						
				</div>
			</div>
			

			
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Description</strong>
    				</div>
    				<div class="form_field">
    					<?php   
							$ctrl_name  = 'description';
							$sBasePath  = './fckeditor/';
							$oFCKeditor = new FCKeditor('description') ;
							$oFCKeditor->Height = "250px";
							$oFCKeditor->Width = "580px";
							$oFCKeditor->BasePath = $sBasePath ;
							$oFCKeditor->Value = "$description" ;
							$oFCKeditor->Create() ;
						?>
   		 			</div>
			</div>
			
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Is Active</strong>
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
    					<input class="submit_bitton" type="submit" value="Save & Update" name="edit_video_button" />
   		 			</div>
			</div>
	</form>
</div><!-- form_area ends-->