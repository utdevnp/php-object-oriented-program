<div class="content3">
		<div class="intro">
		<?php
		$mresult=$Content->getByGroupIdlistParentWithLimits(2);	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
		?>
		<h2><?php echo $mrow['content_title'];?></h2>
		 <p><?php echo $mrow['short_description'];?></p>
		  <p align="right"> <a style="color:#333;"class="readmore" href="pages-content-<?php echo $mrow['id'];?>" alt="">  <?php echo S_READ_MORE;?>  </a> </p> 
		  <?php
				}
		  ?>
		  </div>
		
		
		</div>