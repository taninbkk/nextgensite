<?php
global $bellini;
$bellini = bellini_option_defaults();
?>
<!DOCTYPE html>
<!-- Microdata markup added by Google Structured Data Markup Helper. -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="referrer" content="no-referrer-when-downgrade">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="hfeed site website-width">

<?php
	do_action( 'bellini_before_header' );
	$header_orientation = sanitize_html_class($bellini['bellini_header_orientation']); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bellini' ); ?></a>
	<header id="masthead" class="site-header <?php echo $header_orientation; ?>" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

	<div class="custom-header">
		<div class="custom-header-media">
			<?php the_custom_header_markup(); ?>
		</div>

		<div class="header-inner bellini__canvas">
		<div class="row flexify--center">
			<?php do_action( 'bellini_header' ); ?>
		</div>
		</div>
	</div>

	</header>
<?php do_action( 'bellini_after_header' ); ?>
<div id="content" class="site-content">