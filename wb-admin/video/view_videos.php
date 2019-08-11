<?php
 if(!isset($_GET['id']))
 {
	//header('Location: index.php?folder=image&file=list_image.php');
 }
	
	//get feedback information in respect of Id
	$result = $Videos->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header('Location: index.php?folder=video&file=list_videos.php');
		}
			$row = $Conn->fetchArray($result);
				$video_id=$row['video_id'];
				$title=$row['title'];
				$caption=$row['caption'];
				$url=$row['url'];
				$is_active=$row['is_active'];
				$ext=$row['ext'];
?>

<div class="form_area">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?> 
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Videos Management >> Gallery >> Videos >> View  </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=video&file=list_videos.php&video_id=<?php echo $_GET['video_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=video&file=add_videos.php&video_id=<?php echo $_GET['video_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>
 
	
<form method="post" class="niceform">
	
			<div class="form_item">
  					<div class="form_label">
    					<label>Gallery </label>
    				</div>
    				<div class="form_field">
    					<?php echo $Video->getNameById( $row['video_id'] );?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<label>Title </label>
    				</div>
    				<div class="form_field">
    					<?php echo $title; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<label>Url </label>
    				</div>
    				<div class="form_field">
    					<?php echo $url ; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<label>Embadad </label>
    				</div>
    				<div class="form_field">
						<?php echo $caption; ?>
   		 			</div>
			</div>
			<div class="form_item">
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
  					<div class="form_label">
    					<label>Action</label>
    				</div>
    				<div class="form_field">
						<a href="index.php?folder=video&file=edit_videos.php&id=<?php echo $_GET['id'];?>&video_id=<?php echo $_GET['picture_id'];?>">Edit</a>
                           |  	<a href="index.php?folder=video&file=delete_videos.php&id=<?php echo $_GET['id'];?>&video_id=<?php echo $_GET['picture_id'];?>">Delete</a>
   		 			</div>
			</div>
			

</form>
</div><!-- form_area ends-->
