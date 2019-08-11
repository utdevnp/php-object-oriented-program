<?php
class Category
{
	public function add($name,$cat_url,$howmany,$order_by,$parent_id,$is_active)
	{
		global $Conn;
		$name = $Conn->clean($name);
		$cat_url = $Conn->clean($cat_url);
		$cat_url = $Conn->urlFormatted($cat_url);
		$howmany = $Conn->clean($howmany);
		$order_by = $Conn->clean($order_by);
		$parent_id = $Conn->clean($parent_id);
		$is_active = $Conn->clean($is_active);
		$sql="INSERT INTO category
				(name,cat_url,howmany,order_by,parent_id,is_active)
		  VALUES('$name','$cat_url','$howmany','$order_by','$parent_id','$is_active')";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function edit($id,$name,$cat_url,$howmany,$order_by,$parent_id,$is_active)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$name = $Conn->clean($name);
		$cat_url = $Conn->clean($cat_url);
		$cat_url = $Conn->urlFormatted($cat_url);
		$howmany = $Conn->clean($howmany);
		$order_by = $Conn->clean($order_by);
		$parent_id = $Conn->clean($parent_id);
		$is_active = $Conn->clean($is_active);
		$sql="UPDATE category 
				SET 
				name='$name',
				cat_url='$cat_url',
				howmany='$howmany',
				parent_id='$parent_id',
				order_by='$order_by',
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
		$sql="DELETE FROM category WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM category ORDER by id asc";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getById($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT * FROM category WHERE id=$id AND is_active='Y'";
		$result=$Conn->execute($sql);
		return $result;
	}
		public function getById1($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT * FROM category WHERE id=$id ";
		$result=$Conn->execute($sql);
		return $result;
	}
	public function getNameById($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT name FROM category WHERE id=$id";
		$result=$Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];
	}
	
	
	function getByMainIdLimits($group_id)
	{
		global $Conn;
		global $Group;
		$group_id = $Conn->clean($group_id);
		$getGroup=$Group->getById($group_id);
		$getGroupRow=$Conn->fetchArray($getGroup);
		$order_by=$getGroupRow['order_by'];
		$howmany=$getGroupRow['howmany'];
		$sql = "SELECT * FROM groups WHERE  group_id =$group_id";
		$result =  $Conn->execute($sql);
		return $result;
	}
	
	
	
	

		function getByParentId($parent_id)
	{
		global $Conn;
		$parent_id=$Conn->clean($parent_id);

		
		$sql = "SELECT * FROM category Where parent_id=$parent_id AND is_active='Y'";
		$result=$Conn->execute($sql);
		return $result;								
	}
	
	function getParentOnly()
	{
		global $Conn;
		
		$sql = "SELECT name,id
									FROM category
									WHERE parent_id =0";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	
	
		function geBysubcatid($group_id)
		{
		global $Conn;
		$group_id = $Conn->clean($group_id);
		$sql = "SELECT * FROM contents WHERE group_id=$group_id AND is_active='Y'";
		$result =  $Conn->execute($sql);
		return $result;
		}
		
	
	
		function geBycatid($group_id)
		{
		global $Conn;
		$group_id = $Conn->clean($group_id);
		$sql = "SELECT * FROM groups WHERE group_id=$group_id AND is_active='Y'";
		$result =  $Conn->execute($sql);
		return $result;
		}
	
	
		function listParent()
		{
		global $Conn;
		
		$sql = "SELECT * FROM category WHERE is_active='Y'";
		$result =  $Conn->execute($sql);
		return $result;
		}
	
	function countChildren($parent_id)
	{
		global $Conn;
		$parent_id	=  $Conn->clean($parent_id);
		
		$sql = "SELECT count(*) as total_record FROM category WHERE parent_id=$parent_id AND is_active='Y'";
		$result=$Conn->execute($sql);	
		$row = $Conn->fetchArray($result);
		return $row['total_record'];
	}
	
	function listChildren($parent_id)
	{
		global $Conn;
		$parent_id	=  $Conn->clean($parent_id);
		
		$sql = "SELECT * FROM category WHERE parent_id=$parent_id ORDER BY id";
		$result=$Conn->execute($sql);	
		return $result;
	}
	
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE category
							SET
								is_active =  'Y'
								WHERE
									id=$id";	
		$result = $Conn->execute($sql);
		return $result;
	}
	
	function unpublish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE category
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result = $Conn->execute($sql);
		return $result;
	}
}
$Category = new Category;
?>