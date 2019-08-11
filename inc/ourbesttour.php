<div class="content4"> 
<div class="bestseller">

	<div class="bestsaller_head">
	<h2> OUR BEST SELLER</h2>  <a href="#" alt=""> </a> 
	</div>
		<?php
		$mresult=$Content->getAll();	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
				
				if($mrow['display']=='Y')
				{
				
			?>
				<div class="service" id="bestPro">
		
				<?php
				$result1 = $Attachment->GetAttachmentOfContent($mrow['id'],1);
				while($row1 =$Conn->fetchArray($result1))
				{
				$Image1 = S_ATTACH_FILE_DIR.$row1['id'].".".$row1['myfile'];
			?>
			<div align="center">
				<img  class="animatedElement" src="<?php echo $Image1;?>" alt="<?php echo $row1['title'];?>" title="<?php echo $mrow['content_title'];?>" />
			</div>
			<?php
			}
			?>
			<div class="trip_title">
				 <a  href="pages-bestseller-<?php echo $mrow['id'];?>" alt=" <?php echo $row1['title'];?>" title=" <?php echo $row1['title'];?>">  <?php echo $mrow['content_title'];?> </a>
			</div>
			<p> Duration: <?php echo $mrow['duration'];?> </p>
			<div class="clear"></div>
			
		</div>
		<?php
		}
		}
	
		?>
		<div class="clear"></div>
		
			<div class="container">
    <div class="merobest"><span> + Expand</span>  </div>
    <div class="content">
       <?php
				$mresult=$Content->getAll();	
				while($mrow=$Conn->fetchAssoc($mresult))
				{
				
				if($mrow['display']=='Y')
				{
				
			?>
				<div id="bestPro" style="height: 280px;width: 98%; float:left;" class="service">
		
				<?php
				$result1 = $Attachment->GetAttachmentOfContent($mrow['id'],1);
				while($row1 =$Conn->fetchArray($result1))
				{
				$Image1 = S_ATTACH_FILE_DIR.$row1['id'].".".$row1['myfile'];
			?>
			<div align="center">
				<img  class="animatedElement" src="<?php echo $Image1;?>" alt="<?php echo $row1['title'];?>" title="<?php echo $mrow['content_title'];?>" />
			</div>
			<?php
			}
			?>
			<div class="trip_title">
				 <a  href="pages-bestseller-<?php echo $mrow['id'];?>" alt=" <?php echo $row1['title'];?>" title=" <?php echo $row1['title'];?>">  <?php echo $mrow['content_title'];?> </a>
			</div>
			<p> Duration: <?php echo $mrow['duration'];?> </p>
			<div class="clear"></div>
			
		</div>
		<?php
		}
		}
	
		?>
    </div>
</div>
		  
		 
		 
		<div class="clear"></div>


	</div>
	
	
	
	</div> 