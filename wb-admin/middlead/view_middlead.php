<?php 
	//get groups information in respect of Id
	$result = $Middlead->getById($_GET['id']);
		$count = $Conn->numRows($result);
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
	
	
	<div style="clear:both;"></div>
	
	 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/downloads.gif) no-repeat; text-indent:40px; Padding:5px;">Download Manager >> View </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=middlead&file=list_middlead.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=middlead&file=add_middlead.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
  <div style="clear:both;"></div>
<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 
	<form method="post" class="">

				<div class="form_item">
  					<div class="form_label">
    					<strong> Group  Name </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['name'];?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Parent</strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['parent_id'];?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Is Active </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['is_active'];?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Description </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['description'];?>
   		 			</div>
				</div>
							
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Action </strong>
    				</div>
    				<div class="form_field">
    					<a href="index.php?folder=middlead&file=edit_middlead.php&id=<?php echo $_GET['id'];?>">Edit</a>  | 	<a href="index.php?folder=middlead&file=delete_middlead.php&id=<?php echo $_GET['id'];?>">Delete</a>
   		 			</div>
				</div>

			
		</fieldset>
	</form>
</div><!-- form_area ends-->