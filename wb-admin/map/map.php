<?php
class Map
{
	//Add function
	public function add($advertisement_id,$title,$url,$caption,$is_active,$ext)
	{
		//refer connection link
		global $Conn;
		//clean function parameters
	
		$advertisement_id=  $Conn->clean($advertisement_id);
		$title=       $Conn->clean($title);
		$url=         $Conn->clean($url);
		$caption=     $Conn->clean($caption);
		$is_active=   $Conn->clean($is_active);
		$ext=         $Conn->clean($ext);
		//prepare sql
		$sql = "INSERT INTO route_map(
									advertisement_id,title,url,caption,is_active,ext
								  ) 
								  VALUES
								  (
								  '$advertisement_id','$title','$url','$caption','$is_active','$ext'
								  )";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	
	//Update function
	public function update($id,$advertisement_id,$title,$url,$caption,$is_active,$ext)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$advertisement_id=  $Conn->clean($advertisement_id);
		$title=  $Conn->clean($title);
		$url=  $Conn->clean($url);
		$caption=  $Conn->clean($caption);
		$is_active=  $Conn->clean($is_active);
		$ext=  $Conn->clean($ext);
		
		$sql = "UPDATE route_map SET
									advertisement_id='$advertisement_id',
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
		$id=  $Conn->clean($id);
		$sql = "DELETE FROM route_map WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	public function getById($id)
	{
		global $Conn;	
		$id=  $Conn->clean($id);
		$sql = "SELECT * FROM route_map WHERE id=$id AND is_active='Y'";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	//GetAll Value function
	public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM route_map ORDER By id desc";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	public function getByAdvertisementId($advertisement_id)
	{
		global $Conn;	
		$advertisement_id=  $Conn->clean($advertisement_id);
		$sql = "SELECT * FROM route_map WHERE advertisement_id=$advertisement_id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	public function getByAdvertIdWithLimit($advertisement_id,$limit)
	{
		global $Conn;
		$advertisement_id=  $Conn->clean($advertisement_id);
		$sql="SELECT * FROM route_map WHERE advertisement_id=$advertisement_id AND is_active='Y'  ORDER BY id DESC LIMIT $limit";
		//$sql="SELECT * FROM contents WHERE group_id=$group_id AND is_active='Y'  ORDER BY id $orderMode LIMIT $howMany";
		$result=$Conn->execute($sql);
		return $result;
	}	
	
	
	function GetPhotosIdWithLimit($advertisement_id)
	{
		global $Conn;
		global $Advertisement;
		$advertisement_id=  $Conn->clean($advertisement_id);
		$getAdvertisement=$Advertisement->getById($advertisement_id);
		$getAdvertisementRow=$Conn->fetchArray($getAdvertisement);
		$order_by=$getAdvertisementRow['order_by'];
		$howmany=$getAdvertisementRow['howmany'];
		//$sql="SELECT * FROM images WHERE gallery_id=$gallery_id AND is_active='Y'  ORDER BY id DESC LIMIT $limit";
		$sql = "SELECT * FROM route_map WHERE  advertisement_id =$advertisement_id AND is_active =  'Y' ORDER BY id $order_by LIMIT $howmany" ;
		$result=$Conn->execute($sql);
		return $result;
	}
	
	
	function checkExistence($id)
	{
		global $Conn;
		$sql="SELECT COUNT(*) As counter FROM route_map
		WHERE
			id=$id";
			//$result=mysql_query($sql, $Conn);
		$result=$Conn->execute($sql, $Conn);
		//$row=mysql_fetch_array($result);
		$row=$Conn->fetchArray($result);
		$counter=$row['counter'];
		return $counter;
	}
	
	function updateExtension($id,$ext)
	{
		global $Conn;	
			$sql="UPDATE route_map SET ext='$ext' WHERE id=$id  ";
				//$result=mysql_query($sql, $Conn);
				$result=$Conn->execute($sql, $Conn);
					return $result;
	}
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE route_map
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
		
		$sql = "UPDATE route_map
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	
	
	 
}
$Map = new Map;


?>