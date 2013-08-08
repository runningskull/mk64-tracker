<?php
$titles = array('Mushroom', 'Flower', 'Star', 'Special');
$races = array(
    array('Luige', 'Moo to the Mizow', 'The Beach', 'Kalihari'),
    array('Todd\'s Turnpike', 'Frappe Snowland', 'Choke-o Mountain', 'Mario Raceway'),
    array('Wario Stadium', 'Sorbetland', 'Raceway Royale', 'Bowser\'s Castle'),
    array('DK Parkway', 'Yosh Valley', 'Banshee Boardwalk', 'Never-Play'),
);
?>

<!DOCTYPE html>

<html lang="en" class="no-js">
<!-- the "no-js" class is for Modernizr. -->

<head class="html5reset-kitchensink-commented">
	<meta charset="utf-8" />

	<title>MK to the 64</title>

	<meta name="description" content="MarioKart64 Time Tracker" />
	<!-- Google will often use this as its description of your page/site. Make it good. -->

	<meta name="author" content="Juan Patten" />
	<meta name="Copyright" content="Copyright Juan Patten 2010. All Rights Reserved." />

	<meta name="DC.title" content="MarioKart64 Time Tracker" />
	<meta name="DC.subject" content="Made to track the best times on the courses of MK64" />
	<meta name="DC.creator" content="Juan Patten (http://juanpatten.com)" />

	<meta name="google-site-verification" content="" />
	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->

<!--     <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> -->
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,minimum-scale=1 user-scalable=no,width = 320" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<link rel="shortcut icon" href="_/img/favicon.png"/>
	<!-- This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK
		 - see wikipedia for info on browser support: http://mky.be/favicon/ -->

	<link rel="apple-touch-icon" href="_/img/custom_icon.png"/>
	<!-- The is the icon for iOS's Web Clip.
		 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4's retina display (IMHO, just go ahead and use the biggest one)
		 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
		 - Transparency is not recommended (iOS will put a black BG behind the icon) -->

	<link rel="stylesheet" href="_/css/main.css" />
	<!-- main.css is a gateway file. You will spend your time in core.css -->
<!--
	<link rel="stylesheet" href="_/jqtouch/jqtouch.css">
	<link rel="stylesheet" href="_/jqtouch/themes/apple/theme.min.css">
-->

	<link rel="stylesheet" href="_/css/_print/main.css" media="print" />

	<!-- These are IE-specific conditional style sheets.
		 You might consider removing the ones you don't end up using. -->

	<!--[if IE]>
	<link rel="stylesheet" href="_/css/patches/win-ie-all.css" />
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" href="_/css/patches/win-ie7.css" />
	<![endif]-->
	<!--[if lt IE 7]>
	<link rel="stylesheet" href="_/css/patches/win-ie-old.css" />
	<![endif]-->

	<!-- The following is STRONGLY OPTIONAL, but useful if you really need to kick IE in the pants.
		 There are different flavors; pick the one right for your project: http://code.google.com/p/ie7-js/ -->
	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js"></script>
	<![endif]-->

	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="_/js/jquery.timeago.js"></script>
	<script src="_/js/functions.js"></script>

	<!-- Either Modernizr OR the HTML5 Shiv script is required if you want IE compatability, AND you want to use the new,
		 more-semantic HTML5 elements (header, article, footer, etc)
		 - we've only included Modernizr; HTML5 Shiv can be found here: http://html5shiv.googlecode.com -->

	<!-- MODERNIZR: http://www.modernizr.com/
		 If you're using this, you don't need the HTML5 Shiv script below -->
	<script src="_/js/modernizr-1.5.min.js"></script>

	<!-- don't forget Google Analytics -->

    <!-- TypeKit -->
    <script type="text/javascript" src="http://use.typekit.com/<YOUR_CODE>.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
