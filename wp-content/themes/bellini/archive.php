<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */
global $bellini;
get_header(); ?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>
			<header class="page-header col-md-12">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>

			<div class="bellini__canvas">
			<div class="row">
			<div class="template__blog <?php bellini_blog_sidebar();?>">
			<section class="posts__grid">
			<div class="row">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if ( absint($bellini['bellini_layout_blog']) === 1 ):
					get_template_part( 'template-parts/content' );
				endif;
				if ( absint($bellini['bellini_layout_blog']) === 5 ):
					get_template_part( 'template-parts/content-lb-5');
				endif;
			endwhile;
					bellini_pagination();
					echo '</div>';
					echo '</section>';
					echo '</div>';
	 				get_sidebar('blog');
	 				echo '</div>';
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		wp_reset_postdata(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>