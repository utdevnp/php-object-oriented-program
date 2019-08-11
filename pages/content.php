<div id="wrapper">
<div id="header">
	<?php include('inc/banner.php');?>
		<div class="clear"> </div>
		<div class="nav">
		<?php include('inc/nav.php');?>
		</div>	
	</div>
		<?php include('inc/slider.php');?>
<div id="contents">
<div class="detail_mid">	
		<div class="leftsection" >
				
				<?php
				$id = $_GET['id'];
				if($id==204){
				?>
				<div class="blog">
				<h2>Our Blog</h2>
				<?php
					$mresult=$Content->getByGroupIdlistParentWithLimits(11);	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
				?>
				<div class="bnews">
				<h4><a href=""><?php echo $mrow['content_title'];?></a></h4>
				<p><?php echo $mrow['short_description'];?></p>
				<a style="float:right;font-size:12px" href="pages-content-<?php echo $mrow['id'];?>"><?php echo S_READ_MORE;?></a>
				</div>
				
				
				<?php
				}
				?>
				</div>
				<?php
				}elseif($id==39){
				?>
				<h2>Site Map</h2>
				<ul>
			
			<li style="padding:1%; color:blue;" class='has-sub'><a href='home'><span>Home</span></a>
			<li style="padding:1%; color:blue;"   class='has-sub'><a href='home'><span>About us</span></a>
			<?php
				$presult=$Category->listParent();
			while($prow=$Conn->fetchArray($presult))
				{
					$cat_id = $prow['id'];
					$cat_name = $prow['name'];
				?>
			
					
					   <li  style="padding:1%; color:blue;" sclass='has-sub '><a href='pages-category-<?php echo $cat_id;?>'><span><?php echo $cat_name; ?></span></a>
						  <ul>
						  <?php
						 // print child list
							$cresult = $Category->geBycatid($cat_id);
							 while($crow = $Conn->fetchArray($cresult))
							 {
							 ?>
							 <li style="padding:1%; color:blue;"  class='has-sub'>
								 <a href="pages-subcategory-<?php echo $crow['id'];?>"><span>
									<?php echo $crow['name']; //echo $crow['id'];?></span>
								 </a>
								<ul>
								 <?php
						 // print next child list
							$cresult1 = $Category->geBysubcatid($crow['id']);
							 while($ccrow = $Conn->fetchArray($cresult1))
							 {
							 ?>
								
							 
									<li style="padding:1%; color:blue;"><a href="pages-details-<?php echo $ccrow['id'];?>"><?php echo $ccrow['content_title'];?></a></li>
								
							 <?php } ?>
								</ul >
							</li>
								
							 <?php
							 
							}//inner while *///
							 ?>
							 
						  </ul>
					   </li>  
					
					<?php 
				}//if 
						?>
				</ul>
				<?php
				}elseif($id==40){
				include('inc/contact.php');
				}elseif($id==170){
				?>
				<?php
				$gal_res = $Advert->GetPhotosIdWithLimit(7);
				while($rowss = $Conn->fetchArray($gal_res))
				{
				 $GaleryImg  = $rowss['id'].".".$rowss['ext'];
				?>		
					<div class="image_gal">
						<a href="upload/top/<?php echo $GaleryImg;?>"><img src="upload/top/<?php echo $GaleryImg;?>"></a>
					</div>
					<div class="image_gal">
						<a href="upload/top/<?php echo $GaleryImg;?>"><img src="upload/top/<?php echo $GaleryImg;?>"></a>
					</div>
						
				<?php	
				}
				?>
				<?php
				}else{
				$cat = $Content->getById($id);
				$derow = $Conn->fetchArray($cat);
				?>
				<div class="subcatdesc">
				<h3><?php echo $derow['content_title']?></h3>
				<p><?php echo $derow['detail_description'];?></p>
				</div>
				
				<?php } ?>

<div class="clear"> </div>
			
<?php //include('inc/detail_tabs.php');?>

<!--div class="down_menu"> 
		<div class="heading"><a href="printable.php?id=<?php echo $rw['id'];?>" target="_blank" alt="" title=""> <h3> <img src="images/icons/Printer_16.png" alt="" title="" /> Printable Version </h3></a> </div>
		<div class="heading"> <a href="" alt="" title=""><h3> <img src="images/icons/Shuffle_crossing_arrows_16.png" alt="" title="" /> Tailormade Trip </h3></a> </div>
		<div class="heading"> <a class="big-link" data-reveal-id="myModal" data-animation="fade" href="#" alt="" title=""><h3> <img  src="images/icons/Clipboard_with_pencil__16.png" alt="" title="" /> Book This Trip </h3> </a></div>
		<div class="heading"> <a href="contact" alt="" title=""><h3> <img src="images/icons/Vintage_phone_receiver_16.png" alt="" title="" /> Contact Us </h3> </a></div>
		 </div -->


		 
		 
		 
		 
			<div id="myModal" class="reveal-modal" style="top:5%">
			<h2>Book This Trip</h2>
			<div>
			<?php  include('inc/booking_form.php');?>
			</div>
			<a class="close-reveal-modal">&#215;</a>
		</div>
		
		
		
		
			</div>	
			
			<div class= "detailright">
				<div class="head_testi">
			<i class="icon-list-ol icon-2x"></i> 
			<h3>Services</h3>
		</div>
		
			<div class="servicebox">
				<?php include('inc/detail_left.php');?>
			</div>
			
			
			<div style="margin-top:2%;"></div>
			<div class="head_testi">
			<i class="icon-male icon-2x"></i> 
			<h3>Traveller Info</h3>
		</div>
		
			<div class="servicebox">
				<?php include('inc/traveller_info.php');?>
			</div>
			
			<div style="margin-top:2%;"></div>
			
			
			<div style="border-radius:5px;" class="servicebox">
				<?php include('inc/downloadfile.php');?>
			</div>
			
					
			
				<?php //include('inc/trip_glance.php');?>
			
	
			
			</div>
		
	</div>
<br>
<div class="clear"> </div>

<?php include('inc/footer.php');?>
	</div>
</body>
</html>
