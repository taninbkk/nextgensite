<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bellini
 */
global $bellini;
?>
</div><!-- #content -->


<footer id="colophon" class="site-footer container-fluid" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

<?php if ( is_active_sidebar( 'sidebar-footer' ) ):?>
    <aside id="secondary" class="widget-area__footer" role="complementary">
    <div class="bellini__canvas">
    <div class="row">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
    </div>
    </div>
    </aside><!-- #secondary -->
<?php endif;?>

<div class="site-footer--center bellini__canvas">
<div class="row">
	<?php bellini_core_footer_layout();?>
</div>
</div>
</footer><!-- #colophon -->
<a href="#0" class="scrollToTop"><i class="fa fa-angle-up fa-lg"></i></a>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>