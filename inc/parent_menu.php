		<div class="container demo-1" id="mobilemwnu">	
			<div class="main clearfix">
				<div class="column">
					<div id="dl-menu" class="dl-menuwrapper">
						<button style="float:left;" class="dl-trigger">Open Menu</button>
							<p style="float:left; color:#fff; margin-left:5px;" > Menu </p>
						
						<ul class="dl-menu">
			
			<li><a href='home'>Home</a></li>
			<?php
				$presult=$Category->listParent();
			while($prow=$Conn->fetchArray($presult))
				{
					$cat_id = $prow['id'];
					$cat_name = $prow['name'];
					$arrow = $Category->geBycatid($cat_id);
					$count = $Conn->numRows($arrow);
				?>
			
					
					   <li><a href='pages-category-<?php echo $cat_id;?>'><?php echo $cat_name; //echo $cat_id; ?> <?php if($count>=1){?><i style="color:#f2c13f;" class="icon-caret-down"><?php }else{};?></i></a>
						  <ul class="dl-submenu">
						  <?php
						 // print child list
							$cresult = $Category->geBycatid($cat_id);
							 while($crow = $Conn->fetchArray($cresult))
							 {
							 
							 $nextrow = $Category->geBysubcatid($crow['id']);
							 $subarrow = $Conn->numRows($nextrow);
							 ?>
							 <li>
								 <a href="pages-subcategory-<?php echo $crow['id'];?>">
									<i style="color:#f2c13f;" class="icon-caret-right"> </i> <?php echo $crow['name'];?>
								 </a>
								<ul class="dl-submenu">
									<?php
										// print next child list
										$cresult1 = $Category->geBysubcatid($crow['id']);
										while($ccrow = $Conn->fetchArray($cresult1))
										{
										?>
											<li> <a href="pages-details-<?php echo $ccrow['id'];?>"><i style="color:#f2c13f;" class="icon-caret-right"> </i> <?php echo $ccrow['content_title'];?></a></li>
									<?php } ?>
								</ul>
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
			</div>
		
		