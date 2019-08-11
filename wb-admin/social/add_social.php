	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/social_icon.png) no-repeat; text-indent:40px; Padding:5px;">Social Management >> Add Social</h2>
		 <a style="float:right; margin-right:5px;" href="index.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href=""><img src="graphics/addnew/add.png" height="40" width="40"  alt="Add New" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>


<?php
	if(isset($_POST['add_social_button']))
	{
		$error=null;
		
		//access user posted data
		$title=$_POST['title'];
		$facebook=$_POST['facebook'];
		$youtube=$_POST['youtube'];
		$twitter =$_POST['twitter'];
		$linkin =$_POST['linkin'];
		$flicker =$_POST['flicker'];
		$sharethis =$_POST['sharethis'];   
		$rss =$_POST['rss'];
		$is_active=$_POST['is_active'];
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
			$result = $Social->add($title,$facebook,$youtube,$twitter,$linkin,$flicker,$sharethis,$rss,$is_active);
				
				if($result==1)
				{
					header("Location: index.php?folder=social&file=list_social.php&message= Added Successfully");
				}
				else
				{
					echo "<h1> Error </h1>".mysqli_error();	
				}
				//show output based on success/failure of the query
		}
	}
?>


	
<form id="form1" name="add_group_form" method="post">

  <fieldset>
		<legend>Title</legend>
		<div class="form_field">
			<input name="title" type="text" size="50"  id="title">
		</div>
	  </fieldset>
	
	
  <div class="form_item">
  	<div class="form_label">
    	<label> Facebook </label>
    </div>
    <div class="form_field">
    	<input name="facebook" type="text"  size="40" maxlength="100"  id="facebook">
			
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Youtube </label>
    </div>
    <div class="form_field">
    	<input name="youtube" type="text"  size="40" maxlength="100"  id="youtube">
			
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Twitter </label>
    </div>
    <div class="form_field">
    	<input name="twitter" type="text"  size="40" maxlength="100"  id="twitter">
			
    </div>
  </div>
  
   <div class="form_item">
  	<div class="form_label">
    	<label> Link In  </label>
    </div>
    <div class="form_field">
    	<input name="linkin" type="text"  size="40" maxlength="100"  id="linkin">
			
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Flicker </label>
    </div>
    <div class="form_field">
    	<input name="flicker" type="text"  size="40" maxlength="100"  id="flicker">
			
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Share This </label>
    </div>
    <div class="form_field">
    	<input name="sharethis" type="text"  size="40" maxlength="100"  id="sharethis">
			
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Rss Feed </label>
    </div>
    <div class="form_field">
    	<input name="rss" type="text"  size="40" maxlength="100"  id="rss">
			
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
			if(isset($_POST['is_active'])==$k)
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
    	<input class="submit_bitton" name="add_social_button" type="submit" value="Add ">
    </div>
  </div>      
  
</form>


