<?php
class Feedback
{
	public function add($name,$email,$message)
	{
		global $Conn;
		
		$name    = $Conn->clean($name);
		$email   = $Conn->clean($email);
		$message = $Conn->clean($message);
		
		$sql="INSERT INTO feedbacks
				(name,email,message)
		  VALUES('$name','$email','$message')";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function edit($id,$name,$email,$message)
	{
		global $Conn;
		
		$id      = $Conn->clean($id);
		$name    = $Conn->clean($name);
		$email   = $Conn->clean($email);
		$message = $Conn->clean($message);
		
		$sql="UPDATE feedbacks 
				SET name='$name',
				email='$email',
				message='$message' 
			WHERE 
				id=$id";
		
		$result=$Conn->execute($sql);
		return $result;
		}
		
	public function delete($id)
	{
		global $Conn;
		$id      = $Conn->clean($id);
		$sql="DELETE FROM feedbacks WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM feedbacks";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getById($id)
	{
		global $Conn;
		$id      = $Conn->clean($id);
		$sql="SELECT * FROM feedbacks WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
}
	$Feedback = new Feedback;		
?>