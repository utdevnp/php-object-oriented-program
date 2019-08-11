<div style="margin-top:2%;"></div>
<div id="glance">
			<div class="head_testi">
			<i class="icon-male icon-2x"></i> 
			<h3>Trip Glance</h3>
		</div>
			<div class="servicebox">
	<ul>
			<?php
				$mresult=$Branch->getByTripGlance($_GET['id'],5,'DESC');	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
			?>
				<li><i class="icon-expand"></i> <a href="pages-glance-<?php echo $mrow['id'];?>"><?php echo $mrow['name'];?></a></li>
		<?php } ?>
		<ul>
	</div>
</div>
	
	<div style="margin-top:2%;"></div>
		<div class="head_testi">
			<i class="icon-movie icon-2x"></i> 
			<h3>Trip Video</h3>
		</div>
		<div class="servicebox">
			<?php
			$video=$Videos->getByContentId($_GET['id']);	
				$mrow=$Conn->fetchAssoc($video);
			?>
				
			<iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $mrow['url'];?>" frameborder="0" allowfullscreen></iframe>	
			
		</div>
		
		<div style="margin-top:2%;"></div>
		<div style="border-radius:0px 0px 5px 5px;" class="head_testi">
			<i class="icon-picture icon-2x"></i> 
			<h3><a style="color:#fff;" href="">Trip Gallery</a></h3>
		</div>
			<div class="servicebox">
			<div class="trip_gal">
		<?php
		
			$result = $Advert->getByAdvertIdWithLimit($_GET['id'],1);
							while($row =$Conn->fetchArray($result))
							{
								$path = "upload/top/";
								$Image = $path.$row['id'].".".$row['ext'];
							?>
							
            <img src="<?php echo $Image;?>" title="<?php echo $row['title'];?>" alt="<?php echo $row['title'];?>" />
            <?php
							}
							?>
				</div>
		</div>
