<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package bellini
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bellini_header_style()
 * @uses bellini_admin_header_style()
 * @uses bellini_admin_header_image()
 */
function bellini_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'bellini_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 300,
		'flex-height'            => true,
		'wp-head-callback'       => 'bellini_header_style',
		'admin-preview-callback' => 'bellini_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'bellini_custom_header_setup' );

if ( ! function_exists( 'bellini_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see bellini_custom_header_setup().
 */
function bellini_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	if ( empty( $header_image ) && $header_text_color ) {
		return;
	}
	// If we get this far, we have custom styles. Let's do this.
	?>

	<style type="text/css">
	/* Has the text been hidden? */
	<?php if ( ! display_header_text() ) :?>
		.site-title,
		.site-description {position: absolute; clip: rect(1px, 1px, 1px, 1px);}
	/* If the user has set a custom color for the text use that. */
	<?php else :?>
		.site-title a,
		.site-description {color: #<?php echo esc_attr( $header_text_color );?>;}
	<?php endif; ?>
	</style>
	<?php
}
endif; /* bellini_header_style */


if ( ! function_exists( 'bellini_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see bellini_custom_header_setup().
 */
function bellini_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif;