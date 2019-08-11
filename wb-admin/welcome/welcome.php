
    <div class="admin_icon">
    <a href="index.php?folder=group&file=list_group.php&sub=n">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/group_icon.png"/>
            </div>
            <p class="under_title"> Content Manager </p>
        </div>
      </a>
      

      <a href="index.php?folder=group&file=list_group.php&sub=y">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/menu_icon.png"/>
            </div>
            <p class="under_title"> Sub Category Manager </p>
        </div>
      </a>
      
      
      <a href="index.php?folder=img&file=list_img.php">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/feedback.png"/>
            </div>
            <p class="under_title"> Costumer Manager </p>
        </div>
      </a>
      
       <a href="index.php?folder=video_album&file=list_video.php">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/video_icon.png"/>
            </div>
            <p class="under_title"> Videos Manager </p>
        </div>
      </a>
	  
	  
	   <a href="index.php?folder=middlead&file=list_middlead.php">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/downloads.gif"/>
            </div>
            <p class="under_title"> Download Manager </p>
        </div>
      </a>
      
      
      <a href="index.php?folder=gallery&file=list_gallery.php">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/slider_icon.png"/>
            </div>
            <p class="under_title"> Slider Manager </p>
        </div>
      </a>
      
      <a href="index.php?folder=advertisement&file=list_advertisement.php">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/gallery_icon.png"/>
            </div>
            <p class="under_title"> Gallery Manager </p>
        </div>
      </a>
      
     <a href="index.php?folder=map&file=list_map.php">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/map.png"/>
            </div>
            <p class="under_title"> Map Manager </p>
        </div>
      </a>
      
      <a href="index.php?folder=user&file=list_user.php">
    	<div class="icon">
        	<div align="center">
        		<img src="graphics/user_icon.png"/>
            </div>
            <p class="under_title"> User Manager </p>
        </div>
      </a><br />
        
        
    	
    </div>
    
    <div class="list_shortcut">
    	<div class="Latest_title">
        	<h4> Latest >>  Related Treks</h4>
        </div>
        <div class="Latest_descripton">
        	<ul>
							<?php
									$mresult = $Content->getVisibleByGroupIdWithLimit(3,2,"desc");
									while($mrow = $Conn->fetchArray($mresult))
									{
									?>
									<li> <a  href=""><?php echo $mrow['content_title'];?></a></li> 
									<?php
									}//while
									?>
       			
             </ul>
             
        </div>
        
        <div class="Latest_title">
        	<h4> Latest >>  Most Wanted Trips 2015</h4>
        </div>
        <div class="Latest_descripton">
        	<ul>
								<?php
									$mresult = $Content->getVisibleByGroupIdWithLimit(2,2,"desc");
									while($mrow = $Conn->fetchArray($mresult))
									{
									?>
									<li> <a  href=""><?php echo $mrow['content_title'];?></a></li> 
									<?php
									}//while
									?>
             </ul>
             
        </div>
        
        <div class="Latest_title">
        	<h4> Latest >>  Nepal Trekking</h4>
        </div>
        <div class="Latest_descripton">
        	<ul>
								<?php
									$mresult = $Content->getVisibleByGroupIdWithLimit(5,2,"desc");
									while($mrow = $Conn->fetchArray($mresult))
									{
									?>
									<li> <a  href=""><?php echo $mrow['content_title'];?></a></li> 
									<?php
									}//while
									?> 
             </ul>
             
        </div>
        
    </div>
    
    <div  style="clear:both;"></div>
    
    
    
     


























<!--<p style="padding:20px;">You can use this control panel to update your entire website contents. If you encounter any problem, please contact following</p><br/>
    
	<hr />
	
   <p style="padding:20px;"><strong> Website :  </strong>   <a style="text-decoration:none;" href="http://www.webbanknepal.com">www.webbanknepal.com</a><p><br/>
		<hr />
	
    <p style="padding:20px;"><strong> Email :  </strong>  info@webbanknepal.com</p> <br/>
		<hr />
    <p style="padding:20px;"><strong> Phone : </strong>  01-4484934</p><br/>-->
