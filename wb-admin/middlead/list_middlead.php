	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>


	<div style="clear:both;"></div>
	
	 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/downloads.gif) no-repeat; text-indent:40px; Padding:5px;">Download Manager</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=middlead&file=add_middlead.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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

<div>

<table border="0"  align="left" cellspacing="0" class="list_style" width="100%" cellpadding="5" id="content_table">
    <thead>
        <tr>
			<th>ID</th>
			<th>Group(s)</th>
            <th>Parent</th>
            <th>Active</th>
			 <th>View Files</th>
            <th colspan="6"><a href="index.php?folder=middlead&file=add_middlead.php" >Add New Group</a></th>
        </tr>
    </thead>
    <tbody>


	<div class="record">
			<?php
			//get all record from gallery table
				$count = $Conn->numRows($result);
				echo "<h5>".$count." Record(s) found </h5>";
			?>
		</div>
	
<?php
	$result = $Middlead->getAll();	
	
		WHILE($row = $Conn->fetchArray($result))
		{
		?>
			<tr>	
				<td> <?php echo $row['id'];?> </td>
				<td class="name"> 
					<b><?php echo $row['name']; ?>	</b>
                </td>
				
				<td> 
					<?php echo ($row['parent_id']==0)?"SELF" : $Middlead->getNameById($row['parent_id']);?>
                </td>
				
                <td> 
					<?php echo ($row['is_active']=='Y') ? 'Yes' : 'No'; ?>
                </td>
				
                </td>
				<td> 
					<a href="index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=<?php echo $row['id'];?> "> 
						 Files
                    </a>
                </td>
                		
               	<td> <a href="index.php?folder=middlead&file=view_middlead.php&id=<?php echo $row['id'];?>">
                <img  style="float:left;" src="graphics/view.png" width="25" height="25" alt="View" title="View" /> <small class="edit" title="view">view</small> </a> </td>
                <td> 
					<a href="index.php?folder=middlead&file=edit_middlead.php&id=<?php echo $row['id'];?>"> 
					<img style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" />  <small class="edit" title="edit">edit</small> </a>
                </td>
                <!--td> 
					<a href="index.php?folder=middlead&file=delete_middlead.php&id=<?php //echo $row['id'];?>"> 
					<img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /> <small class="edit" title="delete">delete</small> </a>
                </td -->                                
                
			</tr>
		<?php
		}//while
		?>
		</tbody>
	</table>
    </div>