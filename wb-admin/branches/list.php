	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>

<div align="left">

<?php
//get all record from feedback table
//$branch_id = 1;
	if(isset($_GET['branch_id']))
	{
		$result = $B->getByBranchName($_GET['branch_id']);	
	}
	else
	{
		$result = $B->getAll();
	}
	//count rows
	
	?>
</div>

	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/video_icon.gif)no-repeat; text-indent:40px; Padding:9px;">Trip Glance >> Glances  </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=branch&file=list.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=branches&file=add.php&branch_id=<?php echo $_GET['branch_id'];?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New "  /></a> 
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
			<th>SN</th>
			<th>Group</th>
			<th>Name</th>
            <th>Status</th>
			<th colspan="3"><a href="index.php?folder=branches&file=add.php&branch_id=<?php echo $_GET['branch_id'];?>"><strong title="">Add New </strong></a></th>
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
		while($row = $Conn->fetchArray($result))
		{
		?>
			<tr>
				<td> <?php echo $row['id'];?></td>
				
				<td> <?php  echo ($row['branch_id']==0)?"SELF" : $Content->getNameById($row['branch_id']); ?> </td>
				<td> <?php echo $row['name']; ?>	 </td>

				
				
				<td class="<?php if($row['is_active']=='Y'){echo 'published';}else{echo 'unpublished';} ?>">
					  <?php if($row['is_active']=='Y') { ?>
						<a href="index.php?folder=branches&file=unpublish.php&branch_id=<?php echo $_GET['branch_id']?>&id=<?php echo $row['id'];?>"><strong><img src="graphics/activate.png" width="25" height="25" alt="Publish" title="Publish" /> </strong></a>
					<?php } else if($row['is_active']=='N') { ?>
					<a href="index.php?folder=branches&file=publish.php&id=&branch_id=<?php echo $_GET['branch_id']?>&id=<?php echo $row['id'];?>"><strong><img src="graphics/deactivate.png" width="25" height="25" alt="Publish" title="Unpublish" /></strong></a>
					<?php }?>
			  </td>
				
                <td> 
					<a href="index.php?folder=branches&file=view.php&id=<?php echo $row['id'];?>&branch_id=<?php echo $row['branch_id']; ?> "> 
					<img style="float:left;" src="graphics/view.png" alt="title" title="view" border="0" width="25" height="25" /> <small title="view" class="edit">view</small> </a>
                </td>
                <td> 
					<a href="index.php?folder=branches&file=edit.php&id=<?php echo $row['id'];?>&branch_id=<?php echo $row['branch_id']; ?>">
					<img style="float:left;" src="graphics/edit.png" alt="edit" title="edit" border="0" width="25" height="25" /> <small title="edit" class="edit">edit</small> </a>
                </td>
                <td> 
					<a href="index.php?folder=branches&file=delete.php&id=<?php echo $row['id'];?>&branch_id=<?php echo $row['branch_id']; ?>"> 
					<img style="float:left;" src="graphics/delete.png" alt="delete" title="delete" border="0" width="25" height="25" /> <small title="delete" class="edit">delete</small> </a>
                </td>                                
                
			</tr>
		<?php
			}//while
		?>
		</tbody>
	</table>

