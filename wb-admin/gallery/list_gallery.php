		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
		</script>

<div>
	
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Slider Management</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=gallery&file=add_gallery.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>

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
	
	<div style="clear:both;"></div>
<table border="0"  align="left" cellspacing="0" width="100%"  cellpadding="5" id="content_table">
    <thead>
        <tr>
			<th>ID</th>
			<th>Name</th>
            <th>Parent</th>
			 <th>Image Order</th>
			  <th>Show Items</th>
            <th>Active</th>
			 <th> View Photos </th>
            <th colspan="6"><a href="index.php?folder=gallery&file=add_gallery.php"   style="margin:0;"><span class="bt_green_lft"></span>Add Gallery</a></th>
        </tr>
    </thead>
    <tbody>
	<?php
		//get all record from gallery table
		$result = $Gallery->getAll();
	?>
		<div class="record">
			<?php
				$count = $Conn->numRows($result);
				echo "<h5>".$count." Record(s) found </h5>";
			?>
		</div>
	<?php
	
		WHILE($row = mysqli_fetch_array($result))
		{
		?>
			<tr>	
				<td> <?php echo $row['id'];?> </td>
				<td> 
					<?php echo ucwords(strtolower($row['name'])); ?>	
                </td>
				
				<td> 
					<?php echo ($row['parent_id']==0)?"SELF" : $Gallery->getNameById($row['parent_id']);?>
                </td>
				 <td> 
					<?php echo ($row['order_by']=='ASC') ? 'Ascending' : 'Descending'; ?> 
                </td>
				 <td> 
					<?php echo $row['howmany'];?>
                </td>
				
                <td> 
					<?php echo ($row['is_active']=='Y') ? 'Yes' : 'No'; ?>
                </td>
				
                </td>
				<td> 
					<a href="index.php?folder=image&file=list_image.php&gallery_id=<?php echo $row['id'];?> "> 
						 Photos
                    </a>
                </td>
                		
               	<td> <a href="index.php?folder=gallery&file=view_gallery.php&id=<?php echo $row['id'];?>">
                <img style="float:left;" src="graphics/view.png" width="25" height="25" alt="View" title="View" /><small class="edit">view</small> </a> </td>
                <td> 
					<a href="index.php?folder=gallery&file=edit_gallery.php&id=<?php echo $row['id'];?>"> 
					<img style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" /> <small class="edit">Edit</small> </a>
                </td>
                <!--td> 
					<a href="index.php?folder=gallery&file=delete_gallery.php&id=<?php //echo $row['id'];?>"> 
					<img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /> <small class="edit">delete</small> </a>
                </td -->                                
                
			</tr>
		<?php
		}//while
		?>
		</tbody>
	</table>
    </div>