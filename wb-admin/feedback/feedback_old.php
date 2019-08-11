<?php
class Feedback
{
	public function add($name,$email,$message)
	{
		global $Conn;
		$sql="INSERT INTO feedbacks
				(name,email,message)
		  VALUES('$name','$email','$message')";
		$result=mysql_query($sql,$Conn);
		return $result;
	}
	
	public function edit($id,$name,$email,$message)
	{
		global $Conn;
		$sql="UPDATE feedbacks 
				SET name='$name',
				email='$email',
				message='$message' 
			WHERE 
				id=$id";
		
		$result=mysql_query($sql,$Conn);
		return $result;
		}
		
	public function delete($id)
	{
		global $Conn;
		$sql="DELETE FROM feedbacks WHERE id=$id";
		$result=mysql_query($sql,$Conn);
		return $result;
	}
	
	public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM feedbacks";
		$result=mysql_query($sql,$Conn);
		return $result;
	}
	
	public function getById($id)
	{
		global $Conn;
		$sql="SELECT * FROM feedbacks WHERE id=$id";
		$result=mysql_query($sql,$Conn);
		return $result;
	}
}
	$Feedback = new Feedback;		
?>