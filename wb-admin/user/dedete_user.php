<?php
	$id = $_GET['id'];
	
	$result =$User-> delete($id);
	if($result==1)
	{
		header("Location:index.php?folder=user&file=list_user.php&message=Record Deleted Successfully!");
	}
	else
	{
		echo "<strong> ERROR </strong><br/>".mysqli_error();
	}
?>