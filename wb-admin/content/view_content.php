  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
<?php
	$id = $_GET['id'];
		$result =$Content-> getById($id);
			$row = $Conn-> fetchArray($result);
?>

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/content.gif) no-repeat; text-indent:40px; Padding:5px;">Content Management >> View Content </h2>
           <a style="float:right; margin-right:5px;" href="index.php?folder=content&file=list_content.php&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=content&file=add_content.php&group_id=<?php echo$_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	

	<div style="clear:both;"></div>

  <div class="form_item">
  	<div class="form_label">
    	<label>  Group</label>
    </div>
    <div class="form_field">
    	<?php echo $Group->getNameById( $row['group_id'] );?>
		
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Parent </label>
    </div>
    <div class="form_field">
    	<?php echo ($row['parent_id']==0)? "SELF" : $Content->getNameById($row['parent_id']);?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Menu Name </label>
    </div>
    <div class="form_field">
    	<?php echo $row['menu_name'];?>
    </div>
  </div>
  
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label> URL </label>
    </div>
    <div class="form_field">
    	<?php echo $row['pseudo_name'];?>
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Content Title  </label>
    </div>
    <div class="form_field">
    	<?php echo $row['content_title'];?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Short Description  </label>
    </div>
    <div class="form_field">
    	<?php echo $row['short_description'];?>
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Detail Description </label>
    </div>
    <div class="form_field">
    	<?php echo $row['detail_description'];?>
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Date </label>
    </div>
    <div class="form_field">
    	<?php echo $row['date'];?>
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Author </label>
    </div>
    <div class="form_field">
    	<?php echo $row['author'];?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Weight </label>
    </div>
    <div class="form_field">
    	<?php echo $row['weight'];?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Active: </label>
    </div>
    <div class="form_field">
    	<?php echo ($row['is_active']=='Y') ? 'Yes' : 'No' ;?>
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Page Title </label>
    </div>
    <div class="form_field">
    	<?php echo $row['page_title'];?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Meta Description</label>
    </div>
    <div class="form_field">
    	<?php echo $row['meta_description'];?>
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Keywords </label>
    </div>
    <div class="form_field">
    	<?php echo $row['keywords'];?>
    </div>
  </div>



  <?php if(isset($sub) && $sub=='y'){ ?>
  
   
  <div class="form_item">
  	<div class="form_label">
    	<label>  Duration </label>
    </div>
    <div class="form_field">
    	<?php echo $row['duration'];?>
    </div>
  </div>

    <div class="form_item">
  	<div class="form_label">
    	<label>  Code </label>
    </div>
    <div class="form_field">
    	<?php echo $row['code'];?>
    </div>
  </div>
  
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Route </label>
    </div>
    <div class="form_field">
    	<?php echo $row['route'];?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Route Map </label>
    </div>
    <div class="form_field">
    	<?php echo $row['route_map'];?>
    </div>
  </div>
  
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Group Size </label>
    </div>
    <div class="form_field">
    	<?php echo $row['g_size'];?>
    </div>
  </div>
  
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Max Elevation </label>
    </div>
    <div class="form_field">
    	<?php echo $row['maxalt'];?>
    </div>
  </div>
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Grade/Difficulty </label>
    </div>
    <div class="form_field">
    	<?php echo $row['grade'];?>
    </div>
  </div>
  
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Operation(Trekking Style) </label>
    </div>
    <div class="form_field">
    	<?php echo $row['operation'];?>
    </div>
  </div>
  
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Arrival On </label>
    </div>
    <div class="form_field">
    	<?php echo $row['arrival'];?>
    </div>
  </div>
  
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Departure From </label>
    </div>
    <div class="form_field">
    	<?php echo $row['departure'];?>
    </div>
  </div>
  
  
    <div class="form_item">
  	<div class="form_label">
    	<label>  Transportation </label>
    </div>
    <div class="form_field">
    	<?php echo $row['transport'];?>
    </div>
  </div>



 <div class="form_item">
  	<div class="form_label">
    	<label>  Country </label>
    </div>
    <div class="form_field">
    	<?php echo $row['country'];?>
    </div>
  </div>
  
   <div class="form_item">
  	<div class="form_label">
    	<label>  Meals </label>
    </div>
    <div class="form_field">
    	<?php echo $row['meals'];?>
    </div>
  </div>
  
  
   <div class="form_item">
  	<div class="form_label">
    	<label>  Accommodation </label>
    </div>
    <div class="form_field">
    	<?php echo $row['accomode'];?>
    </div>
  </div>
  
   <div class="form_item">
  	<div class="form_label">
    	<label>  Priority </label>
    </div>
    <div class="form_field">
    	<?php echo $row['priority'];?>
    </div>
  </div>
     <div class="form_item">
  	<div class="form_label">
    	<label>  Best Month </label>
    </div>
    <div class="form_field">
    	<?php echo $row['best_month'];?>
    </div>
  </div>
  
     <div class="form_item">
  	<div class="form_label">
    	<label>  Trip Cost </label>
    </div>
    <div class="form_field">
    	<?php echo $row['trip_cost'];?>
    </div>
  </div>
  
     <div class="form_item">
  	<div class="form_label">
    	<label>  Booking Price </label>
    </div>
    <div class="form_field">
    	<?php echo $row['booking_cost'];?>
    </div>
  </div>
  
     <div class="form_item">
  	<div class="form_label">
    	<label>  Price Comment </label>
    </div>
    <div class="form_field">
    	<?php echo $row['price_comment'];?>
    </div>
  </div>
   <div class="form_item">
  	<div class="form_label">
    	<label>  Activity List </label>
    </div>
    
    <?php
		$activity_list = $Content -> getConActivity($id);
		while($activity_row = $Conn -> fetchArray($activity_list)){
	 ?>
    
    <div class="form_field">
    	<?php
		
		$act_dtl = $Activity -> getById($activity_row['activity_id']);
		$act_row = $Conn -> fetchArray($act_dtl);
		 echo $act_row['name'];
		 
		 
		 ?>
    </div>
    
    <?php } ?>
    
  </div>
  
  
  <?php } ?>