<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
		wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

	/* ========================================================================================================================
	
	Widget Areas and widgets
	
	======================================================================================================================== */

	function ldnFashion_widgets_init() {
		register_sidebar( array(
			'name' => 'Header Banner Huge',
			'description' => 'Banner above the site logo',
			'id' => 'header_banner_huge',
			'class' => 'header_banner_huge',
			'before_widget' => '<div id="%1$s" class="wrapper ldnf_widget header_banner_huge %2$s">',
			'after_widget' => '</div>',
		));
		register_sidebar( array(
			'name' => 'Header Banner',
			'description' => 'Banner along side the site logo',
			'id' => 'header_banner',
			'class' => 'header_banner',
			'before_widget' => '<div id="%1$s" class="wrapper ldnf_widget header_banner %2$s">',
			'after_widget' => '</div>',
		));
		register_sidebar( array(
			'name' => 'Sidebar Top',
			'description' => 'Ad at the top of the sidebar',
			'id' => 'sidebar_ad_top',
			'class' => 'sidebar_ad_top',
			'before_widget' => '<div id="%1$s" class="wrapper ldnf_widget sidebar_ad_top %2$s">',
			'after_widget' => '</div>',
		));
		register_sidebar( array(
			'name' => 'Sidebar Mini Adverts',
			'description' => 'Ad multiple mini ads to sidebar',
			'id' => 'sidebar_mini_ad_box',
			'class' => 'sidebar_mini_ad_box',
			'before_widget' => '<li id="%1$s" class="wrapper ldnf_widget sidebar_mini_ads %2$s">',
			'after_widget' => '</li>',
		));
		register_sidebar( array(
			'name' => 'Sidebar Bottom',
			'description' => 'Ad at the bottom of the sidebar',
			'id' => 'sidebar_ad_bottom',
			'class' => 'sidebar_ad_bottom',
			'before_widget' => '<div id="%1$s" class="wrapper ldnf_widget sidebar_ad_bottom %2$s">',
			'after_widget' => '</div>',
		));
		register_sidebar( array(
			'name' => 'Index Ad High',
			'description' => 'First ad on index page',
			'id' => 'index_ad_high',
			'class' => 'index_ad_high',
			'before_widget' => '<div id="%1$s" class="wrapper ldnf_widget index_ad_high %2$s">',
			'after_widget' => '</div>',
		));
		register_sidebar( array(
			'name' => 'Index Ad Low',
			'description' => 'First ad on index page',
			'id' => 'index_ad_low',
			'class' => 'index_ad_low',
			'before_widget' => '<div id="%1$s" class="wrapper ldnf_widget index_ad_low %2$s">',
			'after_widget' => '</div>',
		));
	}
	add_action( 'widgets_init', 'ldnFashion_widgets_init' );