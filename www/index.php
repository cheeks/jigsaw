<?php
	require_once 'lib/php/Config.php';
	$settings = Config::getInstance();
	$settings->setPage("HomePage");

?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<?php
	require_once 'lib/php/includes/html_header.php';
	?>	
</head>
<body>
	<div id="PageWrapper">
		<header>
			<h1>
				puzzle test
			</h1>
		</header>

		<div id="MainContent" role="main">
			<div role="main">
				<canvas id="element-root" framerate="100"  width="800" height="600">No support for canvas was detected, human.</canvas>
			</div>

		</div>

		<footer>

		</footer>
	</div>
	<!--[if lt IE 7 ]>
	<script src="lib/js/plugins/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
	<script type="text/javascript"> window._app_vars = <?php echo $settings->app_vars_JSON(); ?>; </script>
	<?

	if($settings->environment == PROD){

	?>
	<!-- BEGIN PROD: javascript -->
	<script type="text/javascript">
	(function() {
	    var s = document.createElement('script');
	    s.type = 'text/javascript';
	    s.async = true;
	    s.src = 'lib/js/evbmaster-min.js';
	    var x = document.getElementsByTagName('script')[0];
	    x.parentNode.insertBefore(s, x);
	})();
	
	</script>
	<!-- END: javascript -->
	<?	

	}else{

	?>
	<!-- BEGIN <?php echo $settings->environment ?>: javascript -->
	<script src="lib/js/jquery/jquery-1.8.0.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="lib/js/master.js" type="text/javascript" charset="utf-8"></script>	
	<script src="lib/js/main.js" type="text/javascript" charset="utf-8"></script>
	<script src="lib/js/homePage.js" type="text/javascript" charset="utf-8"></script>
	<script src="lib/js/puzzle_builder.js" type="text/javascript" charset="utf-8"></script>


<script src="lib/js/Element/Basic.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/util.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/EventTarget.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/Animate.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/Filter.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/DisplayObject.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/Loop.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/Transform.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/Events.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/types/Bitmap.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/types/Path.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/types/Sprite.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/FrameTicker.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/Tweenie.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/canvas.js" type="text/javascript" charset="utf-8"></script>
<script src="lib/js/Element/element.js" type="text/javascript" charset="utf-8"></script>



	<!-- END: javascript -->
	<?	
	} 
	?>
	
	<script type="text/javascript">

  		var _gaq = _gaq || [];
  		_gaq.push(['_setAccount', '<?php echo $settings->analytics_id; ?>']);
  		_gaq.push(['_trackPageview']);
		
  		(function() {
  		  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  		  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  		  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  		})();

</script>
</body>
</html>