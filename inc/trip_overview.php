<div class="trip-overview">
                                <table width="100%" class="table responsive">
                                    <tbody><tr class="bordder">
                                            <td width="20%"><i class="icon-time"></i><span class="desctiption-title "> Duration:</span></td>
                                            <td width="30%"><?php echo $derow['duration'];?></td>
                                            <td width="20%"><i class="icon-code"></i> <span class="desctiption-title"> Trip Code:</span></td>
                                            <td width="30%"><?php echo $derow['code'];?></td>
                                        </tr>
                                             <tr class="bordder">
                                            <td><i class="icon-hand-right "></i><span class="desctiption-title"> Route:</span></td>
                                            <td><?php echo $drow['route'];?> </td>
                                            <td><i class="icon-hand-right "></i><span class="desctiption-title"> Second activity:</span></td>
                                            <td>n/a</td> 
                                        </tr>
                                        
                                        <tr class="bordder">
                                            <td><i class="icon-group"></i><span class="desctiption-title"> Group size:</span></td>
                                            <td><?php echo $drow['g_size'];?>
                                            </td>

                                            <td><i class="icon-bar-chart"></i><span class="desctiption-title"> Max-Altitude:</span></td>
                                            <td>
											<?php echo $drow['maxalt'];?> 
											</td>
											</tr>
                                        <tr class="bordder">
                                        <td><i class="icon-globe"></i><span class="desctiption-title"> Country:</span></td>
                                            <td><?php echo $drow['nepal'];?> </td>
                                             <td><i class="icon-road"></i><span class="desctiption-title"> Transportation:</span></td>
                                            <td><?php echo $drow['transport'];?> </td>
                                         
                                        </tr>
                                   
                                        <tr class="bordder">
                                            <td><i class="icon-plane"></i><span class="desctiption-title"> Arrival on:</span></td>
                                            <td><?php echo $drow['arrival'];?></td>
                                            <td><i class="icon-plane"></i><span class="desctiption-title"> Departure from:</span></td>
                                            <td><?php echo $drow['departure'];?></td>
                                        </tr>
                                        
                                      
                                        <tr class="bordder">
                                           
                                           
                                                                                        <td><i class="icon-random"></i><span class="desctiption-title"> Trip grade:</span></td>
                                            <td colspan="3">	 <a class="tooltips" href=""><?php echo $drow['grade'];?><span class="gradeIcon grade2">&nbsp;</span></a>	</td>

                                                                                    </tr>
                                                                                  <tr>
                                            <td><i class="icon-food"></i><span class="desctiption-title"> Meals:</span></td>
                                            <td colspan="3"> <?php echo $drow['meals'];?></td>
                                           
                                        </tr>
                                                                                                                        <tr>
                                            <td><i class="icon-chevron-sign-right "></i><span class="desctiption-title"> Accomodation:</span></td>
                                            <td colspan="3"> <?php echo $drow['accomode'];?></td>

										</td>
                                            
                                        </tr>
							</table>
							
							
							
							<div class="clear"></div>	
					<hr>
					<div class="clear"></div>	
					<h3>Releted Products</h3>
				
				
				<div class="clear"></div>		
				
				
				<?php
									//echo $derow['group_id'];
				$cresult1 = $Category->geBysubcatid($derow['group_id']);
				 while($catrow = $Conn->fetchArray($cresult1))
				{
				?>
				<div class="subcat_cont">
				<?php
					$result = $Attachment->GetAttachmentOfContent($catrow['id'],1);
					while($row =$Conn->fetchArray($result))
					{
					$Image = S_ATTACH_FILE_DIR.$row['id'].".".$row['myfile'];
					?>
					<div class="subcatimg">
					<img src="<?php echo $Image;?>" alt="<?php echo $catrow['content_title'];?>"/>
					</div>
					<?php
					}
					?>
					<div class="subcatconte">
					<h4><a href="pages-details-<?php echo $catrow['id'];?>"><?php echo $catrow['content_title'];?></a></h4>
					<p><?php echo $Conn->textWithLimit($catrow['short_description'],400);?></p><br>
					<a class="readmoresub" href="pages-details-<?php echo $catrow['id'];?>">Read More [+]</a>
					</div>
				</div>
				<br>
				
				<?php		
				}
				?>
				
				
				
				<div class="clear"></div>		
		</div>		
				
				
