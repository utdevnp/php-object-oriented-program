<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=branch&file=list.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Branch->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$id = $_GET['id'];
		header('Location:index.php?folder=branch&file=list.php&wrong_msg=Id or Record Not Found');
	}
	else
	{
		$delete_result = $Branch->unpublish($_GET['id']);	
		if($delete_result==1)
		{
			$id = $_GET['id'];
			header("Location:index.php?folder=branch&file=list.php&msg=Unpublished Success !!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>