	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>

<div align="left">

<?php
//get all record from feedback table
	if(isset($_GET['video_id']))
	{
		$result = $Videos->getByVideosId($_GET['video_id']);	
	}
	else
	{
		$result = $Videos->getAll();
	}
	//count rows
	
	?>
</div>

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Videos Management >> Gallery >> Videos </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=video_album&file=list_video.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=video&file=add_videos.php&video_id=<?php echo $_GET['video_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
			
			<th>
			<?php 
			$id = $_GET['video_id'];
			if($id == 2){
				echo "Contetn Name";
			}else{
				echo "Vodeo Gallery";
			}
			?>
			</th>
			<th>Title</th>
			<th>Url</th>
            <th>Status</th>
			<th colspan="3"><a href="index.php?folder=video&file=add_videos.php&video_id=<?php echo $_GET['video_id'];?>"><strong title="">Add New </strong></a></th>
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
					<?php
					$id = $_GET['video_id'];
					if($id==2)
					{
					echo $Content->getNameById( $row['p_id']);
					}else{
					echo $Video->getNameById( $row['video_id']);
					}
					?>
                </td>
				<td> 
					<?php echo $row['title']; ?>	
                </td>
                <td> 
					<?php echo $row['url'];?>	
                </td>
				
				
				<td class="<?php if($row['is_active']=='Y'){echo 'published';}else{echo 'unpublished';} ?>">
					  <?php if($row['is_active']=='Y') { ?>
						<a href="index.php?folder=video&file=unpublish_videos.php&video_id=<?php echo $_GET['video_id']?>&id=<?php echo $row['id'];?>"><strong><img src="graphics/activate.png" width="25" height="25" alt="Publish" title="Publish" /> </strong></a>
					<?php } else if($row['is_active']=='N') { ?>
					<a href="index.php?folder=video&file=publish_videos.php&id=&video_id=<?php echo $_GET['video_id']?>&id=<?php echo $row['id'];?>"><strong><img src="graphics/deactivate.png" width="25" height="25" alt="Publish" title="Unpublish" /></strong></a>
					<?php }?>
			  </td>
				
                <td> 
					<a href="index.php?folder=video&file=view_videos.php&id=<?php echo $row['id'];?>&video_id=<?php echo $row['video_id']; ?> "> 
					<img style="float:left;" src="graphics/view.png" alt="title" title="view" border="0" width="25" height="25" /> <small title="view" class="edit">view</small> </a>
                </td>
                <td> 
					<a href="index.php?folder=video&file=edit_videos.php&id=<?php echo $row['id'];?>&video_id=<?php echo $row['video_id']; ?>">
					<img style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" /> <small title="edit" class="edit">edit</small> </a>
                </td>
                <td> 
					<a href="index.php?folder=video&file=delete_videos.php&id=<?php echo $row['id'];?>&video_id=<?php echo $row['video_id']; ?>"> 
					<img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /> <small title="delete" class="edit">delete</small> </a>
                </td>                                
                
			</tr>
		<?php
			}//while
		?>
		</tbody>
	</table>

