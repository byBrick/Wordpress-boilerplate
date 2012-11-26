<?php

/**
 * Gör så att man kan översätta sidan
 *
 */
load_theme_textdomain( 'bybrick', get_template_directory() . '/languages' );

/**
 * Meny
 *
 */
register_nav_menus( array(
	'primary' => __( 'huvudymeny', 'bybrick' ),
));

/**
 * Widgets
 *
 */
if ( function_exists( 'register_sidebar' ) )
	register_sidebar(array(
	'before_widget' => '<aside class="widget">',
	'after_widget' => '</aside>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

/**
 * Ladda script
 *
 */
function bb_ladda_saker() {

	// JS
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20120206', true );

	// CSS
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'bb_ladda_saker' );

/**
 * Egen logo på login-sidan
 *
 */
function bb_custom_login_logo() {
	echo '<style type="text/css">h1 a { background-image:url('.get_template_directory_uri().'/images/custom-login-logo.png) !important; }</style>';
}
add_action( 'login_head', 'bb_custom_login_logo' );
function bb_wp_login_url() {
	echo home_url();
}
add_filter( 'login_headerurl', 'bb_wp_login_url' );
function bb_wp_login_title() {
	echo get_option('blogname');
}
add_filter( 'login_headertitle', 'bb_wp_login_title' );

/**
* Max bildbredd baserat på temats design
 *
 */
if ( ! isset( $content_width ) ) $content_width = 640; /* px */

/**
 * Lite byBrick credit ;)
 *
 */
function bb_footer_credit () {
	echo 'Created by <a href="http://bybrick.se/" target="_blank">byBrick</a>. ';
	echo 'Powered by <a href="http://WordPress.org/" target="_blank">WordPress</a>.';
}
add_filter( 'admin_footer_text', 'bb_footer_credit' );