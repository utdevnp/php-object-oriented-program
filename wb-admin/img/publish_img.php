<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=img&file=list_img.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Img->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$picture_id = $_GET['picture_id'];
		header("Location:index.php?folder=img&file=list_img.php&picture_id=$picture_id&wrong_msg=Id-or-record-not-found");
	}
	else
	{
		$delete_result = $Img->publish($_GET['id']);	
		if($delete_result==1)
		{
			$picture_id = $_GET['picture_id'];
			header("Location:index.php?folder=img&file=list_img.php&picture_id=$picture_id&msg=Published-succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>