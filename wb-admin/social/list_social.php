	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/group.gif) no-repeat; text-indent:40px; Padding:5px;">Group Management</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=social&file=add_social.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
	
<?php  $result =$Social->getAll(); ?>
<table cellpadding="5" cellspacing="0" align="left" width="100%" border="1" id="content_table">
	<thead>

		<tr>
        	
			<th> ID </th>
			<th><input type="checkbox" name="all_delete"/></th>
			<th> link </th>
			<th> Active </th>
			<th colspan="4">
				<a title="Click Here To Add New Group" href=""> Add New </a>
			</th>
		</tr>
	</thead>

		<tbody>
		<div class="record">
			<?php
				$count = $Conn->numRows($result);
				echo "<h5>".$count." Group(s) Are Here </h5>";
			?>
		</div>
	<?php
		while($row = $Conn-> fetchArray($result))
		{
		?>
       	
			<tr border="1">
            	
           		
				<td> <?php echo $row['id'];?> </td>
				<td> <input type="checkbox" name="singal_delete"/></td>
				<td class="name"> <b><?php echo $row['title'];?></b> </td>
			
				<td> <?php echo ($row['is_active']=='Y') ? 'Yes' : 'No'; ?> </td>


				
				<td> 
                	<a href="index.php?folder=social&file=view_social.php&id=<?php echo $row['id'];?>"> 
                    	<img src="graphics/view.png" width="25" height="25" alt="View" title="View" />
                    </a> 
                </td>
				<td> <a href="index.php?folder=social&file=edit_social.php&id=<?php echo $row['id'];?>"> 
                    	<img src="graphics/edit.png" width="25" height="25" alt="Edit" title="Edit" /> 
                    </a> 
                </td>
				<td> <a href="index.php?folder=social&file=delete_social.php&id=<?php echo $row['id'];?>"> 
                	<img src="graphics/delete.png" width="25" height="25" alt="Delete" title="Delete" /> 
                	</a> </td>
			</tr>
            
           
			
		<?php
		
		}
		?>
		
	</tbody>
	
	</table>
