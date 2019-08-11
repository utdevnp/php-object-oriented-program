
    	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Departure Management >> Add New </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=departure&file=list_departure.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		
	</div>

  <div style="clear:both;"></div>

<div class="message_area">
<?php
if(isset($_POST['add_video_button']))
{
	$error = null;
	$group_id=$_POST['group_id'];
	
	$departure_date = $_POST['departure_date'];
	$price = $_POST['price'];
	$offered_price = $_POST['offered_price'];
	$status = $_POST['status'];
	$remarks = $_POST['remarks'];

	if(!empty($error))
	{
	?>
		<div class="error_box">
			<?php echo $error; ?>
		 </div>  		 
	<?php		
	}
	else
	{
		//call add() function & pass parameter & store returned value
		$result = $departure->add($group_id,$departure_date,$price,$offered_price,$status,$remarks);
	
		if($result==1)
		{
			header("Location: index.php?folder=departure&file=list_departure.php&msg=Added Successfully!");
			?>
				<style>.niceform{display:none;}</style>
			<?php
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
</div><!-- message_area ends -->

<div class="form_area">
	<?php 
		//include rich text editor for PHP provided by FckEditor
		include('fckeditor/fckeditor.php'); 
	?> 

  
	<form method="post"  class="niceform">
			
		    <div class="form_item">
  					<div class="form_label">
    					<strong>  Product </strong>
    				</div>
    				<div class="form_field">
    					<select name="group_id">
                        <?php 
						$group_list = $Content -> getAllGroup();
						while($group_row = $Conn -> fetchArray($group_list)){ 
						if(isset($_GET['ex']) && $_GET['ex']==$group_row['id']){ ?>
							
						<option value="<?php echo $group_row['id']; ?>" selected="selected"><?php echo $group_row['menu_name']; ?></option>	
						<?php	} else{
						
						?>
                        	<option value="<?php echo $group_row['id']; ?>"><?php echo $group_row['menu_name']; ?></option>
                        <?php
						}
						
						 } ?>
                        </select>
   		 			</div>
			</div>
			
			
		
            
            	<div class="form_item">
  					<div class="form_label">
    					<strong>Departure Date </strong>
    				</div>
    				<div class="form_field">
    				<input type="text" name="departure_date" value="" />
   		 			</div>
			</div>
            	<div class="form_item">
  					<div class="form_label">
    					<strong>Price For This Date </strong>
    				</div>
    				<div class="form_field">
    				<input type="text" name="price" value="" />
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Offered Price </strong>
    				</div>
    				<div class="form_field">
    				<input type="text" name="offered_price" value="" />
   		 			</div>
			</div>
			
			<div class="form_item">
  					<div class="form_label">
    					<strong>Status </strong>
    				</div>
    				<div class="form_field">
    				<select name="status">
						<option>Unavailable</option>
						<option>Available</option>
						<option>Gaurantee</option>
						<option>Limited</option>
					</select>
   		 			</div>
			</div>
			
			  <div class="form_item">
  				<div class="form_label">
    				<label> Remarks</label>
    			</div>
    			<div class="form_field">
    				<?php   
                        $ctrl_name  = 'remarks';
                        $sBasePath  = './fckeditor/';
                        $oFCKeditor = new FCKeditor('remarks') ;
						$oFCKeditor->Height = "250px";
                        $oFCKeditor->Width = "580px";
                        $oFCKeditor->BasePath = $sBasePath ;
                        $oFCKeditor->Value = "" ;
                        $oFCKeditor->Create() ;
					?>
   		 		</div>	
			</div>
			
			
			<div class="form_item">
  				
    				<div class="">
    						<input class="submit_bitton" type="submit" value="Add New " name="add_video_button" />
   		 			</div>
			</div>
	</form>
</div>