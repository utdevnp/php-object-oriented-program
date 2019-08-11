<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Admin Control Panel </title>
</head>
<body>
			
	<div id="wrap" style="margin:auto; width:500px; height:auto; background:#06518e; border-radius:10px;margin-top:250px; color:#FFF; padding:20px;" >

        <?php
            if(isset($_POST['login_button']))
            {
                $error=null;
                
                //access user posted data
                $email=$_POST['email'];
				$error.= $Validator->validate_empty($email,'User Name');
				$error.= $Validator->validate_text_range($email,3,25,'User Name');
				
                $password=$_POST['password'];
                $error.= $Validator-> validate_empty($password,"Password");
                
                if(!empty($error))
                {
                    echo $error;	
                }
                else
                {
                    $result = $User->checkLogin($email,$password);
                        
                        if($result==1)
                        {
                            //echo "<h1>Login Successful</h1>";
							session_start();
								$_SESSION['valid_email']= $_POST['email'];
								header('Location: index.php');
								//header("Location: index.php?folder=user&file=view_user.php&id=$id");
                        }
                        else
                        {
                            echo "<h2 style=color:red> Invalid Login </h2><hr/>";	
                        }

                }
            }
        ?>

		<!--<img src="../graphics/banner.gif"-->
        <form id="form1" name="form1" method="post" action="">
          <fieldset>
          	<legend style="padding:5px 10px 5px 10px; background:#84baf1;border-radius:5px; color:#FFF;border:none; border-radius:5px;"> <b>Admin Control Panel Login</b> </legend>
          
          <div class="form_item">
            <div class="form_label">
                <label><b> Username</b></label>
            </div>
            <div class="form_field">
                <input style="border-radius:5px; border:none; padding:4px;" required name="email"  title="Type Your Username "type="text" size="25" maxlength="50" id="email"
                    value="<?php if(isset($name)){ echo $name; } ?>">
            </div>
          </div>
          
          
          <div class="form_item">
            <div class="form_label">
                <label><b> Password</b></label>
            </div>
            <div class="form_field">
                <input style="border-radius:5px; border:none; padding:4px;"  required name="password" type="password" size="25" maxlength="20" id="password">
            </div>
          </div>
          
          
          <div class="form_item">
        
            <div class="form_field">
               <a href=""> <input name="login_button" type="submit" value="Login" style="border-radius:5px; border:none; padding:5px 5px 5px 5px; margin-top:5px; font-weight:bold; background:#84baf1; color:#FFF; width:15%;"></a>
            </div>
          </div> 
			
        </fieldset>  
        </form>
		<p style="color:#ffffff; margin:0; padding:0;padding:5px; font-size:11px;"> CMS <b> Created by </b><a style="color:#ffffff;  font-size:11px; text-decoration:none;" href="http://www.webbanknepal.com" target="_self"> WEBBANK NEPAL</a> <b>Anamnagar Kathmandu, Nepal</b></p>
    </div>
</body>
</html>
