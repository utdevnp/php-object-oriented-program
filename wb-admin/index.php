<?php
ob_start();
		
	session_start();
	
	include('include/heading_file.php');

		
		//trim _GET
/*		if(count($_GET)>0)
		{
			foreach($_GET as $k=>$v)
			{
				trim($k);
				trim($v);	
			}
		}*/

	
	
	if(!isset($_SESSION['valid_email']))
	{
		include('user/login.php');	
		exit();
	}
	else
	{
		require_once('welcome/new.php');
	}
	//print_r($_SESSION);



	
	
	

ob_end_flush();

?>