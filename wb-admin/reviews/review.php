<?php
class Review
{
	Public function add($content_id,$name,$email,$rating,$review,$is_active)
	{
		global $Conn;
		$content_id= $Conn->clean($content_id);
		$name= $Conn->clean($name);
		$email= $Conn->clean($email);
		$rating= $Conn->clean($rating);
		$review=$Conn->clean($review);
		$is_active= $Conn->clean($is_active);
		$sql = "INSERT INTO reviews(content_id,name,email,rating,review,is_active) VALUES(
		$content_id,'$name','$email','$rating','$review','$is_active')";
		$result=$Conn->execute($sql);
		return $result;	
	}
	
	Public function update($id,$content_id,$name,$email,$rating,$review,$is_active)
	{
		global $Conn;
		$id= $Conn->clean($id);
		$content_id= $Conn->clean($content_id);
		$name= $Conn->clean($name);
		$email= $Conn->clean($email);
		$rating= $Conn->clean($rating);
		$review= $Conn->clean($review);
		$is_active= $Conn->clean($is_active);
		$sql = "UPDATE reviews SET
									content_id=$content_id,
									name='$name',
									email='$email',
									rating='$rating',
									review='$review',
									is_active='$is_active'
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
		
		$sql = "DELETE FROM reviews WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	Public function getById($id)
	{
		global $Conn;	
		$id= $Conn->clean($id);
		$sql = "SELECT * FROM reviews WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
		//getById function
	Public function getReviews($content_id)
	{
		global $Conn;	
		$content_id= $Conn->clean($content_id);
		$sql = "SELECT * FROM reviews WHERE content_id=$content_id AND is_active='Y'";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	
	//GetAll Value function
	Public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM reviews where is_active= 'Y' ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	Public function getAll1()
	{
		global $Conn;
		$sql = "SELECT * FROM reviews  ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
		//GetAll Value function
	Public function getLimit()
	{
		global $Conn;
		$sql = "SELECT * FROM reviews where is_active= 'Y' ORDER By id DESC limit 3";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	
	
	Public function getNameById($id)
	{
		global $Conn;	
		$id= $Conn->clean($id);
		$sql = "SELECT name FROM reviews WHERE id=$id";
		$result = $Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];	
	}
	
	Public function listParent()
	{
		global $Conn;
		$sql = "SELECT id, name FROM reviews WHERE parent_id=0";
		$result = $Conn->execute($sql);	
		return $result;
	}	
	
}
$Review = new Review;
?>

