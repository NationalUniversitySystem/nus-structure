<?php
/**
 * Handle Area of Study custom taxonomy
 */
class Attachment_Taxonomies {
	public static $instance = false;

	public function __construct() {
		add_action( 'init', array( $this, 'add_categories_to_attachments' ) );
		add_action( 'init', array( $this, 'add_tags_to_attachments' ) );
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

	public static function add_categories_to_attachments() {
		register_taxonomy_for_object_type( 'category', 'attachment' );
	}

	public static function add_tags_to_attachments() {
		register_taxonomy_for_object_type( 'post_tag', 'attachment' );
	}
}
