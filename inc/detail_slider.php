<?php   //echo $_GET['id'];?>
<div class="callbacks_container">
      <ul class="rslides" id="slider4">
	  <?php
	
	$result = $Attachment->getByContentId($id);
	while($row =$Conn->fetchArray($result))
	{
	$Image = S_ATTACH_FILE_DIR.$row['id'].".".$row['myfile'];
	?>
	<li>
          <img src="<?php echo $Image; ?>" alt="<?php echo $row['title'];?>">
          <p class="caption detail_caption">
			<?php echo $row['title'];?>
          </p>
        </li>
	<?php 
	}
	//while?>
        
      </ul>
    </div>