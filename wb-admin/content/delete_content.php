  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>

<?php
	$content_id = $_GET['id'];
	//list out attachments associated with content
	$result="SELECT * FROM attachments WHERE content_id=$content_id";
		$counter = mysql_num_rows($result);
			if($counter>0)
			{	
				while($row=mysql_fetch_array($result))
				{
					//prepare file name
					$file = "../attachments/uploads/".$row['id'].".".$row['extension'];
					//delete file
					@unlink($file);
					//delete record from attachments table
					$Attachment->delete($row['id']);
				}
				//delete content
			}
	$result = $Content->delete($content_id);
	if($result==1)
	{
		$group_id = $_GET['group_id'];
		header("Location:index.php?folder=content&file=list_content.php&group_id=$group_id&sub=$sub&message=Record Deleted Successfully!");
	}
	else
	{
		echo "<strong> ERROR </strong><br/>".mysql_error();
	}
?>