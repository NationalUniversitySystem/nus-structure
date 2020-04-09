<?php
/**
 * Handle Area of Study custom taxonomy
 */
class Taxonomy_Area_Of_Study {

	public static $instance = false;

	static $taxonomy_slug = 'area_of_study';

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
			'name'          => _x( 'Areas of Study', 'Post type general name', 'nus' ),
			'singular_name' => _x( 'Area of Study', 'Post type singular name', 'nus' ),
			'menu_name'     => _x( 'Areas of Study', 'Admin Menu text', 'nus' ),
			'all_items'     => __( 'All Areas of Study', 'nus' ),
			'edit_item'     => __( 'Edit Area of Study', 'nus' ),
			'view_item'     => __( 'View Area of Study', 'nus' ),
			'update_item'   => __( 'Update Area of Study', 'nus' ),
			'add_new_item'  => __( 'Add New Area of Study', 'nus' ),
			'new_item_name' => __( 'New Area of Study Name', 'nus' ),
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
