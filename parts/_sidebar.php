<aside id="sidebar" class="cf">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Top')); ?>
	<section class="sidebar_section wrapper social_section">
		<div class="follow_button facebook">
			<div class="fb-like" data-href="https://facebook.com/ldnfashion" data-width="250" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		</div>
		<div class="follow_button twitter">
			<a href="https://twitter.com/ldnfashion" class="twitter-follow-button" data-show-count="true">Follow @ldnfashion</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>			
		</div>
		<div class="cf follow_button instagram">
			<style>.ig-b- { display: inline-block; }
			.ig-b- img { visibility: hidden; }
			.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
			.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
			@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
			.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>
			<a href="http://instagram.com/ldnfashion?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
		</div>
	</section>
	<section class="sidebar_section wrapper">
		<header class="section_header sidebar_header">
			<h4>Search LDNfashion</h4>
		</header>
		<?php get_search_form(); ?>
	</section>
<!-- 	<section class="sidebar_section wrapper newsletter_signup">
		<header class="section_header sidebar_header">
			<h4>Subscribe to LDNfashion</h4>
		</header>
		<p>Get the latest LDN Fashion updates via email</p>
		<form action="//ldnfashion.us9.list-manage.com/subscribe/post?u=dacb3e7db54afa3fc77bb88c9&amp;id=ec84afbda0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="search-wrapper validate" novalidate>
			<div class="mc-field-group">
				<input type="email" value="" name="EMAIL" class="required email search_box" placeholder="your.name@email.com" id="mce-EMAIL">
				<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button search_submit longer">
				<div style="position: absolute; left: -5000px;"><input type="text" name="b_dacb3e7db54afa3fc77bb88c9_ec84afbda0" tabindex="-1" value=""></div>
			</div>
			<div id="mce-responses">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>
		</form>
	</section> -->
	<section class="sidebar_section wrapper">
		<header class="section_header sidebar_header">
			<h4>Top 10 most read</h4>
		</header>
		<?php if (function_exists('wpp_get_mostpopular')) wpp_get_mostpopular('limit=10&stats_comments=0&stats_views=0&thumbnail_width=50&thumbnail_height=50'); ?>
	</section>
	<?php if ( is_dynamic_sidebar('Sidebar Mini Adverts') ) : ?>
		<ul class="cf mini-ads">
		<?php dynamic_sidebar('Sidebar Mini Adverts'); ?>
		</ul>
	<?php endif; ?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Bottom')); ?>
</aside>