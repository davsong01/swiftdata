<?php
/**
 * Register post type "case"
 *
 */
if ( ! function_exists( 'advisor_register_custom_case_post_type' ) ) {
	function advisor_register_custom_case_post_type() {

		global $advisor_options;

		if ( isset( $advisor_options['advisor-post-name'] ) && !empty( $advisor_options['advisor-post-name'] ) ) {

			$post_type 	= $advisor_options['advisor-post-name'] ;

		} else {

			$post_type 	= 'Case Studies';

		}

		if ( isset( $advisor_options['advisor-post-slug'] ) && !empty( $advisor_options['advisor-post-slug'] ) ) {

			$post_slug	= $advisor_options['advisor-post-slug'] ;

		} else {

			$post_slug 	= 'case-study';

		}


	  $labels = array(
	    'name'               => esc_html__( 'Case Studies','advisor-core' ),
	    'singular_name'      => esc_html__( $post_type,'advisor-core' ),
	    'add_new'            => esc_html__( 'Add New','advisor-core' ),
	    'add_new_item'       => esc_html__( 'Add New Case','advisor-core' ),
	    'edit_item'          => esc_html__( 'Edit Case','advisor-core' ),
	    'new_item'           => esc_html__( 'New Case','advisor-core' ),
	    'view_item'          => esc_html__( 'View Case','advisor-core' ),
	    'search_items'       => esc_html__( 'Search Case','advisor-core' ),
	    'not_found'          => esc_html__( 'No Case found.','advisor-core' ),
	    'not_found_in_trash' => esc_html__( 'No Case found in Trash.','advisor-core' )
	  );

	  $args = array(
		  'labels'             => $labels,
		  'public'             => true,
		  'show_ui'            => true,
		  'show_in_admin_bar'  => true,
		  'menu_position'      => 26,
		  'menu_icon'          => 'dashicons-media-document',
		  'publicly_queryable' => true,
		  'query_var'          => true,
		  'rewrite'            => true,
		  'hierarchical'       => true,
		  'supports'           => array(
		  	'title',
		  	'thumbnail',
		  	'author',
		  	'page-attributes',
		  	'comments'
		  ),
		  'rewrite'            => array( 'slug' => $post_slug )
	  );

	  register_post_type( 'case', $args );

	}
}
add_action( 'init', 'advisor_register_custom_case_post_type', 21 );

function advisor_register_taxonomy_case_study() {

	register_taxonomy( 'case-study-type', 'case', array(
	    'meta_box_cb'                => false,
	    'labels' 					 => array(
	    	'name' 							 => _x( 'Case Type', 'advisor-core' ),
	    	'singular_name' 				 => _x( 'Case Type', 'advisor-core' ),
	    	'search_items' 					 => __( 'Search Case Type', 'advisor-core' ),
	    	'popular_items' 				 => __( 'Popular Case Type', 'advisor-core' ),
	    	'all_items' 					 => __( 'All Case Types', 'advisor-core' ),
	    	'edit_item' 					 => __( 'Edit Case Type', 'advisor-core' ),
	    	'update_item' 					 => __( 'Update Case Type', 'advisor-core' ),
	    	'add_new_item' 					 => __( 'Add New Case Type', 'advisor-core' ),
	    	'new_item_name' 				 => __( 'New Case Type Name', 'advisor-core' ),
	    	'separate_items_with_commas' 	 => __( 'Separate Case Type With Commas', 'advisor-core' ),
	    	'add_or_remove_items' 			 => __( 'Add or Remove Case Type', 'advisor-core' ),
	    	'choose_from_most_used' 		 => __( 'Choose From Most Used Case Type', 'advisor-core' ),
	    	'parent' 						 => __( 'Parent Case Type', 'advisor-core' )
	    	),
	    'hierarchical'			=> true,
	    'query_var' 			=> true,
	    'rewrite' 				=> array( 'slug' => __( 'case-study-type', 'advisor-core' ) ),
	    'show_ui'               => true,
		'show_admin_column'     => true,
		)
	);
}
add_action( 'init', 'advisor_register_taxonomy_case_study', 21 );

/**
 * Register Services Package post type
 *
 */
/*if ( ! function_exists('advisor_register_services_post_type') ) {
	function advisor_register_services_post_type() {

		$labels = array(
			'name'                  => esc_html__( 'Services', 'advisor-core' ),
			'singular_name'         => esc_html__(  'Services', 'advisor-core' ),
			'add_new'               => esc_html__( 'Add New', 'advisor-core' ),
			'add_new_item'          =>  esc_html__( 'Add Services', 'advisor-core' ),
			'edit'                  =>  esc_html__( 'Edit Services' , 'advisor-core' ),
			'edit_item'             =>  esc_html__( 'Edit Services', 'advisor-core' ),
			'new_item'              =>  esc_html__( 'New Services', 'advisor-core' ),
			'view'                  =>  esc_html__( 'View Services', 'advisor-core' ),
			'view_item'             =>  esc_html__( 'View Package', 'advisor-core' ),
			'search_items'          =>  esc_html__( 'Search Services', 'advisor-core' ),
			'not_found'             =>  esc_html__( 'No Services Found', 'advisor-core' ),
			'not_found_in_trash'    =>  esc_html__( 'No Services found', 'advisor-core' ),
			'parent'                =>  esc_html__( 'Parent Services', 'advisor-core' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'has_archive'        => true,
			'publicly_queryable' => true,
			'query_var' 		     => true,
			'show_ui' 			     => true,
			'rewrite'            => array( 'slug' => 'services' ),
			'supports'           => array( 'title', 'editor' ),
			'can_export'         => true,
			'menu_position'      => 27,
			'menu_icon'          => 'dashicons-admin-tools',
		);

		register_post_type( 'services', $args );

	}
}
add_action( 'init', 'advisor_register_services_post_type', 21 );*/

/**
 * Register team post type
 *
 */
if ( ! function_exists( 'advisor_register_team_post_type' ) ) {
	function advisor_register_team_post_type() {

		$labels = array(
		'name'                  => esc_html__(  'Team', 'advisor-core' ),
		'singular_name'         => esc_html__(  'Member', 'advisor-core' ),
		'add_new'               => esc_html__( 'Add New Member', 'advisor-core' ),
		'add_new_item'          =>  esc_html__( 'Add Member', 'advisor-core' ),
		'edit'                  =>  esc_html__( 'Edit Member' , 'advisor-core' ),
		'edit_item'             =>  esc_html__( 'Edit Member', 'advisor-core' ),
		'new_item'              =>  esc_html__( 'New Member', 'advisor-core' ),
		'view'                  =>  esc_html__( 'View Members', 'advisor-core' ),
		'view_item'             =>  esc_html__( 'View Member', 'advisor-core' ),
		'search_items'          =>  esc_html__( 'Search Members', 'advisor-core' ),
		'not_found'             =>  esc_html__( 'No Member found', 'advisor-core' ),
		'not_found_in_trash'    =>  esc_html__( 'No Memebers found', 'advisor-core' ),
		'parent'                =>  esc_html__( 'Parent Parent', 'advisor-core' )
		);

		$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
		'publicly_queryable' => true,
		'query_var' 		     => true,
		'show_ui' 			     => true,
		'rewrite'            => array( 'slug' => '' ),
		'supports'           => array('title' , 'thumbnail'),
		'can_export'         => true,
		'menu_position'      => 28,
		'menu_icon'          => 'dashicons-businessman',
		);

		register_post_type( 'team', $args );

	}
}
add_action( 'init', 'advisor_register_team_post_type', 21 );

// testimonials post type
if ( ! function_exists( 'advisor_register_custom_post_type_testimonial' ) ) {

function advisor_register_custom_post_type_testimonial() {

	$labels = array(
    'name' 							=> __( 'Testimonials','advisor-core' ),
    'singular_name' 				=> __( 'Testimonial','advisor-core' ),
    'add_new' 						=> __( 'Add New','advisor-core' ),
    'add_new_item' 					=> __( 'Add New Testimonial','advisor-core' ),
    'edit_item' 					=> __( 'Edit Testimonial','advisor-core' ),
    'new_item' 						=> __( 'New Testimonial','advisor-core' ),
    'view_item' 					=> __( 'View Testimonial','advisor-core' ),
    'search_items' 					=> __( 'Search Testimonial','advisor-core' ),
    'not_found' 					=> __( 'No Testimonial found.','advisor-core' ),
    'not_found_in_trash' 		    => __( 'No Testimonial found in Trash.','advisor-core' )
  );

  $args = array(

	  'labels' 					=> $labels,
	  'public' 					=> true,
	  'show_ui' 				=> true,
	  'show_in_admin_bar' 		=> true,
	  'menu_position' 			=> 29,
	  'menu_icon' 				=> 'dashicons-format-chat',
	  'exclude_from_search' 	=> true,
	  'publicly_queryable' 		=> true,
	  'query_var' 				=> true,
	  'rewrite' 				=> true,
	  'hierarchical' 			=> true,
	  'supports' 				=> array( 'title', 'thumbnail' ),
	  'rewrite' 				=> array( 'slug' => __( 'testimonial', 'advisor-core' ) )
  );

	register_post_type( 'testimonial', $args );

}
}
add_action( 'init', 'advisor_register_custom_post_type_testimonial', 21 );

// Subscribers post type
if ( ! function_exists( 'advisor_register_custom_post_type_subscriber' ) ) {

function advisor_register_custom_post_type_subscriber() {

	$labels = array(
    'name' 							=> __( 'Subscribers','advisor-core' ),
    'singular_name' 				=> __( 'Subscriber','advisor-core' ),
    'add_new' 						=> __( 'Add New','advisor-core' ),
    'add_new_item' 					=> __( 'Add New Subscriber','advisor-core' ),
    'edit_item' 					=> __( 'Edit Subscriber','advisor-core' ),
    'new_item' 						=> __( 'New Subscriber','advisor-core' ),
    'view_item' 					=> __( 'View Subscriber','advisor-core' ),
    'search_items' 					=> __( 'Search Subscriber','advisor-core' ),
    'not_found' 					=> __( 'No Subscriber found.','advisor-core' ),
    'not_found_in_trash' 		    => __( 'No Subscriber found in Trash.','advisor-core' )
  );

  $args = array(

	  'labels' 					=> $labels,
	  'public' 					=> false,
	  'show_ui' 				=> true,
	  'show_in_admin_bar' 		=> true,
	  'menu_position' 			=> 30,
	  'menu_icon' 				=> 'dashicons-groups',
	  'exclude_from_search' 	=> true,
	  'publicly_queryable' 		=> true,
	  'query_var' 				=> true,
	  'rewrite' 				=> true,
	  'hierarchical' 			=> true,
	  'supports' 				=> array( 'title' ),
	  'rewrite' 				=> array( 'slug' => __( 'subscriber', 'advisor-core' ) )
  );

	register_post_type( 'subscriber', $args );

}
}
add_action( 'init', 'advisor_register_custom_post_type_subscriber', 21 );
