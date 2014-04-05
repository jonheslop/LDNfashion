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
	}	

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

// Repeatable metaboxes by — https://gist.github.com/da1nonly/2057532
add_action('add_meta_boxes','my_add_custom_box');
function my_add_custom_box($postType) {
	$types = array('voucher-code');
	if(in_array($postType, $types)){
		add_meta_box( 'repeatable-fields', 'Voucher Codes', 'repeatable_meta_box_display', $postType, 'normal', 'high');
	}
}

function repeatable_meta_box_display() {
	global $post;
 
	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
 
	wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );
?>
	<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.metabox_submit').click(function(e) {
		e.preventDefault();
		$('#publish').click();
	});
	$('#add-row').on('click', function() {
		var row = $('.empty-row.screen-reader-text').clone(true);
		row.removeClass('empty-row screen-reader-text');
		row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
		return false;
	});
	$('.remove-row').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});
 
	$('#repeatable-fieldset-one tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
});
	</script>
 	<p>Use the fields below to associate product with posts, no more than three please.</p>
	<table id="repeatable-fieldset-one" width="100%">
	<thead>
		<tr>
			<th width="2%"></th>
			<th width="17.5%">Code</th>
			<th width="26%">Description</th>
			<th width="%">Image URL</th>
			<th width="17.5%">URL</th>
			<th width="17.5%">Expires</th>
			<th width="2%"></th>
		</tr>
	</thead>
	<tbody>
	<?php
 
	if ( $repeatable_fields ) :
 
		foreach ( $repeatable_fields as $field ) {
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="code[]" value="<?php if($field['code'] != '') echo esc_attr( $field['code'] ); ?>" /></td>
		<td><input type="text" class="widefat" name="description[]" value="<?php if($field['description'] != '') echo esc_attr( $field['description'] ); ?>" /></td>
		<td><input type="text" class="widefat" name="image_url[]" value="<?php if ($field['image_url'] != '') echo esc_attr( $field['image_url'] ); else echo 'http://'; ?>" /></td>
		<td><input type="text" class="widefat" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo 'http://'; ?>" /></td>
		<td><input type="text" class="widefat" name="expires[]" value="<?php if($field['expires'] != '') echo esc_attr( $field['expires'] ); ?>" /></td>
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php
		}
	else :
		// show a blank one
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="code[]" /></td>
		<td><input type="text" class="widefat" name="description[]" /></td>
 		<td><input type="text" class="widefat" name="image_url[]" value="http://" /></td>
 		<td><input type="text" class="widefat" name="url[]" value="http://" /></td>
		<td><input type="text" class="widefat" name="expires[]" /></td>
		<td><a class="sort">|||</a></td>
	</tr>
	<?php endif; ?>
 
	<!-- empty hidden one for jQuery -->
	<tr class="empty-row screen-reader-text">
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="code[]" /></td>
		<td><input type="text" class="widefat" name="description[]" /></td>
 		<td><input type="text" class="widefat" name="image_url[]" value="http://" /></td>
 		<td><input type="text" class="widefat" name="url[]" value="http://" /></td>
		<td><input type="text" class="widefat" name="expires[]" /></td>
		<td><a class="sort">|||</a></td>
	</tr>
	</tbody>
	</table>
 
	<p><a id="add-row" class="button" href="#">Add another</a>
	<input type="submit" class="button metabox_submit" value="Save" />
	</p>
	
	<?php
}
 
add_action('save_post', 'repeatable_meta_box_save');
function repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
		return;
 
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
 
	if (!current_user_can('edit_post', $post_id))
		return;
 
	$old = get_post_meta($post_id, 'repeatable_fields', true);
	$new = array();

	$codes = $_POST['code'];
	$descriptions = $_POST['description'];
	$image_urls = $_POST['image_url'];
	$urls = $_POST['url'];
	$expiress = $_POST['expires'];
 
	$count = count( $codes );
 
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $codes[$i] != '' ) :
			$new[$i]['code'] = stripslashes( strip_tags( $codes[$i] ) );
		if ( $descriptions[$i] != '' )
			$new[$i]['description'] = stripslashes( strip_tags( $descriptions[$i] ) );
		if ( $image_urls[$i] == 'http://' )
			$new[$i]['image_url'] = '';
		else
			$new[$i]['image_url'] = stripslashes( $image_urls[$i] ); // and however you want to sanitize
		if ( $urls[$i] == 'http://' )
			$new[$i]['url'] = '';
		else
			$new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
		endif;
		if ( $expiress[$i] != '' ) 
			$new[$i]['expires'] = stripslashes( strip_tags( $expiress[$i] ) );
	}
 
	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'repeatable_fields', $old );
}

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