<div id="wrapper">
<div id="header">
	<?php include('inc/banner.php');?>
		<div class="clear"> </div>
		<div class="nav">
		<?php include('inc/nav.php');?>
		</div>	
	</div>
	
<div class="clear"> </div>
<div id="contents">
		<div class="leftsection" >
				<div class="content1">
				
				 <div class="text1">
				 <h2><?php echo $rw['content_title'];?> </h2>
				
				<?php
	$mresult=$Links->getBylinkIdWithLimit(2,60,'DESC');	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
	
		?>
		<a style="float:left; margin-right:7%; width:23%;" href="<?php echo $mrow['url'];?>">&raquo <?php echo $mrow['title'];?></a>
		
	<?php
				}
	?>
	
	
				  </div>
 </div>

			
				 
			
<div class="clear"> </div>
				
		</div>

			<div id="myModal" class="reveal-modal" style="top:5%">
			<h2>Book This Trip</h2>
			<div>
			<?php  include('inc/booking_form.php');?>
			</div>
			<a class="close-reveal-modal">&#215;</a>
		</div>
		
		<div class="rightsection" >
		
			<div class="search1"> 
						<div class="searchform">
			<h1> Trip Search: <img src="images/icons/search_arrow.png" alt="" title=""> </h1>
			<form method="">
						<select>
						<option value=""> All Country</option>
						  <option value="nepal">Nepal </option>
						  <option value="tibet"> Tibet</option>
						  <option value="bhutan"> Bhutan</option>
						  <option value="india"> India</option>
						</select> <br /> <br />
						<select>
						<option value=""> All Services</option>
					
						</select> <br /> <br />
						<select>
						<option value=""> All Areas</option>
						 
						</select>  <br /> <br />
						<select>
						<option value=""> All days</option>
						 
						</select> <br /> <br />
						
						<input type="submit" value="Search"  /> </form> </div>
		</div>
			 
								
			<div class="tripadvisor">
			<img src="images/tripadvisor-logo-vector-01.png" alt="" title="" />
			<h4> Review Nepal Alternative Treks and Expedition Pvt. Ltd. - Day Tours</h4>
			 </div>
			 
			<div class="download"> 
			<?php
				$result = $Middleadvert->getById(1);
							$row =$Conn->fetchArray($result);
							
								$getByDownFiles = S_DOWNLOAD_IMG_DIR.$row['id'].".".$row['ext'];
							?>
		<a href="<?php echo $getByDownFiles; ?>" target="_blank" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>">	<img src="images/download1.png" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>" /> </a>
		<?php
				$result = $Middleadvert->getById(2);
							$row =$Conn->fetchArray($result);
							
								$getByDownFiles = S_DOWNLOAD_IMG_DIR.$row['id'].".".$row['ext'];
							?>
		<a href="<?php echo $getByDownFiles; ?>" target="_blank" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>">	<img src="images/download2.png" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>" /> </a>
			</div>
			
			<div class="weather" >
			<a href="http://www.accuweather.com/en/np/kathmandu/241809/weather-forecast/241809" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1435039718954" class="aw-widget-current"  data-locationkey="241809" data-unit="f" data-language="en-us" data-useip="false" data-uid="awcc1435039718954"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
			
			</div>
			
			<div class="trip">
			<h3> Trip at a Glance</h3> 
<?php

		$result = $Glance->GetGlanceInContent($rw['id'],10);
		while($row11= $Conn->fetchArray($result)){
		
		?>
			<p> &radic; <?php echo $row11['title'];?></p>
			 
		<?php } ?>
			 </div>
					
		
		</div>
	</div>

<div class="clear"> </div>

<?php include('inc/footer.php');?>
	</div>
</body>
</html>
