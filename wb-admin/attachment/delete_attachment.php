  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
<?php

	$id = $_GET['id'];

	$result = $Attachment->getById($id);
		$row=$Conn->fetchArray($result);
			//create file name
			$file=ATTACH_FILE_DIR.$row['id'].".".$row['myfile'];
				//delete file from filesystem
				if(file_exists($file))
				{
					@unlink($file);
				}
			//remove record from database
			$result=$Attachment->delete($id);
			
			
			$content_id=$_GET['content_id'];
			$group_id=$_GET['group_id'];
			
			if($result==1)
			{				
				header("Location:index.php?folder=attachment&file=list_attachment.php&content_id=$content_id&sub=$sub&group_id=$group_id&message= Delete Success!!!");
			}
			else
			{
				header("Location:index.php?folder=attachment&file=list_attachment.php&content_id=$content_id&sub=$sub&group_id=$group_id&message=<strong> ERROR </strong><br/>"
				);				

			}
?>
