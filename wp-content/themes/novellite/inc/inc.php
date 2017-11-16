<?php
/**
 * all file includeed
 *
 * @param  
 * @return mixed|string
 */ 

	require_once( trailingslashit( get_template_directory() ) . '/inc/plugin-install.php' );

	require_once( trailingslashit( get_template_directory() ) . '/inc/define-template.php' );
	require_once( trailingslashit( get_template_directory() ) . '/inc/custom-function.php' );
	require_once( trailingslashit( get_template_directory() ) . '/inc/custom-color.php' );
	// customizer
	require_once( trailingslashit( get_template_directory() ) . '/inc/custom-customizer.php' );
	require_once( trailingslashit( get_template_directory() ) . '/inc/customizer.php' );
	require_once( trailingslashit( get_template_directory() ) . '/inc/pro-button/class-customize.php' );
	require_once( trailingslashit( get_template_directory() ) . '/inc/novellite-theme.php' );
