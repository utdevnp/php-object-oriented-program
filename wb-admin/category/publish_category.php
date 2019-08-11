<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=category&file=list_category.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Category->getById($_GET['id']);
	$count = $Conn->numRows($result);

		$delete_result = $Category->publish($_GET['id']);	
		if($delete_result==1)
		{
			header('Location:index.php?folder=category&file=list_category.php&msg=Published-Succesfully!');
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
				//header("Location: index.php?folder=group&file=list_group.php&msg=$msg");
		}
	
?>