<?php 
include('inc/headerfile.php');

$result = $Content->getContentById($_GET['id']);
$row = $Conn->fetchArray($result);
?>

<h1><?php echo $row['content_title'];?></h1>

<p><?php echo $row['detail_description'];?></p>


<h2>Overview</h2>
<table>

						<tr style="paddig:5%;">
							<td> <img src="images/icons/Clock_16.png" alt="" title="" /> Duration: </td>
							<td><?php echo $row['duration'];?></td>
							<td><img src="images/icons/Bars_code_16.png" alt="" title="" /> Code:</td>
							<td><?php echo $row['code'];?></td>
						</tr>
						<tr>
							<td><img src="images/icons/Like_Button_16.png"  alt="" title="" /> Primary Activity: </td>
							<td> <?php echo $row['p_activity'];?></td>
							<td><img src="images/icons/Like_Button_16.png"  alt="" title="" /> Secondary Activity:</td>
							<td> <?php echo $row['s_activity'];?></td>
						</tr>
						<tr>
							<td> <img src="images/icons/Oval_clock_16.png"  alt="" title=""/> Group Size: </td>
							<td> <?php echo $row['g_size'];?> </td>
							<td><img src="images/icons/Oval_clock_16.png"  alt="" title=""/> Max Altitude: </td>
							<td><?php echo $row['maxalt'];?> </td>
						</tr>
						<tr>
							<td><img src="images/icons/Earth_16.png"  alt="" title="" /> Country: </td>
							<td><?php echo $row['country'];?> </td>
							<td><img src="images/icons/Front_of_bus_16.png" alt="" title="" /> Transportation:</td>
							<td><?php echo $row['transport'];?></td>
						</tr>
						<tr>
							<td><img src="images/icons/Airplane_flight_16.png"  alt="" title=""/> Arrival on: </td>
							<td><?php echo $rw['arrival'];?> </td>
							<td><img src="images/icons/Airplane_flight_16.png" alt="" title="">  Depature from:</td>
							<td><?php echo $rw['departure'];?></td>
						</tr>
						<tr>
						
							<td><img src="images/icons/Knife_and_fork_16.png" alt="" title="" /> Meals: </td>
							<td><?php echo $rw['meals'];?> </td>
							<td> </td>
							<td> </td>
						
						</tr>
						<tr>
							<td><img src="images/icons/Oval_clock_16.png" alt="" title="" /> Accomodation: </td>
							<td><?php echo $rw['accomode'];?> </td>
							<td> </td>
							<td> </td>
							
						</tr>
						
					</table>
					
<h2>Itinery</h2>	
<p><?php echo $row['itnary'];?></p>	


<h2>What's Included</h2>	
<p><?php echo $row['included'];?></p>		

<h2>Trip Details</h2>	
<p><?php echo $row['detail_description'];?></p>			
					
					
					
	<h2>Our Services</h2>				
					
		<?php
							$mresult=$Content->getByGroupIdlistParentWithLimits(7);	
							while($mrow=$Conn->fetchAssoc($mresult))
							{
						?>
							<li> <a href="<?php echo $mrow['pseudo_name'];?>"><?php echo $mrow['content_title'];?> </a></li>
						<?php
							}
						?>				
					
	

<pre> © Copyright 2013-<?php echo date('Y');?>. Alliance Treks & Expedition Pvt Ltd. All Right Reserved.</pre>	
					
					
					
					
					
					