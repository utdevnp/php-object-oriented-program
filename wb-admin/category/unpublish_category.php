<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=category&file=list_category.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Category->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header('Location:index.php?folder=category&file=list_category.php&wrong_msg=Id or Record Not Found');
	}
	else
	{
		$delete_result = $Category->unpublish($_GET['id']);	
		if($delete_result==1)
		{
			header('Location:index.php?folder=category&file=list_category.php&msg=Unpublished-Succesfully!');
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
				//header("Location: index.php?folder=group&file=list_group.php&msg=$msg");
		}
	}
?>