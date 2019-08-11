<?php
 if(!isset($_GET['id']))
 {
	header("Location: index.php?folder=gallery&file=list_gallery.php");
 }
?>

<?php
	//get feedback information in respect of Id
	$result = $Gallery->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header("Location: index.php?folder=gallery&file=list_gallery.php");
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
if(isset($_POST['edit_gallery_button']))
{
	$id = $_GET['id'];
	$name=$_POST['name'];
	$parent_id=$_POST['parent_id'];
	$order_by=$_POST['order_by'];
	$howmany=$_POST['howmany'];
	$is_active=$_POST['is_active'];
	$description = $_POST['description'];

	//call add() function & pass parameter & store returned value
	$result = $Gallery->update($id,$name,$parent_id,$order_by,$howmany,$is_active,$description);

	if($result==1)
	{
		header("Location: index.php?folder=gallery&file=list_gallery.php&msg=Update Successfully!");
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
?>
</div><!-- message_area ends -->

<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
    
 
 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Slider Management >> Edit Gallery</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=gallery&file=list_gallery.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=gallery&file=add_gallery.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	<div style="clear:both;"></div>

	<form method="post" class="niceform" >
	
		<div style="display:none;" class="form_item">
  					<div class="form_label">
    					<label> Parent</label>
    				</div>
    				<div class="form_field">
    					<select name="parent_id">
						<option value="0">Self</option>
						<?php
                            $sql = 'SELECT * FROM gallery WHERE parent_id=0';
                            $result = $Conn->execute($sql);
                            while($row = $Conn->fetchArray($result,MYSQLI_ASSOC))
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
    					<label>  Name </label>
    				</div>
    				<div class="form_field">
    					<input type="text" size="30" name="name" value="<?php echo $name; ?>" />
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
    					<label>Is Active </label>
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
    					<input class="submit_bitton" type="submit" value="Save & Update" name="edit_gallery_button" />
   		 			</div>
			</div>
	</form>
</div><!-- form_area ends-->