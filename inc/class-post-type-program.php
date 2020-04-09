<?php
/**
 * Handle Program custom post type registration
 */
class Post_Type_Program {

	public static $instance = false;

	public function __construct() {

		add_action( 'init', array( $this, 'register_cpt' ), 10 );

	}

	/**
	 * Singleton
	 *
	 * Returns a single instance of the current class.
	 */
	public static function singleton() {

		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	function register_cpt() {

		$labels = array(
			'name'                  => _x( 'Programs', 'Post type general name', 'nus' ),
			'singular_name'         => _x( 'Program', 'Post type singular name', 'nus' ),
			'menu_name'             => _x( 'Programs', 'Admin Menu text', 'nus' ),
			'name_admin_bar'        => _x( 'Program', 'Add New on Toolbar', 'nus' ),
			'add_new'               => __( 'Add New', 'nus' ),
			'add_new_item'          => __( 'Add New Program', 'nus' ),
			'new_item'              => __( 'New Program', 'nus' ),
			'edit_item'             => __( 'Edit Program', 'nus' ),
			'view_item'             => __( 'View Program', 'nus' ),
			'all_items'             => __( 'All Programs', 'nus' ),
			'search_items'          => __( 'Search Programs', 'nus' ),
			'parent_item_colon'     => __( 'Parent Programs:', 'nus' ),
			'not_found'             => __( 'No programs found.', 'nus' ),
			'not_found_in_trash'    => __( 'No programs found in Trash.', 'nus' ),
			'featured_image'        => _x( 'Program Cover Image', 'Overrides the "Featured Image" phrase for this post type.', 'nus' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the "Set featured image" phrase for this post type.', 'nus' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the "Remove featured image" phrase for this post type.', 'nus' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the "Use as featured image" phrase for this post type.', 'nus' ),
			'archives'              => _x( 'Program archives', 'The post type archive label used in nav menus. Default "Post Archives".', 'nus' ),
			'insert_into_item'      => _x( 'Insert into program', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post).', 'nus' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this program', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post).', 'nus' ),
			'filter_items_list'     => _x( 'Filter programs list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list".', 'nus' ),
			'items_list_navigation' => _x( 'Programs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation".', 'nus' ),
			'items_list'            => _x( 'Programs list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list".', 'nus' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'program' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-welcome-learn-more',
			'supports'           => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'custom-fields',
				'revisions',
				'page-attributes',
			),
		);

		register_post_type( 'program', $args );

	}

}

