  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>

<?php
	$id = $_GET['id'];
		$result =$Attachment-> getById($id);
			$row = $Conn-> fetchArray($result);
?>


<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/content.gif) no-repeat; text-indent:40px; Padding:5px;">Attachment >> Add New </h2>
           <a style="float:right; margin-right:5px;" href="index.php?folder=attachment&file=list_attachment.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=attachment&file=add_attachment.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	<div style="clear:both;"></div>
  <div class="form_item">
  	<div class="form_strong">
    	<strong>  Content Id </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['content_id'];?>
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_strong">
    	<strong>  Title </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['title'];?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_strong">
    	<strong>  Extension </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['myfile'];?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_strong">
    	<strong>  Active: </strong>
    </div>
    <div class="form_field">
    	<?php echo $row['is_active'];?>
    </div>
  </div>
