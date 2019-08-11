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
				$cat = $B->getById($id);
				$derow = $Conn->fetchArray($cat);
				?>
				<div class="subcatdesc">
				<h3><?php echo $derow['name']?></h3>
				<p><?php echo $derow['loaction'];?></p>
				</div>
				
				

<div class="clear"> </div>

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
