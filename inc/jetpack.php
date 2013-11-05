<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Celulas Theme
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function celulas_theme_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'celulas_theme_jetpack_setup' );
