<?php
	$id = $_GET['id'];
		$result =$Category->getById($id);
			$row = $Conn-> fetchArray($result);
?>

		<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/category.gif) no-repeat; text-indent:40px; Padding:5px;">Category Management >> View Category</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=category&file=list_category.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=category&file=add_category.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Category"  /></a> 
	</div>

	<div style="clear:both;"></div>
	
	<div class="form_item">
  	<div class="form_strong">
    	<strong>  Parent </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['parent_id'];?>
    </div>
  </div>

  <div class="form_item">
  	<div class="form_strong">
    	<strong>  Name </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['name'];?>
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label>Active </label>
    </div>
    <div class="form_field">
    	<?php echo $row['is_active'];?>
    </div>
  </div>
