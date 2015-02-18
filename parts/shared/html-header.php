<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
		<script type="text/javascript" src="//use.typekit.net/hbj0cwk.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>

			<script type='text/javascript'>
			var googletag = googletag || {};
			googletag.cmd = googletag.cmd || [];
			(function() {
			var gads = document.createElement('script');
			gads.async = true;
			gads.type = 'text/javascript';
			var useSSL = 'https:' == document.location.protocol;
			gads.src = (useSSL ? 'https:' : 'http:') + 
			'//www.googletagservices.com/tag/js/gpt.js';
			var node = document.getElementsByTagName('script')[0];
			node.parentNode.insertBefore(gads, node);
			})();
			</script>

			<script type='text/javascript'>
			googletag.cmd.push(function() {
			googletag.defineSlot('/12244649/ROS_Billboard', [970, 250], 'div-gpt-ad-1424262122172-0').addService(googletag.pubads());
			googletag.defineSlot('/12244649/ROS_HPU', [300, 600], 'div-gpt-ad-1424262122172-1').addService(googletag.pubads());
			googletag.defineSlot('/12244649/ROS_MPU_Top', [300, 250], 'div-gpt-ad-1424262122172-2').addService(googletag.pubads());
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
			});
			</script>
			<? if (is_tax()) : ?>
				<meta name="robots" content="noindex">
				<meta name="googlebot" content="noindex">
			<? endif; ?>
	</head>
	<body <?php body_class(); ?>>
