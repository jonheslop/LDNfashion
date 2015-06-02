	<div class="container footer_widget_area cf">
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Banner')); ?>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Banner Tablet')); ?>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Banner Mobile')); ?>
	</div>
	<footer role="content-info">
		<div class="container">
			<section class="footer_section wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-1' ) ); ?>
			</section>
			<section class="footer_section wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-2' ) ); ?>
			</section>
			<section class="footer_section wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-3' ) ); ?>
			</section>
			<section class="footer_section wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-4' ) ); ?>
			</section>
			<p class="credits wrapper">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
		</div>
	</footer>
