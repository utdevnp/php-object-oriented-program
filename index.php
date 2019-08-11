<?php
ob_start();
 include('inc/headerfile.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<base href="<?php echo S_URL;?>">
<title>  ALLIANCE TREKS & EXPEDITION (P) LTD.</title>
<?php
	if(isset($_GET['id']))
	{
			$id = $_GET['id'];
				$cats = $Content->getById($id);
				$meta = $Conn->fetchArray($cats);
?>

		<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://www.gototrek.com/demo/pages-details-<?php echo $meta['id'];?>" />
<meta property="article:tag" content=" ALLIANCE TREKS & EXPEDITION (P) LTD" />
<?php
$result = $Attachment->getByContentId($_GET['id']);
	$row =$Conn->fetchArray($result);
	$meta_img = S_ATTACH_FILE_DIR.$row['id'].".".$row['myfile'];

?>
<meta property="og:image" content="http://www.gototrek.com/demo/<?php echo $meta_img; ?>" />

	<meta name="og:keywords" content=" <?php echo stripslashes($meta['keywords']);?>">
	<meta name="og:description" content="  <?php echo stripslashes($meta['meta_description']);?>">
<?php
	}else{
?>
	<meta name="keywords" content=" ALLIANCE TREKS & EXPEDITION (P) LTD">
	<meta name="description" content=" ALLIANCE TREKS & EXPEDITION (P) LTD.">
<?php	
	}
?>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/tabstyle.css" />
<link rel="stylesheet" href="css/reveal.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/responsiveslides.css" type="text/css">
<link rel="stylesheet" href="css/slider.css" type="text/css">
<link rel="stylesheet" href="css/animate.css" type="text/css">
<link rel="stylesheet" href="css/bjqs.css" type="text/css">
<link rel="stylesheet" href="css/demo.css" type="text/css">
<link rel="stylesheet" href="css/responsive.css" type="text/css">
<link rel="stylesheet" href="css/component.css" type="text/css">
<link rel="stylesheet" href="css/mobilemenu.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>



		
		
<script type="text/javascript" src="js/responsiveslides.js"></script>
 <script src="js/bjqs-1.3.min.js"></script>
 

  
<link rel="stylesheet" href="css/jssor-slider.css" type="text/css" />
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>

<script type="text/javascript" src="js/jquery.reveal.js"></script>

	
		
 
 
 
		<script type="text/javascript">
		jQuery(document).ready(function($) {
$(".merobest").click(function () {

    $morebest = $(this);
    //getting the next element
    $content = $morebest.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $morebest.text(function () {
            //change text based on condition
            return $content.is(":visible") ? "Collapse" : "Expand";
        });
    });

});
});
 </script>
 
	
	
 <script type="text/javascript">
    $(function () {
      $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
		 speed: 500,
         timeout: 10000,
        nav: true,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });

    });
  </script>
  
<script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });

        });
      </script>

	  

 
  
  <script type="text/javascript">

$(document).ready(function() {

	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
});

</script> 
  <script type="text/javascript">
$(window).scroll(function(){
      if ($(this).scrollTop() > 1720) {
          $('#glance').addClass('fixed');
      } else {
          $('#glance').removeClass('fixed');
      }
  });
  
  
</script>

<?php 
	if(isset($_POST['sendquote'])){
?>
<script>
  jQuery(document).ready(function ($) {
    	window.scrollBy(0,3000); // horizontal and vertical scroll increments
	  });
		</script>
<?php } ?>
<script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 4,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 160,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 277,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 100,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 4,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 4                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1350));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<script type="text/javascript">
//Created / Generates the captcha function
 function DrawCaptcha()
  {
  var a = Math.ceil(Math.random() * 7)+ '';
  var b = Math.ceil(Math.random() * 8)+ '';
  var c = Math.ceil(Math.random() * 2)+ '';
  var d = Math.ceil(Math.random() * 6)+ '';
  var e = Math.ceil(Math.random() * 8)+ '';
  var f = Math.ceil(Math.random() * 6)+ '';
  var g = Math.ceil(Math.random() * 8)+ '';
  var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f ;
  document.getElementById("txtCaptcha").value = code
  }
</script>
 <script type="text/javascript">
// Remove the spaces from the entered and generated code
 function removeSpaces(string){
  return string.split(' ').join('');
 }
</script>	
		
		<script>
// Validate the Entered input aganist the generated security code function
function check(input) {
  var cap =removeSpaces(document.getElementById('txtCaptcha').value);
if (input.value != cap ) {
  input.setCustomValidity("Error in code Please Check!");
  } else {
  // input is fine -- reset the error message
  input.setCustomValidity('');
  }
  }
 </script>
 

<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script> 

</head>

<body onload="DrawCaptcha();">

	<?php
	
	
	
						if(isset($_GET['pages']))
						{
							require_once('pages/' . $_GET['pages'] );
								
						}
						else
						{
							require_once('main.php');	
						}
					
	
	/*if($id==1)
	{
		include('main.php');
	}elseif($id==55){
		include('blog.php');
	}elseif($id==20){
		include('inc/link.php');
	}else{
		include('detail.php');
	}*/
	
	?>

<script>
	$(window).scroll(function() {
		$('.animatedElement').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+650) {
				$(this).addClass("fadeIn");
			}
		});
	});
</script>



<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-564076bd2a8011ed"></script>


</body>
</html>
	<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.dlmenu.js"></script>

  
  
  <script>
		$(document).ready(function() {
			$(function() { 
				$( '#dl-menu' ).dlmenu();
			});
		});
		</script>
<?php ob_end_flush();?>