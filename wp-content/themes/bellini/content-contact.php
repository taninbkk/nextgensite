<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
<div class="container--card-content">

<div class="entry-content" itemprop="text">
	<div class="row">
		<div class="col-md-6">
		<?php the_content(); ?>
		</div>
		<div class="col-md-6">
		<?php echo do_shortcode('[contact-form-7 id="3" title=”Contact form 1"]');?>
		</div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bellini' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</div><!-- .entry-content -->
</div>
</article><!-- #post-## -->