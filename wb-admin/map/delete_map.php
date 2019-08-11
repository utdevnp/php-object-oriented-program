<?php
	if(!isset($_GET['id']))
	{
		header("Location: index.php?folder=map&file=list_advert.php");
	}

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $Map->getById($_GET['id']);
	$count = $Conn->numrows($result);
	if($count==0)
	{
		header("Location: index.php?folder=map&file=list_advert.php");
	}
	else
	{
		$delete_result = $Map->delete($_GET['id']);	
		if($delete_result==1)
		{
			$row=$Conn->fetchArray($result);
			@unlink(MAP_IMG_DIR.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=map&file=list_map.php&msg=Delete-successfully!");
		}
		else
		{
			?>
            <div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error();?>
            </div>
            <?php
			$advertisement_id=$_GET['advertisement_id'];
				header("Location: index.php?folder=map&file=list_map.php");
		}
	}	
?>
