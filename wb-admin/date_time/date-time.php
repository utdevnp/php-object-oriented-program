  
    <?php 	
		$calendar = new Nepali_Calendar();
		$now = new DateTime('Asia/Kathmandu');
		$now->format('Y-m-d H:i:s');
		$year = $now->format('Y');
		$month = $now->format('m');
		$day = $now->format('d');
		
		$cal = $calendar->eng_to_nep($year,$month,$day);
		$nepali_conversion = $cal['year'] . ' ' . $cal['nmonth'] . ' ' . $cal['date'] . " गते , ". $cal['day'];
		$myMonth = $Number->returnNepaliNum($nepali_conversion);
	?>
    
<script type="text/javascript">
// JavaScript Document
		function myTime(){
		var d = new Date();
		var hour=d.getHours();
		var minute=d.getMinutes();
		var second=d.getSeconds();
		
		if(minute < 10){
			minute = "0"+minute;
		}
		if(hour < 12){
			hour = hour + " : " + minute + " AM";
		}else{(hour>=12)
		hour = hour + " : " + minute + " PM";
		}
		
		$('#date-and-time').html(hour);
	}
	setInterval(function(){myTime()},1000);
</script>
        	
			<!--div class="date" style="margin-left:30px;"><span>वर्ष १, अंक ३९</span> | </div> 
            <div class="date"><span><?php //echo $now->format('l , F j , Y '); ?></span> | </div>
            <div class="date"><span><?php //echo $myMonth; ?></span> | </div> 
            <div class="date">Time : <span id="date-and-time"></span> </div-->
