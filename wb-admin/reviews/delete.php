<?php
	if(!isset($_GET['id']))
	{	
		header("Location: index.php?folder=reviews&file=list.php");
	}

	//get groups information in respect of Id
	$result = $Review->getById($_GET['id']);
	$count = $Conn->numrows($result);
	if($count==0)
	{
		header("Location: index.php?folder=review&file=list.php&msg=Record Not Found !!");
	}
	else
	{
		$delete_result = $Review->delete($_GET['id']);	
		if($delete_result==1)
		{
			header("Location: index.php?folder=reviews&file=list.php&msg= Delete Success !!");
		}
		else
		{
		?>
			<div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error($Conn->link);?>
			</div>
			<?php
			header("Location: index.php?folder=reviews&file=list.php&msg=Error !!"); 
		}
	}
?>