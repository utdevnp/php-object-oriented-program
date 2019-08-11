<?php
				$result = $Middleadvert->getById(1);
							$row =$Conn->fetchArray($result);
							
								$getByDownFiles = S_DOWNLOAD_IMG_DIR.$row['id'].".".$row['ext'];
							?>
		<a href="<?php echo $getByDownFiles; ?>" target="_blank" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>">	<img src="images/download1.png" width="99%" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>" /> </a>
		<?php
				$result = $Middleadvert->getById(2);
							$row =$Conn->fetchArray($result);
							
								$getByDownFiles = S_DOWNLOAD_IMG_DIR.$row['id'].".".$row['ext'];
							?>
		<a href="<?php echo $getByDownFiles; ?>" target="_blank" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>">	<img src="images/download2.png" width="99%" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>" /> </a>
		
		<br>
		<div class="weather" >
			<a href="http://www.accuweather.com/en/np/kathmandu/241809/weather-forecast/241809" class="aw-widget-legal">
</a><div id="awcc1435039718954" class="aw-widget-current"  data-locationkey="241809" data-unit="f" data-language="en-us" data-useip="false" data-uid="awcc1435039718954"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
			
			</div>