<?php
/**
 * @package Troubleshooting_Plugin
 * @version 1.6
 */
/*
Plugin Name: Troubleshooting Plugin
Plugin URI: https://www.mattcromwell.com
Description: This is not just a plugin, it's a way for users everywhere to learn something very important about WordPress.
Author: Matt Cromwell
Version: 1.0
Author URI: https://www.mattcromwell.com/
*/

define( 'TROUBLE_PATH', plugin_dir_path( __FILE__ ) );
define( 'TROUBLE_URL', plugin_dir_url( __FILE__ ) );

add_action('wp_print_styles', 'kill_the_head', 100);

function kill_the_head() {
	wp_deregister_style('twentysixteen-style');
	wp_dequeue_style('twentysixteen-style');
}

/**
 * Proper way to enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'trouble-css', TROUBLE_URL . '/trouble.css' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

//Add Signature Link
function custom_content_after_post($content){

	?>
		<script>
			jQuery(document).ready( function($) {
				$('body').prepend('<div class="trouble"><h1>Ha, ha, ha, haaaa! All Your Webz Is MINES!!</h1><img src="<?php echo TROUBLE_URL . '/laughing.gif'?>"></div>');
			} );
		</script>
	<?php 
}


add_filter( "wp_footer", "custom_content_after_post" );