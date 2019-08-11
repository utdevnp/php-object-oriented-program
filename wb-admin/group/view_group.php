

    <?php
	
		if(isset($_GET['sub'])){
					
			$sub = $_GET['sub'];
		}
				
	
	?>
<?php
	$id = $_GET['id'];
		$result =$Group->getById($id);
			$row = $Conn-> fetchArray($result);
?>

		<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/group.gif) no-repeat; text-indent:40px; Padding:5px;">Group Management >> View Group</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=group&file=list_group.php&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=group&file=add_group.php&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

	<div style="clear:both;"></div>
	
	

  <div class="form_item">
  	<div class="form_strong">
    	<strong>  Name </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['name'];?>
    </div>
  </div>
  
  
    <?php
  
   if(isset($sub) && $sub=='y'){
  
   ?>
<div class="form_item">
  	<div class="form_strong">
    	<strong>  Parent </strong>
    </div>
    <div class="form_field">
    	<?php echo $Category->getNameById($row['group_id']); ?>
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_strong">
    	<strong>  Detail Description </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['description'];?>
    </div>
  </div>
  

<?php } ?>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>Active </label>
    </div>
    <div class="form_field">
    	<?php echo $row['is_active'];?>
    </div>
  </div>
