<div class="message_area">
<?php
if(isset($_POST['add_data']))
{
	 $advertisement_id=$_POST['advertisement_id'];
	 $title=$_POST['title'];
	 $url=$_POST['url'];
	$caption=$_POST['caption'];
	$is_active=$_POST['is_active'];
	
	//for upload file
		$ext = pathinfo($_FILES['ext']['name'],PATHINFO_EXTENSION);
		$ext=strtolower($ext);
		
		//call add() function & pass parameter & store returned value
		$result =  $Map->add($advertisement_id,$title,$url,$caption,$is_active,$ext);
		
		//$random = microtime();
		$new_id = $Conn->insertid();
		$new_name = $new_id . "." . $ext;

	if($result==1)
	{
	move_uploaded_file($_FILES['ext']['tmp_name'],MAP_IMG_DIR.$new_name);
	header("Location: index.php?folder=map&file=list_map.php&msg=Added Successfully!");
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
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
	 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/map.png) no-repeat; text-indent:40px; Padding:5px;">Map Management >> Add New </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=map&file=list_map.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=map&file=add_map.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New "  /></a> 
	</div>
  <div style="clear:both;"></div>
  
  
	<form method="post" enctype="multipart/form-data"  class="">

			
			 <div style="" class="form_item">
  					<div class="form_label">
    					<strong> Gallery Name</strong>
    				</div>
    				<div class="form_field">
    					<select name="advertisement_id">
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
					<strong> Title</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="40" name="title" required />
   		 			</div>
			</div>
			 <div class="form_item">
  					<div class="form_label">
					<strong> Url</strong>
    				</div>
    				<div class="form_field">
    					<input type="text" size="40" name="url"   />
   		 			</div>
			</div>
			
			
					
					
    					
			 <div style="display:none;"  class="form_item">
  					<div class="form_label">
    					<strong>  Caption</strong>
    				</div>
    				<div class="form_field">
						<?php   
							$ctrl_name  = 'caption';
							$sBasePath  = './fckeditor/';
							$oFCKeditor = new FCKeditor('caption') ;
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
    					<strong>Is Active</strong>
    				</div>
    				<div class="form_field">
    					<select name="is_active">
							<option value="Y">Yes</option>
							<option value="N">No</option>
						</select>
   		 			</div>
			</div>
			<div class="form_item">
  					<div class="form_label">
    					<strong> Choose Photo </strong><small>( 720 X 541 )</small>
    				</div>
    				<div class="form_field">
    					<input type="file" name="ext" />
   		 			</div>
			</div>
			<div class="form_item">
  					
    				<div class="">
    					<input class="submit_bitton" type="submit" value="Add Photo" name="add_data" />
   		 			</div>
			</div>

			
		
	</form>
</div><!-- form_area ends-->
