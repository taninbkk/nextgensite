<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */
?>

<li itemscope itemtype="https://schema.org/Thing">

	<header class="entry-header">
	<!-- Standard URL and name itemprops -->
		<?php the_title( '<h2 class="entry-title" itemprop="name"><a href="' . esc_url( get_permalink() ) . '" itemprop="url">', '</a></span>' ); ?>
	</header>

	<?php
	/*
	 * Customize w/ get_the_post_thumbnail() to add schema
	 * @link https://developer.wordpress.org/reference/functions/get_the_post_thumbnail
	 */
	if ( has_post_thumbnail() ) {
			the_post_thumbnail();
	} ?>

	<!-- A description of the post content - the excerpt -->
	<div itemprop="description">
		<?php
		/**
		 * Customize the Read More link by using the "excerpt_more" filter
		 *
		 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
		 * @link https://codex.wordpress.org/Customizing_the_Read_More
		 */

		the_excerpt();
		?>
	</div><!--/itemprop=description-->
</li>