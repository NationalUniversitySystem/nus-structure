<?php
/**
 * Handle Degree Types custom taxonomy
 */
class Taxonomy_Degree_Type {

	public static $instance = false;

	static $taxonomy_slug = 'degree_type';

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
			'name'          => _x( 'Degree Type', 'Post type general name', 'nus' ),
			'singular_name' => _x( 'Degree Type', 'Post type singular name', 'nus' ),
			'menu_name'     => _x( 'Degree Types', 'Admin Menu text', 'nus' ),
			'all_items'     => __( 'All Degree Types', 'nus' ),
			'edit_item'     => __( 'Edit Degree Type', 'nus' ),
			'view_item'     => __( 'View Degree Type', 'nus' ),
			'update_item'   => __( 'Update Degree Type', 'nus' ),
			'add_new_item'  => __( 'Add New Degree Type', 'nus' ),
			'new_item_name' => __( 'New Degree Type Name', 'nus' ),
		);

		$args = array(
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'meta_box_cb'       => array( self::$instance, 'degree_type_meta_box' ),
		);

		register_taxonomy( self::$taxonomy_slug, array( 'program' ), $args );

	}

	function degree_type_meta_box( $post ) {

		$terms = get_terms( self::$taxonomy_slug, array( 'hide_empty' => false ) );

		$type = wp_get_object_terms(
			$post->ID,
			self::$taxonomy_slug,
			array(
				'orderby' => 'term_id',
				'order'   => 'ASC',
			)
		);
		$name = '';

		if ( ! is_wp_error( $type ) ) {
			if ( isset( $type[0] ) && isset( $type[0]->name ) ) {
				$name = $type[0]->name;
			}
		}

		foreach ( $terms as $term ) { ?>
			<label title='<?php echo esc_attr( $term->name ); ?>'>
				<input type="radio" name="tax_input[<?php echo esc_attr( self::$taxonomy_slug ); ?>]" value="<?php echo esc_attr( $term->name ); ?>" <?php checked( $term->name, $name ); ?>>
				<span><?php echo esc_html( $term->name ); ?></span>
			</label><br>
			<?php
		}

	}

}
