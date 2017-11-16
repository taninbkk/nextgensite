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
<header class="entry-header">
	<div class="single post-meta">
	<!-- Support for Yoast SEO Breadcrumb-->
		<?php if ( function_exists('yoast_breadcrumb') ){yoast_breadcrumb('<span class="breadcrumbs">','</span>');} ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'bellini' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
					'<span class="edit-link">',
					'</span>'
			);
		?>
	</div>
	<?php 
			the_title( '<h1 class="entry-title element-title single-page__title" itemprop="headline">', '</h1>' );
	?>
</header><!-- .entry-header -->
<div class="entry-content" itemprop="text">
	<?php the_content(); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bellini' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->
</div>
</article><!-- #post-## -->