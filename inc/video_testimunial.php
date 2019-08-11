<div class="content5">
	
		<div class="video">
		<?php
		$result = $Video->getById(1);
		$row = $Conn->fetchArray($result);
		?>
		<h2><?php echo $row['name'];?>  </h2>  <h4> <a href="#" alt="" title=""> <?php echo S_VIEW_MORE;?> </a> </h4>
		<?php
		$result = $Videos->getByVideoIdWithLimit(1,1,"DESC");
		while($row1=$Conn->fetchArray($result))
		{
		?>
		<iframe width="98.5%" height="315" style="padding:5px;" src="https://www.youtube.com/embed/<?php echo $row1['url'];?>?rel=0" frameborder="0" allowfullscreen></iframe>
		<?php
		}
		?>
		</div>
		
		<div class="testimonial">
		<?php
	$result = $Group->getById(6);
	$rows = $Conn->fetchArray($result);
	?>
		<h2> <?php echo $rows['name'];?></h2>  <h4> <a href="#" alt="" title=""> <?php echo S_VIEW_MORE;?> </a> </h4>
			<?php
			$mresult=$Content->getByGroupIdlistParentWithLimits($rows['id']);	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
				?>
			<div class="text">
				<h3><?php echo $mrow['content_title'];?> </h3>
				<p><?php echo $mrow['short_description'];?> </p>
				<p align="right"> <a class="readmore" href="<?php echo $mrow['pseudo_name'];?>" alt=""s>  <?php echo S_READ_MORE;?>  </a> </p> 
			</div>
			<?php
				$result1 = $Attachment->GetAttachmentOfContent($mrow['id'],1);
				while($row1 =$Conn->fetchArray($result1))
				{
				$Image1 = S_ATTACH_FILE_DIR.$row1['id'].".".$row1['myfile'];
				?>
			<div class="image">
			<img src="<?php echo $Image1;?>" title="<?php echo $row1['title'];?>" alt="<?php echo $row1['title'];?>"/>
			
			</div>
			<?php
				}
				}
			?>
		
		</div>
	</div>