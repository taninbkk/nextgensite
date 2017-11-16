<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bellini
 */
if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area col-md-3 widget-area--blog" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside><!-- #secondary -->