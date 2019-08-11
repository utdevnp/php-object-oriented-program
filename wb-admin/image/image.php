<?php
class Image
{
	//Add function
	public function add($gallery_id,$title,$url,$caption,$is_active,$ext)  
	{
		//refer connection link
		global $Conn;
		//clean function parameters
	
		$gallery_id=  $Conn->clean($gallery_id);
		$title=       $Conn->clean($title);
		$url=         $Conn->clean($url);
		$caption=     $Conn->clean($caption);
		$is_active=   $Conn->clean($is_active);
		$ext=         $Conn->clean($ext);
		//prepare sql
		$sql = "INSERT INTO images(
									gallery_id,title,url,caption,is_active,ext
								  ) 
								  VALUES
								  (
								  '$gallery_id','$title','$url','$caption','$is_active','$ext'
								  )";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	
	//Update function
	public function update($id,$gallery_id,$title,$url,$caption,$is_active,$ext)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$gallery_id=  $Conn->clean($gallery_id);
		$title=  $Conn->clean($title);
		$url=  $Conn->clean($url);
		$caption=  $Conn->clean($caption);
		$is_active=  $Conn->clean($is_active);
		$ext=  $Conn->clean($ext);
		
		$sql = "UPDATE images SET
									gallery_id='$gallery_id',
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
	
	//Update for edit
	public function updateOld($id,$gallery_id,$title,$url,$caption,$is_active)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$gallery_id=  $Conn->clean($gallery_id);
		$title=  $Conn->clean($title);
		$url=  $Conn->clean($url);
		$caption=  $Conn->clean($caption);
		$is_active=  $Conn->clean($is_active);
		
		$sql = "UPDATE images SET
									gallery_id='$gallery_id',
									title='$title',
									url='$url',
									caption='$caption',
									is_active='$is_active'
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
		
		$sql = "DELETE FROM images WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	public function getById($id)
	{
		global $Conn;	
	
		$id=  $Conn->clean($id);
	
		$sql = "SELECT * FROM images WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	//GetAll Value function
	public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM images ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	function checkExistence($id)
	{
		global $Conn;
		$sql="SELECT COUNT(*) As counter FROM images
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
			$sql="UPDATE images SET ext='$ext' WHERE id=$id  ";
				//$result=mysql_query($sql, $Conn);
				$result=$Conn->run($sql, $Conn);
					return $result;
	}
	
	
	public function getByGalleryId($gallery_id)
	{
		global $Conn;	
		$gallery_id=  $Conn->clean($gallery_id);
		$sql = "SELECT * FROM images WHERE gallery_id=$gallery_id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	function getByGalleryIdWithLimit($gallery_id)
	{
		global $Conn;
		global $Gallery;
		$gallery_id=  $Conn->clean($gallery_id);
		$getGallery=$Gallery->getById($gallery_id);
		$getGalleryRow=$Conn->fetchArray($getGallery);
		$order_by=$getGalleryRow['order_by'];
		$howmany=$getGalleryRow['howmany'];
		//$sql="SELECT * FROM images WHERE gallery_id=$gallery_id AND is_active='Y'  ORDER BY id DESC LIMIT $limit";
		$sql = "SELECT * FROM images WHERE  gallery_id =$gallery_id AND is_active =  'Y' ORDER BY id $order_by LIMIT $howmany" ;
		$result=$Conn->execute($sql);
		return $result;
	}
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE images
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
		
		$sql = "UPDATE images
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	 
}
$Image = new Image;


class Bullets
{
public function getByBulletsWithLimit($gallery_id,$limit)
	{
		global $Conn;
		$gallery_id=  $Conn->clean($gallery_id);
		$sql="SELECT * FROM images WHERE gallery_id=$gallery_id AND is_active='Y'  ORDER BY id DESC LIMIT $limit";
		$result=$Conn->execute($sql);
		return $result;
	}
}
$Bullets = new Bullets;
?>