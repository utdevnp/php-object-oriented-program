<div class="content6"> 
<div class="latesttour">
<?php
	$result = $Advertisement->getById(1);
	$row = $Conn->fetchArray($result);
	?>
	<h2><i class="icon-th"></i> <?php echo $row['name'];?> </h2>
	
	<div class="footer_slider">
	<div id="slider1_container">
        <div data-u="slides" class="slides" >
			<?php
			$result = $Advert->GetPhotosIdWithLimit(1);
							while($row =$Conn->fetchArray($result))
							{
								$path = "upload/top/";
								$Image = $path.$row['id'].".".$row['ext'];
							?>
							
            <div><a href="<?php echo $row['url'];?>"><img data-u="image" src="<?php echo $Image;?>" title="<?php echo $row['title'];?>" alt="<?php echo $row['title'];?>" /></a></div>
            <?php
							}
							?>
            </div>
        <span u="arrowleft" class="jssora03l">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" >
        </span>
    
    </div>
	</div>
	</div>

</div> 