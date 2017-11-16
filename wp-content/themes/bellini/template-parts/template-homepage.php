<?php
/**
 *
 * Template name: Homepage
 *
 * @package bellini
 */
get_header();
?>
<main role="main">

<?php
	do_action( 'homepage' );
?>

</main>
<?php get_footer();?>