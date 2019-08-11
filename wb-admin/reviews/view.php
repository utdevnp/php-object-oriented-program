<?php 
	//get groups information in respect of Id
	$result = $Review->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header("Location: index.php?folder=reviews&file=list.php&msg=No data In table");
		}
			$row = $Conn->fetchArray($result);
				$content_id=$row['content_id'];
				$name=$row['name'];
				$email=$row['email'];
				$rating=$row['rating'];
				$review=$row['review'];
				$is_active = $row['is_active'];
?>


<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Review Management >> View</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=reviews&file=list.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=reviews&file=add.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
  <div style="clear:both;"></div>

	<form method="post" class="">
	
	<div class="form_item">
  					<div class="form_label">
    					<label>  Reviews On </label>
    				</div>
    				<div class="form_field">
    					<?php echo $Content->getNameById($row['content_id']);?>
   		 			</div>
				</div>

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
    					<label>  Email</label>
    				</div>
    				<div class="form_field">
    					<?php echo $row['email'];?>
   		 			</div>
				</div>
				

				
					<div class="form_item">
  					<div class="form_label">
    					<label>  Reviews</label>
    				</div>
    				<div class="form_field">
    					<?php echo $row['review'];?>
   		 			</div>
				</div>
				<div class="form_item">
  					<div class="form_label">
    					<label>  Ratings</label>
    				</div>
    				<div class="form_field">
    					<?php echo $row['rating'];?>
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
    					<a href="index.php?folder=reviews&file=edit.php&id=<?php echo $_GET['id'];?>">Edit</a>  | 	<a href="index.php?folder=reviews&file=delete.php&id=<?php echo $_GET['id'];?>">Delete</a>
   		 			</div>
				</div>

	</form>
</div><!-- form_area ends-->