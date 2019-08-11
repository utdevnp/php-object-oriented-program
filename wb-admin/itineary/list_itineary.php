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
if(isset($_GET['content_id']))
{
	$result = $itineary->getByContentId($_GET['content_id']);	
}
else
{
	//if content_id is not passed frm GET, send user to the place where he will reach after clicking GO Back button
	header("Location: index.php?folder=content&file=list_content.php&sub=$sub&group_id=".$_GET['group_id']); 
}
?>


	<div style="clear:both;"></div>


	
	
	
	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/content.gif) no-repeat; text-indent:40px; Padding:5px;">Itineary of Trip</h2>
           <a style="float:right; margin-right:5px;" href="index.php?folder=content&file=list_content.php&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		  <a style="float:right;  margin-right:10px;" href="index.php?folder=itineary&file=add_itineary.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
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
	<br />
<div style="clear:both;"></div>
	
<table cellpadding="5" align="left" cellspacing="0" width="100%" border="1" id="content_table">
	<thead>

		<tr>
			<th> SN </th>
			<th> Title </th>
			<th> Content </th>
            <th> Active </th>
			
			
			<th colspan="4">
				<?php if(isset($_GET['content_id'])) { ?>
                <a href="index.php?folder=itineary&file=add_itineary.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"> 
                	ADD NEW 
                </a>
                <?php }else{?>
                	&darr;
                <?php } ?>
			</th>
		</tr>
	</thead>

		<tbody>

		<?php
		$i=1;
		while($row = $Conn-> fetchArray($result))
		{
		?>		
			<tr>
				<td> <?php echo $i++;?> </td>
				<td> <strong><?php echo $row['title'];?> </strong> </td>
				<td> <?php echo $Content->getNameById( $row['content_id']) ;?> </td>

				
                <td> <?php echo ($row['is_active']=='Y')?'Yes':'No'; ?> </td>
               
                
				<td> <a href="index.php?folder=itineary&file=view_itineary.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'] ?>&id=<?php echo $row['id'];?>&sub=<?php echo $sub; ?>"> 
                <img style="float:left;" src="graphics/view.png" width="25" height="25" alt="View" title="View" /><small class="edit">view</small> </a> </td>
				<td> <a href="index.php?folder=itineary&file=edit_itineary.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'] ?>&id=<?php echo $row['id'];?>&sub=<?php echo $sub; ?>"> 
                <img style="float:left;" src="graphics/edit.png" width="25" height="25" alt="Edit" title="Edit" /> <small class="edit">Edit</small>  </a> </td>
				<td> <a href="index.php?folder=itineary&file=delete_itineary.php&id=<?php echo $row['id'];?>&content_id=<?Php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>">
                <img style="float:left;" src="graphics/delete.png" width="25" height="25" alt="Delete" title="Delete" /> <small class="edit">delete</small> </a> </td>
			</tr>
		<?php
		}
		?>
		
	</tbody>
	
	</table>
