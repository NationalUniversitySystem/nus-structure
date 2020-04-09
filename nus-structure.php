<?php
/**
 * Plugin Name: National University System Academic Structure
 * Description: Plugin that handles NUS's Academic Structure.
 * Version: 1.0
 * Author: Mike Estrada
 *
 * Metadata is info that will be used across the site, no matter what the theme is.
 * Therefore this is implemented through a plugin
 */

if ( ! defined( 'WPINC' ) ) {
	die( 'YOU SHALL NOT PASS!' );
}

// Define a few constants we'll need.
define( 'NUS_STRUCTURE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'NUS_STRUCTURE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * The files with classes for functionality
 * Note: just masking sure someone didn't delete the file by accident
 */
$files_list = array(
	'inc/class-taxonomy-degree-type.php',
	'inc/class-taxonomy-area-of-study.php',
	'inc/class-taxonomy-class-format.php',
	'inc/class-post-type-program.php',
	'inc/class-attachment-taxonomies.php',
);

foreach ( $files_list as $filename ) {
	if ( file_exists( NUS_STRUCTURE_PLUGIN_PATH . $filename ) ) {
		require NUS_STRUCTURE_PLUGIN_PATH . $filename;

		$class_name = preg_replace( '/^class-/', '', basename( $filename, '.php' ) );
		$class_name = implode( '_', array_map( 'ucfirst', explode( '-', $class_name ) ) );

		if ( class_exists( $class_name ) && method_exists( $class_name, 'singleton' ) ) {
			$class_name::singleton();

			if ( method_exists( $class_name, 'activate' ) ) {
				register_activation_hook( __FILE__, array( $class_name, 'activate' ) );
			}
		}
	}
}
