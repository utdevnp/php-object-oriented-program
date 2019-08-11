<?php
	if(!isset($_GET['id']))
	{	
		header("Location: index.php?folder=middlead&file=list_middlead.php");
	}

	//get groups information in respect of Id
	$result = $Middlead->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header("Location: index.php?folder=middlead&file=list_middlead.php");
	}
	else
	{
		$delete_result = $Middlead->delete($_GET['id']);	
		if($delete_result==1)
		{
			header("Location: index.php?folder=middlead&file=list_middlead.php&msg=Delete Succesfully!");
		}
		else
		{
		?>
			<div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error($Conn->link);?>
			</div>
			<?php
			header("Location: index.php?folder=middlead&file=list_middlead.php&msg=$msg"); 
		}
	}
?>