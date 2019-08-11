<?php
class Links
{
	//Add function
	public function add($link_id,$title,$url,$is_active,$ext)
	{
		//refer connection link
		global $Conn;
		//clean function parameters
	
		$link_id=  $Conn->clean($link_id);
		$title=       $Conn->clean($title);
		$url=         $Conn->clean($url);
		$is_active=   $Conn->clean($is_active);
		$ext=         $Conn->clean($ext);
		//prepare sql
		$sql = "INSERT INTO links(
									link_id,title,url,is_active,ext
								  ) 
								  VALUES
								  (
								  '$link_id','$title','$url','$is_active','$ext'
								  )";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	
	//Update function
	public function update($id,$link_id,$title,$url,$is_active,$ext)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$link_id=  $Conn->clean($link_id);
		$title=  $Conn->clean($title);
		$url=  $Conn->clean($url);
		$is_active=  $Conn->clean($is_active);
		$ext=  $Conn->clean($ext);
		
		$sql = "UPDATE links SET
									link_id='$link_id',
									title='$title',
									url='$url',
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
		$sql = "DELETE FROM links WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	public function getById($id)
	{
		global $Conn;	
	
		$id=  $Conn->clean($id);
	
		$sql = "SELECT * FROM links WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	//GetAll Value function
	public function getAll()
	{
		global $Conn;
		//$sql = "SELECT * FROM videos ORDER By `id` DESC";
		$sql =	"select * from links order by id desc";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	public function getByLinksId($link_id)
	{
		global $Conn;	
		$link_id=  $Conn->clean($link_id);
		$sql = "SELECT * FROM links WHERE link_id=$link_id AND is_active='Y'";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	public function getBylinkIdWithLimit($link_id,$limit,$orderMode)
	{
		global $Conn;
		$link_id=  $Conn->clean($link_id);
		$sql="SELECT * FROM links WHERE link_id=$link_id AND is_active='Y'  ORDER BY id $orderMode LIMIT $limit";
		$result=$Conn->execute($sql);
		return $result;
	}	
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE links
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
		
		$sql = "UPDATE links
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	 
}
$Links = new Links;
?>