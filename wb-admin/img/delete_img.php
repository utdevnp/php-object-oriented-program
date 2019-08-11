<?php
	if(!isset($_GET['id']))
	{
		$id=$_GET['id'];
		header("Location: index.php?folder=img&file=list_img.php");
	}

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $Img->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header("Location: index.php?folder=img&file=list_img.php");
	}
	else
	{
		$delete_result = $Img->delete($_GET['id']);	
		if($delete_result==1)
		{
			$id=$_GET['id'];
			$row=$Conn->fetchArray($result);
			@unlink('upload/img/'.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=img&file=list_img.php&msg=Delete Successfully!");
		}
		else
		{
			?>
            <div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error();?>
            </div>
            <?php
			$id=$_GET['id'];
				header("Location: index.php?folder=img&file=list_iimg.php&picture_id=$picture_id");
		}
	}	
?>
