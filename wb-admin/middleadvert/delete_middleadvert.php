<?php
	if(!isset($_GET['id']))
	{
		$middlead_id=$_GET['middlead_id'];
		header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id");
	}

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $Middleadvert->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id");
	}
	else
	{
		$delete_result = $Middleadvert->delete($_GET['id']);	
		if($delete_result==1)
		{
			$middlead_id=$_GET['middlead_id'];
			$row=$Conn->fetchArray($result);
			@unlink('../upload/middlead/'.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id&msg=Delete Successfully!");
		}
		else
		{
			?>
            <div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error();?>
            </div>
            <?php
			$middlead_id=$_GET['middlead_id'];
				header("Location: index.php?folder=middleadvert&file=list_middleadvert.php&middlead_id=$middlead_id");
		}
	}	
?>
