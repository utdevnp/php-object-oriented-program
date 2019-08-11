<?php
class itineary
		{
	public function add($content_id,$title,$descrip,$myfile,$is_active)
	{
		global $Conn;

		$content_id =  $Conn->clean($content_id);
		$title 	  =  $Conn->clean($title);
		$myfile  =  $Conn->clean($myfile);
		$descrip = $Conn->clean($descrip);
		$is_active  =   $Conn->clean($is_active);
								
		$sql="INSERT INTO glance
				(
					content_id,title,myfile,descrip,is_active
				)
		  VALUES
		  		(
					$content_id,'$title','$myfile','$descrip','$is_active'
				)";
		$result=$Conn->execute($sql);
		return $result;
	}

	public function edit($id,$content_id,$title,$descrip,$is_active,$myfile)
	{
		global $Conn;
		$id		 =  $Conn->clean($id); 
		$content_id =  $Conn->clean($content_id);
		$title 	  =  $Conn->clean($title);
		$descrip = $Conn->clean($descrip);
		$is_active  =   $Conn->clean($is_active);
		$myfile = $Conn->clean($myfile);

		$sql="UPDATE glance SET
				content_id=$content_id,
				title='$title',
				descrip = '$descrip',
				is_active='$is_active',
				myfile = '$myfile'
			WHERE 
				id=$id";
		
		$result=$Conn->execute($sql);
		return $result;
		}
		
	public function delete($id)
	{
		global $Conn;
		$id		 =  $Conn->clean($id); 
		$sql="DELETE FROM glance WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	 public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM glance";
		$result=$Conn->execute($sql);
		return $result;
	}
	public function getByContentId($content_id)
	{
		global $Conn; 
		$content_id =  $Conn->clean($content_id);
		$sql="SELECT * FROM glance WHERE content_id=$content_id";
		$result=$Conn->execute($sql);
		return $result;
	}	
	public function getById($id)
	{
		global $Conn;
		$id =   $Conn->clean($id);
		$sql="SELECT * FROM glance WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	function checkExistence($id)
	{
		global $Conn;
		$sql="SELECT COUNT(*) As counter FROM glance
		WHERE
			id=$id";
			//$result=mysql_query($sql, $Conn);
		$result=$Conn->execute($sql, $Conn);
		//$row=mysql_fetch_array($result);
		$row=$Conn->fetchArray($result);
		$counter=$row['counter'];
		return $counter;
	}
	
	function updateExtension($id,$myfile)
	{
		global $Conn;	
			$sql="UPDATE glance SET myfile='$myfile' WHERE id=$id  ";
				//$result=mysql_query($sql, $Conn);
				$result=$Conn->run($sql, $Conn);
					return $result;
	}
	
	public function GetItnaryInContent($content_id,$limit)
	{
		global $Conn;
		$content_id=  $Conn->clean($content_id);
		$sql="SELECT * FROM glance WHERE content_id=$content_id AND is_active='Y'  ORDER BY id DESC LIMIT $limit";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	
}
$itineary=new itineary;
?>