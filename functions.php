<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Enqueue assets
 */

add_action( 'wp_enqueue_scripts', 'wc_api_enqueue' );

function wc_api_enqueue() {
    wp_enqueue_style( 'wc-api-debugger-style', get_stylesheet_directory_uri() . '/style.css' );
 	
 	wp_enqueue_script( 'jquery' );
 	wp_enqueue_script( 'wc-api-debugger-js', get_stylesheet_directory_uri() . '/assets/js/wc-api-debugger.js', 'jquery' );
}

?>