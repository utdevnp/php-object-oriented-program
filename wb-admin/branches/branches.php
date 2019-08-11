<?php
class B
{
	function add($branch_id,$name,$loaction,$tele,$fax,$is_active)
	{
		global $Conn;
		$branch_id=  $Conn->clean($branch_id);
		$name =       $Conn->clean($name);
		$loaction =         $Conn->clean($loaction);
		$tele=     $Conn->clean($tele);
		$fax=     $Conn->clean($fax);
		$is_active=   $Conn->clean($is_active);
		$sql = "INSERT INTO branches(
									branch_id,name,loaction,tele,fax,is_active
								  ) 
								  VALUES
								  (
								  '$branch_id','$name','$loaction','$tele','$fax','$is_active'
								  )";
		$result=$Conn->execute($sql);
		return $result;	
	}
	
	
	//Update function
	public function update($id,$branch_id,$name,$loaction,$tele,$fax,$is_active)
	{
		global $Conn;
		$id=  $Conn->clean($id);
		$branch_id=  $Conn->clean($branch_id);
		$name =       $Conn->clean($name);
		$loaction =  $Conn->clean($loaction);
		$tele=     $Conn->clean($tele);
		$fax=     $Conn->clean($fax);
		$is_active=   $Conn->clean($is_active);
		
		$sql = "UPDATE branches SET
									branch_id='$branch_id',
									name='$name',
									loaction='$loaction',
									tele='$tele',
									fax='$fax',
									is_active='$is_active'
								
								WHERE
									id=$id";	
		$result = $Conn->execute($sql);
		return $result;
	}
	
	
	
	//Delete function
	public function delete($id)
	{
		global $Conn;
		$id= $Conn->clean($id);
		$sql = "DELETE FROM branches WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	public function getById($id)
	{
		global $Conn;	
	
		$id=  $Conn->clean($id);
	
		$sql = "SELECT * FROM branches WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	function branchesListInGroup($group_id)
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
	
	
	
	
	//GetAll Value function
	public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM branches ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	
	public function getByBranchName($branch_id)
	{
		global $Conn;	
		$branch_id=  $Conn->clean($branch_id);
		$sql = "SELECT * FROM branches WHERE branch_id=$branch_id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	public function getByVideosName($title)
	{
		global $Conn;	
		$name=  $Conn->clean($name);
		$sql = "SELECT * FROM branches WHERE name=$name";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	function getBranchWithLimit($branch_id,$limit,$orderMode)
	{
		global $Conn;
		$branch_id=  $Conn->clean($branch_id);
		$sql="SELECT * FROM branches WHERE branch_id=$branch_id AND is_active='Y'  ORDER BY id $orderMode LIMIT $limit";
		$result=$Conn->execute($sql);
		return $result;
	}	
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE branches
							SET
								is_active =  'Y'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);
		return $result;
	}
	
	function unpublish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE branches
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	
		function listParentVideoWithLimit($video_id, $minlimit, $maxlimit)
			{
				global $Conn;
				$video_id = $Conn->clean($video_id);
				$minlimit = $Conn->clean($minlimit);
				$minlimit = $Conn->clean($minlimit);
				$sql = "SELECT * FROM branches WHERE parent_id=0 AND video_id=$video_id AND is_active='Y' ORDER BY id DESC LIMIT $minlimit, $maxlimit";
				$result =  $Conn->execute($sql);
				return $result;
			}
	
	
	 
}
$B = new B;
?>