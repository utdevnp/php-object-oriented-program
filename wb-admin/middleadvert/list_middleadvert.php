	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>

	<div style="clear:both;"></div>
	
	 <div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/downloads.gif) no-repeat; text-indent:40px; Padding:5px;">Download Manager >> Files</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=middlead&file=list_middlead.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=middleadvert&file=add_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
<?php
//get all record from feedback table
	if(isset($_GET['middlead_id']))
	{
		$result = $Middleadvert->getByMiddleadId($_GET['middlead_id']);	
	}
	else
	{
		$result = $Middleadvert->getAll();
	}
	//count rows
	
	?>


	
	<table border="0" class="list_style" cellspacing="0" align="left"  cellpadding="5" width="100%" id="content_table">
		<thead>
		<tr>
			<th>ID</th>
			<th>Gallery Name</th>
			<th>Name</th>
			<th>File Name</th>
			<th>File Size</th>
			<th>Download File</th>
            <th>Status</th>
			<th colspan="3"><a href="index.php?folder=middleadvert&file=add_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id'];?>">Add New File</a></th>
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
		while($row = $Conn->fetchArray($result))
		{
		?>
			<tr>
				<td> 
					<?php echo $row['id'];?>
				</td>
				<td> 
					<?php echo $Middlead->getNameById( $row['middlead_id']); ?>
                </td>
				<td> 
					<?php echo $row['title']; ?>	
                </td>
                <td> 
					<?php echo $row['id'].".".$row['ext']; ?>	
                </td>
				<td> 
					<?php
						echo filesize(DOWNLOAD_IMG_DIR.$row['id'].'.'.$row['ext']).' Bytes';//.'<small>( 1024 Bytes = 1 Kilo Byte )</small>';
					?> 
				</td>
				   <td> 
				<a href="<?php echo DOWNLOAD_IMG_DIR. $row['id'].'.'.$row['ext'];?>">Download<a/>
                </td>
				
				<td class="<?php if($row['is_active']=='Y'){echo 'published';}else{echo 'unpublished';} ?>">
					  <?php if($row['is_active']=='Y') { ?>
						<a href="index.php?folder=middleadvert&file=unpublish_middleadvert.php&middlead_id=<?php echo $_GET['middlead_id']?>&id=<?php echo $row['id'];?>"><strong><img src="graphics/activate.png" width="25" height="25" alt="Edit" title="Publish" /> </strong></a>
					<?php } else if($row['is_active']=='N') { ?>
					<a href="index.php?folder=middleadvert&file=publish_middleadvert.php&id=&middlead_id=<?php echo $_GET['middlead_id']?>&id=<?php echo $row['id'];?>"><strong><img src="graphics/deactivate.png" width="25" height="25" alt="Edit" title="Unpublish" /></strong></a>
					<?php }?>
			  </td>
				
                <td> 
					<a href="index.php?folder=middleadvert&file=view_middleadvert.php&id=<?php echo $row['id'];?>&middlead_id=<?php echo $row['middlead_id']; ?> "> <img style="float:left;" src="graphics/view.png" alt="title" title="view" border="0" width="25" height="25" /> <small class="edit" title="view">view</small>  </a>
                </td>
                <td> 
					<a href="index.php?folder=middleadvert&file=edit_middleadvert.php&id=<?php echo $row['id'];?>&middlead_id=<?php echo $row['middlead_id']; ?>"> <img  style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" /> <small class="edit" title="edit">edit</small>  </a>
                </td>
                <td> 
					<a href="index.php?folder=middleadvert&file=delete_middleadvert.php&id=<?php echo $row['id'];?>&middlead_id=<?php echo $row['middlead_id']; ?>"> <img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /> <small class="edit" title="delete">delete</small> </a>
                </td>                                
                
			</tr>
		<?php
			}//while
		?>
		</tbody>
	</table>

