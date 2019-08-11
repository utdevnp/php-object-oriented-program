<?php
session_start();
	if(isset($_SESSION['valid_email']))
	{
		unset($_SESSION['valid_email']);
		session_destroy();
		header('Location: index.php');
	}
?>
