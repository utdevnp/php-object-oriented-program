<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=links&file=list_links.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Links->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$link_id = $_GET['link_id'];
		header('Location:index.php?folder=links&file=list_links.php&link_id=$link_id&wrong_msg=Id-or-record-not-found');
	}
	else
	{
		$delete_result = $Links->publish($_GET['id']);	
		if($delete_result==1)
		{
			$link_id = $_GET['link_id'];
			header("Location:index.php?folder=links&file=list_links.php&link_id=$link_id&msg=Published-succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>