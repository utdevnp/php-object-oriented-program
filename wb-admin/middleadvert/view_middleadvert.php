<?php
 if(!isset($_GET['id']))
 {
	//header('Location: index.php?folder=middleadvert&file=list_middleadvert.php');
 }
	
	//get feedback information in respect of Id
	$result = $Middleadvert->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			//header('Location: index.php?folder=middleadvert&file=list_middleadvert.php');
		}
			$row = $Conn->fetchArray($result);
				$middlead_id=$row['middlead_id'];
				$title=$row['title'];
				$caption=$row['caption'];
				$is_active=$row['is_active'];
				$post = $row['post'];
				$ext=$row['ext'];
?>

<div class="form_area">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?> 
	<div style="clear:both;"></div>
	
	 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/downloads.gif) no-repeat; text-indent:40px; Padding:5px;">Download Manager >> Files >> View</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=middleadvert&file=add_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	<div style="clear:both;"></div>
	
<form method="post" class="niceform">

			<div class="form_item">
  					<div class="form_label">
    					<strong>Group </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $Middlead->getNameById( $row['middlead_id'] );?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>File Name </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $title; ?>
   		 			</div>
			</div>
			
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>File Size </strong>
    				</div>
    				<div class="form_field">
						<?php echo filesize(DOWNLOAD_IMG_DIR.$row['id'].'.'.$row['ext']).' Bytes';//.'<small>( 1024 Bytes = 1 Kilo Byte )</small>'; ?>
   		 			</div>
			</div>
			
			
			
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Is Active </strong>
    				</div>
    				<div class="form_field">
						<?php echo $is_active;?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>File </strong>
    				</div>
    				<div class="form_field">
						<a href="upload/middlead/<?php echo $row['id'].'.'.$row['ext'];?>">Download<a/>
						</div>
			</div>
			
			<div class="form_item">
  					
    				<div class="form_field">
						<a href="index.php?folder=middleadvert&file=edit_middleadvert.php&id=<?php echo $_GET['id'];?>&middlead_id=<?php echo $_GET['middlead_id'];?>">Edit</a>
                           |  	<a href="index.php?folder=middleadvert&file=delete_middleadvert.php&id=<?php echo $_GET['id'];?>&middlead_id=<?php echo $_GET['middlead_id'];?>">Delete</a>
   		 			</div>
			</div>
			

</form>
</div><!-- form_area ends-->
