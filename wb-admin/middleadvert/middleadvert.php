<?php
class Middleadvert
{
	//Add function
	public function add($middlead_id,$title,$is_active,$ext)
	{
		//refer connection link
		global $Conn;
		//clean function parameters
	
		$middlead_id=  $Conn->clean($middlead_id);
		$title=       $Conn->clean($title);
		$is_active=   $Conn->clean($is_active);
		$ext=         $Conn->clean($ext);
		//prepare sql
		$sql = "INSERT INTO middleadvert(
									middlead_id,title,is_active,ext
								  ) 
								  VALUES
								  (
								  '$middlead_id','$title','$is_active','$ext'
								  )";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	
	//Update function
	public function update($id,$middlead_id,$title,$is_active,$ext)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$middlead_id=  $Conn->clean($middlead_id);
		$title=  $Conn->clean($title);
		$is_active=  $Conn->clean($is_active);
		$ext=  $Conn->clean($ext);
		
		$sql = "UPDATE middleadvert SET
									middlead_id='$middlead_id',
									title='$title',
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
		
		$sql = "DELETE FROM middleadvert WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	public function getById($id)
	{
		global $Conn;	
	
		$id=  $Conn->clean($id);
	
		$sql = "SELECT * FROM middleadvert WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	Public function getNameById($id)
	{
		global $Conn;	
	
		$id= $Conn->clean($id);
	
		$sql = "SELECT title FROM middleadvert WHERE id=$id";
		$result = $Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['title'];	
	}	
	
	//GetAll Value function
	public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM middleadvert ORDER By id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	public function getByMiddleadId($middlead_id)
	{
		global $Conn;	
		$middlead_id=  $Conn->clean($middlead_id);
		$sql = "SELECT * FROM middleadvert WHERE middlead_id=$middlead_id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	public function GetByIdWithLimitDownload($middlead_id,$limit)
	{
		global $Conn;
		$middlead_id=  $Conn->clean($middlead_id);
		$sql="SELECT * FROM middleadvert WHERE middlead_id=$middlead_id AND is_active ='Y' LIMIT $limit " ;
		$result=$Conn->execute($sql);
		return $result;
	}	
	
	
	function checkExistence($id)
	{
		global $Conn;
		$sql="SELECT COUNT(*) As counter FROM middleadvert
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
			$sql="UPDATE middleadvert SET ext='$ext' WHERE id=$id  ";
				//$result=mysql_query($sql, $Conn);
				$result=$Conn->run($sql, $Conn);
					return $result;
	}
	
	
	
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE middleadvert
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
		
		$sql = "UPDATE middleadvert
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	 
}
$Middleadvert = new Middleadvert;
?>