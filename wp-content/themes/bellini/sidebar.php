<?php
/**
* The sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package bellini
*/
if ( ! bellini_sidebar_active_right() ) { return;} ?>

<aside id="secondary" class="widget-area widget-area--right col-md-4 <?php bellini_sidebar_widget_class(); ?>" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
</aside><!-- #secondary -->