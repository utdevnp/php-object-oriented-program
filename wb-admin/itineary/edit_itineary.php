  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
<?php
	//get feedback information in respect of Id
	$result = $itineary->getById($_GET['id']);
		$count = $Conn->numrows($result);
		if($count==0)
		{
			header("Location:index.php?folder=itineary&file=list_itineary.php&content_id=$content_id&sub=$sub&group_id=$group_id&message=Record  Added Successfully");
		}
			$row = $Conn->fetchArray($result);
				$content_id=$row['content_id'];
				$title=$row['title'];
				$is_active=$row['is_active'];	
				$descrip=$row['descrip'];	
				$myfile=$row['myfile'];
				$file = ATTACH_FILE_DIR.$row['id'].".".$row['myfile'];
?>

<div class="message_area">
<?php
if(isset($_POST['edit_data']))
{
	if($_FILES['myfile']['name'] != "")
	{
		$id = $_GET['id'];
		$content_id=$_POST['content_id'];
						$error.= $Validator-> validate_empty($content_id,"Content ID");
						$error.= $Validator-> validate_number($content_id,"Content ID");
						$error.= $Validator-> validate_numeric_range($content_id,1,500,"Content ID");	
		$title=$_POST['title'];
						$error.= $Validator-> validate_empty($title,"Title Name");
						$error.= $Validator-> validate_text_range($title,1,500,"Title Name");
		
		$is_active=$_POST['is_active'];
		$descrip=$_POST['descrip'];
		$myfile=$row['myfile'];
		//for upload file
			$myfile = pathinfo($_FILES['myfile']['name'],PATHINFO_EXTENSION);
			$myfile=strtolower($myfile);
			
			$size=$_FILES['myfile']['size'];// bytes// 1 MB = 1000000 bytes
			$allowed=array('jpg', 'jpeg', 'gif', 'png', 'bmw');
			if(!empty($myfile))
			{
				if(!in_array($myfile, $allowed))
				{
					$error_file_upload="Please upload Image in 'jpg', 'jpeg', 'gif', 'png', 'bmw' formats";		
				}
				else if($size>1000000)
				{
					$error_file_upload="File size should be less then 1mb";
				}
			}
			else
			{
				$error_file_upload=" No file Selection ";
			}
		
		
				//delete old photo   
							if(file_exists($file))
							{
							  //@ is error suppression operator
							  //unlink() deletes file and folder
							  @unlink($file);
							}
                        //create new file name
                        $new_file_name = $id.".".$myfile;
						
			//call add() function & pass parameter & store returned value
			$result = $itineary-> edit($id,$content_id,$title,$descrip,$is_active,$myfile);
			
			//$random = microtime();
			$new_id = $_GET['id'];
			$new_name = $new_id . "." . $myfile;
			move_uploaded_file($_FILES['myfile']['tmp_name'],ATTACH_FILE_DIR.$new_name);

		if($result==1)
		{
			$content_id=$_GET['content_id'];
			header("Location:index.php?folder=itineary&file=list_itineary.php&content_id=$content_id&sub=$sub&group_id=$group_id&message=Added Success !!");
		}
		else
		{
			?>
			<div class="error_box">
				<?php echo "Error <br />".mysqli_error();?>
			</div>
        <?php
		}
	}
	else
	{
			

			$id = $Conn->clean($_GET['id']);
			$counter = $itineary->checkExistence($id);
			$result = $itineary->getById($id);
			$row = $Conn->fetchArray($result);
		  
			$id = $_GET['id'];
				$content_id=$row['content_id'];
				$title=$_POST['title'];
				$descrip=$_POST['descrip'];
				$is_active=$row['is_active'];			
			
			$new_id = $_GET['id'];
			$new_name = $row['id'].".".$row['myfile'];
			
			//call add() function & pass parameter & store returned value
			$result = $itineary-> edit($id,$content_id,$title,$descrip,$is_active,$myfile);
			
			
		if($result==1)
		{
			$content_id=$_GET['content_id'];
			$group_id=$_GET['group_id'];
			header("Location:index.php?folder=itineary&file=list_itineary.php&content_id=$content_id&sub=$sub&group_id=$group_id&message= Update  Success!!!");
			
		}
		else
		{
			?>
			<div class="error_box">
				<?php echo "Error <br />".mysqli_error($Conn->link);?>
			</div>
        <?php
		}
	}
}
?>

<div style="clear:both;"></div>

<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/content.gif) no-repeat; text-indent:40px; Padding:5px;">itineary >> Edit </h2>
            <a style="float:right; margin-right:5px;" href="index.php?folder=itineary&file=list_itineary.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		  <a style="float:right;  margin-right:10px;" href="index.php?folder=itineary&file=add_itineary.php&content_id=<?php echo $_GET['content_id'];?>&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a>
	</div>
	


	<div style="clear:both;"></div>

<?php include('fckeditor/fckeditor.php'); ?>
<form method="post" action="" enctype="multipart/form-data">        
        	<div  style="display:none;"class="form_item">
        <div class="form_label">
         <label>Content Id</label> 
            </div>
        <div class="form_field">
  <input type="text" name="content_id" id="content_id" value="<?php if(isset($content_id)){ echo $content_id; } ?>">
   </div>
        </div>
        	<div class="form_item">
        <div class="form_label">
         <label>Title</label> 
            </div>
        <div class="form_field">
  <input type="text" name="title" size="50" id="title" value="<?php if(isset($title)){ echo $title; } ?>">
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
                        $oFCKeditor->Value = "$descrip" ;
                        $oFCKeditor->Create() ;
					?>
   		 		</div>	
			</div>
		
		<div style="dispaly:none;"  class="form_item">
        <div class="form_label">
         <label> Attachment </label> 
         </div>
        	<div class="form_field">
    <input type="file" name="myfile" id="myfile" /> <span><small>Exisist File [ <b> <?php echo $row['id'].".". $row['myfile'];?></b> ]</small></span>
  </div>
  </div>
  
  
        	<div style="display:none;" class="form_item">
        <div class="form_label">
         <label>Active</label> 
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
  <div class="form_item">
    <div class="">
      <input name="edit_data" class="submit_bitton" type="submit" value="Save & Update">
    </div>
  </div>
</form>
