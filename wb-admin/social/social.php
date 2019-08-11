<?php
class Social
{
	 function add($title,$facebook,$youtube,$twitter,$linkin,$flicker,$sharethis,$rss,$is_active)
	{
		global $Conn;
		$title = $Conn->clean($title);
		$facebook = $Conn->clean($facebook);
		$youtube = $Conn->clean($youtube);
		$twitter = $Conn->clean($twitter);
		$linkin = $Conn->clean($linkin);
		$flicker = $Conn->clean($flicker);
		$sharethis = $Conn->clean($sharethis);
		$rss = $Conn->clean($rss);
		$is_active = $Conn->clean($is_active);
		$sql="INSERT INTO social
				(title,facebook,youtube,twitter,linkin,flicker,sharethis,rss,is_active)
		  VALUES('$title','$facebook','$youtube','$twitter','$linkin','$flicker','$sharethis','$rss','$is_active')";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	 function edit($id,$title,$facebook,$youtube,$twitter,$linkin,$flicker,$sharethis,$rss,$is_active)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$title = $Conn->clean($title);
		$facebook = $Conn->clean($facebook);
		$youtube = $Conn->clean($youtube);
		$twitter = $Conn->clean($twitter);
		$linkin = $Conn->clean($linkin);
		$flicker = $Conn->clean($flicker);
		$sharethis = $Conn->clean($sharethis);
		$rss = $Conn->clean($rss);
		$is_active = $Conn->clean($is_active);
		$sql="UPDATE social 
				SET 
					title='$title',
					facebook='$facebook',
					youtube = '$youtube',
					twitter = '$twitter',
					linkin = '$linkin',
					flicker = '$flicker',
					sharethis = '$sharethis',
					rss = '$rss',
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
		$sql="DELETE FROM social WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM social ORDER by id asc";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getById($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT * FROM social WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	public function getNameById($id)
	{
		global $Conn;
		$id = $Conn->clean($id);
		$sql="SELECT name FROM social WHERE id=$id";
		$result=$Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];
	}



	

	
}
$Social = new Social;
?>