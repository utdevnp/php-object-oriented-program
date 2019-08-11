<?php
class Gallery
{
	//Add function
	Public function add($parent_id,$name,$order_by,$howmany,$is_active,$description)
	{
		//refer connection clean
		global $Conn;
		//clean function parameters
		$parent_id= $Conn->clean($parent_id);
		$name= $Conn->clean($name);
		$order_by = $Conn->clean($order_by);
		$howmany = $Conn->clean($howmany);
		$is_active= $Conn->clean($is_active);
		$description=$Conn->clean($description);
		//prepare sql
		$sql = "INSERT INTO gallery(parent_id,name,order_by,howmany,is_active,description) 
		
		VALUES($parent_id,'$name','$order_by','$howmany','$is_active','$description')";
		
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	//Update function
	function update($id,$name,$parent_id,$order_by,$howmany,$is_active,$description)
	{
		global $Conn;
		$id= $Conn->clean($id);
		$parent_id= $Conn->clean($parent_id);
		$name= $Conn->clean($name);
		$order_by= $Conn->clean($order_by);
		$howmany = $Conn->clean($howmany);
		$is_active= $Conn->clean($is_active);
		$description= $Conn->clean($description);
		
		$sql = "UPDATE gallery SET
									parent_id=$parent_id,
									name='$name',
									order_by='$order_by',
									howmany='$howmany',
									is_active='$is_active',
									description='$description'
								WHERE
									id=$id";	
		$result = $Conn->execute($sql);
		return $result;
	}
	
	//Delete function
	Public function delete($id)
	{
		global $Conn;
		$id= $Conn->clean($id);
		
		$sql = "DELETE FROM gallery WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	Public function getById($id)
	{
		global $Conn;	
	
		$id= $Conn->clean($id);
	
		$sql = "SELECT * FROM gallery WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	//GetAll Value function
	Public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM gallery ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	Public function getNameById($id)
	{
		global $Conn;	
	
		$id= $Conn->clean($id);
	
		$sql = "SELECT name FROM gallery WHERE id=$id";
		$result = $Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];	
	}
	
	Public function listParent()
	{
		global $Conn;
		$sql = "SELECT id, name FROM gallery WHERE parent_id=0";
		$result = $Conn->execute($sql);	
		return $result;
	}	
	
}
$Gallery = new Gallery;
?>

