		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
		</script>

		



<?php $result =$Feedback-> getAll(); ?>

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/feedback.gif) no-repeat; text-indent:40px; Padding:5px;">Feedback Management</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=feedback&file=add_feedback.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	<div style="clear:both;"></div>
	<div class="message">
			<?php
				if(isset($_GET['message']))
				{
					echo "<h5>". $_GET['message']."</h5>";	
				}
			?>
	</div>
	
	<div style="clear:both;"></div>
	
<table cellpadding="5" align="left" cellspacing="0" width="100%" border="1" id="content_table">
	<thead>

		<tr>
			<th> ID </th>
			<th> NAME </th>
			<th> EMAIL </th>
			<th> DATE ADDED </th>	
			<th colspan="3">
				<a href="index.php?folder=feedback&file=add_feedback.php">Add Feedback  </a>
			</th>
		</tr>
	</thead>

		<tbody>

		<div class="record">
			<?php
				$count = $Conn->numrows($result);
				echo "<h5>".$count." Record(s) found </h5>";
			?>
		</div>
		<?php
		while($row = $Conn-> fetchArray($result))
		{
		?>		
			<tr>
				<td> <?php echo $row['id'];?> </td>
				<td> <?php echo $row['name'];?> </td>
				<td> <?php echo $row['email'];?>  </td>
				<td> <?php echo $row['added_date'];?>  </td>	
				
				<td> <a href="index.php?folder=feedback&file=view_feedback.php&id=<?php echo $row['id'];?>"> 
                <img style="float:left;" src="graphics/view.png" width="25" height="25" alt="View" title="View" /><small class="edit">view</small>  </a> </td>
				<td> <a href="index.php?folder=feedback&file=edit_feedback.php&id=<?php echo $row['id'];?>">
                <img style="float:left;" src="graphics/edit.png" width="25" height="25" alt="Edit" title="Edit" /><small class="edit">Edit</small>  </a> </td>
				<td> <a href="index.php?folder=feedback&file=delete_feedback.php&id=<?php echo $row['id'];?>"> 
                <img style="float:left;" src="graphics/delete.png" width="25" height="25" alt="Delete" title="Delete" /><small class="edit">delete</small> </a> </td>
			</tr>
		<?php
		}
		?>
		
	</tbody>
	
	</table>
