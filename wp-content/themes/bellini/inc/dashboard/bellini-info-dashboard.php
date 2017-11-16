<?php

/**
 * Redirect to Getting Started page on theme activation
 */
function bellini_redirect_on_activation() {
	global $pagenow;

	if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

		wp_redirect( admin_url( "themes.php?page=bellini-getting-started" ) );

	}
}
add_action( 'admin_init', 'bellini_redirect_on_activation' );

function bellini_start_load_admin_scripts() {

	// Load styles only on our page
	global $pagenow;
	if( 'themes.php' != $pagenow )
		return;

	wp_register_style( 'bellini-getting-started', get_template_directory_uri() . '/inc/dashboard/bellini-info-dashboard.css', false, '1.0.0' );
	wp_enqueue_style( 'bellini-getting-started' );
}

add_action( 'admin_enqueue_scripts', 'bellini_start_load_admin_scripts' );


/* Hook a menu under Appearance */
function bellini_getting_started_menu() {
	add_theme_page(
		esc_attr__( 'Bellini: Get Started', 'bellini' ),
		esc_attr__( 'Bellini: Get Started', 'bellini' ),
		'manage_options',
		'bellini-getting-started',
		'bellini_getting_started'
	);
}

add_action( 'admin_menu', 'bellini_getting_started_menu' );



/**
 * Theme Info Page
 */
function bellini_getting_started() {

	// Theme info
	$theme = wp_get_theme( 'bellini' );
?>

		<div class="wrap getting-started">
		<div class="getting-started__header">
		<div class="row">
			<div class="col-md-5 intro">
				<h2><?php esc_html_e( 'Welcome to Bellini ', 'bellini' ); ?></h2>
				<p>Version: <?php echo $theme['Version'];?></p>
				<span class="intro__version">
				Congratulations! You are about to use the most easy to use and felxible WordPress theme built for launching an online store.
				</span>

			<div class="club-discount">
				<p><strong><?php esc_html_e( 'Exclusive 20% Discount!', 'bellini' ); ?></strong></p>
				<p><?php
						$themes_link = '<code><strong>BELLINI20</strong></code>';
						printf( __( 'Use the code %s to get 20&#37; off when you purchase Bellini Pro!. For limited period only.', 'bellini' ), $themes_link );
					?>
				</p>
			</div>
			</div>

			<div class="col-md-7">
			<div class="dashboard__block block--pro">
				<img src="<?php echo get_template_directory_uri() . '/images/why-bellini-pro.jpg'; ?>" alt="<?php esc_html_e( 'Why Upgrade To Bellini Pro', 'bellini' ); ?>" /></a>
			</div>
			</div>

			<div class="col-md-12 text-block">
			<div class="row">
					<div class="col-md-7 dashboard-upgrade-left">
					<img src="<?php echo get_template_directory_uri() . '/images/demo-import.jpg'; ?>" alt="<?php esc_html_e( 'One Click Demo Import', 'bellini' ); ?>">
					</div>
					<div class="col-md-5 dashboard-upgrade-right">
					<h2 class="dashboard-upgrade-title">One Click Demo Import</h2>
					<span class="dashboard-upgrade-button">Upgrade</span>
					<p>Import Pre Built Websites with just one click.</p>
					<div class="dashboard-upgrade-benefit">
					<ul>
						<li>No hassle! Spend less time building website</li>
						<li>Check out the growing <a href="<?php echo esc_url('demo.atlantisthemes.com'); ?>">Bellini Demo Templates</a>.</li>
					</ul>

					</div>
					</div>
			</div>
			</div>


			<div class="col-md-12 text-block no-bottom-margin">
			<div class="row">
					<div class="col-md-7 dashboard-upgrade-left">
					<img src="<?php echo get_template_directory_uri() . '/images/email-support.png'; ?>" alt="<?php esc_html_e( 'Bellini Customer Support', 'bellini' ); ?>">
					</div>
					<div class="col-md-5 dashboard-upgrade-right">
					<h2 class="dashboard-upgrade-title">Commited, One to One Support</h2>
					<span class="dashboard-upgrade-button">Upgrade</span>
					<p>Expert advice is only an email away.</p>
					<div class="dashboard-upgrade-benefit">
					<ul>
						<li>Dedicated support team for Pro users.</li>
						<li>One to one email support.</li>
					</ul>

					</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 text-block no-bottom-margin">
				<div class="row">
					<div class="col-md-7 dashboard-upgrade-left">
					<img src="<?php echo get_template_directory_uri() . '/images/woocommerce.jpg'; ?>" alt="<?php esc_html_e( 'WooCommerce Compatibility', 'bellini' ); ?>">
					</div>
					<div class="col-md-5 dashboard-upgrade-right">
					<h2 class="dashboard-upgrade-title">Deep WooCommerce Integration</h2>
					<span class="dashboard-upgrade-button">Upgrade</span>
					<p>Developed following WooCommerce guideline.</p>
					<div class="dashboard-upgrade-benefit">
					<ul>
						<li>100% compatible with WooCommerce</li>
						<li>Lots of layout for Shop and Product pages.</li>
						<li>Optimized for higher conversion.</li>
					</ul>

					</div>
					</div>
				</div>
			</div>

		</div>
		</div>

			<div class="col-md-12 bellini__upgrade-info-box no-top-margin">
			<div class="row flexify--center">
				<div class="col-md-7">
					<h2>Upgrade to get the most out of Bellini</h2>
					<p>Live customization is the beginning of what Bellini can do to help you design your website. Upgrade now.</p>
				</div>

				<div class="col-md-5 dashboard-cta-right">
					<a class="theme__cta--download--pro" href="<?php echo esc_url('https://atlantisthemes.com'); ?>">Upgrade Now</a>
					<a class="theme__cta--demo" href="<?php echo esc_url('demo.atlantisthemes.com'); ?>">Live Demo</a>
				</div>
			</div>
			</div>



		<div class="dashboard__blocks">
		<div class="row">

			<div class="col-md-4">
				<h3>Get Support</h3>
				<ol>
					<li>Bellini <a href="<?php echo esc_url('https://atlantisthemes.com/documentation/'); ?>">Documentation</a></li>
					<li>WordPress.org <a href="<?php echo esc_url('https://wordpress.org/support/theme/bellini'); ?>">Support Forum</a></li>
					<li><a href="<?php echo esc_url('https://atlantisthemes.com/contact/'); ?>">Email Support</a> (Pro Users)</li>
				</ol>
			</div>

			<div class="col-md-4">
				<h3>Getting Started</h3>
				<ol>
					<li>Start <a href="<?php echo esc_url( admin_url('customize.php') ); ?>">Customizing</a> your website.</li>
					<li>Install <a href="<?php echo esc_url('https://wordpress.org/plugins/homepage-control/'); ?>">Homepage Control</a> to re-order Frontpage sections.</li>
					<li>Upgrade to Pro to unlock all features.</li>
				</ol>
			</div>

			<div class="col-md-4">
				<h3>Help Docs</h3>
				<ol>
					<li><a href="<?php echo esc_url('https://atlantisthemes.com/docs/front-page/how-to-set-up-the-front-page/'); ?>">How To Set up the Front Page</a>.</li>
					<li><a href="<?php echo esc_url('https://atlantisthemes.com/docs/front-page/blocks-front-page/how-to-display-blocks-on-front-page/'); ?>">How To Display Blocks on Front page</a>.</li>
					<li><a href="<?php echo esc_url('https://atlantisthemes.com/docs/integrations/woocommerce/how-to-display-sidebar-in-woocommerce-shop-page/'); ?>">How To Display Sidebar in WooCommerce Shop Page</a>.</li>
				</ol>
			</div>
		</div>
		</div>

		</div><!-- .getting-started -->

	<?php
}