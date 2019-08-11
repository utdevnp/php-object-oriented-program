<?php
	

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $Branch->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header("Location: index.php?folder=branch&file=list.php");
	}
	else
	{
		$delete_result = $Branch->delete($_GET['id']);	
		if($delete_result==1)
		{
			$id=$_GET['id'];
			$row=$Conn->fetchArray($result);
			@unlink('upload/images/'.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=branch&file=list.php&msg= Delete Success !!");
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
