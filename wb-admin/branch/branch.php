<?php
class Branch
{
	//Add function
	public function add($name,$is_active,$parent_id)
	{
		//refer connection link
		global $Conn;
		//clean function parameters
	
		$name =   $Conn->clean($name);
		$parent_id =   $Conn->clean($parent_id);
		$is_active =   $Conn->clean($is_active);
		//prepare sql
		$sql = "INSERT INTO branch(
									name,is_active,parent_id
								  ) 
								  VALUES
								  (
								  '$name','$is_active','$parent_id'
								  )";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	
	//Update function
	public function update($id,$name,$is_active,$parent_id)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$name=  $Conn->clean($name);
		$parent_id=  $Conn->clean($parent_id);
		$is_active=  $Conn->clean($is_active);
		
		$sql = "UPDATE branch SET
									name='$name',
									parent_id='$parent_id',
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
		$id= $Conn->clean($id);
		$sql = "DELETE FROM branch WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	public function getById($id)
	{
		global $Conn;	
	
		$id=  $Conn->clean($id);
	
		$sql = "SELECT * FROM branch WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	Public function getNameById($id)
	{
		global $Conn;	
		$id= $Conn->clean($id);
		$sql = "SELECT name FROM branch WHERE id=$id";
		$result = $Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];	
	}
	
	
	
	//GetAll Value function
	public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM branch ORDER By id ASC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	public function getByVideosId($video_id)
	{
		global $Conn;	
		$video_id=  $Conn->clean($video_id);
		$sql = "SELECT * FROM branch WHERE video_id=$video_id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	

	
	public function getByTripGlance($branch_id,$limit,$orderMode)
	{
		global $Conn;
		$branch_id=  $Conn->clean($branch_id);
		$sql="SELECT * FROM branches WHERE branch_id=$branch_id AND is_active='Y'  ORDER BY id $orderMode LIMIT $limit";
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
$Branch = new Branch;
?>