  <?php
	if(isset($_GET['sub'])){
		$sub = $_GET['sub'];
	}
	?>
<?php
function GenerateSudoForContent($length = 8) 
	{
    $possibleChars = "abcdefghijklmnopqrstuvwxyz";
    $password = '';

    for($i = 0; $i < $length; $i++) 
		{
        $rand = rand(0, strlen($possibleChars) - 1);
        $password .= substr($possibleChars, $rand, 1);
        }
        return $password;
    }
	
	

	if(isset($_POST['add_content_button']))
	{
		$error=null;
		
		
		//access user posted data
		$group_id=$_GET['group_id'];
						$error.= $Validator-> validate_empty($group_id,"Group");
						$error.= $Validator-> validate_number($group_id,"Group");
						$error.= $Validator-> validate_numeric_range($group_id,1,500,"Group");	
		$parent_id=$_POST['parent_id'];
						$error.= $Validator-> validate_number($parent_id,"Parent");
						$error.= $Validator-> validate_numeric_range($group_id,1,500,"Parent");	
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
		$error.= $Validator-> validate_empty($date,"Date And Time");
		$weight=$_POST['weight'];
						$error.= $Validator-> validate_empty($weight,"Weight");
						$error.= $Validator-> validate_number($weight,"Weight");
						$error.= $Validator-> validate_numeric_range($weight,1,5000,"Weight");
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
		$is_active=$_POST['is_active'];
		
		$grade = $_POST['grade'];
		$operation = $_POST['operation'];
		$priority = $_POST['priority'];
		$best_month = $_POST['best_month'];
		$trip_cost = $_POST['trip_cost'];
		$booking_cost = $_POST['booking_cost'];
		$price_comment = $_POST['price_comment'];
		$type ='';
		
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
				
		//show error if $error is not empty
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
			$result = $Content->add($group_id,$parent_id,$menu_name,$pseudo_name,$content_title,$short_description,
					$detail_description,$date,$weight,$author,$is_active,$page_title,$meta_description,
					$keywords,$duration,$code,$route,$route_map,$g_size,$maxalt,$arrival,$departure,
					$transport,$country,$meals,$accomode,$itnary,$included,$type,$grade,$operation,$priority,$best_month,$trip_cost,$booking_cost,$price_comment);
			$new_id1 = $Conn -> insertId();	
				
	foreach($_POST['activity'] as $a => $b){
		
		
		$activity = $_POST['activity'][$a];
		
		$addConActivity = $Content -> addConActivity($activity,$new_id1);
		
	}
				
				
				if($result==1)
					{
						//echo "added successfully";
						$group_id=$_GET['group_id'];
						 header("Location:index.php?folder=content&file=list_content.php&group_id=$group_id&sub=$sub& message=Added Success!!");
					}
				else
					{
						echo "<h1> Error </h1>".mysqli_error();	
					}
				//show output based on success/failure of the query
	}
	
	
		if($result==1)
			{
			  //find new id insert id 
			  $new_id=$Conn->insertId();
			  
				//find file upload error code
				$upload_err_code = $_FILES['photo']['error'];
				//if file is selected
				if($upload_err_code!=4)
				{
					//if file uploaded to TMP directory
					if($upload_err_code==0)
					{
						//allowed extensions
						$allowed=array('jpg','jpeg','png','gif','bmp');
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
								//create new file name
								$new_file_name = $new_id.".".$extension;
								//upload in 'photo' directory inside 'gallery' dir
move_uploaded_file($_FILES['photo']['tmp_name'],"upload/attachmenthome/".$new_file_name);
					
								//update file extension in database
								$result2 = updateExtension($new_id,$extension);
								//if extension updated
								if($result2==1)
								{
									//redirect to list page if ext updated
									header('');	
								}
								else
								{
									//show error if could not update ext
									echo "<strong> ERROR: </strong><br/>".mysqli_error();
								}
							}
						 }
					}
				}
				//redirect to list page after adding record without file upload
				header('');
			}
}
?>

<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/content.gif) no-repeat; text-indent:40px; Padding:5px;">Content Management >> Add Content </h2>
           <a style="float:right; margin-right:5px;" href="index.php?folder=content&file=list_content.php&group_id=<?php echo $_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=content&file=add_content.php&group_id=<?php echo$_GET['group_id'];?>&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	<div style="clear:both;"></div>
<div class="left_side">	
<form method="post" action="" name="" enctype="multipart/form-data">
	 <?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?>  

 
  <div style=""  class="form_item">
        <div class="form_label">
         <label>Parent</label> 
         </div>
        	<div class="form_field">
            <select name="parent_id">
            	<option value="0" selected="selected"> SELF* </option>
                
            </select>
      </div>
            </div>
		
		<div class="form_item">
        <div class="form_label"> 
        <label>Page Title</label> 
        </div>
        <div class="form_field">
        <input name="page_title" required type="text" id="page_title" size="97" value="Nepal trekking, Trekking in Nepal, Nepal treks, Everest trekking, Everest trek, Annapurna trekking, Langtang trekking, Manaslu trek, Dhaulagiri trek">
        </div>
        </div>	
		
			
        <div class="form_item">
        	<div class="form_label"> 
            <label>Menu Name</label>
             </div>
        <div class="form_field">
        <input name="menu_name" required type="text" id="menu_name" size="97">
		<div class="input-validation"></div>
        </div>
        </div>
		
		
		
		<div  class="form_item">
       <div class="form_label"> 
         <label>Url</label>
        </div>
        <div class="form_field">
		 <input type="text" size="30" required  name="pseudo_name" id="pseudo_name" value="<?php echo GenerateSudoForContent();?>">
        </div>
        </div>
		
		
        	<div class="form_item">
        <div class="form_label">
         <label>Content Title</label> 
         </div>
        <div class="form_field">
        <input name="content_title" required type="text" id="content_title" size="97">
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
                        $oFCKeditor->Value = "" ;
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
                        $oFCKeditor->Value = "" ;
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
                        $oFCKeditor->Value = "" ;
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
                        $oFCKeditor->Value = "" ;
                        $oFCKeditor->Create() ;
                ?>		
        </div>
        </div>
		
		<div class="form_item">
        <div class="form_label">
         <label>Date</label> 
         </div>
        <div class="form_field">
		<?php //include('date_time/date-time.php');?>
        <input name="date" type="text" required id="date" size="50" value="<?php echo date('M d D Y'); //echo $myMonth;?>">
        </div>
        </div>
		
		
		<div class="form_item">
        <div class="form_label">
         <label>Author</label> 
         </div>
        <div class="form_field">
        <input name="author" type="text" required id="author" size="50" value="Admin"/>
        </div>
        </div>
		
        <div style="display:none;" class="form_item">
        <div class="form_label">
         <label>Weight</label> 
         </div>
        <div class="form_field">
       	<?php
			$max_weight = $Content->findMaxWeight($_GET['group_id']);
				$new_weight = $max_weight + 5;
			
		?>
        <input name="weight" type="text" required id="weight" size="10" value="<?php echo $new_weight;?>">
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
        <textarea name="meta_description" required cols="87" rows="5" id="meta_description"/> Alliance treks & expedition Nepal trekking, Trekking in Nepal, Nepal treks, Wildlife tour, Whitewater rafting</textarea>
        </div>
        </div>
        <div class="form_item">
        <div class="form_label">
         <label>Keywords</label>
         </div>
        <div class="form_field">
        <input name="keywords" type="text" required id="keywords" size="97" value="Nepal trekking, Trekking in Nepal, Nepal treks, Everest trekking, Everest trek, Everest base camp trekking, Annapurna trek, Annapurna trekking, Langtang trek, Langtang trekking, Dolpo Trek, Mustang trek, Kanchanjunga trek, Rara Trek, Ganesh Himal Trek, Rolwaling Trek, Makalu Trek, Jungle Safari, Mountaineering in Nepal, Adventure Sports, Air Ticketing, Rafting, Hotel Booking in Nepal">
        </div>
        </div>
        <div class="form_item">
        <div class="form_label">
        <input class="submit_bitton" type="submit" name="add_content_button" value="Add New Content">
        </div>
        </div>
       
	</div>
	
	<?php if(isset($sub) && $sub=='y'){?>
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
        <input name="duration"  style="width:48%;" type="text"  id="" value="" required="required">
        <input name="code"  style="width:48%;" type="text"  id="" value="ATE-<?php echo rand(00,99);?>" required="required">
        </div>
        </div>
		
		 <div class="form_item">
        <div class="form_label">
         <label>Route</label>
         </div>
        <div class="form_field">
        <input name="route" style="width:99%;" type="text"  id="" value="">
        </div>
        </div>
		 <div class="form_item">
        <div class="form_label">
         <label>Route Map</label>
         </div>
        <div class="form_field">
         <textarea name="route_map" style="width:99%;" rows="6" cols="15" type="text"></textarea>
        </div>
        </div>
		
		 <div class="form_item">
        <div class="form_label">
         <label>Group Size</label>
         <label style="margin-left:39%;"> Max Elevation</label>
         </div>
        <div class="form_field">
        <input name="g_size"  style="width:48%;" type="text"  id="" value="">
        <input name="maxalt"  style="width:48%;"  type="text"  id="" value="">
        </div>
        </div>
        
        
		 <div class="form_item">
        <div class="form_label">
         <label>Grade/Difficulty</label>
         <label style="margin-left:39%;"> Operation(Trekking Style)</label>
         </div>
        <div class="form_field">
        <input name="grade"  style="width:48%;" type="text"  id="" value="">
        <input name="operation"  style="width:48%;"  type="text"  id="" value="">
        </div>
        </div>
		
		 <div class="form_item">
        <div class="form_label">
         <label>Arrival on</label>
         <label style="margin-left:40%;">Depature from</label>
         </div>
        <div class="form_field">
        <input name="arrival" style="width:48%;" type="text"  id="" value="">
        <input name="departure" style="width:48%;" type="text"  id="" value="">
        </div>
        </div>
		
		<div class="form_item">
        <div class="form_label">
         <label>Transportation</label>
         </div>
        <div class="form_field">
        <input name="transport" style="width:99%;" type="text"  id="" value="">
        </div>
        </div>
		
		 <div class="form_item">
        <div class="form_label">
         <label>Country</label>
         <label style="margin-left:42%;">Meals</label>
         </div>
        <div class="form_field">
        <input name="country"  style="width:48%;" type="text"  id="" value="">
        <input name="meals"  style="width:48%;" type="text"  id="" value="">
        </div>
        </div>
		
		<div class="form_item">
        <div class="form_label">
         <label>Accommodation</label>
         </div>
        <div class="form_field">
        <input name="accomode" style="width:99%;" type="text"  id="" value="">
        </div>
        </div>
        
        
		 <div class="form_item">
        <div class="form_label">
         <label>Priority</label>
         <label style="margin-left:39%;">Best Month</label>
         </div>
        <div class="form_field">
        <input name="priority"  style="width:48%;" type="text"  id="" value="">
        <input name="best_month"  style="width:48%;"  type="text"  id="" value="">
        </div>
        </div>
        
		 <div class="form_item">
        <div class="form_label">
         <label>Trip Cost</label>
         <label style="margin-left:39%;"> Booking Price</label>
         </div>
        <div class="form_field">
        <input name="trip_cost"  style="width:48%;" type="text"  id="" value="">
        <input name="booking_cost"  style="width:48%;"  type="text"  id="" value="">
        </div>
        </div>
        
        	<div class="form_item">
        <div class="form_label">
         <label>Price Comment</label>
         </div>
        <div class="form_field">
        <textarea name="price_comment" style="margin: 0px; width: 99%; height: 96px;"></textarea>
        </div>
        </div>
        
        
         	<div class="form_item">
        <div class="form_label">
         <label>Activity List</label>
         </div>
         <?php
	   
	   $activity_list = $Activity -> getAll();
	   while($activity_row = $Conn -> fetchArray($activity_list)){
		?>
        <div class="form_field" style="margin-top:2%; font-size:15px;">
       
      
        
        <input type="checkbox" name="activity[]" value="<?php echo $activity_row['id']; ?>" /> <?php echo $activity_row['name']; ?>   
	 
        </div>
        	<?php   }
	   
	    ?>
       
        </div>
        
		
		 <div class="form_item">
        <div class="form_label">
        <input class="submit_bitton" type="submit" name="add_content_button" value="Add New Content">
        </div>
        </div>
	 </form>
	</div>
    
    <?php } ?>