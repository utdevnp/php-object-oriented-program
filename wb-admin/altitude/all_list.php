	<?php $id = $_GET['id']; ?>
<?php
if(isset($_POST['delete_me'])){
				
	foreach($_POST['dltme'] as $a => $b){
		
		
		$delete_id = $_POST['dltme'][$a];
		
	$delete_result = $Altitude->delete($delete_id);	
	}
		
	
			header("Location: index.php?folder=altitude&file=all_list.php&id=$id&msg= Delete Succesfully!");
	
	}



?>

    
    
    	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
		</script>
      
    
    	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Altitude Management </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=altitude&file=list_altitude.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=altitude&file=add_altitude.php&ex=<?php echo $id; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
	<form method="post" action="">
<table border="0"  align="left" cellspacing="0" width="100%"  cellpadding="5" id="content_table">
    <thead>
        <tr>
        <th><input type="submit" name="delete_me" value="DELETE"/></th>
			<th>ID</th>
			<th>Day</th>
		
            <th>Place Name</th>
			<th>Altitude</th>
       
			 <th>Temperature</th>
            <th colspan="6"><a href="index.php?folder=altitude&file=add_altitude.php&ex=<?php echo $id; ?>"><strong title=" Click Here To Add New Gallery" >Add New Group</strong></a></th>
        </tr>
    </thead>
    <tbody>
	<?php
	
	//get all record from gallery table
		$result = $Altitude->getConByGrop($id);
	?>
		<div class="record">
			<?php
				$count = $Conn->numRows($result);
				echo "<h5>".$count." Record(s) found </h5>";
			?>
		</div>
	<?php
		WHILE($row = $Conn->fetchArray($result))
		{
		?>
			<tr>	
                  <td><input type="checkbox" name="dltme[]" value="<?php echo $row['id']; ?>"></td>
				<td> <?php echo $row['id'];?> </td>
				<td class="name"> 
					<b><?php 
					
				echo $row['day'];

					?>	</b>
                </td>
				<td> 
					<?php 
					
					echo $row['place_name'];
					
					?>
                </td>
                
                <td><?php
					echo $row['altitude'];
				
				
				 ?></td>
				<td> 
					<?php 
					
					echo $row['temperature'];
					
					?>
                </td>
				
              
				
               	<td> <a href="index.php?folder=altitude&file=view_altitude.php&id=<?php echo $row['id'];?>&group_id=<?php echo $id; ?>">
                <img style="float:left;" src="graphics/view.png" width="25" height="25" alt="View" title="View" /><small title="view" class="edit">view</small> </a>	</td>
                <td>
                
					<a href="index.php?folder=altitude&file=edit_altitude.php&id=<?php echo $row['id'];?>&group_id=<?php echo $id; ?>"> 
					<img style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" /><small title="edit" class="edit">edit</small>  </a>
                </td><td>
					<a href="index.php?folder=altitude&file=delete_altitude.php&id=<?php echo $row['id'];?>&group_id=<?php echo $id; ?>"> 
					<img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /> <small title="delete" class="edit">delete</small> </a>
                </td>                                
                
			</tr>
		<?php
		}//while
		?>
		</tbody>
	</table>
    </form>
    </div>