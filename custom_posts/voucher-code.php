<?php

# In order to change the post type, change the initial call, the Class name, the variables, and the first function name.
	# credit: http://w3prodigy.com/behind-wordpress/php-classes-wordpress-plugin/
	function VoucherCodesPostType()
	{
		$this->__construct();
	}

new VoucherCodesPostType;					// Initial call

class VoucherCodesPostType {
	
var $single = "Voucher Code"; 		// this represents the singular name of the post type
  var $plural = "Voucher Codes"; 	// this represents the plural name of the post type
  var $type = "voucher-code"; 		// this is the actual type


	function __construct()
	{
		# Place your add_actions and add_filters here
		add_action( 'init', array( &$this, 'init' ) );
		add_action('init', array(&$this, 'add_post_type'));

		# Add Post Type to Search 
		add_filter('pre_get_posts', array( &$this, 'query_post_type') );

		# Add Custom Taxonomies
		// add_action( 'init', array( &$this, 'add_taxonomies'), 0 );

		# Save entered data
		add_action('save_post', array( &$this, 'save_postdata') );

	} 
	
	# @credit: http://www.wpinsideout.com/advanced-custom-post-types-php-class-integration
  function init($options = null){
  	if($options) {
	    foreach($options as $key => $value){
	      $this->$key = $value;
	    }
    }
  }

	# @credit: http://www.wpinsideout.com/advanced-custom-post-types-php-class-integration
	function add_post_type(){
    $labels = array(
      'name' => _x($this->plural, 'post type general name'),
      'singular_name' => _x($this->single, 'post type singular name'),
      'add_new' => _x('Add ' . $this->single, $this->single),
      'add_new_item' => __('Add New ' . $this->single),
      'edit_item' => __('Edit ' . $this->single),
      'new_item' => __('New ' . $this->single),
      'view_item' => __('View ' . $this->single),
      'search_items' => __('Search ' . $this->plural),
      'not_found' =>  __('No ' . $this->plural . ' Found'),
      'not_found_in_trash' => __('No ' . $this->plural . ' found in Trash'),
      'parent_item_colon' => ''
    );
    $options = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array('slug' => strtolower($this->plural), 'with_front' => true),
      'capability_type' => 'post',
      'hierarchical' => false,
      'has_archive' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
	  'taxonomies' => array('category'),
      'supports' => array(
      	'title',
      	'editor',
      	'author',
      	'thumbnail',
      	'excerpt',
      	'comments',
      	'custom-fields',
      	'revisions'
      ),
    );
    register_post_type($this->type, $options);
  }

	
	function query_post_type($query) {
	  if(is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] )) {
	    $post_type = get_query_var('post_type');
		$query->set('post_type',$post_type);
		return $query;
	  }
	}

	// function add_taxonomies() {
	//   register_taxonomy(
	//   	'location', 
	//   	array($this->type, 'partner', 'story', 'rider', 'builder', 'club', 'post', 'travel'), // to set location to other cpt's
	//   	array(
	// 	    'hierarchical' => true,
	// 	    'labels' => array(
	// 	    	'name' => __( 'Location' ),
	// 	    	'singular_name' => __( 'Location' ),
	// 	    	'all_items' => __( 'All Locations' ),
	// 	    	'add_new_item' => __( 'Add Location' )
	// 	  	),
	// 	  	'public' => true,
	// 	    'query_var' => true,
	// 	    'rewrite' => array( 
	// 	    	'slug' => 'location' 
	// 	    ),
	// 	  )
	// 	 );
	// }

	function save_postdata($post_id){
	  if ( empty($_POST) || $_POST['post_type'] !== $this->type || !wp_verify_nonce( $_POST['noncename'], plugin_basename(__FILE__) )) {
	    return $post_id;
	  }
	  
	  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    	return $post_id;

/*
	
	  // Check permissions
	  if ( 'page' == $_POST['post_type'] ) {
	    if ( !current_user_can( 'edit_page', $post_id ) )
	      return $post_id;
	  } else {
	    if ( !current_user_can( 'edit_post', $post_id ) )
	      return $post_id;
	  }
*/

		if($_POST['post_type'] == $this->type) {
			global $post;
			foreach($_POST['data'] as $key => $val) {
				update_post_meta($post->ID, $key, $val);
			}
		}
		
	}
	
}
