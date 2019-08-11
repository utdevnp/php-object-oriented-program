<?php
	$id = $_GET['id'];
		$result =$Social->getById($id);
			$row = $Conn-> fetchArray($result);
				$title=$row['title'];
				$facebook=$row['facebook'];
				$youtube =$row['youtube'];
				$twitter =$row['twitter'];
				$linkin =$row['linkin'];
				$flicker =$row['flicker'];
				$sharethis =$row['sharethis'];
				$rss =$row['rss'];
				$is_active=$row['is_active'];
?>

<?php
	if(isset($_POST['edit_social_button']))
	{
		$error=null;
		//access user posted data
		$title = $_POST['title'];
		$facebook=$_POST['facebook'];
		$youtube=$_POST['youtube'];
		$twitter =$_POST['twitter'];
		$linkin =$_POST['linkin'];
		$flicker =$_POST['flicker'];
		$sharethis =$_POST['sharethis'];
		$rss =$_POST['rss'];
		$is_active = $_POST['is_active'];
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
				
				$result =$Social->edit($id,$title,$facebook,$youtube,$twitter,$linkin,$flicker,$sharethis,$rss,$is_active);
				if($result==1)
				{
					header("Location: index.php?folder=social&file=edit_social.php&id=1&message=Updated Successfully!");
				}
				else
				{
					echo "<h5> Error </h1>".mysqli_error();	
				}
		}
	}
?>
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/social_icon.png) no-repeat; text-indent:40px; Padding:5px;">Social Management >> Edit Social</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href=""><img src="graphics/addnew/add.png" height="40" width="40"  alt="Add New" title="Click Here To Add New Group"  /></a> 
	</div>
		
<div style="clear:both;"></div>

	<div class="message">
			<?php
				if(isset($_GET['message']))
				{
					echo "<h5>". $_GET['message']."</h5>";	
				}
			?>
			<?php
				if(isset($_GET['msg']))
				{
					echo "<h5>". $_GET['msg']."</h5>";	
				}
			?>
	</div>
	
	<div style="clear:both;"></div>

<form id="form1" name="form1" method="post" >

	<fieldset>
		<legend>Title</legend>
		<div class="form_item">
		<div class="form_field">
			<input name="title" type="text" size="50"  id="title"
				value="<?php if(isset($title)){ echo $title; } ?>">
		</div>
	  </div>
	  </fieldset>
	


  <div class="form_item">
  	<div class="form_label">
    	<label>  Facebook  </label>
    </div>
    <div class="form_field">
    	<input name="facebook" type="text" size="40"  id="facebook"
			value="<?php if(isset($facebook)){ echo $facebook; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Youtube  </label>
    </div>
    <div class="form_field">
    	<input name="youtube" type="text" size="40"  id="youtube"
			value="<?php if(isset($youtube)){ echo $youtube; } ?>">
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Twitter </label>
    </div>
    <div class="form_field">
    	<input name="twitter" type="text"  size="40" maxlength="100"  id="twitter" 
		value="<?php if(isset($twitter)){ echo $twitter; } ?>">
			
    </div>
  </div>
  
   <div class="form_item">
  	<div class="form_label">
    	<label> Link In  </label>
    </div>
    <div class="form_field">
    	<input name="linkin" type="text"  size="40" maxlength="100"  id="linkin" 
		value="<?php if(isset($linkin)){ echo $linkin; } ?>">
			
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Flicker </label>
    </div>
    <div class="form_field">
    	<input name="flicker" type="text"  size="40" maxlength="100"  id="flicker" 
		value="<?php if(isset($flicker)){ echo $flicker; } ?>">
			
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Share This </label>
    </div>
    <div class="form_field">
    	<input name="sharethis" type="text"  size="40" maxlength="100"  id="sharethis" 
		value="<?php if(isset($sharethis)){ echo $sharethis; } ?>">
			
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Rss Feed </label>
    </div>
    <div class="form_field">
    	<input name="rss" type="text"  size="40" maxlength="100"  id="rss" 
		value="<?php if(isset($rss)){ echo $rss; } ?>">
			
    </div>
  </div>
  
  <div class="form_item">
  	
    <div class="form_label">
    	<label>Active </label>
    </div>
    <div class="form_field">
    <?php 
	$arr =array('Y'=>'Yes','N'=>'No');
	?>
    <select name="is_active">
    <?php
	foreach($arr as $k=>$v)
		{
			if($is_active==$k)
			{
				echo "<option value=\"$k\" selected> $v * </option>";
			}
			else
			{
				echo "<option value=\"$k\"> $v </option>";
			}
		}
	?>
	</select>
   </div>
    </div>

  
  <div class="form_item">

    <div class="form_field">
    	<input class="submit_bitton" name="edit_social_button" type="submit" value="Save & Update">
    </div>
  </div>      
  
</form>
