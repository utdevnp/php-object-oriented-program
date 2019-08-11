		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
		</script>


<div>
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/gallery_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Gallery Management</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=advertisement&file=add_advertisement.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Gallery"  /></a> 
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
	
	
<table border="0"  align="left" cellspacing="0" class="list_style" width="100%" cellpadding="5" id="content_table">
    <thead>
        <tr>
			<th>ID </th>
			<th><input type="checkbox" name="all_delete" /> </th>
			<th>Gallery Name</th>
            <th>Parent</th>
			 <th>Image Order</th>
			  <th>Show Items</th>
            <th>Active</th>
			 <th> View Image </th>
            <th colspan="6" ><a href="index.php?folder=advertisement&file=add_advertisement.php"><strong title="Click Here To Add New Gallery">Add New Gallery</strong></a></th>
        </tr>
    </thead>
    <tbody>
<?php
//get all record from gallery table
	$result = $Advertisement->getAll();
	?>
	
	
		<div class="record">
			<?php
			//count rows
				$count = $Conn->numrows($result);
				echo "<h5>".$count." Record(s) found </h5>";
			?>
		</div>
	<?php
		WHILE($row = $Conn->fetchArray($result))
		{
		?>
			<tr>
		
				<td> <?php echo $row['id'];?> </td>
				<td><input type="checkbox" name="all_delete" /> </td>	
				<td class="name"> 
					<b><?php echo $row['name']; ?>	</b>
                </td>
				
				<td> 
					<?php echo ($row['parent_id']==0)?"SELF" : $Content->getNameById($row['parent_id']);?>
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
					<a href="index.php?folder=advert&file=list_advert.php&advertisement_id=<?php echo ($row['parent_id']==0)? $row['id'] : $row['parent_id'];?> "> 
						 Images
                    </a>
                </td>
                		
               	<td> <a href="index.php?folder=advertisement&file=view_advertisement.php&id=<?php echo $row['id'];?>">
                <img style="float:left;"  src="graphics/view.png" width="25" height="25" alt="View" title="View" /><small title="view" class="edit">view</small> </a> </td>
                <td> 
					<a href="index.php?folder=advertisement&file=edit_advertisement.php&id=<?php echo $row['id'];?>"> 
					<img style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" /><small title="edit" class="edit">edit</small>  </a>
                </td>
                <td> 
					<a href="index.php?folder=advertisement&file=delete_advertisement.php&id=<?php echo $row['id'];?>"> 
					<img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /><small title="delete" class="edit">delete</small> </a>
                </td>                                
                
			</tr>
		<?php
		}//while
		?>
		</tbody>
	</table>
    </div>