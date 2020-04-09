<?php
/**
 * Handle Area of Study custom taxonomy
 */
class Taxonomy_Class_Format {

	public static $instance = false;

	static $taxonomy_slug = 'class_format';

	public function __construct() {

		add_action( 'init', array( $this, 'register_taxonomy' ), 0 );

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

	static function register_taxonomy() {

		$labels = array(
			'name'          => _x( 'Class Formats', 'Post type general name', 'nus' ),
			'singular_name' => _x( 'Class Format', 'Post type singular name', 'nus' ),
			'menu_name'     => _x( 'Class Formats', 'Admin Menu text', 'nus' ),
			'all_items'     => __( 'All Class Formats', 'nus' ),
			'edit_item'     => __( 'Edit Class Format', 'nus' ),
			'view_item'     => __( 'View Class Format', 'nus' ),
			'update_item'   => __( 'Update Class Format', 'nus' ),
			'add_new_item'  => __( 'Add New Class Format', 'nus' ),
			'new_item_name' => __( 'New Class Format Name', 'nus' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
		);

		register_taxonomy( self::$taxonomy_slug, array( 'program' ), $args );

	}

}
