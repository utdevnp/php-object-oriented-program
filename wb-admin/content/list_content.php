  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
	</script>



<?php

if(isset($_GET['group_id']))
{
	$result= $Content->getByGroupId($_GET['group_id']);
}
else
{
	 $result = $Content->getAll();
} 

?>



	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/content.gif) no-repeat; text-indent:40px; Padding:5px;">Content Management</h2>
           <a style="float:right; margin-right:5px;" href="index.php?folder=group&file=list_group.php&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=content&file=add_content.php&group_id=<?php echo$_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
	
 <div class="hi">
<table cellpadding="5" align="left" cellspacing="0" width="100%" border="1" id="content_table">
	<thead>

		<tr>
        	
			<th> ID </th>
            <th align="left"> Date </th>
			<th align="left">Content Title </th>
			 <th align="left"> Author </th>
			 
		  	<th> Group </th>
			<th> Parent </th>
			<th> Attach</th>
			<th>Best</th>
			<th>Status</th>
			<th colspan="4">
				<?php
				if(isset($_GET['group_id']))
				{
				?>
                <a title="Click Here To Add New Content" href="index.php?folder=content&file=add_content.php&group_id=<?php echo$_GET['group_id'];?>&sub=<?php echo $sub; ?>"> Add New Content </a>
                <?php
				}
				?>
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
			<tr class="border">
            		
				<td> <?php echo $row['id'];?> </td>
				<td class="name"><i> <?php echo $row['date'];?></i>  </td>
				<td class="name"><strong> <?php echo $row['content_title'];?></strong>  </td>
				<td class="name"><i> <?php echo $row['author'];?></i>  </td>
				
				<td> <small><?php echo $Group->getNameById( $row['group_id'] );?></small> </td>
				<td> <small><?php echo ($row['parent_id']==0)?"SELF" : $Content->getNameById($row['parent_id']);?></small>  </td>
                
				<td> 
                	<a href="index.php?folder=attachment&file=list_attachment.php&content_id=<?php echo $row['id'];?>&group_id=<?php echo $row['group_id'];?>&sub=<?php echo $sub; ?>">
                    	<strong>Photos </strong>
                    </a>
                    <?php if(isset($sub)&&$sub=='y'){ ?>
					<a href="index.php?folder=itineary&file=list_itineary.php&content_id=<?php echo $row['id'];?>&group_id=<?php echo $row['group_id'];?>&sub=<?php echo $sub; ?>">
                    	<strong> / Itineary</strong>
                    </a>
                    
                    <?php } ?>
                </td>
				
				<td class="<?php if($row['display']=='Y'){echo 'displayed';}else{echo 'notdisplayed';} ?>">
					  <?php if($row['display']=='Y') { ?>
						<a href="index.php?folder=content&file=nodisplay_content.php&group_id=<?php echo $_GET['group_id']?>&id=<?php echo $row['id'];?>&sub=<?php echo $sub; ?>"><strong style="color:green"> Yes </strong></a>
					<?php } else if($row['display']=='N') { ?>
					<a href="index.php?folder=content&file=display_content.php&group_id=<?php echo $_GET['group_id']?>&id=<?php echo $row['id'];?>&sub=<?php echo $sub; ?>"><strong style="color:red;"> No </strong></a>
					<?php }?>
			  </td>
			  
				
				<td class="<?php if($row['is_active']=='Y'){echo 'published';}else{echo 'unpublished';} ?>">
					  <?php if($row['is_active']=='Y') { ?>
						<a href="index.php?folder=content&file=unpublish_content.php&group_id=<?php echo $_GET['group_id']?>&id=<?php echo $row['id'];?>&sub=<?php echo $sub; ?>"><strong><img src="graphics/activate.png" width="25" height="25" alt="Edit" title="Publish" /> </strong></a>
					<?php } else if($row['is_active']=='N') { ?>
					<a href="index.php?folder=content&file=publish_content.php&id=&group_id=<?php echo $_GET['group_id']?>&id=<?php echo $row['id'];?>&sub=<?php echo $sub; ?>"><strong><img src="graphics/deactivate.png" width="25" height="25" alt="Edit" title="Unpublish" /></strong></a>
					<?php }?>
			  </td>
				<td> 
                <a href="index.php?folder=content&file=view_content.php&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>&id=<?php echo $row['id'];?>">
                 <img style="float:left;" src="graphics/view.png" width="25" height="25" alt="View" title="View" /> <small class="edit">view</small> 
				 </a> 
                 </td>
				
                <td> 
<a href="index.php?folder=content&file=edit_content.php&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>&id=<?php echo $row['id'];?>"> 
                <img style="float:left;" src="graphics/edit.png" width="25" height="25" alt="Edit" title="Edit" /><small class="edit">Edit</small>  
				</a> 
                </td>
				
				<?php
				$group_id=$_GET['group_id'];
				if($group_id==1)
				{
				?>
				
				<?php
				}else{
				?>
				 <td> 
                <a href="index.php?folder=content&file=delete_content.php&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>&id=<?php echo $row['id'];?>"> 
                <img style="float:left;" src="graphics/delete.png" width="25" height="25" alt="Delete" title="Delete" /> <small class="edit">delete</small> 
                </a> 
                </td>
				<?php } ?>
			</tr>
			
			
		<?php	
		}
		?>
		
	</tbody>
	
	</table>
</div>