<ul class="accordion">
								<li>
								<a style="color:#fff;" href="index.php?folder=group&file=list_group.php">Group</a>								
								</li>
								
								<li><a style="color:#fff;" href="index.php">Home</a></li>
								
								<li>

									<a style="color:#fff;" href="#cmsmanager">CMS Manager</a>
									<ul>
									
									<li ><a href="index.php?folder=group&file=add_group.php">Add New Group</a></li>
									<li ><a href="index.php?folder=content&file=list_content.php&group_id=1">Main Menu</a></li>
									
									<?php
								$presult=$Group->listParent();
                                    while($prow=$Conn->fetchArray($presult))
                                    {
                                        $parent_id = $prow['id'];
                                        $parent_name = $prow['name'];
                                        //$pseudo = $prow['pseudo_name'];
                                         										
													$child_count = $Group->countChildren($parent_id);
                                                
													if($child_count>0)
													{
												?>
												<li>
													<img  style="float:left; padding:7px;margin-top:2px;"src="graphics/list_icon.gif"/><a style="color:#fff;" href="#australia-melbourne"> <?php echo $parent_name; ?></a>	
													<?php
												  //print child list
													 $cresult = $Group->listChildren($parent_id);
													 while($crow = $Conn->fetchArray($cresult))
													 {
													 ?>
													<div><span> <a class="child_heading" href="index.php?folder=content&file=list_content.php&group_id=<?php echo $crow['id'];?>"><?php echo $crow['name'];?></a></span></div>
													  <?php
														 }//inner while
													  ?>
												</li>
												<?php
                                           }//if
										   else
										   {
                                            ?>
											<li>
													<a style="color#fff;" href="#australia-melbourne"><?php echo $parent_name; ?></a>
											</li>
											<?php
											}
											}
											?>
											</ul>
										</li>	

								<li>  <a style="color:#fff;" href="index.php?folder=feedback&file=list_feedback.php">Feedback Manager</a></li>
								<li><a style="color:#fff;" href="index.php?folder=gallery&file=list_gallery.php">Slider</a></li>
                                <li><a style="color:#fff;" href="index.php?folder=video_album&file=list_video.php">Ad Manager</a></li>
								<li><a style="color:#fff;" href="index.php?folder=advertisement&file=list_advertisement.php">Gallery</a></li>
								<li><a style="color:#fff;" href="index.php?folder=user&file=list_user.php">User Management</a></li>	
							
						</ul>	