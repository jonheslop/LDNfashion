<nav role="navigation" class="cf">
	<a href="#" class="menuToggle"><span>Menu</span></a>
	<div class="wrapper logo_wrap">
		<h1><a id="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
	<?php wp_nav_menu( array( 'theme_location' => 'primary-nav' ) );
	?>
</nav>
<? if ( !is_404() ) : ?>
<header role="banner" class="container">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Banner')); ?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Banner Tablet')); ?>
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Banner Mobile')); ?>
</header>
<? endif; ?>