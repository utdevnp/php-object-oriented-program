<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=branches&file=list.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $B->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$branch_id = $_GET['branch_id'];
		header('Location:index.php?folder=branches&file=list.php&branch_id=$branch_id&wrong_msg=Id-or-record-not-found');
	}
	else
	{
		$delete_result = $B->publish($_GET['id']);	
		if($delete_result==1)
		{
			$branch_id = $_GET['branch_id'];
		header("Location:index.php?folder=branches&file=list.php&branch_id=$branch_id&msg=Published-succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>