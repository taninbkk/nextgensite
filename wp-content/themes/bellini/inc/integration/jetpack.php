<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package bellini
 */
/**
 * Jetpack setup function.
 */

function bellini_jetpack_setup() {
    /**
     * Add theme support for Infinite Scroll.
     * See: http://jetpack.me/support/infinite-scroll/
     */
	if(Jetpack::is_module_active( 'infinite-scroll' )):

		add_theme_support( 'infinite-scroll', array(
			'container' => 'content',
			'render'    => 'bellini_infinite_scroll_render',
			'footer'    => 'page',
		) );
	endif;

	add_theme_support( 'jetpack-responsive-videos' );
	/*
	 * Let JetPack manage the site logo.
	 * By adding theme support, we declare that this theme does use the default
	 * JetPack Site Logo functionality, if the module is activated.
	 *
	 * See: http://jetpack.me/support/site-logo/
	 */
	add_theme_support( 'site-logo', array( 'size' => 'full' ) );
	add_theme_support( 'jetpack-portfolio' );
}

add_action( 'after_setup_theme', 'bellini_jetpack_setup' );

function bellini_infinite_scroll_render() {
	get_template_part( 'template-parts/content-lb-1');
}