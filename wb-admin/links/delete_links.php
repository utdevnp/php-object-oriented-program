<?php
	if(!isset($_GET['id']))
	{
		$link_id=$_GET['link_id'];
		header("Location: index.php?folder=links&file=list_links.php&link_id=$link_id");
	}

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $Links->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header("Location: index.php?folder=links&file=list_links.php&link_id=$link_id");
	}
	else
	{
		$delete_result = $Links->delete($_GET['id']);	
		if($delete_result==1)
		{
			$link_id=$_GET['link_id'];
			$row=$Conn->fetchArray($result);
			@unlink(LINK_IMG_DIR.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=links&file=list_links.php&link_id=$link_id&msg=Delete-successfully!");
		}
		else
		{
			?>
            <div class="error_box">
				<?php $msg = "<strong>Error Deleting </strong><br/>";?>
            </div>
            <?php
			$link_id=$_GET['link_id'];
				header("Location: index.php?folder=links&file=list_links.php&link_id=$link_id");
		}
	}	
?>
