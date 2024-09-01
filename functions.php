<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );
define('LO_DIR', get_stylesheet_directory() . '/inc');
define('LO_VERSION', rand(0,10) . '.' . rand(0,10) . '.' .rand(1,10));
define('LO_NONCE', 'iy2VWT03w0RefAD1Hrc9wN5W');


/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

  wp_enqueue_script('lo-scripts', get_stylesheet_directory_uri() . '/scripts.js', array('jquery'), LO_VERSION, TRUE);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );
