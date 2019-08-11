<?php
class departure
{
	//Add function
	Public function add($group_id,$departure_date,$price,$offered_price,$status,$remarks)
	{
		//refer connection clean
		global $Conn;
		//clean function parameters
		$group_id = $Conn -> clean($group_id);
		$departure_date = $Conn -> clean($departure_date);
		$price = $Conn -> clean($price);
		$offered_price = $Conn -> clean($offered_price);
		$status = $Conn -> clean($status);
		$remarks = $Conn -> clean($remarks);
		//prepare sql
		$sql = "INSERT INTO departure(group_id,departure_date,price,offered_price,status,remarks)
		VALUES($group_id,'$departure_date','$price','$offered_price','$status','$remarks')";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	//Update function
	Public function update($id,$group_id,$departure_date,$price,$offered_price,$status,$remarks)
	{
		//refer connection clean
		global $Conn;
		//clean function parameters
		$id = $Conn -> clean($id);
		$group_id = $Conn -> clean($group_id);
		$departure_date = $Conn -> clean($departure_date);
		$price = $Conn -> clean($price);
		$offered_price = $Conn -> clean($offered_price);
		$status = $Conn -> clean($status);
		$remarks = $Conn -> clean($remarks);
		
		$sql = "UPDATE departure SET
									group_id=$group_id,
									departure_date='$departure_date',
									price='$price',
									offered_price='$offered_price',
									status='$status',
									remarks ='$remarks'
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
		
		$sql = "DELETE FROM departure WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	Public function getById($id)
	{
		global $Conn;	
	
		$id= $Conn->clean($id);
	
		$sql = "SELECT * FROM departure WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	//GetAll Value function
	Public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM departure ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	Public function getAllByGrp(){
		
		global $Conn;
		$sql = "SELECT * FROM departure GROUP BY group_id ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	Public function getConByGrop($group_id){
			global $Conn;
		$group_id = $Conn -> clean($group_id);
		$sql = "SELECT * FROM departure WHERE group_id = $group_id";
		$result = $Conn->execute($sql);
		return $result;
		
		}
	
	
	
	
	Public function getNameById($id)
	{
		global $Conn;	
		$id= $Conn->clean($id);
		$sql = "SELECT name FROM departure WHERE id=$id";
		$result = $Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];	
	}
	
	Public function listParent()
	{
		global $Conn;
		$sql = "SELECT id, name FROM departure WHERE parent_id=0";
		$result = $Conn->execute($sql);	
		return $result;
	}	
	
}
$departure = new departure;
?>

