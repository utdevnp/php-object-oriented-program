<?php
class Img
{
	//Add function
	public function add($packages,$name,$email,$address,$country,$is_active,$ext,$amonths,
					$aday,$ayear,$dmonths,$dday,$dyear,$airlines,$flightno,$pickup,$pamentmode,
					$description)
	{
		//refer connection link
		global $Conn;
		//clean function parameters
	
		$packages=       $Conn->clean($packages);
		$name=         $Conn->clean($name);
		$address=     $Conn->clean($address);
		$email= $Conn->clean($email);
		$country= $Conn->clean($country);
		$description= $Conn->clean($description);
		$description = html_entity_decode($description);
		$is_active=   $Conn->clean($is_active);
		$ext=         $Conn->clean($ext);
		$amonths= $Conn->clean($amonths);
		$aday= $Conn->clean($aday);
		$ayear= $Conn->clean($ayear);
		$dmonths= $Conn->clean($dmonths);
		$dday= $Conn->clean($dday);
		$dyear= $Conn->clean($dyear);
		$airlines= $Conn->clean($airlines);
		$flightno= $Conn->clean($flightno);
		$pickup= $Conn->clean($pickup);
		$pamentmode= $Conn->clean($pamentmode);
		
		//prepare sql
		$sql = "INSERT INTO img(
								packages,name,address,email,country,description,is_active,ext,
								amonths,aday,ayear,dmonths,dday,dyear,airlines,flightno,pickup,
								pamentmode
								  ) 
								  VALUES
								  (
								  '$packages','$name','$address','$email','$country','$description','$is_active',
								  '$ext','$amonths','$aday','$ayear','$dmonths','$dday','$dyear','$airlines','$flightno',
								  '$pickup','$pamentmode'
								  )";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	
	//Update function
	public function update($id,$picture_id,$email,$title,$url,$caption,$position,$is_active,$ext)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$picture_id=  $Conn->clean($picture_id);
		$title=  $Conn->clean($title);
		$url=  $Conn->clean($url);
		$email= $Conn->clean($email);
		$caption=  $Conn->clean($caption);
		$position = $Conn->clean($position);
		$is_active=  $Conn->clean($is_active);
		$ext=  $Conn->clean($ext);
		
		$sql = "UPDATE img SET
									picture_id='$picture_id',
									title='$title',
									url='$url',
									email='$email',
									caption='$caption',
									position='$position',
									is_active='$is_active',
									ext='$ext'
								WHERE
									id=$id";	
		$result = $Conn->execute($sql);
		return $result;
	}
	
	//Update for edit
	public function updateOld($id,$picture_id,$title,$url,$caption,$position,$is_active)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$picture_id=  $Conn->clean($picture_id);
		$title=  $Conn->clean($title);
		$url=  $Conn->clean($url);
		$caption=  $Conn->clean($caption);
		$is_active=  $Conn->clean($is_active);
		
		$sql = "UPDATE img SET
									picture_id='$picture_id',
									title='$title',
									url='$url',
									caption='$caption',
									position='$position',
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
		
		$sql = "DELETE FROM img WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	public function getById($id)
	{
		global $Conn;	
	
		$id=  $Conn->clean($id);
	
		$sql = "SELECT * FROM img WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	//GetAll Value function
	public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM img ORDER By id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	public function getByPictureId($picture_id)
	{
		global $Conn;	
		$picture_id=  $Conn->clean($picture_id);
		$sql = "SELECT * FROM img WHERE picture_id=$picture_id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	public function getByPictureIdWithLimit($picture_id,$limit)
	{
		global $Conn;
		$picture_id=  $Conn->clean($picture_id);
		$sql="SELECT * FROM img WHERE picture_id=$picture_id LIMIT $limit";
		$result=$Conn->execute($sql);
		return $result;
	}	
	
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE img
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
		
		$sql = "UPDATE img
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	
	 
}
$Img = new Img;
?>