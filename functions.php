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
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size('voucher-code-thumb', 300, 300, true);
		add_image_size('gallery-crop', 550, 310, true);
		add_image_size('gallery-crop-large', 1024, 576, true);
		add_image_size('index-thumb', 256, 192, true);
		add_image_size('streetstyle-thumb', 128, 128, true);
		add_image_size('streetstyle-portrait', 128, 202, true);
	}	

	register_nav_menus(array('primary-nav' => 'Primary Navigation'));
	register_nav_menus(array('footer-nav-1' => 'Footer Left Navigation'));
	register_nav_menus(array('footer-nav-2' => 'Footer Middle Navigation'));
	register_nav_menus(array('footer-nav-3' => 'Footer Right Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	// http://thereforei.am/2011/10/28/advanced-taxonomy-queries-with-pretty-urls/
	function ldnf_add_rewrite_rules() {
	    global $wp_rewrite;
	 
		$new_rules = array(
			'brands/(.+?)/?$' => 'index.php?brand=' . $wp_rewrite->preg_index(1),
		);
		$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
	}
	add_action( 'generate_rewrite_rules', 'ldnf_add_rewrite_rules' );

	function add_query_vars_filter( $vars ){
	  $vars[] = "offset";
	  return $vars;
	}
	add_filter( 'query_vars', 'add_query_vars_filter' );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */

	require_once('custom_posts/sample-sale.php');
	require_once('custom_posts/shop.php');
	require_once('custom_posts/voucher-code.php');

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
		wp_register_script( 'modernizr', get_template_directory_uri().'/js/modernizr.min.js' );
		wp_enqueue_script( 'modernizr' );

		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ), rand(), true );
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
		register_sidebar( array(
			'name' => 'Homepage Categories',
			'description' => 'Category grid on index page',
			'id' => 'category_grid',
			'class' => 'category_grid',
			'before_widget' => '<li id="%1$s" class="post-thumb wrapper cf %2$s">',
			'after_widget' => '</li>',
		));
	}
	add_action( 'widgets_init', 'ldnFashion_widgets_init' );

/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 */
 if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
		
		$optionsframework_settings = get_option('optionsframework');
		
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
		
		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}
			
		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}

// Disable Admin Bar for everyone
if (!function_exists('df_disable_admin_bar')) {

	function df_disable_admin_bar() {
		
		// for the admin page
		remove_action('admin_footer', 'wp_admin_bar_render', 1000);
		// for the front-end
		remove_action('wp_footer', 'wp_admin_bar_render', 1000);
	  	
		// css override for the admin page
		function remove_admin_bar_style_backend() { 
			echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
		}	  
		add_filter('admin_head','remove_admin_bar_style_backend');
		
		// css override for the frontend
		function remove_admin_bar_style_frontend() {
			echo '<style type="text/css" media="screen">
			html { margin-top: 0px !important; }
			* html body { margin-top: 0px !important; }
			</style>';
		}
		add_filter('wp_head','remove_admin_bar_style_frontend', 99);
  	}
}
add_action('init','df_disable_admin_bar');