<?php


function bellini_header_logo(){ ?>
	<?php
	// Check if Logo is Active
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ):
			the_custom_logo();
		else: ?>
		<!-- Display the Sitename as Logo -->
			<p class="site-title" itemprop="headline">
				<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</p>
	<?php endif;
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description" itemprop="description">
				<?php echo $description; ?>
			</p>
		<?php endif; ?>
<?php }


function bellini_header_menu(){
global $bellini;

if ( $bellini['bellini_menu_layout'] == 'hamburger' ):?>

			<!-- Hamburger Menu -->
			<div class="hamburger__menu__full">
			<div class="row hamburger__menu__middle" aria-controls="primary-menu" aria-expanded="true">

			<div class="col-xs-12 hamburger__site-title" itemprop="headline">
				<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
				</a>
				<a class="ham__close"><?php esc_attr_e( 'Close', 'bellini' ); ?></a>
			</div>

				<div class="col-md-12 col-xs-12 site-header-cart menu clearfix">
				<nav id="site-navigation-ham" aria-label="site links" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'main-nav' ) ); ?>
				</nav>
				</div>
			</div>
		</div>
		<!-- Mobile Menu Hamburger Icon -->
		<button class="hamburger hamburger--spring" type="button" aria-controls="primary-menu" aria-expanded="false">
		  <span class="hamburger-box">
		    <span class="hamburger-inner"></span>
		  </span>
		  <?php if($bellini['bellini_hamburger_title'] == true){
		  		echo '<p>';
		        echo esc_html($bellini['bellini_hamburger_title']);
		        echo '</p>';
			}?>
		</button>

		<?php else:?>

		<?php
			//Support for Max Mega Menu
			 if ( class_exists( 'Mega_Menu_Nav_Menus' ) && max_mega_menu_is_enabled('primary') ) { ?>
				<nav id="site-navigation" class="main-navigation" role="navigation">
			    <button class="menu-toggle"><?php _e( 'Menu', 'bellini' ); ?></button>
			    <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'bellini' ); ?>"><?php _e( 'Skip to content', 'bellini' ); ?></a>
			    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', ) ); ?>
			</nav><!-- #site-navigation -->
			<?php }else{ ?>

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="site links" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
					<?php esc_html_e( 'Menu', 'bellini' ); ?>
				</button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

			<?php }
			endif;
}



if ( ! function_exists( 'bellini_product_search' ) ) {
	function bellini_product_search() {
		if ( is_woocommerce_activated() ) { ?>
			<div class="site-search">
			<span class="site-search__icon"></span>
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
		<?php
		}
	}
}

if ( ! function_exists( 'bellini_cart_link' ) ) {
	function bellini_cart_link() {?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'bellini' ); ?>">
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
				<span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'bellini' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}


if ( ! function_exists( 'bellini_header_cart' ) ) {
	function bellini_header_cart() {
		if ( is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = 'listed__total';
			}
		?>
		<!-- Cart Sidebar -->
		<div class="sidebar__cart__full">
			<div class="row sidebar__cart__middle">
				<button class="cart-toggles cart-toggles--close">
				<?php esc_html_e( 'Your Cart ', 'bellini' ); ?>
				</button>
					<ul class="col-md-12 site-header-cart menu">
						<li class="<?php echo sanitize_html_class( $class ); ?>">
							<?php bellini_cart_link(); ?>
						</li>
						<li>
							<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
						</li>
					</ul>
			</div>
		</div>
		<button class="cart-toggles <?php bellini_header_cart_class();?>">
		<span class="shopping_bag_items_number">
			<?php echo WC()->cart->get_cart_contents_count();?>
		</span>
		</button><!-- cart toggle ends -->
		<?php
		}
	}
}


function bellini_top_header(){
	if(is_woocommerce_activated()){?>
	<div class="bellini__cart">
		<ul class="header_cart_fragments">
			<li class="header__cart">
				<?php bellini_header_cart(); ?>
			</li>
			<li class="header__search">
				<?php bellini_product_search(); ?>
			</li>
		</ul>
	</div>
<?php
	}
}


function bellini_social_menu(){
	global $bellini;
?>

	<div class="bellini-social__link" itemscope itemtype="http://schema.org/Organization">
	<link itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>">

	<?php
	// Social Link Field 1
	if(!empty($bellini['bellini_social_account_link_one'])):
		$social_link_one = esc_url($bellini['bellini_social_account_link_one']); ?>
	<a itemprop="sameAs" href="<?php echo $social_link_one;?>">
	  	<span class="<?php echo esc_attr( $bellini['bellini_social_account_icon_one' ]); ?>"></span>
	</a>
	<?php endif; ?>

	<?php
	// Social Link Field 2
	if(!empty($bellini['bellini_social_account_link_two'])):
		$social_link_two = esc_url($bellini['bellini_social_account_link_two']); ?>
	<a itemprop="sameAs" href="<?php echo $social_link_two;?>">
	  	<span class="<?php echo esc_attr( $bellini['bellini_social_account_icon_two' ]); ?>"></span>
	</a>
	<?php endif; ?>

	<?php
	// Social Link Field 3
	if(!empty($bellini['bellini_social_account_link_three'])):
		$social_link_three = esc_url($bellini[ 'bellini_social_account_link_three']); ?>
	<a itemprop="sameAs" href="<?php echo $social_link_three;?>">
	  	<span class="<?php echo esc_attr( $bellini[ 'bellini_social_account_icon_three' ]); ?>"></span>
	</a>
	<?php endif; ?>

	<?php
	// Social Link Field 4
	if(!empty($bellini['bellini_social_account_link_four'])):
		$social_link_four = esc_url($bellini[ 'bellini_social_account_link_four']); ?>
	<a itemprop="sameAs" href="<?php echo $social_link_four;?>">
	  	<span class="<?php echo esc_attr( $bellini[ 'bellini_social_account_icon_four' ]); ?>"></span>
	</a>
	<?php endif; ?>

	<?php
	// Social Link Field 5
	if(!empty($bellini['bellini_social_account_link_five'])):
		$social_link_five = esc_url($bellini[ 'bellini_social_account_link_five']); ?>
	<a itemprop="sameAs" href="<?php echo $social_link_five;?>">
	  	<span class="<?php echo esc_attr( $bellini[ 'bellini_social_account_icon_five' ]); ?>"></span>
	</a>
	<?php endif; ?>

	<?php
	// Social Link Field 6
	if(!empty($bellini['bellini_social_account_link_six'])):
		$social_link_six = esc_url($bellini[ 'bellini_social_account_link_six']); ?>
	<a itemprop="sameAs" href="<?php echo $social_link_six;?>">
	  	<span class="<?php echo esc_attr( $bellini['bellini_social_account_icon_six' ]); ?>"></span>
	</a>
	<?php endif; ?>

	</div>

<?php }

function bellini_other_header_items(){
	global $bellini;
	if ( $bellini['bellini_other_header_items_selector'] === 1 ):
		bellini_top_header();
	endif;

	if ( $bellini['bellini_other_header_items_selector'] === 2 ):
		bellini_social_menu();
	endif;
}


function bellini_core_header(){
	global $bellini;

	if ( $bellini['bellini_header_menu_layout'] === 1 ):

		if ( $bellini['bellini_menu_layout'] == 'hamburger' ):?>
			<div class="site-branding col-md-6 header--one__logo"><?php bellini_header_logo();?></div>
			<div class="col-md-6 text-right header--one__menu"><?php bellini_header_menu();?></div>
		<?php else:?>
			<div class="site-branding col-md-4 header--one__logo"><?php bellini_header_logo();?></div>
			<div class="col-md-8 text-right header--one__menu"><?php bellini_header_menu();?></div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( $bellini['bellini_header_menu_layout'] === 2 ):
			if ( $bellini['bellini_menu_layout'] == 'hamburger' ):?>
				<div class="col-md-6 header--two__menu"><?php bellini_header_menu();?></div>
				<div class="site-branding col-md-6 text-right header--two__logo"><?php bellini_header_logo();?></div>
			<?php else:?>
				<div class="col-md-8 header--two__menu"><?php bellini_header_menu();?></div>
				<div class="site-branding col-md-4 text-right header--two__logo"><?php bellini_header_logo();?></div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( $bellini['bellini_header_menu_layout'] === 3 ): ?>
		<div class="site-branding col-md-2 header--three__logo"><?php bellini_header_logo();?></div>
		<div class="col-md-8 text-center header--three__menu"><?php bellini_header_menu();?></div>
		<div class="col-md-2 header--three__other"><?php bellini_other_header_items();?></div>
	<?php endif; ?>

<?php }