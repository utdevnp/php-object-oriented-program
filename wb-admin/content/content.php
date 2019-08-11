<?php
class Content{
	
	public function add
					($group_id,$parent_id,$menu_name,$pseudo_name,$content_title,$short_description,
					$detail_description,$date,$weight,$author,$is_active,$page_title,$meta_description,
					$keywords,$duration,$code,$route,$route_map,$g_size,$maxalt,$arrival,$departure,
					$transport,$country,$meals,$accomode,$itnary,$included,$type,$grade,$operation,$priority,$best_month,$trip_cost,$booking_cost,$price_comment)
	{
		global $Conn;
		
		
			$group_id 		= $Conn->clean($group_id);
			$parent_id 		= $Conn->clean($parent_id);
			$menu_name 		= $Conn->clean($menu_name) ;
			$content_title 	= $Conn->clean($content_title);
			$short_description		 = $Conn->clean($short_description);
			$detail_description		= $Conn->clean($detail_description);
			$date				 = $Conn->clean($date);
			$weight			= $Conn->clean($weight);
			$author         = $Conn->clean($author);
			$is_active		= $Conn->clean($is_active);
			$page_title		= $Conn->clean($page_title);
			$duration = $Conn->clean($duration);
			$code = $Conn->clean($code);
			$route = $Conn->clean($route);
			$route_map = $Conn->clean($route_map);
			$g_size = $Conn->clean($g_size);
			$maxalt = $Conn->clean($maxalt);
			$arrival = $Conn->clean($arrival);
			$departure = $Conn->clean($departure);
			$transport = $Conn->clean($transport);
			$country  = $Conn->clean($country);
			$meals = $Conn->clean($meals);
			$accomode = $Conn->clean($accomode);
			$itnary = $Conn->clean($itnary);
			$included = $Conn->clean($included);
			$type = $Conn -> clean($type);
			
			$grade = $Conn -> clean($grade);
			$operation = $Conn -> clean($operation);
			$priority = $Conn -> clean($priority);
			$best_month = $Conn -> clean($best_month);
			$trip_cost = $Conn -> clean($trip_cost);
			$booking_cost = $Conn -> clean($booking_cost);
			$price_comment = $Conn -> clean($price_comment);
			
			$meta_description		= $Conn->clean($meta_description);
			$keywords		= $Conn->clean($keywords);		
			$pseudo_name    = $Conn->clean($pseudo_name);
			$pseudo_name=strtolower($pseudo_name);
			$pseudo_name=str_replace(" ","-","$pseudo_name");
				$pseudo_name=str_replace("&","and","$pseudo_name");
					$pseudo_name=str_replace("_","-","$pseudo_name");
						$pseudo_name=str_replace("/","-","$pseudo_name");						
							$pseudo_name=str_replace("\\"," ","$pseudo_name");						
								$pseudo_name=str_replace("'","t","$pseudo_name");						
									$pseudo_name=str_replace("@","-","$pseudo_name");						
										$pseudo_name=str_replace("~","-","$pseudo_name");							
											$pseudo_name=str_replace("#","-","$pseudo_name");
												$pseudo_name=str_replace("$","-","$pseudo_name");
												$pseudo_name=str_replace(".","","$pseudo_name");																										
												$pseudo_name=str_replace("[","","$pseudo_name");
												$pseudo_name=str_replace("]","","$pseudo_name");
												$pseudo_name=str_replace("+","-","$pseudo_name");
												$pseudo_name=str_replace("|","-","$pseudo_name");
		
		$sql="INSERT INTO contents 
				(
					group_id,parent_id,menu_name,pseudo_name,content_title,short_description,
					detail_description,date,weight,author,is_active,page_title,meta_description,
					keywords,duration,code,route,route_map,g_size,maxalt,arrival,departure,transport,
					country,meals,accomode,itnary,included,type,grade,operation,priority,best_month,trip_cost,booking_cost,price_comment
				)
		  VALUES
		  		(
					$group_id,$parent_id,'$menu_name','$pseudo_name','$content_title','$short_description',
					'$detail_description','$date',$weight,'$author','$is_active','$page_title','$meta_description',
					'$keywords','$duration','$code','$route','$route_map','$g_size','$maxalt','$arrival','$departure','$transport',
					'$country','$meals','$accomode','$itnary','$included','$type','$grade','$operation','$priority','$best_month','$trip_cost','$booking_cost','$price_comment'
				)";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function addConActivity($activity_id,$content_id){
		Global $Conn;
		$activity_id = $Conn -> clean($activity_id);
		$content_id = $Conn -> clean($content_id);
		$query ="INSERT INTO con_activity(activity_id,content_id) VALUES('$activity_id','$content_id');";
		$result=$Conn->execute($query);
		return $result;
		}
	
	public function getConActivity($content_id){
		Global $Conn;
		$content_id = $Conn -> clean($content_id);
		$query ="SELECT * FROM con_activity WHERE `content_id`='$content_id';";
		$result=$Conn->execute($query);
		return $result;
		
		}
	public function deleteAll($content_id){
		
			Global $Conn;
		$content_id = $Conn -> clean($content_id);
		$query ="DELETE FROM con_activity WHERE `content_id`='$content_id';";
		$result=$Conn->execute($query);
		return $result;
		}

	
	public function edit
				($id,$group_id,$parent_id,$menu_name,$pseudo_name,$content_title,$short_description,
					$detail_description,$date,$weight,$author,$is_active,$page_title,$meta_description,
					$keywords,$duration,$code,$route,$route_map,$g_size,$maxalt,$arrival,$departure,
					$transport,$country,$meals,$accomode,$itnary,$included,$type,$grade,$operation,$priority,$best_month,$trip_cost,$booking_cost,$price_comment)
			{
		global $Conn;
		
		
			$id			   =  $Conn->clean($id); 
			$group_id 		 = $Conn->clean($group_id);
			$parent_id 		= $Conn->clean($parent_id);
			$menu_name 		= $Conn->clean($menu_name) ;
			$pseudo_name    = $Conn->clean($pseudo_name);
			$content_title 	= $Conn->clean($content_title);
			//$byline			= $Conn->clean($byline);
			$short_description		 = $Conn->clean($short_description);
			$detail_description		= $Conn->clean($detail_description);
			$date					=$Conn->clean($date);
			$weight			= $Conn->clean($weight);
			$author         =$Conn->clean($author);
			$is_active		 = $Conn->clean($is_active);
			$page_title		= $Conn->clean($page_title);
			$meta_description		= $Conn->clean($meta_description);
			$keywords		= $Conn->clean($keywords);
$duration = $Conn->clean($duration);
			$code = $Conn->clean($code);
			$route = $Conn->clean($route);
			$route_map = $Conn->clean($route_map);
			$g_size = $Conn->clean($g_size);
			$maxalt = $Conn->clean($maxalt);
			$arrival = $Conn->clean($arrival);
			$departure = $Conn->clean($departure);
			$transport = $Conn->clean($transport);
			$country  = $Conn->clean($country);
			$meals = $Conn->clean($meals);
			$accomode = $Conn->clean($accomode);			
			$itnary = $Conn->clean($itnary);			
			$included = $Conn->clean($included);
			$type = $Conn -> clean($type);			
			$pseudo_name    = $Conn->clean($pseudo_name);
			
				$grade = $Conn -> clean($grade);
			$operation = $Conn -> clean($operation);
			$priority = $Conn -> clean($priority);
			$best_month = $Conn -> clean($best_month);
			$trip_cost = $Conn -> clean($trip_cost);
			$booking_cost = $Conn -> clean($booking_cost);
			$price_comment = $Conn -> clean($price_comment);
			
			
			$pseudo_name=strtolower($pseudo_name);
			$pseudo_name=str_replace(" ","-","$pseudo_name");
				$pseudo_name=str_replace("&","and","$pseudo_name");
					$pseudo_name=str_replace("_","-","$pseudo_name");
						$pseudo_name=str_replace("/","-","$pseudo_name");						
							$pseudo_name=str_replace("\\","-","$pseudo_name");						
								$pseudo_name=str_replace("'","t","$pseudo_name");						
									$pseudo_name=str_replace("@","-","$pseudo_name");						
										$pseudo_name=str_replace("~","-","$pseudo_name");							
											$pseudo_name=str_replace("#","-","$pseudo_name");
												$pseudo_name=str_replace("$","-","$pseudo_name");
												$pseudo_name=str_replace(".","","$pseudo_name");																										
												$pseudo_name=str_replace("[","","$pseudo_name");
												$pseudo_name=str_replace("]","","$pseudo_name");
												$pseudo_name=str_replace("+","-","$pseudo_name");
												$pseudo_name=str_replace("|","-","$pseudo_name");
			
		$sql="UPDATE contents SET 
				group_id=$group_id,
				parent_id=$parent_id,
				menu_name='$menu_name',
				pseudo_name='$pseudo_name',
				content_title='$content_title',
				short_description='$short_description',
				detail_description='$detail_description',
				date='$date',
				weight=$weight,
				author='$author',
				is_active='$is_active',
				page_title='$page_title',
				meta_description='$meta_description',
				keywords='$keywords',
				duration='$duration',
				code='$code',
				route = '$route',
				route_map = '$route_map',
				g_size = '$g_size',
				maxalt  = '$maxalt',
				arrival  = '$arrival',
				departure = '$departure',
				transport = '$transport',
				country = '$country',
				meals = '$meals',
				accomode = '$accomode',
				itnary = '$itnary',
				included = '$included',
				type = '$type',
				grade='$grade',
				operation='$operation',
				priority='$priority',
				best_month='$best_month',
				trip_cost='$trip_cost',
				booking_cost='$booking_cost',
				price_comment='$price_comment'
				
			WHERE 
				id=$id";
		
		$result=$Conn->execute($sql);
		return $result;
		}
		
	public function delete($id)
	{
		global $Conn;
		$id	=  $Conn->clean($id);
		$sql="DELETE FROM contents WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getAll()
	{
		global $Conn;
		$sql="SELECT * FROM contents ORDER by id desc";
		$result=$Conn->execute($sql);
		return $result;
	}
	
	public function getAllGroup(){
			global $Conn;
		$sql="SELECT * FROM contents where duration != '' OR code !='' ORDER by id desc";
		$result=$Conn->execute($sql);
		return $result;
		
		
		}
	public function getById($id)
	{
		global $Conn;
		$id	=  $Conn->clean($id);
		$sql="SELECT * FROM contents WHERE id=$id";
		$result=$Conn->execute($sql);
		return $result;
	}	
	
	public function getContentById($id)
	{
		global $Conn;
		$id	=  $Conn->clean($id);
		$sql="SELECT * FROM contents WHERE id=$id AND is_active='Y'";
		$result=$Conn->execute($sql);
		return $result;
	}	
	
	
	public function getByGroupId($group_id)
	{
		global $Conn;
		$group_id	=  $Conn->clean($group_id);
		$sql="SELECT * FROM contents WHERE group_id=$group_id";
		$result=$Conn->execute($sql);
		return $result;
	}
	public function getVisibleByGroupId($group_id)
	{
		global $Conn;
		$group_id	=  $Conn->clean($group_id);
		$sql="SELECT * FROM contents WHERE group_id=$group_id AND is_active='Y'";
		$result=$Conn->execute($sql);
		return $result;
	}
	public function getVisibleByGroupIdWithLimit($group_id,$howMany, $orderMode)
	{
		global $Conn;
		$group_id	=  $Conn->clean($group_id);
		$sql="SELECT * FROM contents WHERE group_id=$group_id AND is_active='Y'  ORDER BY id $orderMode LIMIT $howMany";
		$result=$Conn->execute($sql);
		return $result;
	}

	
	
	function getByGroupIdlistParentWithLimits($group_id)
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

	
	public function getNameById($id)
	{
		global $Conn;
		$id	=  $Conn->clean($id);
		$sql="SELECT menu_name FROM contents WHERE id=$id";
		$result=$Conn->execute($sql);
		$row=$Conn->fetchArray($result);
		$menu_name = $row['menu_name'];
		return $menu_name;
	}	
	function listParent($group_id)
	{
		global $Conn;
		$group_id	=  $Conn->clean($group_id);
		$sql = "SELECT id, menu_name, content_title,pseudo_name FROM contents WHERE parent_id=0 AND group_id=$group_id AND is_active='Y' ";
		$result=$Conn->execute($sql);	
		return $result;
	}
	function countChildren($parent_id)
	{
		global $Conn;
		$parent_id	=  $Conn->clean($parent_id);
		$sql = "SELECT count(*) as total_record FROM contents WHERE parent_id=$parent_id ";
		$result=$Conn->execute($sql);	
		$row = $Conn->fetchArray($result);
		return $row['total_record'];
	}
	function listChildren($parent_id)
	{
		global $Conn;
		$parent_id	=  $Conn->clean($parent_id);
		$sql = "SELECT id, menu_name,content_title,pseudo_name FROM contents WHERE parent_id=$parent_id AND is_active='Y' ORDER BY weight";
		$result=$Conn->execute($sql);	
		return $result;
	}	
	function findMaxWeight($group_id)
	{
		global $Conn;
		$group_id	=  $Conn->clean($group_id);
		$sql = "SELECT MAX(weight) as max_weight FROM contents WHERE group_id=$group_id";
		$result=$Conn->execute($sql);	
		$row =  $Conn-> fetchArray($result);
		return $row['max_weight'];		
	}
	
	
	
	function listParentOrderByIdDescWithLimit($minlimit, $maxlimit)
	{
		global $Conn;
		$minlimit = $Conn->clean($minlimit);
		$maxlimit = $Conn->clean($maxlimit);
		$sql = "SELECT * FROM contents WHERE is_active='Y' AND group_id <> 19 AND group_id <> 18 AND group_id <> 16 AND group_id <> 15 AND group_id <> 14 AND group_id <> 13 AND group_id <> 12 AND group_id <> 10 AND group_id <> 9 AND group_id <> 8 AND group_id <> 7 AND group_id <> 6 AND group_id <> 5 AND group_id <> 4 AND group_id <> 3 ORDER BY id DESC LIMIT $minlimit, $maxlimit";
		$result =  $Conn->execute($sql);
		return $result;
	}
	
	function publish($id,$is_active)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$is_active=$Conn->clean($is_active);
		
		$sql = "UPDATE contents
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
		
		$sql = "UPDATE contents
							SET
								is_active =  'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	
	
	function display($id,$display)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$display=$Conn->clean($display);
		
		$sql = "UPDATE contents
							SET
								display ='Y'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);
		return $result;
	}
	
	

	function nodisplay($id,$display)
	{
		global $Conn;
		$id=$Conn->clean($id);
		$display=$Conn->clean($display);
		
		$sql = "UPDATE contents
							SET
								display = 'N'
								WHERE
									id=$id";	
		$result=$Conn->execute($sql);	
		return $result;
	}
	
	function listParentWithLimit($group_id, $minlimit, $maxlimit)
	{
		global $Conn;
		$group_id = $Conn->clean($group_id);
		$minlimit = $Conn->clean($minlimit);
		$minlimit = $Conn->clean($minlimit);
		$sql = "SELECT * FROM contents WHERE parent_id=0 AND group_id=$group_id AND is_active='Y' ORDER BY id DESC LIMIT $minlimit, $maxlimit";
		$result =  $Conn->execute($sql);
		return $result;
	}
	
	function getByGroupIdActive($group_id)
	{
		global $Conn;
		$group_id=$Conn->clean($group_id);
		
		global $Conn;	
		$sql = "SELECT * FROM contents WHERE group_id=$group_id AND is_active='Y' ORDER BY weight DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
}//end class

//create variable named Content that represents class Content
$Content = new Content;
?>