<?php
class Group
{
	public function add($name,$grp_url,$howmany,$order_by,$parent_id,$is_active,$description,$group_id,$sub)
	{
		global $Conn;
		$name = $Conn->clean($name);
		$grp_url = $Conn->clean($grp_url);
		$grp_url = $Conn->urlFormatted($grp_url);
		$howmany = $Conn->clean($howmany);
		$order_by = $Conn->clean($order_by);
		$parent_id = $Conn->clean($parent_id);
		$is_active = $Conn->clean($is_active);
		$description = $Conn -> clean($description);
		$group_id = $Conn -> clean($group_id);
		$sub = $Conn -> clean($sub);
		
		$sql="INSERT INTO groups
				(name,grp_url,howmany,order_by,parent_id,is_active,description,group_id,sub)
		  VALUES('$name','$grp_url','$howmany','$order_by','$parent_id','$is_active','$description','$group_id','$sub')";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function edit($id,$name,$grp_url,$howmany,$order_by,$parent_id,$is_active,$description,$group_id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$name = $Conn->clean($name);
		$grp_url = $Conn->clean($grp_url);
		$grp_url = $Conn->urlFormatted($grp_url);
		$howmany = $Conn->clean($howmany);
		$order_by = $Conn->clean($order_by);
		$parent_id = $Conn->clean($parent_id);
		$is_active = $Conn->clean($is_active);
		$description = $Conn -> clean($description);
		$group_id = $Conn -> clean($group_id);
		
		$sql="UPDATE groups 
				SET 
				name='$name',
				grp_url='$grp_url',
				howmany='$howmany',
				parent_id='$parent_id',
				order_by='$order_by',
				is_active='$is_active',
				description ='$description',
				group_id = '$group_id'
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
	
	public function getAll($sub)
	{
		global $Conn;
		$sub = $Conn -> clean($sub);
		$sql="SELECT * FROM groups WHERE `sub`='$sub' ORDER by id asc";
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
	
		public function getById1($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT * FROM groups WHERE id=$id";
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
	
	
	function getByGroupIdWithLimits($group_id)
	{
		global $Conn;
		global $Group;
		$group_id = $Conn->clean($group_id);
		$getGroup=$Group->getById($group_id);
		$getGroupRow=$Conn->fetchArray($getGroup);
		$order_by=$getGroupRow['order_by'];
		$howmany=$getGroupRow['howmany'];
			
		$sql = "SELECT * FROM contents WHERE  group_id =$group_id AND is_active =  'Y' ORDER BY id $order_by LIMIT $howmany" ;

		$result =  $Conn->execute($sql);
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
	
	
	
	
	
	
	function countChildren($group_id)
	{
		global $Conn;
		$group_id	=  $Conn->clean($group_id);
		$sql = "SELECT count(*) as total_record FROM group WHERE group_id=$group_id ";
		$result=$Conn->execute($sql);	
		$row = $Conn->fetchArray($result);
		return $row['total_record'];
	}
	
	
	
	
	function getGroupById($id,$order,$howmany){
		global $Conn;
		$id = $Conn -> clean($id);
		$howmany = $Conn -> clean($howmany);
		$order = $Conn -> clean($order);
		$sql = "SELECT * FROM groups WHERE group_id=$id AND is_active='Y' ORDER BY order_by $order LIMIT $howmany";
		$result =  $Conn->execute($sql);
		return $result;
		
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