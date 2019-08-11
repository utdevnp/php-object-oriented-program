<?php
	if(!isset($_GET['id']))
	{
		$branch_id=$_GET['branch_id'];
		header("Location: index.php?folder=branches&file=list.php&branch_id=$branch_id");
	}

	//get image information in respect of Id
	$id = $_GET['id'];
	$result = $B->getById($_GET['id']);
	$count = $Conn->numRows($result);
	if($count==0)
	{
		header("Location: index.php?folder=brances&file=list.php&branch_id=$branch_id");
	}
	else
	{
		$delete_result = $B->delete($_GET['id']);	
		if($delete_result==1)
		{
			$branch_id=$_GET['branch_id'];
			$row=$Conn->fatchArray($result);
			@unlink('upload/images/'.$row['id'].'.'.$row['ext']);
			
			header("Location: index.php?folder=branches&file=list.php&branch_id=$branch_id&msg=Delete-successfully!");
		}
		else
		{
			?>
            <div class="error_box">
				<?php $msg = "<strong>Error:</strong><br/>".mysqli_error();?>
            </div>
            <?php
			$branch_id=$_GET['branch_id'];
			header("Location: index.php?folder=branches&file=list.php&brnanch_id=$branch_id");
		}
	}	
?>
