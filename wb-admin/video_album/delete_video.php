<?php
	if(!isset($_GET['id']))
	{	
		header("Location: index.php?folder=video_album&file=list_video.php");
	}

	//get groups information in respect of Id
	$result = $Video->getById($_GET['id']);
	$count = $Conn->numrows($result);
	if($count==0)
	{
		//header("Location: index.php?folder=gallery&file=list_gallery.php");
	}
	else
	{
		$delete_result = $Video->delete($_GET['id']);	
		if($delete_result==1)
		{
			header("Location: index.php?folder=video_album&file=list_video.php&msg=Record Delete Succesfully!");
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
	}
?>