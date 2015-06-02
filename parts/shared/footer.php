	<div class="container footer_widget_area cf">
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Banner')); ?>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Banner Tablet')); ?>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Banner Mobile')); ?>
	</div>
	<footer role="content-info">
		<div class="container">
			<section class="footer_section wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-1' ) ); ?>
				<?php if ( is_home() || is_front_page() || is_category() ) {
					$backup_query = $wp_query;
					$wp_query = new WP_Query(array('post_type' => 'post'));
					wp_nav_menu( array( 'theme_location' => 'footer-nav-1' ) ); 
					$wp_query = $backup_query;
				} ?>
			</section>
			<section class="footer_section wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-2' ) ); ?>
				<?php if ( is_home() || is_front_page() || is_category() ) {
					$backup_query = $wp_query;
					$wp_query = new WP_Query(array('post_type' => 'post'));
					wp_nav_menu( array( 'theme_location' => 'footer-nav-2' ) ); 
					$wp_query = $backup_query;
				} ?>
			</section>
			<section class="footer_section wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-3' ) ); ?>
				<?php if ( is_home() || is_front_page() || is_category() ) {
					$backup_query = $wp_query;
					$wp_query = new WP_Query(array('post_type' => 'post'));
					wp_nav_menu( array( 'theme_location' => 'footer-nav-3' ) ); 
					$wp_query = $backup_query;
				} ?>
			</section>
			<section class="footer_section wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-4' ) ); ?>
				<?php if ( is_home() || is_front_page() || is_category() ) {
					$backup_query = $wp_query;
					$wp_query = new WP_Query(array('post_type' => 'post'));
					wp_nav_menu( array( 'theme_location' => 'footer-nav-4' ) ); 
					$wp_query = $backup_query;
				} ?>
			</section>
			<p class="credits wrapper">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
		</div>
	</footer>
