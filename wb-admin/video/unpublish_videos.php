<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=video&file=list_videos.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Videos->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$video_id = $_GET['video_id'];
		header('Location:index.php?folder=video&file=list_videos.php&video_id=$video_id&wrong_msg=Id or Record Not Found');
	}
	else
	{
		$delete_result = $Videos->unpublish($_GET['id']);	
		if($delete_result==1)
		{
			$video_id = $_GET['video_id'];
			header("Location:index.php?folder=video&file=list_videos.php&video_id=$video_id&msg=Unpublished-Succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>