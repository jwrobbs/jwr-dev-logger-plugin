<?php
/**
 * Plugin Name: JWR Dev Logger
 * Plugin URI: https://joshrobbs.com
 * Description: A simple logger you can use for debugging.
 * Plugin Author: Josh Robbs
 * Author URI: https://joshrobbs.com
 * Version: 0.9.0
 *
 * @since 20231203
 * @package JWR_Dev_Logger
 */

namespace JWR\Dev_Logger;

defined( 'ABSPATH' ) || exit;

/**
 * Activation function to create log directory.
 *
 * @return void
 */
function activation_fn() {
	$path = \WP_CONTENT_DIR . '/jwr-dev-logger';

	if ( ! is_dir( $path ) ) {
		mkdir( $path );
	}

	if ( ! file_exists( $path . '/index.php' ) ) {
		// phpcs:disable WordPress.WP.AlternativeFunctions
		$index_file = fopen( $path . '/index.php', 'w' );
		fwrite( $index_file, '<?php // Silence is golden.' );
		fclose( $index_file );
		// phpcs:enable WordPress.WP.AlternativeFunctions
	}
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\activation_fn' );

/**
 * Deactivation function to delete log directory and files.
 *
 * @return void
 */
function deactivation_fn() {
	$path  = \WP_CONTENT_DIR . '/jwr-dev-logger';
	$files = glob( $path . '/*' );

	foreach ( $files as $file ) {
		if ( is_file( $file ) ) {
			unlink( $file );
		}
	}

	if ( is_dir( $path ) ) {
		rmdir( $path );
	}
}

register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivation_fn' );
