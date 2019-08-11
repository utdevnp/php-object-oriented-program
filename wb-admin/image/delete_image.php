<?php
	if(!isset($_GET['id']))
	{
		$gallery_id=$_GET['gallery_id'];
		header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id");
	}

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $Image->getById($_GET['id']);
	$count = $Conn->numrows($result);
	if($count==0)
	{
		header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id");
	}
	else
	{
		$delete_result = $Image->delete($_GET['id']);	
		if(file_exists(SLIDER_IMG_DIR.$row['id'].'.'.$row['ext'])&& $delete_result==1)
		{
			$gallery_id=$_GET['gallery_id'];
			$row=mysqli_fetch_array($result);
			@unlink(SLIDER_IMG_DIR.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id&msg=Delete-successfully!");
		}
		else
		{
			?>
            <div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error();?>
            </div>
            <?php
			$gallery_id=$_GET['gallery_id'];
				header("Location: index.php?folder=image&file=list_image.php&gallery_id=$gallery_id");
		}
	}	
?>
