  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
<?php
	if(!isset($_GET['id']))
	{
		header("location: index.php?folder=content&file=list_content.php&sub=$sub");	
		
	}


	
	//get groups information in respect of Id
	$result = $Content->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		$group_id = $_GET['group_id'];
		header('Location:index.php?folder=content&file=list_content&group_id=$group_id&sub=$sub&wrong_msg=Id-or-record-not-found');
	}
	else
	{
		$delete_result = $Content->publish($_GET['id']);	
		if($delete_result==1)
		{
			$group_id = $_GET['group_id'];
			header("Location:index.php?folder=content&file=list_content.php&group_id=$group_id&sub=$sub&message=Published-succesfully!");
		}
		else
		{
			$wrong_msg = "<strong>Error:</strong><br/>".mysqli_error();
		}
	}
?>