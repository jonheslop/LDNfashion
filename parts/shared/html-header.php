<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>

		<? global $post;
		if ($post) {
			$currentPostType = get_post_type();
			$content = $post->post_content;
			$outfit_layout = get_post_meta($post->ID, 'outfit_layout', true);
		} 
		if ( $currentPostType == 'voucher-code') : ?>
		<title><?php bloginfo( 'name' ); ?> | <?php echo $content; ?></title>
		<? else : ?>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<? endif; ?>
		<? if ( $outfit_layout ) : ?>
			<link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/d295cab0-5317-4d97-9218-2c2af7321d02.css"/>
		<? endif; ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
		<script src="https://use.typekit.net/yza4ilg.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<meta name="google-site-verification" content="xfCpaGH81BD3xk70uTYuqGBqIs_NHuyj7m99GdG2fUA" />
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
			googletag.defineSlot('/12244649/ROS_Leaderboard', [728, 90], 'div-gpt-ad-1444657406597-0').addService(googletag.pubads());
			googletag.defineSlot('/12244649/ROS_Billboard', [970, 250], 'div-gpt-ad-1424262122172-0').addService(googletag.pubads());
			googletag.defineSlot('/12244649/ROS_HPU', [300, 600], 'div-gpt-ad-1424262122172-1').addService(googletag.pubads());
			googletag.defineSlot('/12244649/ROS_MPU_Top', [300, 250], 'div-gpt-ad-1424262122172-2').addService(googletag.pubads());
			googletag.defineSlot('/12244649/Lower_Billboard', [970, 250], 'div-gpt-ad-1431803170704-0').addService(googletag.pubads());
			googletag.defineSlot('/12244649/Lower_HPU', [300, 600], 'div-gpt-ad-1431803170704-1').addService(googletag.pubads());
			googletag.defineSlot('/12244649/ROS_Mobile_Banner', [320, 50], 'div-gpt-ad-1444657301807-0').addService(googletag.pubads());
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
			});
			</script>
			<? if (is_tax()) : ?>
				<meta name="robots" content="noindex">
				<meta name="googlebot" content="noindex">
			<? endif; ?>

			<? if (is_page(48351)) : ?>
			<?php wp_redirect( 'http://ldnfashion.com/sample-sales', 301 ); exit; ?>
			<? endif; ?>

			<script type="text/javascript">(function(){var f=false,b=document,c=b.documentElement,e=window;function g(){var a="";a+="rt="+(new Date).getTime()%1E7*100+Math.round(Math.random()*99);a+=b.referrer?"&r="+escape(b.referrer):"";return a}function h(){var a=b.getElementsByTagName("head")[0];if(a)return a;for(a=c.firstChild;a&&a.nodeName.toLowerCase()=="#text";)a=a.nextSibling;if(a&&a.nodeName.toLowerCase()!="#text")return a;a=b.createElement("head");c.appendChild(a);return a}function i(){var a=b.createElement("script");a.setAttribute("type","text/javascript");a.setAttribute("src","http://s.clickiocdn.com/t/lb194102_258.js?"+g());typeof a!="undefined"&&h().appendChild(a)}function d(){if(!f){f=true;i()}};if(b.addEventListener)b.addEventListener("DOMContentLoaded",d,false);else if(b.attachEvent){c.doScroll&&e==e.top&&function(){try{c.doScroll("left")}catch(a){setTimeout(arguments.callee,0);return}d()}();b.attachEvent("onreadystatechange",function(){b.readyState==="complete"&&d()})}else e.onload=d})();</script>


	</head>
	<body <?php body_class(); ?>>
