
	<?php
	$result = $Group->getById(5);
	$row = $Conn->fetchAssoc($result);
	?>
		
				<ul>
						<?php
							$mresult=$Content->getByGroupIdlistParentWithLimits($row['id']);	
							while($mrow=$Conn->fetchAssoc($mresult))
							{
						?>
							<li><i class=" icon-minus-sign-alt"></i> <a href="pages-content-<?php echo $mrow['id'];?>"><?php echo $mrow['content_title'];?> </a></li>
						<?php
							}
						?>
				</ul>