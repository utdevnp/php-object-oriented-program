<?php
class Group
{
	public function add($name,$is_active)
	{
		global $Conn;
		$sql="INSERT INTO groups
				(name,is_active)
		  VALUES('$name','$is_active')";
		$result=mysql_query($sql,$Conn);
		return $result;
	}
	
	public function edit($id,$name,$is_active)
	{
		global $Conn;
		$sql="UPDATE groups 
				SET name='$name',
				is_active='$is_active'
			WHERE 
				id=$id";
		
		$result=mysql_query($sql,$Conn);
		return $result;
		}
		
	public function delete($id)
	{
		global $Conn;
		$sql="DELETE FROM groups WHERE id=$id";
		$result=mysql_query($sql,$Conn);
		return $result;
	}
	
	public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM groups";
		$result=mysql_query($sql,$Conn);
		return $result;
	}
	
	public function getById($id)
	{
		global $Conn;
		$sql="SELECT * FROM groups WHERE id=$id";
		$result=mysql_query($sql,$Conn);
		return $result;
	}
	public function getNameById($id)
	{
		global $Conn;
		$sql="SELECT name FROM groups WHERE id=$id";
		$result=mysql_query($sql,$Conn);
		$row = mysql_fetch_array($result);
		return $row['name'];
	}	
}
$Group = new Group;
?>