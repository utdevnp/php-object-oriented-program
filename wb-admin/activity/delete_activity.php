<?php
	if(!isset($_GET['id']))
	{	
		header("Location: index.php?folder=activity&file=list_activity.php");
	}

		$delete_result = $Activity->delete($_GET['id']);	
		if($delete_result==1)
		{
			header("Location: index.php?folder=activity&file=list_activity.php&msg= Delete Succesfully!");
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