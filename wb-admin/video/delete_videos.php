<?php
	if(!isset($_GET['id']))
	{
		$video_id=$_GET['video_id'];
		header("Location: index.php?folder=video&file=list_videos.php&video_id=$video_id");
	}

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $Videos->getById($_GET['id']);
	$count = $Conn->numrows($result);
	if($count==0)
	{
		header("Location: index.php?folder=video&file=list_video.php&video_id=$video_id");
	}
	else
	{
		$delete_result = $Videos->delete($_GET['id']);	
		if($delete_result==1)
		{
			$video_id=$_GET['video_id'];
			$row=mysqli_fetch_array($result);
			unlink('upload/images/'.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=video&file=list_videos.php&video_id=$video_id&msg=Delete-successfully!");
		}
		else
		{
			?>
            <div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error();?>
            </div>
            <?php
			$video_id=$_GET['video_id'];
				header("Location: index.php?folder=video&file=list_videos.php&video_id=$video_id");
		}
	}	
?>
