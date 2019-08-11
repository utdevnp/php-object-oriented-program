<?php
	$id = $_GET['id'];
	
	$result =$Social-> delete($id);
	if($result==1)
	{
		header("Location:index.php?folder=social&file=list_social.php&message=Deleted Successfully!");
	}
	else
	{
		echo "<strong> ERROR </strong><br/>".mysqli_error();
	}
?>