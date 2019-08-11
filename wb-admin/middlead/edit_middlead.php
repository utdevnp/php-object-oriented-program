<?php
 //if(!isset($_GET['id']))
 //{
	//header("Location: index.php?folder=gallery&list=list");
 //}
?>

<?php
	//get feedback information in respect of Id
	$result = $Middlead->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			//header("Location: index.php?folder=gallery&file=list_gallery.php");
		}
			$row = $Conn->fetchArray($result);
				$name=$row['name'];
				$parent_id=$row['parent_id'];
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
	$is_active=$_POST['is_active'];
	$description = $_POST['description'];

	//call add() function & pass parameter & store returned value
	$result = $Middlead->update($id,$name,$parent_id,$is_active,$description);

	if($result==1)
	{
		header("Location: index.php?folder=middlead&file=list_middlead.php&msg=Updated Successfully!");
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
?>
</div><!-- message_area ends -->

<div class="form_area">
 
 	<div style="clear:both;"></div>
	
	 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/downloads.gif) no-repeat; text-indent:40px; Padding:5px;">Download Manager >> Edit</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=middlead&file=add_middlead.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
  <div style="clear:both;"></div>

	<form method="post" class="niceform" >
		<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
		
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong> Parent</strong>
    				</div>
    				<div class="form_field">
    					<select name="parent_id">
						<option value="0">Self</option>
						<?php
                            $sql = 'SELECT * FROM middlead WHERE parent_id=0';
                            $result = mysqli_query($Conn->link,$sql);
                            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
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
    					<strong>Group  Name </strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="50" name="name" value="<?php echo $name; ?>" />
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
							$oFCKeditor->Height = "300px";
							$oFCKeditor->Width = "580px";
							$oFCKeditor->BasePath = $sBasePath ;
							$oFCKeditor->Value = "$description" ;
							$oFCKeditor->Create() ;
						?>
   		 			</div>
			</div>
			<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<strong>Is Active </strong>
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
    					<input class="submit_bitton" type="submit" value="Save & Update" name="edit_video_button" />
   		 			</div>
			</div>
		</fieldset>
	</form>
</div><!-- form_area ends-->