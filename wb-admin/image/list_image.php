		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
		</script>



<?php
//get all record from feedback table
	if(isset($_GET['gallery_id']))
	{
		$result = $Image->getByGalleryId($_GET['gallery_id']);	
	}
	else
	{
		$result = $Image->getAll();
	}
	//count rows
	
	?>

<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/slider_icon.gif) no-repeat; text-indent:40px; Padding:5px;">Slider Management >> Photos</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=gallery&file=list_gallery.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=image&file=add_image.php&gallery_id=<?php echo $_GET['gallery_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
	<table border="0" class="list_style" cellspacing="0" width="100%" align="left"  cellpadding="5" id="content_table">
		<thead>
		<tr>
			<th>ID</th>
			<th>Gallery Name</th>
			<th>Title</th>
			<th>File</th>
			<th>Image</th>
            <th>Status</th>
			<th colspan="3"><a href="index.php?folder=image&file=add_image.php&gallery_id=<?php echo $_GET['gallery_id'];?>" ><strong title="Click Here to Add New Photo">Add New Photo</strong></a></th>
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
		while($row = $Conn->fetchArray($result))
		{
		?>
			<tr>
				<td> 
					<?php echo $row['id'];?>
				</td>
				<td> 
					<?php echo $Gallery->getNameById( $row['gallery_id']); ?>
                </td>
				<td> 
					<?php echo $row['title']; ?>	
                </td>
                <td> 
					<?php echo $row['id'].".".$row['ext']; ?>	
                </td>
				<td> 
					<a href=""><?php echo "<img src=".SLIDER_IMG_DIR.$row['id'].".".$row['ext']. " width=60px height=30px>";?> </a>
				</td>
				
				<td class="<?php if($row['is_active']=='Y'){echo 'published';}else{echo 'unpublished';} ?>">
					  <?php if($row['is_active']=='Y') { ?>
						<a href="index.php?folder=image&file=unpublish_image.php&gallery_id=<?php echo $_GET['gallery_id']?>&id=<?php echo $row['id'];?>"><strong><img src="graphics/activate.png" width="25" height="25" alt="Edit" title="Publish" /> </strong></a>
					<?php } else if($row['is_active']=='N') { ?>
					<a href="index.php?folder=image&file=publish_image.php&id=&gallery_id=<?php echo $_GET['gallery_id']?>&id=<?php echo $row['id'];?>"><strong><img src="graphics/deactivate.png" width="25" height="25" alt="Edit" title="Unpublish" /></strong></a>
					<?php }?>
			  </td>
				
                <td> 
					<a href="index.php?folder=image&file=view_image.php&id=<?php echo $row['id'];?>&gallery_id=<?php echo $row['gallery_id']; ?> "> <img style="float:left;" src="graphics/view.png" alt="title" title="view" border="0" width="25" height="25" /> <small class="edit" title="view">view</small> </a>
                </td>
                <td> 
					<a href="index.php?folder=image&file=edit_image.php&id=<?php echo $row['id'];?>&gallery_id=<?php echo $row['gallery_id']; ?>"> <img style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" /> <small class="edit" title="edit">edit</small> </a>
                </td>
                <td> 
					<a href="index.php?folder=image&file=delete_image.php&id=<?php echo $row['id'];?>&gallery_id=<?php echo $row['gallery_id']; ?>"> <img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /> <small class="edit" title="delete">delete</small> </a>
                </td>                                
                
			</tr>
		<?php
			}//while
		?>
		</tbody>
	</table>

