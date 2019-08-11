<?php
	if(!isset($_GET['id']))
	{
		header("Location: index.php?folder=advert&file=list_advert.php&advertisement_id=$advertisement_id&msg=Publish Successfully!");
		
	}


	
	//get groups information in respect of Id
	$result = $Advert->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$advertisement_id = $_GET['advertisement_id'];
		header("Location: index.php?folder=advert&file=list_advert.php&advertisement_id=$advertisement_id&msg=Publish Successfully!");
	}
	else
	{
		$delete_result = $Advert->publish($_GET['id']);	
		if($delete_result==1)
		{
			$advertisement_id = $_GET['advertisement_id'];
			header("Location: index.php?folder=advert&file=list_advert.php&advertisement_id=$advertisement_id&msg=Publish Successfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>