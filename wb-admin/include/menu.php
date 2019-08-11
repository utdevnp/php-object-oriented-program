<ul id="nav">
	<li><a href="index.php">Admin Home</a></li>
    <li><a href="index.php?folder=category&file=list_category.php">Main Category</a>
		<ul>
			<li><a href="index.php?folder=group&file=list_group.php&sub=y">Sub Category</a></li>
			<li><a href="index.php?folder=branch&file=list.php">Trip Glance</a></li>
			<li><a href="index.php?folder=reviews&file=list.php">Reviews</a></li>
		</ul>
	</li>
       <li><a href="index.php?folder=activity&file=list_activity.php">Activity</a></li>
     
	<li><a href="index.php?folder=group&file=list_group.php&sub=n"> Group Manager  </a>
		<ul>
			<?php
			
			 $result =$Group->getAll('n'); 
				while($row = $Conn-> fetchArray($result))
				{
				?>
				 <li><a style="" href="index.php?folder=content&file=list_content.php&sub=<?php echo 'n'; ?>&group_id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>
				 <?php
				}
			?>
		</ul>
		<div class="clear"></div>
	</li>
    <li><a href="index.php?folder=altitude&file=list_altitude.php">Height/Altitude  </a></li>
    <li><a href="index.php?folder=departure&file=list_departure.php">Departure Manager </a></li>
	
	<li><a href="">Media Manager</a>
   <ul>
       <li><a href="index.php?folder=gallery&file=list_gallery.php">Slider Manager</a></li>
       <li><a href="index.php?folder=advertisement&file=list_advertisement.php">Gallery  Manager</a></li>
       <li><a href="index.php?folder=video_album&file=list_video.php">Videos Manager</a></li>
	   <li><a href="index.php?folder=middlead&file=list_middlead.php">Download Manager</a></li>
      </ul>
    </li>
	
    </li>
	<li><a href="">Other</a>
    	<ul>
        	<li><a href="index.php?folder=link_album&file=list_link.php">Links Manager</a></li>
            <li><a href="index.php?folder=social&file=edit_social.php&id=1">Social Media Manager</a></li>
        </ul>
    </li>
	<li><a href="index.php?folder=user&file=list_user.php">User Manager</a>
	<ul>
		<li><a href="index.php?folder=user&file=edit_user.php&id=1">Change Password</a></li>
	</ul>
	
		<div class="clear"></div>
	</li>
	<li><a href="index.php?folder=support&file=support.php">Support</a></li>
</ul>