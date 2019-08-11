<?php 
		$result= $Group->getById(6);
		$row = $Conn->fetchArray($result);
		?>
		
			<ul>
			<?php
				$mresult=$Content->getByGroupIdlistParentWithLimits($row['id']);	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
			?>	
				<li><i class="icon-ok-circle"></i> <a href="pages-content-<?php echo $mrow['id'];?>"> <?php echo $mrow['content_title'];?></a></li>
			<?php
				}
			?>
			
			</ul>