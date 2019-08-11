<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=middleadvert&file=list_middleadvert.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Middleadvert->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$middlead_id = $_GET['middlead_id'];
		header('Location:index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id&wrong_msg=Id or Record Not Found');
	}
	else
	{
		$delete_result = $Middleadvert->unpublish($_GET['id']);	
		if($delete_result==1)
		{
			$middlead_id = $_GET['middlead_id'];
			header("Location:index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id&msg=Unpublished-Succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>