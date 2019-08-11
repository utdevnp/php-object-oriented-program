  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
<?php

	$id = $_GET['id'];

	$result = $itineary->getById($id);
		$row=$Conn->fetchArray($result);
			$file=ATTACH_FILE_DIR.$row['id'].".".$row['myfile'];
				if(file_exists($file))
				{
					@unlink($file);
				}
			$result=$itineary->delete($id);
			
			
			$content_id=$_GET['content_id'];
			$group_id=$_GET['group_id'];
			
			if($result==1)
			{				
				header("Location:index.php?folder=itineary&file=list_itineary.php&content_id=$content_id&sub=$sub&group_id=$group_id&message= Delete Success!!!");
			}
			else
			{
				header("Location:index.php?folder=itineary&file=list_itineary.php&content_id=$content_id&sub=$sub&group_id=$group_id&message=<strong> ERROR </strong><br/>");				

			}
?>
