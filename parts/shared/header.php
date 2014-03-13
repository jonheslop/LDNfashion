<header role="banner" class="container">
	<div class="wrapper">
		<h1><a id="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>		
	</div>
	<?php // bloginfo( 'description' ); ?>
	<?php // get_search_form(); ?>
</header>
<nav role="navigation" class="container">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</nav>
