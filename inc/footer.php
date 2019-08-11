
<div id="footer">
<div class="bottom-menu">
<ul class="inline text-center footer-linkz">
				<?php
					$result = $Content->getByGroupIdlistParentWithLimits(58);
					while($row=$Conn->fetchArray($result))
					{
				?>
                    <li><a href="pages-content-<?php echo $row['id'];?>"><?php echo $row['content_title'];?></a></li>
                 <?php
					}
				?>
				<li><a href="pages-category-16">Inquiry</a></li>
                </ul>

</div>

<div class="clear"></div>

<div class="innerfooter">
		<div class="contactinfo"> 
		<h4> <span style="margin-left:29%;">CONTACT US</span></h4>
		<!--img src="images/footerlogo.png" -->
			<?php
		$result = $Content->getContentById(25);
		$row = $Conn->fetchArray($result);
		echo $row['detail_description'];
		?>
		 
 	
		</div>
		<div class="fnav">
		<h4 style="margin-left:0%;">HOT DEALS </h4>  
		
			
		<p> </p>
		
		<div class="clear:both"></div>
		<div id="banner-fade">
			<ul class="bjqs">
				<?php
				$result = $Advert->GetGallerydWithLimit(5);
				while($row = $Conn->fetchArray($result)){
				$link_image = S_GALLERY_DIR.$row['id'].".".$row['ext'];
				?>
				  <li><a href="<?php $row['url'];?>"><img src="<?php echo $link_image ;?>" title="<?php echo $row['title'];?>"></a></li>
				<?php
				}
				?>
		   </ul>
		</div>
		 </div>
		<div class="fb">
		<h4> WE ON FACEBOOK <h4>
		<div class="fb-page" data-href="https://www.facebook.com/alliancetreks" data-width="300" data-height="270" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/alliancetreks"><a href="https://www.facebook.com/alliancetreks">Alliance Treks &amp; Expedition Pvt. Ltd.</a></blockquote></div></div>
		
		 </div>
		 
		 <div class="clear"></div>
		 <div class="footerMenu">
		<div style="float:left;" class="Assocait">
		
		<?php
		$result = $Links->getBylinkIdWithLimit(1,10,"ASC");
		while($row = $Conn->fetchArray($result)){
		$link_image = s_LINK_IMG_DIR.$row['id'].".".$row['ext'];
		?>
		<a href="<?php echo $row['url'];?>" target="_blank" alt="<?php echo $row['title'];?>"> <img src="<?php echo $link_image;?>" alt="<?php echo $row['title'];?>" title="<?php echo $row['title'];?>" /> </a>
		<?php
		}
		?> 
		
		</div>
		<div style="float:right;" class="Assocait">
		 <span style="float:left ; margin-top:15px;"> WE ACCEPT &nbsp; </span>
		<img style="float:left;" src="images/icons/paypal.png" alt="Paypal" title="Paypal" />
		 <img style="float:left;" src="images/icons/mastercard.png" alt="Master card" title="Master card" />
		 <img style="float:left;" src="images/icons/visa.png" alt="Visa Card" title="Visa Card" />
		 <img style="float:left;" src="images/icons/wu.png" alt="Western Union" title="Western Union" />
		</div>
		</div>
		
	</div>
	<div class="clear"></div>
	<div class="copyright">
	<div class="copyinner">
		<p style="float:left;"> &copy; Copyright 2013-<?php echo date('Y');?>. Alliance Treks & Expedition Pvt Ltd. All Right Reserved. </p>
		 <p style="float:right;"> Powered by <a href="http://www.webbanknepal.com" alt="Webbank Nepal Pvt.Ltd" title="Webbank Nepal Pvt.Ltd"> Webbank Nepal</a></p>
	</div>
	</div>