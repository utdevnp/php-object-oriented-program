
    <?php
	
		if(isset($_GET['sub'])){
					
			$sub = $_GET['sub'];
		}
				
	
	?>


<?php
	$id = $_GET['id'];
		$result =$Group->getById($id);
			$row = $Conn-> fetchArray($result);
				$name=$row['name'];
				$grp_url=$row['grp_url'];
				$howmany=$row['howmany'];
				$order_by=$row['order_by'];
				$parent_id=$row['parent_id'];
				$is_active=$row['is_active'];
?>

<?php
	if(isset($_POST['edit_groups_button']))
	{
		$error=null;
		//access user posted data
		$name=$_POST['name'];
		$grp_url=$_POST['name'];
		$error.= $Validator-> validate_empty($name,"Name");
		$howmany=$_POST['howmany'];
			$error.= $Validator-> validate_empty($howmany,"Show Items");
			$error.= $Validator-> validate_number($howmany,"Show Items");
			$error.= $Validator-> validate_numeric_range($howmany,1,20,"Show Items");
		$order_by=$_POST['order_by'];
		$parent_id=$_POST['parent_id'];
		$is_active = $_POST['is_active'];
		$group_id = $_POST['group_id'];
		$detail_description = $_POST['detail_description'];
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
				
				$result =$Group->edit($id,$name,$grp_url,$howmany,$order_by,$parent_id,$is_active,$detail_description,$group_id);
				if($result==1)
				{
					header("Location: index.php?folder=group&file=list_group.php&sub=$sub&message=Record Updated Successfully!");
				}
				else
				{
					echo "<h5> Error </h1>".mysqli_error();	
				}
		}
	}
?>
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/group.gif) no-repeat; text-indent:40px; Padding:5px;">Group Management >> Edit Group</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=group&file=list_group.php&sub=<?php echo $sub; ?>"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=group&file=add_group.php&sub=<?php echo $sub; ?>"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	<?php 
     //include rich text editor for PHP provided by FckEditor
     include('fckeditor/fckeditor.php'); 
     ?>  
	<div style="clear:both;"></div>

<form id="form1" name="form1" method="post" action="">




  <div class="form_item">
  	<div class="form_label">
    	<label>  Name </label>
    </div>
    <div class="form_field">
    	<input name="name" type="text" required size="25" maxlength="100" id="name"
			value="<?php if(isset($name)){ echo $name; } ?>">
    </div>
  </div>
  
  
    <?php
  
   if(isset($sub) && $sub=='y'){
  
   ?>

  <div class="form_item">
    	<div class="form_label">
        	<label>  Main Category </label> 
        </div>
        <div class="form_field">
			<select name="group_id">
            	
                <?php
					$parent_list = $Category->getAll();
					while($parent_row = $Conn->fetchArray($parent_list))
					{
						if($parent_row['id']==$row['group_id']){
						?>	
					<option value="<?php echo $parent_row['id'];?>" selected="selected"> 
                    <?php echo $parent_row['name']; echo $parent_row['id'];?>
                    </option>
						<?php	}
					?>
            		<option value="<?php echo $parent_row['id'];?>"> 
                    <?php echo $parent_row['name'];?>
                    </option>
	        	    <?php
					}
				?>
            </select>
			                  
        </div>
	</div>
	
     <div class="form_item">
        <div class="form_label"> 
        <label>Detail Description</label> 
        </div>
        <div class="form_field">
	    
             	<?php   $description =$row['description'];
                        $ctrl_name  = 'detail_description';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('detail_description') ;
                        $oFCKeditor->Height = "400px";
                        $oFCKeditor->Width = "725px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = $description ;
                        $oFCKeditor->Create() ;
                ?>		
        </div>
        </div>
 <?php } ?>
  
  <div class="form_item">
  	<div class="form_label">
    	<label>  Content Order </label>
    </div>
    <div class="form_field">
    	<select name="order_by">
                <?php
                    $arr =array('ASC'=>'Ascending','DESC'=>'Descending');
                    foreach($arr as $k=>$v)
                             {
                                if($order_by==$k)
                                {
                                    echo "<option value='$k' selected>$v *</option>";
                                }
                                else 
                                {
                                echo "<option value='$k'>$v</option>";
                                }
                             }
                         ?>
              </select>
    </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Show Items </label>
    </div>
    <div class="form_field">
    	<input name="howmany" type="number"  required size="25" maxlength="100"  id="howmany"
		value="<?php if(isset($howmany)){ echo $howmany; } ?>"/>
			
    </div>
  </div>
  
  
  <div style="display:none;" class="form_item">
  	
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

    <div class="">
    	<input class="submit_bitton" name="edit_groups_button" type="submit" value="Save & Update">
    </div>
  </div>      
  
</form>
