<?php
 if(!isset($_GET['id']))
 {
	//header('Location: index.php?folder=image&file=list_image.php');
 }
	
	//get feedback information in respect of Id
	$result = $Image->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header('Location: index.php?folder=image&file=list_image.php');
		}
			$row = $Conn->fetchArray($result);
				$gallery_id=$row['gallery_id'];
				$title=$row['title'];
				$caption=$row['caption'];
				$is_active=$row['is_active'];
				$ext=$row['ext'];
?>

<div class="form_area">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?> 
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Slider Management >> Photos >> View</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=image&file=list_image.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=image&file=add_image.php&gallery_id=<?php echo $_GET['gallery_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>
	
<form method="post" class="niceform">
		
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Gallery </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $Gallery->getNameById( $row['gallery_id'] );?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Title </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $title; ?>
   		 			</div>
			</div>
			
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Caption </strong>
    				</div>
    				<div class="form_field">
						<?php echo $caption; ?>
   		 			</div>
			</div>
			<div class="form_item">
  					<div class="form_label">
    					<strong>Is Active </strong>
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
  					<div class="form_label">
    					<strong>Photo </strong>
    				</div>
    				<div class="form_field">
						<img src="<?php echo SLIDER_IMG_DIR.$row['id'].'.'.$row['ext'];?>" height="350" width="593"/>
   		 			</div>
			</div>
			
			<div class="form_item">
  					
    				<div class="form_field">
						<a href="index.php?folder=image&file=edit_image.php&id=<?php echo $_GET['id'];?>&gallery_id=<?php echo $_GET['gallery_id'];?>">Edit</a>
                           |  	<a href="index.php?folder=image&file=delete_image.php&id=<?php echo $_GET['id'];?>&gallery_id=<?php echo $_GET['gallery_id'];?>">Delete</a>
   		 			</div>
			</div>
			

</form>
</div><!-- form_area ends-->
