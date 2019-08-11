<?php
	$id = $_GET['id'];
		$result =$Category->getById($id);
			$row = $Conn-> fetchArray($result);
				$name=$row['name'];
				$cat_url=$row['cat_url'];
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
		$cat_url=$_POST['name'];
		$error.= $Validator-> validate_empty($name,"Name");
		$howmany=$_POST['howmany'];
			$error.= $Validator-> validate_empty($howmany,"Show Items");
			$error.= $Validator-> validate_number($howmany,"Show Items");
			$error.= $Validator-> validate_numeric_range($howmany,1,20,"Show Items");
		$order_by=$_POST['order_by'];
		$parent_id=$_POST['parent_id'];
		$is_active = $_POST['is_active'];
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
				
				$result =$Category->edit($id,$name,$cat_url,$howmany,$order_by,$parent_id,$is_active);
				if($result==1)
				{
					header("Location: index.php?folder=category&file=list_category.php&message=Record Updated Successfully!");
				}
				else
				{
					echo "<h5> Error </h1>".mysqli_error();	
				}
		}
	}
?>
<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/group.gif) no-repeat; text-indent:40px; Padding:5px;">Category Management >> Edit Category</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=category&file=list_category.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=category&file=add_category.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Category"  /></a> 
	</div>
	
	<div style="clear:both;"></div>

<form id="form1" name="form1" method="post" action="">

<div style="display:none;" class="form_item">
    	<div class="form_label">
        	<label>  Parent </label> 
        </div>
        <div class="form_field">
			<select name="parent_id">
            	
				<?php
				  if($parent_id==0)
				  {
					  echo '<option value="0" selected>'; 
						  echo "* SELF ";
					  echo "</option>";	
				  }
				  else
				  {
					  echo '<option value="0">'; 
						  echo " SELF ";
					  echo "</option>";	
				  }
				?>                
                
                <?php
					$parent_list = $Category->listParent($_GET['parent_id']);
					while($parent_row = $Conn->fetchArray($parent_list))
					{		
						$pid= $parent_row['id'];
							
							if($parent_id==$pid)
							{
								
								echo "<option value=\"$pid\" selected>"; 
									echo "* ".$parent_row['name'];
								echo "</option>";	
							}
							else
							{
								echo "<option value=\"$pid\">";	
									echo $parent_row['name'];
								echo "</option>";	

							}

					}
				?>
            </select>                  
        </div>
	</div>


  <div class="form_item">
  	<div class="form_label">
    	<label>  Name </label>
    </div>
    <div class="form_field">
    	<input name="name" type="text" required size="25" maxlength="100" id="name"
			value="<?php if(isset($name)){ echo $name; } ?>">
    </div>
  </div>
  
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
