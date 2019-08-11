<?php
	if(!isset($_GET['id']))
	{	
		header("Location: index.php?folder=link_album&file=list_link.php");
	}

	//get groups information in respect of Id
	$result = $Link_Album->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header("Location: index.php?folder=link_album&file=list_link.php");
	}
	else
	{
		$delete_result = $Link_Album->delete($_GET['id']);	
		if($delete_result==1)
		{
			header("Location: index.php?folder=link_album&file=list_link.php&msg= Delete Succesfully!");
		}
		else
		{
		?>
			<div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error($Conn->link);?>
			</div>
			<?php
			//header("Location: index.php?folder=gallery&file=list_gallery.php&msg=$msg"); 
		}
	}
?>