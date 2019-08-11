<?php
	if(!isset($_GET['id']))
	{
		$group_id = $_GET['group_id'];
				header("Location: index.php?folder=departure&file=all_list.php&id=$group_id");
	}

		$delete_result = $departure->delete($_GET['id']);	
		if($delete_result==1)
		{
			$group_id = $_GET['group_id'];
			header("Location: index.php?folder=departure&file=all_list.php&id=$group_id&msg=Delete Succesfully!");
		}
		else
		{
		?>
			<div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error($Conn->link);?>
			</div>
			<?php
			//header("Location: index.php?folder=gallery&file=list_gallery.php&msg=$msg"); 
		
	}
?>