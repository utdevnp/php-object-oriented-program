<?php
	if(isset($_GET['sub'])){
					
					$sub = $_GET['sub'];
				}
				

	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=group&file=list_group.php&sub=$sub");	
		
	}


	
	//get groups information in respect of Id
	$result = $Group->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header("Location:index.php?folder=group&file=list_group.php&sub=$sub&wrong_msg=Id or Record Not Found");
	}
	else
	{
		$delete_result = $Group->unpublish($_GET['id']);	
		if($delete_result==1)
		{
			header("Location:index.php?folder=group&file=list_group.php&sub=$sub&msg=Unpublished-Succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
				//header("Location: index.php?folder=group&file=list_group.php&msg=$msg");
		}
	}
?>