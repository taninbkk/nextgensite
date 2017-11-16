<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */
?>
<?php
	global $post;
	$author_id=$post->post_author;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("post-item post-item--l5 col-sm-4");?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
<div class="blog__post--l5 row">
	<div class="col-xs-12 post-content--l5">
		<?php bellini_category(); ?>
	<header class="entry-header post-title--l5">
		<?php the_title( sprintf( '<h3 itemprop="headline" class="entry-title"><a href="%s" class="element-title element-title--post" rel="bookmark" itemprop="name">',
				esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	</header>
	<div class="blog__post__excerpt--l5" itemprop="description">
		<?php
			the_excerpt( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bellini' ),
					array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div>
	<div class="blog__post__author-box">
		<?php echo get_avatar($author_id, '65');?>
		<?php bellini_post_author();?>
	</div>
	</div>
</div>
</article><!-- #post-## -->