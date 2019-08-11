<div id="wrapper">
<div id="header">
	<?php include('inc/banner.php');?>
		<div class="clear"> </div>
		<div class="nav">
		<?php include('inc/nav.php');?>
		</div>	
	</div>
		<?php include('inc/slider.php');?>
<div class="clear"> </div>
<div id="contents">
<div class="detail_mid">	
		<div class="leftsection" >
				
				<?php
				
					if(isset($_GET['cat_url']))
					{
					$row = mysqli_fetch_array($Conn-> execute("SELECT * FROM category WHERE cat_url = '" . $_GET['cat_url'] . "'"));
					$id=$row['id'];
					}
					else{
					$id=1;
					}
						
				if($id==15){
					header('Location: pages-subcategory-32');
				}
				$cat = $Category->getById($id);
				$row = $Conn->fetchArray($cat);
				?>
				<h3 style="padding:0px;margin:0px; font-size:20px;"><?php echo $row['name']?></h3>
				
				<?php
				if($id == 1)
				{
				$resultss=$Category->getByMainIdLimits(1);
				while($gdrrow = $Conn->fetchArray($resultss))
				{
				?>
				<div class="catagorie">
					<h4><a href="pages-subcategory-<?php echo $gdrrow['id'];?>"><?php echo $gdrrow['name'];?></a></h4>
					<p><?php echo $Conn->textWithLimit($gdrrow['description'],500);?></p><br>
						<a class="readmorecat" href="pages-subcategory-<?php echo $gdrrow['id'];?>">Read More [+]</a>
				</div>
				<?php		
				}
				}else{
					
				$resultss=$Category->getByMainIdLimits($id);
				while($gdrrow = $Conn->fetchArray($resultss))
				{
				?>
				<div class="catagorie">
					<h4><a href="pages-subcategory-<?php echo $gdrrow['id'];?>"><?php echo $gdrrow['name'];?></a></h4>
					<p><?php echo $Conn->textWithLimit($gdrrow['description'],500);?></p><br>
						<a class="readmorecat" href="pages-subcategory-<?php echo $gdrrow['id'];?>">Read More [+]</a>
				</div>
				<?php				
				}
				}
				?>

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
