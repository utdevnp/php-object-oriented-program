<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="<?php echo URL ;?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title> Admin Control Panel</title>
	<link rel="shortcut icon"  href="graphics/icon.ico" />

	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/design.css"/>
    <link rel="stylesheet" type="text/css" href="css/acrodin.css"/>
	
    <!------------For Menu-------------->
    <script src="js/menu/menu.js" type="text/javascript"></script> 
    
    <!----------------For Validation------------>
	<script src="js/generic/generic.js" type="text/javascript"></script> 

	 <!------------For Data-------------->
	<script type="text/javascript" language="javascript" src="data_table/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="data_table/media/js/jquery.dataTables.js"></script>
	<style type="text/css" title="currentStyle">
		@import "data_table/media/css/demo_table.css";
	</style>
    	
	<!------------For Delete-------------->
	<script src="js/delete/delete.js" type="text/javascript"></script> 

</head>

<body>
<div class="wrapper">
        <div class="main-container">

        <div class="admin-header">
        		<h2> Administration </h2>
        </div>
		

        <div class="admin_nav">
        		<script type="text/javascript">
					$(document).ready(function () {	
						
						$('#nav li').hover(
							function () {
								//show its submenu
								$('ul', this).slideDown(100);
					
							}, 
							function () {
								//hide its submenu
								$('ul', this).slideUp(100);			
							}
						);
						
					});
						</script>
        	<?php include("include/menu.php");?>
        	
            
            <div class="view_logout">
            
                <?php include("include/logout_index.php");?>
            </div>
            
        </div>

                <div class="admin-right">
                
                <blockquote id="wrapper">
                	<?php
						if(isset($_GET['folder']) && isset($_GET['file']))
						{
							$file_to_include = $_GET['folder']."/".$_GET['file'];
							
							if(file_exists($file_to_include))
							{
								require_once($file_to_include);
								
							}
								
						}
						else
						{
							require_once('welcome/welcome.php');	
							///require_once('welcome/new.php');	
						}
					?>
                </blockquote>
               
                </div>
        </div>
        
        <div class="clear"></div>
        
        <div class="information">
       		<?php include("include/inforamtion_server.php");?>
        </div>
        
		<div class="clear"></div>
		
			
				<p style="color:green; font-size:11px; padding:4px; margin-right:5px; float:right;">Content Management System <b>Created By</b> <a style="text-decoration:none;" href="http://www.webbanknepal.com">Webbanknepal</a></p>
			
    </div>

</body>
</html>