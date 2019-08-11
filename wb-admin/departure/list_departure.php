		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#content_table').dataTable();
			} );
		</script>
        
    
    	<div align="right">
		<h2 style="float:left; margin-left:5px; background:url(graphics/addnew/Link-icon.png) no-repeat; text-indent:40px; Padding:5px;">Departure Management </h2>
		 <a style="float:right; margin-right:5px;" href="index.php?folder=departure&file=list_departure.php"><img src="graphics/addnew/go_back.gif" height="40" width="40" alt="Go Back" title="Click Here To Go Back"  /></a> 
		 <a style="float:right;  margin-right:10px;" href="index.php?folder=departure&file=add_departure.php"><img src="graphics/addnew/add.png" height="40" width="40"  alt="Go Back" title="Click Here To Add New Group"  /></a> 
	</div>
	
	
	<div style="clear:both;"></div>
  
  <div class="message">
			<?php
			if(isset($_GET['msg']))
			{
			?>
		<h5><?php echo $_GET['msg'];?></h5>
				<?php
			}
		?>
	</div>
	
	<div style="clear:both;"></div>
	
<table border="0"  align="left" cellspacing="0" width="100%"  cellpadding="5" id="content_table">
    <thead>
        <tr>
			<th>ID</th>
			<th>Product Name</th>
		
            <th>Category</th>
			<th>No of Departure</th>
          
			<th>Status</th>
			 
            <th colspan="6"><a href="index.php?folder=departure&file=add_departure.php"><strong title=" Click Here To Add New Gallery" >Add New Group</strong></a></th>
        </tr>
    </thead>
    <tbody>
	<?php
	//get all record from gallery table
		$result = $departure->getAllByGrp();
	?>
		<div class="record">
			<?php
				$count = $Conn->numRows($result);
				echo "<h5>".$count." Record(s) found </h5>";
			?>
		</div>
	<?php
		WHILE($row = $Conn->fetchArray($result))
		{
		?>
			<tr>	
				<td> <?php echo $row['id'];?> </td>
				<td class="name"> 
					<b><?php 
					
					$product = $Content -> getById($row['group_id']);
					$product_row = $Conn -> fetchArray($product);
					echo $product_row['menu_name'];

					?>	</b>
                </td>
				<td><?php
					$Group1 = $Group -> getById1($product_row['group_id']);
				$GrpRow = $Conn -> fetchArray($Group1);
				
				$Cate = $Category -> getById1($GrpRow['group_id']);
				$CateRow = $Conn -> fetchArray($Cate);
				
			
				echo $CateRow['name'];
				
				
				 ?></td>
				<td> 
					<?php 
					
					$ttlNum = $departure -> getConByGrop($row['group_id']);
					$ttlRowNum = $Conn -> numRows($ttlNum);
					echo $ttlRowNum;
					
					
					?>
                </td>
				
                
				
            
				
               	<td> <a href="index.php?folder=departure&file=all_list.php&id=<?php echo $row['group_id'];?>">
                <img style="float:left;" src="graphics/view.png" width="25" height="25" alt="View" title="View" /><small title="view" class="edit">view</small> </a>	</td>
                <td>
                
                </td>                                
                
			</tr>
		<?php
		}//while
		?>
		</tbody>
	</table>
    </div>