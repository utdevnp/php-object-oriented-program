
        	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Links Management >> Links >> View</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=links&file=list_links.php&link_id=<?php echo $_GET['link_id']; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=links&file=add_links.php&link_id=<?php echo $_GET['link_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>




<?php
 if(!isset($_GET['id']))
 {
	header('Location: index.php?folder=links&file=list_links.php');
 }
	
	//get feedback information in respect of Id
	$result = $Links->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			header('Location: index.php?folder=links&file=list_links.php');
		}
			$row = $Conn->fetchArray($result);
				$link_id=$row['link_id'];
				$title=$row['title'];
				$url=$row['url'];
				$is_active=$row['is_active'];
				$ext=$row['ext'];
?>

<div class="form_area">
<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?> 

  <div style="clear:both;"></div>
 
	
<form method="post" class="niceform">
			
			<div class="form_item">
  					<div class="form_labal">
    					<strong>Gallery </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $Link_Album->getNameById( $row['link_id'] );?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_labal">
    					<strong>Name </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $title; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_labal">
    					<strong>Url </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $url ; ?>
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_labal">
    					<strong>Is Active </strong>
    				</div>
    				<div class="form_field">
    					<?php echo $is_active ; ?>
   		 			</div>
			</div>
			
			
			<div class="form_item">
            	<div class="form_labal">
    					<strong>Action </strong>
    				</div>
  					
    				<div class="form_field">
						<a href="index.php?folder=links&file=edit_links.php&id=<?php echo $_GET['id'];?>&link_id=<?php echo $_GET['link_id'];?>">Edit</a>
                           |  	<a href="index.php?folder=links&file=delete_links.php&id=<?php echo $_GET['id'];?>&link_id=<?php echo $_GET['link_id'];?>">Delete</a>
   		 			</div>
			</div>
			

</form>
</div><!-- form_area ends-->
