	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/group.gif) no-repeat; text-indent:40px; Padding:5px;">Group Management >> Add Group</h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=group&file=list_group.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=group&file=add_group.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>


<?php
	if(isset($_POST['add_groups_button']))
	{
		$error=null;
		
		//access user posted data
		$name=$_POST['name'];
			$error.= $Validator-> validate_empty($name,"Group Name");
			$error.= $Validator-> validate_text_range($name,3,255,"Group Name");
		$order_by=$_POST['order_by'];
		$howmany=$_POST['howmany'];
		$parent_id=$_POST['parent_id'];
		$is_active=$_POST['is_active'];
		
		if(!empty($error))
		{
			echo $error;	
		}
		else
		{
			$result = $Group->add($name,$howmany,$order_by,$parent_id,$is_active);
				
				if($result==1)
				{
					header("Location: index.php?folder=group&file=list_group.php&message=Record Added Successfully");
				}
				else
				{
					echo "<h1> Error </h1>".mysqli_error();	
				}
				//show output based on success/failure of the query
		}
	}
?>


	
<form id="form1" name="add_group_form" method="post" onsubmit="validate_add_group()">

  <div style="display:none;" class="form_item">
    	<div class="form_label">
        	<label>  Parent </label> 
        </div>
        <div class="form_field">
			<select name="parent_id">
            	<option value="0" selected="selected"> SELF* </option>
                <?php
					$parent_list = $Group->listParent($_GET['id']);
					while($parent_row = $Conn->fetchArray($parent_list))
					{
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
    	<label> Group Name </label>
    </div>
    <div class="form_field">
    	<input name="name" type="text"  size="25" required maxlength="100"  id="name"  onblur="validate_text_length('name','msg_name',3,255,'Y')"
			value="<?php if(isset($name)){ echo $name; } ?>">
			<span id="msg_name"></span>
			
    </div>
  </div>
  
  
  <div class="form_item">
  	<div class="form_label">
    	<strong>Content Order</strong>
    </div>
	<div class="form_field">
    <select name="order_by">
              <option value="ASC" selected="selected" >Ascending</option>
              <option value="DESC">Descending</option>
            </select>  
  </div>
  </div>
  
  <div class="form_item">
  	<div class="form_label">
    	<label> Show Items </label>
    </div>
    <div class="form_field">
    	<input name="howmany" type="number"  required size="25" maxlength="100"  id="howmany"/>
			
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

    <div class="">
    	<input class="submit_bitton" name="add_groups_button" type="submit" value="Add Group">
    </div>
  </div>      
  
</form>

<script>
	function validate_add_group()
	{
		//client side validation goes here
		var a = validate_text_length('name','msg_name',3,25,'Y');
			if( (a=='F') )
			{
				return false;
					alert('Correct errors first');
			}
			else
			{
				//return true;
					//document.add_group_form.submit();
			}	
	}
</script>
