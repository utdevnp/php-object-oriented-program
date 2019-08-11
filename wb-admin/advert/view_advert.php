<?php
 if(!isset($_GET['id']))
 {
	//header('Location: index.php?folder=image&file=list_image.php');
 }
	
	//get feedback information in respect of Id
	$result = $Advert->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			//header('Location: index.php?folder=advert&file=list_advert.php');
		}
			$row = $Conn->fetchArray($result);
				$advertisement_id=$row['advertisement_id'];
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
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/gallery_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Gallery Management >> Images >> View </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=advert&file=list_advert.php&advertisement_id=<?php echo $_GET['advertisement_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=advert&file=add_advert.php&advertisement_id=<?php echo $_GET['advertisement_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>
  
<form method="post" class="niceform">
		

			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Gallery Name </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $Advertisement->getNameById( $row['advertisement_id'] );?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong> Title </strong>
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
						<img src="<?php echo GALLERY_IMG_DIR.$row['id'].'.'.$row['ext'];?>" height="350" width="593"/>
   		 			</div>
			</div>
			
			<div class="form_item">
  					
    				<div class="form_field">
						<a href="index.php?folder=advert&file=edit_advert.php&id=<?php echo $_GET['id'];?>&advertisement_id=<?php echo $_GET['advertisement_id'];?>">Edit</a>
                           |  	<a href="index.php?folder=advert&file=delete_advert.php&id=<?php echo $_GET['id'];?>&advertisement_id=<?php echo $_GET['advertisement_id'];?>">Delete</a>
   		 			</div>
			</div>
			

</form>
</div><!-- form_area ends-->
