<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bellini
 */
get_header(); ?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<section class="error-404 not-found bellini__canvas">
<header class="page-header col-md-12">
	<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bellini' ); ?></h1>
</header>
<div class="page-content">
	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bellini' ); ?></p>
	<?php
		get_search_form();
	?>
</div>
</section>
</main>
</div>
<?php get_footer(); ?>