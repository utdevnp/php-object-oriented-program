<?php
class Videos
{
	//Add function
	public function add($video_id,$p_id,$title,$url,$caption,$is_active,$ext)
	{
		//refer connection link
		global $Conn;
		//clean function parameters
	
		$video_id=  $Conn->clean($video_id);
		$p_id=  $Conn->clean($p_id);
		$title=       $Conn->clean($title);
		$url=         $Conn->clean($url);
		$caption=     $Conn->clean($caption);
		$is_active=   $Conn->clean($is_active);
		$ext=         $Conn->clean($ext);
		//prepare sql
		$sql = "INSERT INTO videos(
									video_id,p_id,title,url,caption,is_active,ext
								  ) 
								  VALUES
								  (
								  '$video_id','$p_id','$title','$url','$caption','$is_active','$ext'
								  )";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	
	//Update function
	public function update($id,$video_id,$p_id,$title,$url,$caption,$is_active,$ext)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$video_id=  $Conn->clean($video_id);
		$p_id=  $Conn->clean($p_id);
		$title=  $Conn->clean($title);
		$url=  $Conn->clean($url);
		$caption=  $Conn->clean($caption);
		$is_active=  $Conn->clean($is_active);
		$ext=  $Conn->clean($ext);
		
		$sql = "UPDATE videos SET
									video_id='$video_id',
									p_id='$p_id',
									title='$title',
									url='$url',
									caption='$caption',
									is_active='$is_active',
									ext='$ext'
								WHERE
									id=$id";	
		$result = $Conn->execute($sql);
		return $result;
	}
	
	
	
	//Delete function
	public function delete($id)
	{
		global $Conn;
		$id= $Conn->clean($id);
		$sql = "DELETE FROM videos WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	public function getById($id)
	{
		global $Conn;	
	
		$id=  $Conn->clean($id);
	
		$sql = "SELECT * FROM videos WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	//GetAll Value function
	public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM videos ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	public function getByVideosId($video_id)
	{
		global $Conn;	
		$video_id=  $Conn->clean($video_id);
		$sql = "SELECT * FROM videos WHERE video_id=$video_id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	public function getByContentId($p_id)
	{
		global $Conn;	
		$p_id=  $Conn->clean($p_id);
		$sql = "SELECT * FROM videos WHERE p_id=$p_id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	public function getByVideosName($title)
	{
		global $Conn;	
		$name=  $Conn->clean($name);
		$sql = "SELECT * FROM videos WHERE name=$name";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	public function getByVideoIdWithLimit($video_id,$limit,$orderMode)
	{
		global $Conn;
		$video_id=  $Conn->clean($video_id);
		$sql="SELECT * FROM videos WHERE video_id=$video_id AND is_active='Y'  ORDER BY id $orderMode LIMIT $limit";
		//$sql="SELECT * FROM videos WHERE video_id=$video_id LIMIT $limit";
		$result=$Conn->execute($sql);
		return $result;
	}	
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE videos
							SET
								is_active =  'Y'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);
		return $result;
	}
	
	function unpublish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE videos
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	
		function listParentVideoWithLimit($video_id, $minlimit, $maxlimit)
			{
				global $Conn;
				$video_id = $Conn->clean($video_id);
				$minlimit = $Conn->clean($minlimit);
				$minlimit = $Conn->clean($minlimit);
				$sql = "SELECT * FROM videos WHERE parent_id=0 AND video_id=$video_id AND is_active='Y' ORDER BY id DESC LIMIT $minlimit, $maxlimit";
				$result =  $Conn->execute($sql);
				return $result;
			}
	
	
	 
}
$Videos = new Videos;
?>