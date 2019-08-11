	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/user_icon.gif) no-repeat; text-indent:40px; Padding:5px;"> User Management</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href=""><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
	
<?php  $result =$User->getAll(); ?>
<table cellpadding="5" cellspacing="0" align="left" width="100%" border="1" id="content_table">
	<thead>

		<tr>
			<th> ID </th>
			<th>Name</th>
			<th> User Name </th>
			<th> E-Mail </th>
			<th> Address </th>
			<th> Password </th>
			<th> Active </th>
			<th colspan="4">
				<a title="Click Here To Add New User" href="">Add New User </a>
			</th>
		</tr>
	</thead>

		<tbody>
		<div class="record">
			<?php
				$count = $Conn->numRows($result);
				echo "<h5>".$count." Record(s) found </h5>";
			?>
		</div>
	<?php
		while($row = $Conn-> fetchArray($result))
		{
		?>		
			<tr border="1">
			<td> <?php echo $row['id'];?> </td>
				<td> <?php echo $row['name'];?> </td>
				<td> <b><?php echo $row['username'];?></b> </td>	
				<td> <?php echo $row['email'];?> </td>
				<td> <?php echo $row['adress'];?> </td>
				<td> <?php echo $row['password'];?></td>
				<td> <?php echo ($row['is_active']=='Y') ? 'Yes' : 'No'; ?> </td>
				<td> 
                	<a href="index.php?folder=user&file=view_user.php&id=<?php echo $row['id'];?>"> 
                    	<img style="float:left;" src="graphics/view.png" width="25" height="25" alt="View" title="View" /><small class="edit" title="view">view</small>
                    </a> 
                </td>
				<td> <a href="index.php?folder=user&file=edit_user.php&id=<?php echo $row['id'];?>"> 
                    	<img style="float:left;" src="graphics/edit.png" width="25" height="25" alt="Edit" title="Edit" /><small class="edit" title="view">edit</small> 
                    </a> 
                </td>
				<!---td> <a href="index.php?folder=user&file=dedete_user.php&id=<?php //echo $row['id'];?>"> 
                	<img style="float:left;" src="graphics/delete.png" width="25" height="25" alt="Delete" title="Delete" /> <small class="edit" title="view">delete</small>
                	</a> </td -->
			</tr>
		<?php
		}
		?>
		
	</tbody>
	
	</table>
