<aside id="sidebar" class="cf">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Top')); ?>
	<section class="sidebar_section wrapper social_section">
		<div class="follow_button facebook">
			<div class="fb-like" data-href="https://facebook.com/ldnfashion" data-width="250" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		</div>
		<div class="follow_button twitter">
			<a href="https://twitter.com/ldnfashion" class="twitter-follow-button" data-show-count="false">Follow @ldnfashion</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>			
		</div>
		<div class="cf follow_button pinterest">
			<a data-pin-do="buttonFollow" href="http://gb.pinterest.com/ldnfashion/">LDNfashion.com</a>
			<!-- Please call pinit.js only once per page -->
			<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>		</div>
		<div class="cf follow_button instagram">
			<style>.ig-b- { display: inline-block; }
			.ig-b- img { visibility: hidden; }
			.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
			.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
			@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
			.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>
			<a href="http://instagram.com/ldnfashion?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
		</div>
		<div class="follow_button tumblr">
			<iframe class="btn" frameborder="0" border="0" scrolling="no" allowtransparency="true" height="25" width="114" src="http://platform.tumblr.com/v1/follow_button.html?button_type=2&amp;tumblelog=ldnfashion&amp;color_scheme=light"></iframe>
		</div>
	</section>
	<section class="sidebar_section wrapper">
		<header class="section_header sidebar_header">
			<h4>Search LDNfashion</h4>
		</header>
		<?php get_search_form(); ?>
	</section>
	<section class="sidebar_section wrapper">
		<header class="section_header sidebar_header">
			<h4>Top 10 most read</h4>
		</header>
		<?php if (function_exists('wpp_get_mostpopular')) wpp_get_mostpopular('limit=10&stats_comments=0&stats_views=0'); ?>
	</section>
	<?php if ( is_dynamic_sidebar('Sidebar Mini Adverts') ) : ?>
		<ul class="cf mini-ads">
		<?php dynamic_sidebar('Sidebar Mini Adverts'); ?>
		</ul>
	<?php endif; ?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Bottom')); ?>
</aside>