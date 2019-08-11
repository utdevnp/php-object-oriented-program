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
				if(isset($_GET['grp_url']))
					{
					$row = mysqli_fetch_array($Conn-> execute("SELECT * FROM groups WHERE grp_url = '" . $_GET['grp_url'] . "'"));
					$id=$row['id'];
					}
					else{
					$id=1;
					}
					
				$cat = $Group->getById($id);
				$row = $Conn->fetchArray($cat);
				if($id==65)
				{
					header('Location:pages-category-10');
				}
				elseif($id==66)
				{
					header('Location:pages-category-12');
				}
				elseif($id==19)
				{
					header('Location:pages-details-69');
				}
				elseif($id==20)
				{
					header('Location:pages-details-70');
				}
				elseif($id==21)
				{
					header('Location:pages-details-71');
				}
				elseif($id==22)
				{
					header('Location:pages-details-76');
				}
				elseif($id==23)
				{
					header('Location:pages-details-74');
				}
				elseif($id==24)
				{
					header('Location:pages-details-75');
				}
				elseif($id==50)
				{
					header('Location:pages-details-73');
				}
				elseif($id==50)
				{
					header('Location:pages-details-73');
				}
				elseif($id==50)
				{
					header('Location:pages-details-73');
				}
				elseif($id==72)
				{
					header('Location:pages-details-175');
				}
				elseif($id==73)
				{
					header('Location:pages-details-174');
				}
				elseif($id==75)
				{
					header('Location:pages-details-177');
				}
				elseif($id==76)
				{
					header('Location:pages-details-178');
				}
				elseif($id==85)
				{
					header('Location:pages-details-193');
				}
				?>
				
				
				<div class="subcatdesc">
				<h3><?php echo $row['name']?></h3>
				<p><?php echo $row['description'];?></p>
				</div>
				
				<?php
				$cresult1 = $Category->geBysubcatid($id);
				 while($catrow = $Conn->fetchArray($cresult1))
				{
				?>
				<div class="subcat_cont">
				<?php
					$result = $Attachment->GetAttachmentOfContent($catrow['id'],1);
					while($row =$Conn->fetchArray($result))
					{
					$Image = S_ATTACH_FILE_DIR.$row['id'].".".$row['myfile'];
					?>
					<div class="subcatimg">
					<img src="<?php echo $Image;?>" alt="<?php echo $catrow['content_title'];?>"/>
					</div>
					<?php
					}
					?>
					<div class="subcatconte">
					<h4><a href="pages-details-<?php echo $catrow['id'];?>"><?php echo $catrow['content_title'];?></a></h4>
					<p><?php echo $Conn->textWithLimit($catrow['short_description'],400);?></p><br>
					<a class="readmoresub" href="pages-details-<?php echo $catrow['id'];?>">Read More [+]</a>
					</div>
				</div>
				<br>
				
				<?php		
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
