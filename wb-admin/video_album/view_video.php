<?php 
	//get groups information in respect of Id
	$result = $Video->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header("");
		}
			$row = $Conn->fetchArray($result);
				$name=$row['name'];
				$parent_id=$row['parent_id'];
				$is_active = $row['is_active'];
				$description = $row['description'];
?>


<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Videos Management >> View Gallery</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=video_album&file=list_video.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=video_album&file=add_video.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>

	<form method="post" class="">

				<div class="form_item">
  					<div class="form_label">
    					<label>  Name</label>
    				</div>
    				<div class="form_field">
    					<?php echo $row['name'];?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<label>  Parent Id</label>
    				</div>
    				<div class="form_field">
    					<?php echo $row['parent_id'];?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<label>  Is Active</label>
    				</div>
    				<div class="form_field">
    					<?php echo $row['is_active'];?>
   		 			</div>
				</div>
				

				
				
				
				<div class="form_item">
  					<div class="form_label">
    					<label>  Action</label>
    				</div>
    				<div class="form_field">
    					<a href="index.php?folder=video_album&file=edit_video.php&id=<?php echo $_GET['id'];?>">Edit</a>  | 	<a href="index.php?folder=video_album&file=delete_video.php&id=<?php echo $_GET['id'];?>">Delete</a>
   		 			</div>
				</div>

	</form>
</div><!-- form_area ends-->