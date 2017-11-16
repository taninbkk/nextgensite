<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */
global $bellini;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
<div class="container--card-content clearfix">

<div class="row">
	<div class="col-md-8 testimonial__body">
		<?php bellini_edit_content(); ?>
		<?php the_content(); ?>
		<?php the_title( '<h1 class="element-title element-title--post single-post__title--l3" itemprop="name headline">', '</h1>' ); ?>
	</div>

	<div class="col-md-4 testimonial__image">
		<?php bellini_single_post_thumbnail();?>
	</div>
</div>

</div>
</article>