<?php
	if(!isset($_GET['id']))
	{	
		header("Location: index.php?folder=gallery&file=list_gallery.php");
	}

	//get groups information in respect of Id
	$result = $Gallery->getById($_GET['id']);
	$count = $Conn->numrows($result);
	if($count==0)
	{
		header("Location: index.php?folder=gallery&file=list_gallery.php&msg= Not Found ! ");
	}
	else
	{
		$delete_result = $Gallery->delete($_GET['id']);	
		if($delete_result==1)
		{
			header("Location: index.php?folder=gallery&file=list_gallery.php&msg=Record Delete Succesfully!");
		}
		else
		{
		?>
			<div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error($Connect->link);?>
			</div>
			<?php
			//header("Location: index.php?folder=gallery&file=list_gallery.php&msg=$msg"); 
		}
	}
?>