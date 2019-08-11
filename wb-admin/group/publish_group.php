<?php


		if(isset($_GET['sub'])){
					
					$sub = $_GET['sub'];
				}
				
	

	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=group&file=list_group.php_group.php");	
		
	}


	
	//get groups information in respect of Id
	$result = $Group->getById($_GET['id']);
	$count = $Conn->numRows($result);

		$delete_result = $Group->publish($_GET['id']);	
		if($delete_result==1)
		{
			header("Location:index.php?folder=group&file=list_group.php&sub=$sub&msg=Published-Succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
				//header("Location: index.php?folder=group&file=list_group.php&msg=$msg");
		}
	
?>