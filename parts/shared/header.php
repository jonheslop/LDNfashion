<nav role="navigation" class="cf">
	<div class="wrapper logo_wrap">
		<h1><a id="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
	<?php wp_nav_menu( array( 'theme_location' => 'primary-nav' ) ); ?>
</nav>
<header role="banner" class="container">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Header Banner')); ?>
</header>
