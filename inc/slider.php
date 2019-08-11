<div class="callbacks_container">
      <ul class="rslides" id="slider4">
	  <?php
	$result = $Image->getByGalleryIdWithLimit(1);
	while($row =$Conn->fetchArray($result))
	{
	$Image = S_SLIDER_IMG_DIR.$row['id'].".".$row['ext'];
	?>
	<li>
          <img src="<?php echo $Image; ?>" alt="<?php echo $row['title'];?>">
          <p class="caption">
          <b style="color:#AC3426;font-size:22px;"><a style="color:#AC3426;" href="<?php echo $row['url'];?>"><?php echo $row['title'];?></a></b> <br />
		  <!--span style="font-size:16px; margin-top:1%;"--><a href="<?php echo $row['url'];?>"><?php echo $row['caption'] ?></a></span>
          </p>
        </li>
	<?php }//while?>
        
      </ul>
	  <div class="search_slider">
	  <?php
		if(isset($_POST['search']))
		{
			$id = $_POST['activities'];
			header('Location:pages-subcategory-'.$id);
		}
	  
	  ?>
		  <form method="post">
			<select name="desti">
				<option>Destination</option>
				<option>Nepal</option>
				<option>Tibet</option>
				<option>Bhutan</option>
				<option>India</option>
				
			</select>
			
			<select name="activities">
			<option>Activities</option>
			<?php
				$result=$Category->getByMainIdLimits(1);
				while($grow = $Conn->fetchArray($result))
				{
			?>
				<option value="<?php echo $grow['id'];?>"><?php echo $grow['name'];?></option>
			<?php
				}
			?>
			<?php
				$result=$Category->getByMainIdLimits(2);
				while($grow = $Conn->fetchArray($result))
				{
			?>
				<option value="<?php echo $grow['id'];?>"><?php echo $grow['name'];?></option>
			<?php
				}
			?>
			</select>
			
			<select name="desti">
				<option>Days</option>
				<option>1-5</option>
				<option>1-10</option>
				<option>1-20</option>
				<option>1-30</option>
			</select>
			<input type="submit" name="search" value="Find.."/>
		  </form>
	  </div>
    </div>