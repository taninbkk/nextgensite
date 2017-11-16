<?php
/**
 * @package bellini
 */
global $bellini;
get_header(); ?>
<div id="primary" class="content-area">
<main id="main" class="site-main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;?>

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
<?php
get_footer(); ?>