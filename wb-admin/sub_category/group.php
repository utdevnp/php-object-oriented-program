<?php
class Group
{
	public function add($name,$howmany,$order_by,$parent_id,$is_active)
	{
		global $Conn;
		$name = $Conn->clean($name);
		$howmany = $Conn->clean($howmany);
		$order_by = $Conn->clean($order_by);
		$parent_id = $Conn->clean($parent_id);
		$is_active = $Conn->clean($is_active);
		$sql="INSERT INTO groups
				(name,howmany,order_by,parent_id,is_active)
		  VALUES('$name','$howmany','$order_by','$parent_id','$is_active')";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function edit($id,$name,$howmany,$order_by,$parent_id,$is_active)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$name = $Conn->clean($name);
		$howmany = $Conn->clean($howmany);
		$order_by = $Conn->clean($order_by);
		$parent_id = $Conn->clean($parent_id);
		$is_active = $Conn->clean($is_active);
		$sql="UPDATE groups 
				SET 
				name='$name',
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
		$sql="DELETE FROM groups WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM groups ORDER by id asc";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getById($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT * FROM groups WHERE id=$id AND is_active='Y'";
		$result=$Conn->execute($sql);
		return $result;
	}
	public function getNameById($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT name FROM groups WHERE id=$id AND is_active='Y'";
		$result=$Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];
	}

		function getByParentId($parent_id)
	{
		global $Conn;
		$parent_id=$Conn->clean($parent_id);

		
		$sql = "SELECT * FROM groups Where parent_id=$parent_id AND is_active='Y'";
		$result=$Conn->execute($sql);
		return $result;								
	}
	
	function getParentOnly()
	{
		global $Conn;
		
		$sql = "SELECT name,id
									FROM groups
									WHERE parent_id =0";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	
	function getByGroupIdWithLimits($group_id)
	{
		global $Conn;
		global $Group;
		$group_id = $Conn->clean($group_id);
		$getGroup=$Group->getById($group_id);
		$getGroupRow=$Conn->fetchArray($getGroup);
		$order_by=$getGroupRow['order_by'];
		$howmany=$getGroupRow['howmany'];
			
		$sql = "SELECT * FROM contents WHERE  group_id =$group_id AND is_active =  'Y' AND sub='y' ORDER BY id $order_by LIMIT $howmany" ;

		$result =  $Conn->execute($sql);
		return $result;
	}
	
		function listParent()
	{
		global $Conn;
		
		$sql = "SELECT * FROM groups WHERE parent_id=0 AND is_active='Y'";
		$result =  $Conn->execute($sql);
		return $result;
	}
	
	function countChildren($parent_id)
	{
		global $Conn;
		$parent_id	=  $Conn->clean($parent_id);
		
		$sql = "SELECT count(*) as total_record FROM groups WHERE parent_id=$parent_id AND is_active='Y'";
		$result=$Conn->execute($sql);	
		$row = $Conn->fetchArray($result);
		return $row['total_record'];
	}
	
	function listChildren($parent_id)
	{
		global $Conn;
		$parent_id	=  $Conn->clean($parent_id);
		
		$sql = "SELECT * FROM groups WHERE parent_id=$parent_id ORDER BY id";
		$result=$Conn->execute($sql);	
		return $result;
	}
	
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE groups
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
		
		$sql = "UPDATE groups
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result = $Conn->execute($sql);
		return $result;
	}
}
$Group = new Group;
?>