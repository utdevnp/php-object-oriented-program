  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
<?php



	$id = $_GET['id'];
		$result = $Content->getById($id);
			$row = $Conn-> fetchArray($result);
				$group_id=$row['group_id'];
				$parent_id=$row['parent_id'];
				$menu_name=$row['menu_name'];
				$pseudo_name=$row['pseudo_name'];
				$content_title=$row['content_title'];
				$short_description=$row['short_description'];
				$detail_description=$row['detail_description'];
				$date=$row['date'];
				$weight=$row['weight'];
				$author=$row['author'];
				$is_active=$row['is_active'];
				$page_title=$row['page_title'];
				$meta_description=$row['meta_description'];
				$keywords=$row['keywords'];
				
				$duration = $row['duration'];
				$code = $row['code'];
				$route = $row['route'];
				$route_map = $row['route_map'];
				$g_size = $row['g_size'];
				$maxalt = $row['maxalt'];
				$arrival = $row['arrival'];
				$departure = $row['departure'];
				$transport = $row['transport'];
				$country = $row['country'];
				$meals = $row['meals'];
				$accomode = $row['accomode'];
				$itnary = $row['itnary'];
				$included = $row['included'];
				
				
				
				

	if(isset($_POST['edit_content_button']))
	{
		
		$dtlAll = $Content -> deleteAll($id);
		
		$error=null;
		//access user posted data
		$group_id=$_GET['group_id'];
						$error.= $Validator-> validate_empty($group_id,"Group");
						$error.= $Validator-> validate_number($group_id,"Group");
						$error.= $Validator-> validate_numeric_range($group_id,1,5000,"Group");	
		$parent_id=$_POST['parent_id'];
						$error.= $Validator-> validate_number($parent_id,"Your Parent");
						$error.= $Validator-> validate_numeric_range($group_id,1,5000,"Parent");	
		$menu_name=$_POST['menu_name'];
						$error.= $Validator-> validate_empty($menu_name,"Menu Name");
						$error.= $Validator-> validate_text_range($menu_name,1,2000,"Menu Name");
		$pseudo_name=$_POST['pseudo_name'];
						$error.= $Validator-> validate_empty($pseudo_name,"Url");
						$error.= $Validator-> validate_text_range($pseudo_name,1,2000,"Url");
			
						
		$content_title=$_POST['content_title'];
						$error.= $Validator-> validate_empty($content_title,"Content Title");
						$error.= $Validator-> validate_text_range($content_title,1,2000,"Content Title");
		//$byline=$_POST['byline'];
		$short_description=$_POST['short_description'];
						$error.= $Validator-> validate_empty($short_description,"Short Description");
						$error.= $Validator-> validate_text_range($short_description,1,5000,"Short Description");
		$detail_description=$_POST['detail_description'];
						$error.= $Validator-> validate_empty($detail_description,"Detail Description");
		$date=$_POST['date'];
						$error.= $Validator-> validate_empty($date,"Date");
		$weight=$_POST['weight'];
						$error.= $Validator-> validate_empty($weight,"Weight");
						$error.= $Validator-> validate_number($weight,"Weight");
						$error.= $Validator-> validate_numeric_range($weight,1,5000,"Weight");
		$is_active=$_POST['is_active'];
		$author = $_POST['author'];
		
		$duration = $_POST['duration'];
				$code = $_POST['code'];
				$route = $_POST['route'];
				$route_map = $_POST['route_map'];
				$g_size = $_POST['g_size'];
				$maxalt = $_POST['maxalt'];
				$arrival = $_POST['arrival'];
				$departure = $_POST['departure'];
				$transport = $_POST['transport'];
				$country = $_POST['country'];
				$meals = $_POST['meals'];
				$accomode = $_POST['accomode'];
				$itnary = $_POST['itnary'];
				$included = $_POST['included'];
				
				
		
				$grade = $_POST['grade'];
				$operation = $_POST['operation'];
				$priority = $_POST['priority'];
				$best_month = $_POST['best_month'];
				$trip_cost = $_POST['trip_cost'];
				$booking_cost = $_POST['booking_cost'];
				$price_comment = $_POST['price_comment'];
				$type ='';
		
		//SEO INFORMATION here onwards
		$page_title=$_POST['page_title'];
			if(empty($page_title))
			{
				$page_title = $content_title;	
			}
		$meta_description=$_POST['meta_description'];

		$keywords=$_POST['keywords'];
			//auto keyword generation if user does not enter keyword
			if(empty($keywords))
			{
				$arr = explode(" ", $content_title);	
				foreach($arr as $a)
				{
					$keywords.= $a.", ";	
				}
			}
				
						
		//show error if $error is non empty
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
				
				$result =$Content-> edit($id,$group_id,$parent_id,$menu_name,$pseudo_name,$content_title,$short_description,
					$detail_description,$date,$weight,$author,$is_active,$page_title,$meta_description,
					$keywords,$duration,$code,$route,$route_map,$g_size,$maxalt,$arrival,$departure,
					$transport,$country,$meals,$accomode,$itnary,$included,$type,$grade,$operation,$priority,$best_month,$trip_cost,$booking_cost,$price_comment);
					
					
					foreach($_POST['activity'] as $a => $b){
		
		
						$activity = $_POST['activity'][$a];
						
						$addConActivity = $Content -> addConActivity($activity,$id);
						
					}
					
					
				if($result==1)
					{
						//echo "added successfully";
						$group_id=$_GET['group_id'];
  header("Location:index.php?folder=content&file=list_content.php&group_id=$group_id&sub=$sub&message=Update Success !!");
					}
				else
					{
						echo "<h4> Error </h4>".mysqli_error();	
					}
				//show output based on success/failure of the query
			
			
			
			
			//if record added
              if($result==1)
              {
                
                //find file upload error code
                $upload_err_code = $_FILES['photo']['error'];
                //if file is selected
                if($upload_err_code!=4)
                {
                  //if file uploaded to TMP directory
                  if($upload_err_code==0)
                  {
                    //allowed extensions
                    $allowed=array('jpg','jpeg','png','gif');
                    //find file extension
                     $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION); 
                     //convert to lower case
                     $extension = strtolower($extension);
                     //if file has allowed extension
                     if(in_array($extension,$allowed))
                     {
                      $file_size = $_FILES['photo']['size'];
                      //if size is 1MB or less
                      if($file_size <= 1048576)
                      {
							//delete old photo   
							if(file_exists($file))
							{
							  //@ is error suppression operator
							  //unlink() deletes file and folder
							  @unlink($file);
							}
                        //create new file name
                        $new_file_name = $id.".".$extension;
                    
					   //upload in 'photos' directory inside 'gallery' dir
move_uploaded_file($_FILES['photo']['tmp_name'],"upload/attachmenthome/".$new_file_name);
                  
                        //update file extension in database
                        $result2 = $Photo->updateExtension($id,$extension);
                        //if extension updated
                        if($result2==1)
                        {
                          //redirect to list page if ext updated
							 header("Location:index.php?folder=content&file=list_content.php&group_id=$group_id&sub=$sub&message=Update Success !!");
                        }
                        else
                        {
                          //show error if could not update ext
                          echo "<strong> ERROR: </strong><br/>".$Conn->showError();
                        }
                      }
                     }
                  }
                }
				else
				{
					//redirect to list page
					//after adding record without file upload
						 header("Location:index.php?folder=content&file=list_content.php&group_id=$group_id&sub=$sub& message=Update Success !!");
				}
              }
              else
              {
                echo mysqli_error();
              }
			
		}
	}
?>
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/content.gif) no-repeat; text-indent:40px; Padding:5px;">Content Management >> Edit Content </h2>
           <a style="float:right; margin-right:5px;" href="index.php?folder=content&file=list_content.php&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=content&file=add_content.php&group_id=<?php echo$_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>
	
  <div class="left_side">
<form method="post" enctype="multipart/form-data">
 
	 <?php 
		include('fckeditor/fckeditor.php'); 
     ?>  

 
   <div style="" class="form_item">
  	<div class="form_label">
  <label>Parent</label>
    </div>
    <div class="form_field">
  
		<select name="parent_id">
            	
				<option value="0">SELF</option>
            </select>  

 </div>
 </div>
 <div class="form_item">
  	<div class="form_label">
  <label>Page Title</label>
    </div>
    <div class="form_field">
  <input type="text" name="page_title" size="97" id="page_title" value="<?php if(isset($page_title)){ echo $page_title; } ?>">
  </div>
  </div>

   <div class="form_item">
  	<div class="form_label">
  <label>Menu Name</label>
    </div>
    <div class="form_field">
  <input type="text" size="97"  name="menu_name" id="menu_name" value="<?php if(isset($menu_name)){ echo $menu_name; } ?>">
  </div>
  </div>
  
  	<div class="form_item">
       <div class="form_label"> 
         <label>Url</label>
        </div>
        <div class="form_field">
		 <input type="text" size="30"  name="pseudo_name" id="pseudo_name" value="<?php if(isset($pseudo_name)){ echo $pseudo_name; } ?>">
        </div>
        </div>
  
  
  
  
    <div class="form_item">
  	<div class="form_label">
  <label>Content Title</label>
    </div>
    <div class="form_field">
  <input type="text" name="content_title" size="97" id="content_title" value="<?php if(isset($content_title)){ echo $content_title; } ?>">
</div>
</div>





   <div class="form_item">
  	<div class="form_label">
  <label>Short Description</label>
    </div>
    <div class="form_field">
	             	<?php   
                        $ctrl_name  = 'short_description';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('short_description') ;
                        $oFCKeditor->Height = "300px";
                        $oFCKeditor->Width = "725px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "$short_description" ;
                        $oFCKeditor->Create() ;
                ?>

  </div>
  </div>
  
  <?php if(isset($sub) && $sub=='y'){ ?>
  
   <div class="form_item">
  	<div class="form_label">
  <label>Not Included</label>
    </div>
    <div class="form_field">
	             	<?php   
                        $ctrl_name  = 'itnary';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('itnary') ;
                        $oFCKeditor->Height = "300px";
                        $oFCKeditor->Width = "725px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "$itnary" ;
                        $oFCKeditor->Create() ;
                ?>

  </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
  <label>Included</label>
    </div>
    <div class="form_field">
	             	<?php   
                        $ctrl_name  = 'included';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('included') ;
                        $oFCKeditor->Height = "300px";
                        $oFCKeditor->Width = "725px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "$included" ;
                        $oFCKeditor->Create() ;
                ?>

  </div>
  </div>
         <?php } 
		
		else {
			?>
			<input type="hidden" value="" name="included" />
            <input type="hidden" value="" name="itnary" />
			<?php }
		?>
  
    <div class="form_item">
  	<div class="form_label">
  <label>Detail Description</label>
    </div>
    <div class="form_field">
	             	<?php   
                        $ctrl_name  = 'detail_description';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('detail_description') ;
                        $oFCKeditor->Height = "400px";
                        $oFCKeditor->Width = "725px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "$detail_description" ;
                        $oFCKeditor->Create() ;
                ?>

  </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
  <label>Date</label>
    </div>
    <div class="form_field">
  <input type="text" name="date" size="50" id="date" value="<?php if(isset($date)){ echo $date; } // echo date('M d D Y'); ?>">
</div>
</div>

<div class="form_item">
  	<div class="form_label">
  <label>Author</label>
    </div>
    <div class="form_field">
  <input type="text" name="author" size="50" id="author" value="<?php if(isset($author)){ echo $author; } ?>">
</div>
</div>


    <div style="display:none;" class="form_item">
  	<div class="form_label">
  <label>Weight</label>
    </div>
    <div class="form_field">
  <input type="text" name="weight" size="10" id="weight" value="<?php if(isset($weight)){ echo $weight; } ?>">
  </div>
  </div>
    <div style="display:none;" class="form_item">
  	<div class="form_label">
  <label>Activate</label>
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
  
  
  <!--div class="form_item">
        <div class="form_label"> 
        <label>Attachment</label> 
        </div>
        <div class="form_field">
        <input name="photo" type="file" id="photo">
        </div>
        </div-->
  
  
  
    
    <div class="form_item">
  	<div class="form_label">
  <label>Meta Description</label>
    </div>
    <div class="form_field">
  <textarea name="meta_description" cols="87" rows="5" id="meta_description"/>
  <?php if(isset($meta_description)){ echo $meta_description; } ?>
  </textarea>
  </div>
  </div>
    <div class="form_item">
  	<div class="form_label">
  <label>Keywords</label>
    </div>
    <div class="form_field">
  <input type="text" name="keywords" size="97" id="keywords" value="<?php if(isset($keywords)){ echo $keywords; } ?>">
  </div>
  </div>
  <div class="form_item">
    <div class="form_field1">
      <input class="submit_bitton" name="edit_content_button" type="submit" value="Save & Update">
    </div>
  </div>
  </div>
  
  <?php if(isset($sub) && $sub=='y'){ ?>

  <div class="right_side">
	 <div style="border:none;" class="form_item">
		<h3> Overview </h3>
	</div>
		 <div class="form_item">
        <div class="form_label">
         <label>Duration</label>
         <label style="margin-left:40%;">Code</label>
         </div>
        <div class="form_field">
        <input name="duration"  style="width:48%;" type="text"  id="" value="<?php if(isset($duration)){ echo $duration; } ?>">
        <input name="code"  style="width:48%;" type="text"  id="" value="<?php if(isset($code)){ echo $code; } ?>">
        </div>
        </div>
		
		 <div class="form_item">
        <div class="form_label">
         <label>Route</label>
         </div>
        <div class="form_field">
        <input name="route" style="width:99%;" type="text"  id="" value="<?php echo $row['route'];?>">
        </div>
        </div>
		 <div class="form_item">
        <div class="form_label">
         <label>Route Map</label>
         </div>
        <div class="form_field">
        <textarea name="route_map" style="width:99%;" rows="61" cols="15" type="text"><?php echo $row['route_map']; ?></textarea>
        </div>
        </div>
		
		 <div class="form_item">
        <div class="form_label">
         <label>Group Size</label>
         <label style="margin-left:39%;"> Max Elevation</label>
         </div>
        <div class="form_field">
        <input name="g_size"  style="width:48%;" type="text"  id="" value="<?php if(isset($g_size)){ echo $g_size;} ?>">
        <input name="maxalt"  style="width:48%;"  type="text"  id="" value="<?php if(isset($maxalt)){ echo $maxalt; } 
		?>">
        </div>
        </div>
		
        
         <div class="form_item">
        <div class="form_label">
         <label>Grade/Difficulty</label>
         <label style="margin-left:39%;"> Operation(Trekking Style)</label>
         </div>
        <div class="form_field">
        <input name="grade"  style="width:48%;" type="text"  id="" value="<?php echo $row['grade']; ?>">
        <input name="operation"  style="width:48%;"  type="text"  id="" value="<?php echo $row['operation']; ?>">
        </div>
        </div>
		 <div class="form_item">
        <div class="form_label">
         <label>Arrival on</label>
         <label style="margin-left:40%;">Departure from</label>
         </div>
        <div class="form_field">
        <input name="arrival" style="width:48%;" type="text"  id="" value="<?php if(isset($arrival)){ echo $arrival; } ?>">
        <input name="departure" style="width:48%;" type="text"  id="" value="<?php if(isset($departure)){ echo $departure; } ?>">
        </div>
        </div>
		
		<div class="form_item">
        <div class="form_label">
         <label>Transportation</label>
         </div>
        <div class="form_field">
        <input name="transport" style="width:99%;" type="text"  id="" value="<?php if(isset($transport)){ echo $transport; } ?>">
        </div>
        </div>
		
		 <div class="form_item">
        <div class="form_label">
         <label>Country</label>
         <label style="margin-left:42%;">Meals</label>
         </div>
        <div class="form_field">
        <input name="country"  style="width:48%;" type="text"  id="" value="<?php if(isset($country)){ echo $country; } ?>">
        <input name="meals"  style="width:48%;" type="text"  id="" value="<?php if(isset($meals)){ echo $meals; } ?>">
        </div>
        </div>
		
		<div class="form_item">
        <div class="form_label">
         <label>Accommodation</label>
         </div>
        <div class="form_field">
        <input name="accomode" style="width:99%;" type="text"  id="" value="<?php if(isset($accomode)){ echo $accomode; } ?>">
        </div>
        </div>
        
        
         
		 <div class="form_item">
        <div class="form_label">
         <label>Priority</label>
         <label style="margin-left:39%;">Best Month</label>
         </div>
        <div class="form_field">
        <input name="priority"  style="width:48%;" type="text"  id="" value="<?php echo $row['priority']; ?>">
        <input name="best_month"  style="width:48%;"  type="text"  id="" value="<?php echo $row['best_month']; ?>">
        </div>
        </div>
        
		 <div class="form_item">
        <div class="form_label">
         <label>Trip Cost</label>
         <label style="margin-left:39%;"> Booking Price</label>
         </div>
        <div class="form_field">
        <input name="trip_cost"  style="width:48%;" type="text"  id="" value="<?php echo $row['trip_cost']; ?>">
        <input name="booking_cost"  style="width:48%;"  type="text"  id="" value="<?php echo $row['booking_cost']; ?>">
        </div>
        </div>
        
        	<div class="form_item">
        <div class="form_label">
         <label>Price Comment</label>
         </div>
        <div class="form_field">
        <textarea name="price_comment" style="margin: 0px; width: 99%; height: 96px;"><?php echo $row['price_comment']; ?></textarea>
        </div>
        </div>
        
        
         	<div class="form_item">
        <div class="form_label">
         <label>Activity List</label>
         </div>
         <?php
		 
 $particular_dtl_back = $Content ->  getConActivity($id);
$num_pre_back = $Conn -> numRows($particular_dtl_back);
$result_back = array();
 for($j_back=0; $j_back < $num_pre_back; $j_back++ ){
$particular_row_back =$Conn -> fetchArray($particular_dtl_back);
	$result_back[] = array('activity' => $particular_row_back['activity_id'], 
                    'content' => $particular_row_back['content_id'],
				
					);			
} 
	$tmp_back = array();
	$formatted_output_back = array();
foreach($result_back as $key_back => $metal_back){
    $tmp_back[] = ",".implode(",", $metal_back);
}
$formatted_output_back = implode(",", $tmp_back);
 $formatted_output_back."<br/>";

$array_back =  array();
$array_back = explode(',', $formatted_output_back);

		 
		 
	   
	   $activity_list = $Activity -> getAll();
	   while($activity_row = $Conn -> fetchArray($activity_list)){
		   $pre_activity = $activity_row['id'];
		
		?>
          <?php if(is_array($array_back) && array_search( $pre_activity , $array_back)){ ?>
        
        <div class="form_field" style="margin-top:2%; font-size:15px;">
       
    
        <input type="checkbox" name="activity[]" value="<?php echo $activity_row['id']; ?>" checked/> <?php echo $activity_row['name']; ?>   
	 
        </div>
        	<?php 
		  }else{ ?>				
			   <div class="form_field" style="margin-top:2%; font-size:15px;">
       
    
        <input type="checkbox" name="activity[]" value="<?php echo $activity_row['id']; ?>" /> <?php echo $activity_row['name']; ?>   
	 
        </div>	
				
				
			<?php 	
			
	  }
			  }
	   
	    ?>
       
        </div>
		
		 <div class="form_item">
    <div class="form_field1">
      <input class="submit_bitton" name="edit_content_button" type="submit" value="Save & Update">
    </div>
  </div>
	 </form>
	</div>
<?php } ?>