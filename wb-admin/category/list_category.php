	
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/group.gif) no-repeat; text-indent:40px; Padding:5px;">Category Management</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=category&file=add_category.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Category"  /></a> 
	</div>
		<div style="clear:both;"></div>
	<div class="message">
			<?php
				if(isset($_GET['message']))
				{
					echo "<h5>". $_GET['message']."</h5>";	
				}
			?>
			<?php
				if(isset($_GET['msg']))
				{
					echo "<h5>". $_GET['msg']."</h5>";	
				}
			?>
	</div>
	<div style="clear:both;"></div>
	
<?php  $result =$Category->getAll(); ?>
<table cellpadding="5" cellspacing="0" align="left" width="100%" border="1" id="content_table">
	<thead>

		<tr>
        	
			<th> SN </th>
			<th><input type="checkbox" name="all_delete"/></th>
			<th> Name </th>
			<th> Parent </th>
			<th> Content Order </th>
			<th> Show Item</th>
            <th> Date Added </th>
			 <th>Status </th>
			<th colspan="4">
				<a title="Click Here To Add New Category" href="index.php?folder=category&file=add_category.php"> Add New Category</a>
			</th>
		</tr>
	</thead>

		<tbody>
		<div class="record">
			<?php
				$count = $Conn->numRows($result);
				echo "<h5>".$count." Category(s) Are Here </h5>";
			?>
		</div>
	<?php
		$i=1;
		while($row = $Conn-> fetchArray($result))
		{
		?>
       	
			<tr border="1">
            	
           		
				<td> <?php echo $i++;?> </td>
				<td> <input type="checkbox" name="singal_delete"/></td>
				<td class="name"> <b><?php echo $row['name'];?></b> </td>
				<td><?php echo ($row['parent_id']==0)? "Self" : $Category->getNameById($row['parent_id']); ?></td>
				<td> <?php echo ($row['order_by']=='ASC') ? 'Ascending' : 'Descending'; ?> </td>
				<td> <?php echo $row['howmany'];?>  </td>
				<td> <?php echo $row['added_date'];?>  </td>
				
				<td class="<?php if($row['is_active']=='Y'){echo 'published';}else{echo 'unpublished';} ?>">
					  <?php if($row['is_active']=='Y') { ?>
						<a href="index.php?folder=category&file=unpublish_category.php&id=<?php echo $row['id'];?>"><strong><img src="graphics/activate.png" width="25" height="25" alt="Edit" title="Publish" /> </strong></a>
					<?php } else if($row['is_active']=='N') { ?>
					<a href="index.php?folder=category&file=publish_category.php&id=&id=<?php echo $row['id'];?>"><strong><img src="graphics/deactivate.png" width="25" height="25" alt="Edit" title="Unpublish" /></strong></a>
					<?php }?>
			  </td>
				
				<td> 
                	<a href="index.php?folder=category&file=view_category.php&id=<?php echo $row['id'];?>"> 
                    	<img src="graphics/view.png" width="25" height="25" alt="View" title="View" />
                    </a> 
                </td>
				<td> <a href="index.php?folder=category&file=edit_category.php&id=<?php echo $row['id'];?>"> 
                    	<img src="graphics/edit.png" width="25" height="25" alt="Edit" title="Edit" /> 
                    </a> 
                </td>
				<!--td> <a href="index.php?folder=category&file=delete_category.php&id=<?php //echo $row['id'];?>"> 
                	<img src="graphics/delete.png" width="25" height="25" alt="Delete" title="Delete" /> 
                	</a> </td -->
			</tr>
            
           
			
		<?php
		
		}
		?>
		
	</tbody>
	
	</table>
