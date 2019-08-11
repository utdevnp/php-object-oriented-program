<?php
	if(!isset($_GET['id']))
	{
		$advertisement_id=$_GET['advertisement_id'];
		header("Location: index.php?folder=advert&file=list_advert.php&advertisement_id=$advertisement_id");
	}

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $Advert->getById($_GET['id']);
	$count = $Conn->numrows($result);
	if($count==0)
	{
		header("Location: index.php?folder=advert&file=list_advert.php&advertisement_id=$advertisement_id");
	}
	else
	{
		$delete_result = $Advert->delete($_GET['id']);	
		if($delete_result==1)
		{
			$advertisement_id=$_GET['advertisement_id'];
			$row=$Conn->fetchArray($result);
			@unlink(GALLERY_IMG_DIR.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=advert&file=list_advert.php&advertisement_id=$advertisement_id&msg=Delete-successfully!");
		}
		else
		{
			?>
            <div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error();?>
            </div>
            <?php
			$advertisement_id=$_GET['advertisement_id'];
				header("Location: index.php?folder=advert&file=list_advert.php&advertisement_id=$advertisement_id");
		}
	}	
?>
