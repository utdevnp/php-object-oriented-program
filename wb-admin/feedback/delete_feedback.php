<?php
	$id = $_GET['id'];
	
	$result =$Feedback-> delete($id);
	if($result==1)
	{
		header("Location:index.php?folder=feedback&file=list_feedback.php&message=Record Deleted Successfully!");
	}
	else
	{
		echo "<strong> ERROR </strong><br/>".mysql_error();
	}
?>