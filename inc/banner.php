<div class="banner">
	<div class="headerleft"> <img src="images/allience-bannaer.png"  alt="" title="" /></div>
	<div class="headerright">
		<ul>
		<li><a href="">Reviews</a></li>
		<?php
		$mresult=$Content->getByGroupIdlistParentWithLimits(10);	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
		?>
			<li> <a href="pages-content-<?php echo $mrow['id'];?>" alt="<?php echo $mrow['content_title'];?>" title="<?php echo $mrow['content_title'];?>"> <?php echo $mrow['content_title'];?> </a>  </li>
			<?php
				}
				?>
					<li><a href="pages-subcategory-32">Contact Us</a></li>
			</ul> 
		<p style="float:right;color:#fff;font-weight:bold;"> Support :- 24/7  <i style="color:#f2c13f;" class="icon-phone"></i>+977 - 9851022814 </p>
		
		<div class="clear"></div>
		
		<div class="social_icon">
			
			<a href="http://www.facebook.com/pages/Alliance-Treks-Expedition-Pvt-Ltd/231957663522211" target="_blank" alt="Google+" title="Google+" ><img src="images/icons/facebook.jpg"  alt="" title="" /> </a>
			<a href="https://plus.google.com/u/0/b/107467862273341961103/107467862273341961103/posts" target="_blank" alt="Google+" title="Google+" >  <img src="images/icons/googleplus.png"  alt="" title="" /> </a> 
			<a href="https://www.linkedin.com/home?trk=nav_responsive_tab_home" alt="" target="_blank" title="">  <img src="images/icons/link.png"    alt="Linkedin" title="Linkedin" /> </a> 
			<a href="https://www.pinterest.com/alliancetreks/" alt="" title="" target="_blank" >  <img src="images/icons/pin.gif"  alt="Pinterest"  title="Pinterest"/> </a>
			<a href="https://twitter.com/Alliancetreks" alt="" title="" target="_blank">   <img src="images/icons/twitter.jpg"  alt="Twitter"   title="Twitter"/>   </a>
			<a style="color:#fff; line-height:30px; font-weight:bold;" href=""><b>Live Support</b></a>
		</div>
		<div class="clear"></div>
		<p style="float:right;color:#f2c13f;font-weight:bold;">Licence No: 666/061 </p>
		
	 </div>
		
		</div>