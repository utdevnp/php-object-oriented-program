<?php

class Connect{
	
	
	
	var $host;
		var $uname;
		var $pssw;
		var $dbname;
		var $links;
		var $db;
		
		function Connect()
		{
			$this->host = "localhost";
			$this->uname = "root";  	
			$this->pssw = "root";			
			$this->dbname = "aliancetreks_latest";
			$this->links = mysqli_connect($this->host,$this->uname,$this->pssw,$this->dbname) or die("Sorry, couldnot connect to ..........");

			
		}
	
	function execute($sql)
		{
			$result = mysqli_query($this->links,$sql) or die(mysqli_connect_error());
			return $result;
		}
	
	
	function fetchArray($result)
		{
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);	
				return $row;
		}
		
	function clean($data)
		{
				if(get_magic_quotes_gpc())  // prevents duplicate backslashes
				{
				$data = stripslashes($data);
				}
				if (phpversion() >= '4.3.0')
				{
				$data = mysqli_real_escape_string($this->links,$data);
				}
				else
				{
				$data = mysql_escape_string($data);
				}
				
				return $data;
		}
	
	function numRows($result)
		{
			return  mysqli_num_rows($result);			
		}
		
	function insertId()
		{
			return mysqli_insert_id($this->links);
			//return $links->insert_id();
		}
		
	function showError()
	{
		return mysqli_error();
	}
	
	function fetchAssoc($result)
	{
		return mysqli_fetch_assoc($result);
	}
	
	function textWithLimit($data,$letterLenth)
		{ 
			$strlenth=strlen($data); 
			if($letterLenth<$strlenth) 
			{ 
				$text=stripos(strip_tags($data,"<b>").' ', ' ', $letterLenth);
				 return substr(strip_tags($data,"<b>"), 0, $text )." . . "; 
			} 
			else 
			{ 
				return substr(strip_tags($data,"<b>"), 0, $strlenth ); 
			}
		}
		
		function urlFormatted($trip_name){
				$trip_name = str_replace(" ", "_", $trip_name);
				$trip_name = str_replace("-", "_", $trip_name);
				$trip_name = str_replace("#", "_", $trip_name);
				$trip_name = str_replace("+", "_", $trip_name);
				$trip_name = str_replace("=", "_", $trip_name);
				$trip_name = str_replace(".", "", $trip_name);
				$trip_name = str_replace("&", "_", $trip_name);
				$trip_name = str_replace("--", "_", $trip_name);
				$trip_name = str_replace("---", "_", $trip_name);						
				$trip_name = str_replace(" ", "_", $trip_name);
				$trip_name = str_replace("+++", "_", $trip_name);
				$trip_name = str_replace("++", "_", $trip_name);
				$trip_name = strtolower($trip_name);
				return $trip_name;
		   }
		   
		   function ReplaceUnderScore($trip_name){
				$trip_name = str_replace("_", "-", $trip_name);
				$trip_name = strtolower($trip_name);
				return $trip_name;
		   }
		    
		   function ReplaceDash($trip_name){
				$trip_name = str_replace("-", "_", $trip_name);
				$trip_name = strtolower($trip_name);
				return $trip_name;
		   }
   
   


	


}
$Conn = new Connect;
?>