<?php
class User{

	public function add($name,$username,$email,$adress,$password,$is_active)
	{
		global $Conn;
		$name= $Conn->clean($name);
		$username = $Conn->clean($username);
		$email = $Conn->clean($email);
		$adress=$Conn->clean($adress);
		$password = $Conn->clean($password);
		$password = md5($password);
		$is_active = $Conn->clean($is_active);
		$sql="INSERT INTO users1
				(name,username,email,adress,password,is_active)
		  VALUES('$name','$username','$email','$adress','$password','$is_active')";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function update($id,$name,$username,$email,$adress,$password,$is_active)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$name= $Conn->clean($name);
		$username = $Conn->clean($username);
		$email = $Conn->clean($email);
		$adress = $Conn->clean($adress);
		$password = $Conn->clean($password);
		$password = md5($password);
		$is_active = $Conn->clean($is_active);
		$sql="UPDATE users1 
				SET 
				name='$name',
				email='$email',
				username='$username',
				adress = '$adress',
				password='$password',
				is_active='$is_active'
			WHERE 
				id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function delete($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="DELETE FROM users1 WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM users1";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getById($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT * FROM users1 WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	
	public function getByEmail($email)
	{
			
	}
	public function checkLogin($username,$password)
	{
		global $Conn;
		
			$username = $Conn->clean($username);
			$password = $Conn->clean($password);
			$password = md5($password);
			$sql="SELECT count(*) AS user_count 
					FROM users1 
						WHERE 
							username='$username' 
						AND 
							password='$password'
						AND
							is_active='Y' 
						 ";
			$result = $Conn->execute($sql);
				$row = $Conn->fetchArray($result);
					$user_count = $row['user_count'];	
						return $user_count;
	}
	
	
			
}
$User = new User;	
?>