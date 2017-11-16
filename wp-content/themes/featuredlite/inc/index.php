<?php
/**
* all file includeed
* @param
* @return mixed|string
*/
	include( get_template_directory() . '/inc/plugin-install.php' );
	include( get_template_directory() . '/inc/breadcrumb.php' );
	include( get_template_directory() . '/inc/static-function.php' );
	include( get_template_directory() . '/inc/widget.php' );
    include( get_template_directory() . '/customizer/custom-customizer.php' );
	include( get_template_directory() . '/customizer/customizer.php' );
	require_once( trailingslashit( get_template_directory() ) . '/customizer/pro-button/class-customize.php' );
	require_once( trailingslashit( get_template_directory() ) . '/inc/featuredlite-theme.php' );
?>