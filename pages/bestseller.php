<div id="wrapper">
<div id="header">
	<?php include('inc/banner.php');?>
		<div class="clear"> </div>
		<div class="nav">
		<?php include('inc/nav.php');?>
		</div>	
	</div>
		<?php include('inc/detail_slider.php');?>
<div id="contents">
<div class="detail_mid">	
		<div class="leftsection" >
				
				<?php
				$id = $_GET['id'];
				$cat = $Content->getById($id);
				$derow = $Conn->fetchArray($cat);
				?>
				<div class="subcatdesc">
				<h3><?php echo $derow['content_title']?></h3>
				<p><?php echo $derow['detail_description'];?></p>
				</div>
				
				

<div class="clear"> </div>
			
<?php include('inc/detail_tabs.php');?>

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
			
					
			
				<?php include('inc/trip_glance.php');?>
			
	
			
			</div>
		
	</div>
<br>
<div class="clear"> </div>

<?php include('inc/footer.php');?>
	</div>
</body>
</html>
