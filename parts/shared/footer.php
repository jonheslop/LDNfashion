	<footer role="content-info" class="container">
		<section class="footer_section wrapper">
			<header class="section_header footer_header">
				<h4>About us</h4>
			</header>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-1' ) ); ?>
		</section>
		<section class="footer_section wrapper">
			<header class="section_header footer_header">
				<h4>About us</h4>
			</header>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-2' ) ); ?>
		</section>
		<section class="footer_section wrapper double">
			<header class="section_header footer_header">
				<h4>About us</h4>
			</header>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-nav-3' ) ); ?>
		</section>
		<p class="credits wrapper">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
	</footer>
