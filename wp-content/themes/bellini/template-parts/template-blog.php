<?php
/**
 *
 * Template name: Blog Posts
 *
 * @package bellini
 */
get_header(); ?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
<?php
		//Fix homepage pagination
		if ( get_query_var('paged') ) {
		    $paged = get_query_var('paged');
		} else if ( get_query_var('page') ) {
		    $paged = get_query_var('page');
		} else {
		    $paged = 1;
		}
		$args = array(
			'post_type' => 'post',
			'orderby' => 'date',
			'order' => 'DESC',
			'paged' => $paged,
			'posts_per_page' => 12
		);


		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query( $args );

		if ( $wp_query->have_posts() ) {
			echo '<header class="col-md-12 page__header entry-header">';
			echo '<div class="single page-meta">';
			the_title( '<h1 class="entry-title element-title single-page__title" itemprop="headline">', '</h1>' );
			bellini_breadcrumb_integration();?>
			</header>
			<div class="bellini__canvas">
			<div class="row">
			<div class="template__blog <?php bellini_blog_sidebar();?>">
			<section class="posts__grid">
			<div class="row">

			<?php
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
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
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		wp_reset_postdata(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>