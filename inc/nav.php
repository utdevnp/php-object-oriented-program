	<?php include('inc/parent_menu.php');?>

<div class="menu">
<div class="inner_menu">
<div id='cssmenu'>
				<ul>
			
			<li class='has-sub'><a href='home'><span>Home</span></a>
			<?php
				$presult=$Category->listParent();
			while($prow=$Conn->fetchArray($presult))
				{
					$cat_id = $prow['id'];
					$cat_name = $prow['name'];
					$cat_url = $prow['cat_url'];
					$arrow = $Category->geBycatid($cat_id);
						$count = $Conn->numRows($arrow);
				?>
					   <li class='has-sub '><a href='package-<?php echo $cat_url;?>'><span><?php echo $cat_name; //echo $cat_id; ?> <?php if($count>=1){?><i style="color:#f2c13f;" class="icon-caret-down"><?php }else{};?></i></span></a>
						 <ul id="<?php if($cat_id ==13){echo "smallUl";}if($cat_id ==6){echo "customized";};?>">
						  <?php
						 // print child list
							$cresult = $Category->geBycatid($cat_id);
							 while($crow = $Conn->fetchArray($cresult))
							 {
							 
							 $nextrow = $Category->geBysubcatid($crow['id']);
							 $subarrow = $Conn->numRows($nextrow);
							 ?>
							 <li class='has-sub'>
								 <a href="product-<?php echo $crow['grp_url'];?>"><span>
									<i style="color:#f2c13f;" class="icon-caret-right"> </i> <?php echo $crow['name']; //echo $crow['id']  ?></span>
								 </a>
								<ul class="<?php if($crow['id']==62){echo "leftMenu";};?>">
								 <?php
								 
						 // print next child list
							$cresult1 = $Category->geBysubcatid($crow['id']);
							 while($ccrow = $Conn->fetchArray($cresult1))
							 {
							 ?>
								
							 
									<li> <a href="trip-<?php echo $Conn->ReplaceDash($ccrow['pseudo_name']);?>"><i style="color:#f2c13f;" class="icon-caret-right"> </i> <?php echo $ccrow['content_title'];?></a></li>
								
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
			 </div>
			</div>
			</div>