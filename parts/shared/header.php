<nav role="navigation" class="cf">
	<a href="#" class="menuToggle"><span>Menu</span></a>
	<div class="wrapper logo_wrap">
		<h1><a id="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
	<?php wp_nav_menu( array( 'theme_location' => 'primary-nav' ) );
	if ( is_category() ) {
		$backup_query = $wp_query;
		$wp_query = new WP_Query(array('post_type' => 'post'));
		wp_nav_menu( array( 'theme_location' => 'primary-nav' ) ); 
		$wp_query = $backup_query;
	}
	?>
</nav>
<? if ( !is_404() ) : ?>
<header role="banner" class="container">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Banner')); ?>
</header>
<? endif; ?>