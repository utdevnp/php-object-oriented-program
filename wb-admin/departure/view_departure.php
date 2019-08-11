<?php

$group_id = $_GET['group_id'];

?>
    	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Departure Management >> View </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=departure&file=all_list.php&id=<?php echo $group_id; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=departure&file=add_departure.php&ex=<?php echo $group_id; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>



<?php 
	//get groups information in respect of Id
	$result = $departure->getById($_GET['id']);
		$count = $Conn->numRows($result);
		if($count==0)
		{
			header("");
		}
			$row = $Conn->fetchArray($result);
			
?>


<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 

  <div style="clear:both;"></div>

	<form method="post" class="">
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Product Name</strong>
    				</div>
    				<div class="form_field">
    					<?php $product = $Content -> getById($row['group_id']);
					$product_row = $Conn -> fetchArray($product);
					echo $product_row['menu_name'];
?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Departure Date</strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['departure_date'];?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Price FOr This Date</strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['price'];?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Offered Price For This Date</strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['offered_price'];?>
   		 			</div>
				</div>
				
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Status</strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['status'];?>
   		 			</div>
				</div>
					
				<div class="form_item">
  					<div class="form_label">
    					<strong>  Remarks</strong>
    				</div>
    				<div class="form_field">
    					<?php echo $row['remarks'];?>
   		 			</div>
				</div>
				
	</form>
</div><!-- form_area ends-->