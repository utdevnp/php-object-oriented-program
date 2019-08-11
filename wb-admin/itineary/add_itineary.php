  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
<?php
	if(isset($_POST['add_data']))
	{
		$error=null;
		
		//access user posted data

		//check file extenction
	$myfile=pathinfo($_FILES['myfile']['name'],PATHINFO_EXTENSION);
	//echo $new_name;
	//convert lower case
	$myfile=strtolower($myfile);

		$content_id=$_GET['content_id'];
			$error.= $Validator-> validate_empty($content_id,"Content ID");
				$error.= $Validator-> validate_number($content_id,"Content ID");
		$title=$_POST['title'];
			$error.= $Validator-> validate_empty($title,"Title");
				$error.= $Validator-> validate_text_range($title,1,500,"Title");
		
		$is_active=$_POST['is_active'];
		$descrip=$_POST['descrip'];
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
			$result =$itineary-> add($content_id,$title,$descrip,$myfile,$is_active);

					$new_id=$Conn->insertId();
					$new_name=$new_id.".".$myfile;
					
					
				if($result==1)
				{	
					move_uploaded_file($_FILES['myfile']['tmp_name'],ATTACH_FILE_DIR.$new_name);
					$content_id = $_GET['content_id'];
					$group_id=$_GET['group_id'];
					header("Location:index.php?folder=itineary&file=list_itineary.php&content_id=$content_id&sub=$sub&group_id=$group_id&message=Added Success !!");
					
				}
				else
				{
					echo "<h4> Error </h4>".mysqli_error();	
				}
				
		}
		
	}

?>
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/content.gif) no-repeat; text-indent:40px; Padding:5px;">itineary >> Add New </h2>
           <a style="float:right; margin-right:5px;" href="index.php?folder=itineary&file=list_itineary.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		  <a style="float:right;  margin-right:10px;" href="index.php?folder=itineary&file=add_itineary.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	


	<div style="clear:both;"></div>

		<?php include('fckeditor/fckeditor.php'); ?>
<form method="post" enctype="multipart/form-data" action="">
        	
  <div class="form_item">
        <div class="form_label">
         <label> Title </label> 
        </div>
        <div class="form_field">
		  <input type="text" name="title" size="50" id="title">
  		</div>
  </div>
  
  <div class="form_item">
  				<div class="form_label">
    				<label> Description</label>
    			</div>
    			<div class="form_field">
    				<?php   
                        $ctrl_name  = 'descrip';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('descrip') ;
						$oFCKeditor->Height = "350px";
                        $oFCKeditor->Width = "580px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "" ;
                        $oFCKeditor->Create() ;
					?>
   		 		</div>	
			</div>
  
  <div style="display:none;" class="form_item">
        <div class="form_label">
         <label>Active </label> 
         </div>
        	<div class="form_field">
  <select name="is_active" id="is_active">
    <?php
    $arr =array('Y'=>'Yes','N'=>'No');
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
        	<div style="dispaly:none;" class="form_item">
        <div class="form_label">
         <label> Attachment </label> 
         </div>
        	<div class="form_field">
    <input type="file" name="myfile" id="myfile"/>
  </div>
  </div>
          	<div class="form_item">
        <div class="form_label">
    <input type="submit" name="add_data" class="submit_bitton" value="Add New">
  </div>
  </div>
</form>
