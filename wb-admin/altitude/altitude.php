<?php
class Altitude
{
	//Add function
	Public function add($group_id,$day,$place_name,$altitude,$temperature)
	{
		//refer connection clean
		global $Conn;
		//clean function parameters
		$group_id = $Conn -> clean($group_id);
		$day = $Conn -> clean($day);
		$place_name = $Conn -> clean($place_name);
		$altitude = $Conn -> clean($altitude);
		$temperature = $Conn -> clean($temperature);
		//prepare sql
		$sql = "INSERT INTO altitude(group_id,day,place_name,altitude,temperature) VALUES($group_id,'$day','$place_name','$altitude','$temperature')";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	//Update function
	Public function update($id,$group_id,$day,$place_name,$altitude,$temperature)
	{
		//refer connection clean
		global $Conn;
		//clean function parameters
		$id = $Conn -> clean($id);
		$group_id = $Conn -> clean($group_id);
		$day = $Conn -> clean($day);
		$place_name = $Conn -> clean($place_name);
		$altitude = $Conn -> clean($altitude);
		$temperature = $Conn -> clean($temperature);
		
		$sql = "UPDATE altitude SET
									group_id=$group_id,
									day='$day',
									place_name='$place_name',
									altitude='$altitude',
									temperature='$temperature'
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
		
		$sql = "DELETE FROM altitude WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	Public function getById($id)
	{
		global $Conn;	
	
		$id= $Conn->clean($id);
	
		$sql = "SELECT * FROM altitude WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
Public function getAllByGrp(){
		
		global $Conn;
		$sql = "SELECT * FROM altitude GROUP BY group_id ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	Public function getConByGrop($group_id){
			global $Conn;
		$group_id = $Conn -> clean($group_id);
		$sql = "SELECT * FROM altitude WHERE group_id = $group_id";
		$result = $Conn->execute($sql);
		return $result;
		
		}
	
	
	
	//GetAll Value function
	Public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM altitude ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	Public function getNameById($id)
	{
		global $Conn;	
		$id= $Conn->clean($id);
		$sql = "SELECT name FROM altitude WHERE id=$id";
		$result = $Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];	
	}
	
	Public function listParent()
	{
		global $Conn;
		$sql = "SELECT id, name FROM altitude WHERE parent_id=0";
		$result = $Conn->execute($sql);	
		return $result;
	}	
	
}
$Altitude = new Altitude;
?>

