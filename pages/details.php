<div id="wrapper">
<div id="header">
	<?php include('inc/banner.php');?>
		<div class="clear"> </div>
		<div class="nav">
		<?php include('inc/nav.php');?>
		</div>	
	</div>
		<?php 
				$url =  $Conn->ReplaceUnderScore($_GET['pseudo_name']);
				if($url)
					{
						$row = mysqli_fetch_array($Conn-> execute("SELECT * FROM contents WHERE pseudo_name = '" .$url. "'"));
						$id=$row['id'];
					}
					else{
						$id=1;
					}
					
					
				$cat = $Content->getById($id);
				$derow = $Conn->fetchArray($cat);
				
				
		$result11=$Attachment->getByContentId($id);
		$counter = $Conn->numRows($result11);
			if($counter==0)
			{	
				echo "<div style='margin-top:13%;' class='margin'></div>";
			}else{
			include('inc/detail_slider.php');
			}
		?>
<div id="contents">
<div class="detail_mid">	
		<div class="leftsection" >
				
				
				<div class="subcatdesc">
				<h3><?php echo $derow['content_title']?></h3>
				<p><?php echo $derow['detail_description'];?></p>
				
				
<div class="clear"> </div>

	<span class='st_facebook_hcount' displayText='Facebook'></span>
	<span class='st_twitter_hcount' displayText='Tweet'></span>
	<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
	<span class='st_pinterest_hcount' displayText='Pinterest'></span>
	<span class='st_email_hcount' displayText='Email'></span>
	<span class='st_sharethis_hcount' displayText='ShareThis'></span> 
	<br>
	<br/>
	<div class="clear"> </div>

				</div>
				
				

<div class="clear"> </div>
			
<?php 
	if($id==137 || $id==157)
	{
	}else{
		include('inc/detail_tabs.php');
	}
	?>



		 
		 
		 
		 
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
