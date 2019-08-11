<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=image&file=list_image.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Image->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$gallery_id = $_GET['gallery_id'];
		header('Location:index.php?folder=image&file=list_image.php&gallery_id=$gallery_id&wrong_msg=Id-or-record-not-found');
	}
	else
	{
		$delete_result = $Image->publish($_GET['id']);	
		if($delete_result==1)
		{
			$gallery_id = $_GET['gallery_id'];
			header("Location:index.php?folder=image&file=list_image.php&gallery_id=$gallery_id&msg=Published-succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>