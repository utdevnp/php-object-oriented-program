<?php
	if(!isset($_GET['id']))
	{	
		header("Location: index.php?folder=advertisement&file=list_advertisement.php");
	}

	//get groups information in respect of Id
	$result = $Advertisement->getById($_GET['id']);
	$count = $Conn->numrows($result);
	if($count==0)
	{
		header("Location: index.php?folder=advertisement&file=list_advertisement.php&msg= Not Deleted ! ");
	}
	else
	{
		$delete_result = $Advertisement->delete($_GET['id']);	
		if($delete_result==1)
		{
			header("Location: index.php?folder=advertisement&file=list_advertisement.php&msg=Record Delete Succesfully!");
		}
		else
		{
		?>
			<div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error($Connect->link);?>
			</div>
			<?php
			header("Location: index.php?folder=advertisement&file=list_advertisement.php&msg=$msg"); 
		}
	}
?>