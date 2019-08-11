<div class="bestsidebar">
		<div class="head_testi">
			<i class="icon-align-justify icon-2x"></i> 
			<h3>Testimonial</h3>
		</div>
		
		<div class="testimunial">
			<?php
			$mresult=$Content->getByGroupIdlistParentWithLimits(3);	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
				?>
				<?php
				$result1 = $Attachment->GetAttachmentOfContent($mrow['id'],1);
				while($row1 =$Conn->fetchArray($result1))
				{
				$Image1 = S_ATTACH_FILE_DIR.$row1['id'].".".$row1['myfile'];
				?>
				<div align="center">
			<img src="<?php echo $Image1;?>" title="<?php echo $row1['title'];?>" alt="<?php echo $row1['title'];?>"/>
			</div>
			<?php
				}
			?>
				<h3 align="center"><?php echo $mrow['content_title'];?> </h3>
				<p><?php echo $Conn->textWithLimit($mrow['short_description'],200);?> </p>
				<p align="right"> <a class="readmore" href="<?php echo $mrow['pseudo_name'];?>" alt="">  <?php echo S_READ_MORE;?>  </a> </p> 
			<?php
				}
				
			?>
		</div>
		 
		<div style="margin-top:1.5%;" class="head_testi">
			<i class="icon-facetime-video icon-2x"></i> 
			<h3>Video</h3>
		</div>
			<div class="testimunial">
				<?php
				$result = $Videos->getByVideoIdWithLimit(1,1,"DESC");
		while($row1=$Conn->fetchArray($result))
		{
		?>
		<iframe width="98.5%" height="250" style="padding:5px;" src="https://www.youtube.com/embed/<?php echo $row1['url'];?>?rel=0" frameborder="0" allowfullscreen></iframe>
		<?php
		}
		?>
			</div>
		
		
	</div>