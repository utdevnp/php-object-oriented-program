	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>

		
  <div style="clear:both;"></div>
  
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Booking  Management  </h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=img&file=add_img.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>

  
<div style="clear:both;"></div>	
	
<div align="left">
<?php
	if(isset($_GET['msg']))
	{
	?>
		<div class="message">
			<?php
			if(isset($_GET['msg']))
			{
			?>
		<h5><?php echo $_GET['msg'];?></h5>
				<?php
			}
		?>
	</div>
		<?php
	}

//get all record from feedback table
	if(isset($_GET['picture_id']))
	{
		$result = $Img->getByPictureId($_GET['picture_id']);	
	}
	else
	{
		$result = $Img->getAll();
	}
	//count rows
	
	?>
</div>

	
	<table border="0" class="list_style" cellspacing="0" align="left" width="100%"  cellpadding="5" id="content_table">
		<thead>
		<tr>
			<th>ID</th>
			<th>Added Date</th>
			<th>Name</th>
			<th>Address</th>
			<th>Country</th>
			<th>Email</th>
			<th>Packages</th>
			<th>Payment Mode</th>
			<th>Flight No</th>
			
			<th colspan="3"><a href="index.php?folder=img&file=add_img.php">Add New </strong></a></th>
		</tr>
		</thead>
		<tbody>
		
	<div class="record">
			<?php
			//count rows
			//get all record from gallery table
				$count = $Conn->numRows($result);
				echo "<h5>".$count." Record(s) found </h5>";
			?>
		</div>
		<?php
		while($row = $Conn->fetchArray($result))
		{
		?>
			<tr>
				<td> 
					<?php echo $row['id'];?>
				</td>
				<td> 
					<?php echo $row['dateadded'];?>
				</td>
				
				
				<td> 
					<?php echo $row['name']; ?>	
                </td>
				<td> 
					<?php echo $row['address']; ?>	
                </td>
				<td> 
					<?php echo $row['country']; ?>	
                </td>
				<td> 
					<?php echo $row['email']; ?>	
                </td>
				<td> 
					<?php echo $row['packages']; ?>	
                </td>
				<td> 
					<?php echo $row['pamentmode']; ?>	
                </td>
				<td> 
					<?php echo $row['flightno']; ?>	
                </td>
				
				
				
				
				
                <td> 
					<a href="index.php?folder=img&file=view_img.php&id=<?php echo $row['id'];?>"> <img style="float:left;" src="graphics/view.png" alt="title" title="view" border="0" width="25" height="25" />  <small class="edit" title="view">view</small> </a>
                </td>
                <!--td> 
					<a href="index.php?folder=img&file=edit_img.php&id=<?php //echo $row['id'];?>"> <img style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" />  <small class="edit" title="edit">edit</small> </a>
                </td -->
                <td> 
					<a href="index.php?folder=img&file=delete_img.php&id=<?php echo $row['id'];?>"> <img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /> <small class="edit" title="delete">delete</small> </a>
                </td>                                
                
			</tr>
		<?php
			}//while
		?>
		</tbody>
	</table>

