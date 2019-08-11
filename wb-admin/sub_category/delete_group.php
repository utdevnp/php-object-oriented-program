<?php 
	$group_id = $_GET['id'];
	$sql="SELECT count(*) as content_count FROM contents where group_id=$group_id";
		$result = mysql_query($sql);
			$row=mysql_fetch_array($result,$sql);
				$content_count=$row['content_count'];
				
	if($content_count>0)
	{
		
		header("Location:index.php?folder=content&file=list_content.php&message=Deleted these contents  before deleting the group:");
	}
	else
	{
		$result=$Group->delete($group_id);		
	}
	if($result==1)
	{
		header("Location: index.php?folder=group&file=list_group.php&message=Record Deleted !");	
	}
	else
	{
		echo "<strong> ERROR </strong><br/>".mysql_error();
	}
?>