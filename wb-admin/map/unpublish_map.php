<?php
	if(!isset($_GET['id']))
	{
		header("Location: index.php?folder=map&file=list_map.php&msg= Unpublish Successfully!");
		
	}


	
	//get groups information in respect of Id
	$result = $Map->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$advertisement_id = $_GET['advertisement_id'];
		header("Location: index.php?folder=map&file=list_map.php&msg=Unpublish Successfully!");
	}
	else
	{
		$delete_result = $Map->unpublish($_GET['id']);	
		if($delete_result==1)
		{
			$advertisement_id = $_GET['advertisement_id'];
			header("Location: index.php?folder=map&file=list_map.php&msg=Unpublish Successfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>