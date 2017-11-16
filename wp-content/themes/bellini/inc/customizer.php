<?php
/**
* bellini Theme Customizer.
*
* @package bellini
*/
function bellini_customize_register( $wp_customize ) {

require_once(get_template_directory() . '/inc/customize/bellini-custom-control.php');          //Custom Controls

/**
* Your Brand name
*/
$wp_customize->get_section('title_tagline')->title 				= esc_html__('Brand Name','bellini' );
$wp_customize->get_section( 'title_tagline' )->priority 		= 1;
$wp_customize->get_control('blogname')->label 					= esc_html__('Site Title & Tagline', 'bellini');
$wp_customize->get_setting( 'blogname' )->transport         	= 'postMessage';
$wp_customize->get_control('blogdescription')->label 			= esc_html__('', 'bellini');
$wp_customize->get_setting( 'blogdescription' )->transport  	= 'postMessage';
$wp_customize->get_control( 'display_header_text' )->section  	= 'bellini_hide_header_components';
$wp_customize->get_control('custom_logo')->label 				= esc_html__('Logo Image', 'bellini');
$wp_customize->get_control('custom_logo')->description 			= esc_html__('Upload a logo image to used in the place of your site title.', 'bellini');

$wp_customize->get_control('blogname')->description 			= esc_html__("Your Website's Name", 'bellini');
$wp_customize->get_control('blogdescription')->description 		= esc_html__("Your Website's Tagline", 'bellini');

$wp_customize->get_control('custom_logo')->priority 			= 2;
$wp_customize->get_control('blogname')->priority 				= 3;
$wp_customize->get_control('blogdescription')->priority 		= 4;

/**
* Colors Panel.
*/
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
$wp_customize->get_control( 'header_textcolor' )->section 	= 'text_color';
$wp_customize->get_setting( 'background_color' )->default 	= '#eceef1';
$wp_customize->get_control( 'background_color' )->section 	= 'section_color';
$wp_customize->get_control( 'background_color' )->priority 	= 3;
$wp_customize->get_control( 'background_color' )->label 	= esc_html__('Website Background Color', 'bellini');



/*--------------------------------------------------------------
## Top Panels
--------------------------------------------------------------*/

$wp_customize->get_section( 'static_front_page' )->priority = 1;
$wp_customize->get_section(	'static_front_page')->title 	= esc_html__( 'Select Your Frontpage','bellini' );
$wp_customize->get_section( 'static_front_page' )->panel 	= 'bellini_frontpage_panel';
$wp_customize->remove_section('background_image');


// Frontpage Panel
$wp_customize->add_panel( 'bellini_frontpage_panel', array(
	'priority'       => 2,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Frontpage','bellini' ),
	'description'    => esc_html__( 'Your frontpage elements','bellini' ),
) );

// Color Panel
$wp_customize->add_panel( 'bellini_colors_panel', array(
	'priority'       => 3,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Colors & Typography','bellini' ),
	'description'    => esc_html__( 'Customize your sites color and font','bellini' ),
) );


// Layout & Positioning Panel
$wp_customize->add_panel( 'bellini_placeholder_layout_panel', array(
	'priority'       => 4,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Layout','bellini' ),
	'description'    => esc_html__( 'Change layout or shape and postion of components.','bellini' ),
) );



// Show / Hide
$wp_customize->add_panel( 'bellini_show_hide_components', array(
	'priority'       => 5,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Show / Hide','bellini' ),
	'description'    => esc_html__('Check 3rd Party Software & App Settings','bellini' ),
) );

// Default Image & Text Panel
$wp_customize->add_panel( 'bellini_misc_panel', array(
	'priority'       => 6,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Other Options','bellini' ),
	'description'    => esc_html__( 'Set default content link text, image or social icons','bellini' ),
) );

// 3rd party Integrations
$wp_customize->add_panel( 'bellini_third_party_integration', array(
	'priority'       => 7,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Integrations','bellini' ),
	'description'    => esc_html__('Check 3rd Party Software & App Settings','bellini' ),
) );


	// Logo & Title
	$wp_customize->add_setting( 'bellini_logo_title_helper',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_logo_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Logo & Title','bellini'),
					'section' => 'title_tagline',
					'settings'    => 'bellini_logo_title_helper',
					'priority'   => 1,
			)) );

	// Logo & Title
	$wp_customize->add_setting( 'bellini_logo_favicon_helper',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_logo_favicon_helper', array(
					'type' => 'info',
					'label' => esc_html__('Favicon','bellini'),
					'section' => 'title_tagline',
					'settings'    => 'bellini_logo_favicon_helper',
					'priority'   => 4,
			)) );


/*--------------------------------------------------------------
## Settings & Controls
--------------------------------------------------------------*/
require_once(get_template_directory() . '/inc/customize/settings-bellini-pro.php');      //	Pro Hooks
require_once(get_template_directory() . '/inc/customize/settings-content.php');          //	Default Image & Content
require_once(get_template_directory() . '/inc/customize/settings-position.php');         //	Position
require_once(get_template_directory() . '/inc/customize/settings-typography.php');       //	Typography
require_once(get_template_directory() . '/inc/customize/settings-color.php');            //	Color
require_once(get_template_directory() . '/inc/customize/settings-front.php');            //	Front Page Template
require_once(get_template_directory() . '/inc/customize/settings-integrations.php');     // Integrations

}

add_action( 'customize_register', 'bellini_customize_register' );

function bellini_customizer_head_styles() {
global $bellini;

$website_width 										= esc_attr($bellini['bellini_website_width']);
$canvas_width 										= esc_attr($bellini['bellini_canvas_width']);
$bellini_header_width 								= esc_attr($bellini['bellini_header_width']);
$bellini_menu_position         						= esc_attr($bellini['bellini_menu_position']);
$page_title_position								= esc_attr($bellini['page_title_position']);
$bellini_body_font_size								= absint($bellini['bellini_body_font_size']);
$bellini_title_font_size							= absint($bellini['bellini_title_font_size']);
$bellini_menu_font_size								= absint($bellini['bellini_menu_font_size']);
$body_text_color 									= sanitize_hex_color($bellini['body_text_color']);
$bellini_primary_color								= sanitize_hex_color($bellini['bellini_primary_color']);
$bellini_accent_color								= sanitize_hex_color($bellini['bellini_accent_color']);
$title_text_color 									= sanitize_hex_color($bellini['title_text_color']);
$menu_text_color 									= sanitize_hex_color($bellini['menu_text_color']);
$logo_text_color 									= get_header_textcolor();
$button_text_color 									= sanitize_hex_color($bellini['button_text_color']);
$link_text_color 									= sanitize_hex_color($bellini['link_text_color']);
$link_hover_color 									= sanitize_hex_color($bellini['link_hover_color']);
$widget_background_color 							= sanitize_hex_color($bellini['widgets_background_color']);
$header_background_color 							= sanitize_hex_color($bellini['header_background_color']);
$footer_background_color 							= sanitize_hex_color($bellini['footer_background_color']);
$button_background_color 							= sanitize_hex_color($bellini['button_background_color']);
$slider_button_1_text_color 						= sanitize_hex_color($bellini['slider_button_1_text_color']);
$slider_button_2_text_color 						= sanitize_hex_color($bellini['slider_button_2_text_color']);

$bellini_feature_block_background_color 			= sanitize_hex_color($bellini['bellini_feature_block_background_color']);
$bellini_static_slider_button_background_one 		= sanitize_hex_color($bellini['bellini_static_slider_button_background_one']);
$bellini_static_slider_button_background_two 		= sanitize_hex_color($bellini['bellini_static_slider_button_background_two']);
$bellini_hero_content_color 						= sanitize_hex_color($bellini['bellini_hero_content_color']);
$bellini_blogposts_background_color					= sanitize_hex_color($bellini['bellini_blogposts_background_color']);
$bellini_frontpage_textarea_section_color			= sanitize_hex_color($bellini['bellini_frontpage_textarea_section_color']);
$bellini_frontpage_textarea_section_image 			= esc_url($bellini['bellini_frontpage_textarea_section_image']);


$font_preset   										= esc_attr($bellini['preset_font']);
$font_preset_title 									= bellini_font_preset_title($font_preset);
$font_preset_body 									= bellini_font_preset_body($font_preset);

$logo_font   										= esc_attr($bellini['bellini_logo_typography_font']);
$logo_font_select									= bellini_font_logo($logo_font);

$element_title_capitalization						= esc_attr($bellini['bellini_header_title_capitalization']);
$bellini_widget_title_alignment						= esc_attr($bellini['bellini_widget_title_alignment']);
$bellini_footer_widget_alignment					= esc_attr($bellini['footer_widget_alignment']);

$bellini_custom_code_css							= esc_attr($bellini['bellini_custom_css']);

// CSS Classes
$primary_color_text 			= ".bellini-social__link a span,.scrollToTop,.shopping_bag_items_number";
$primary_color_background 		= ".hamburger-inner,.hamburger-inner::before,.hamburger-inner::after,.hamburger__site-title,.product-featured__title h1:after,.product-featured__title--l2 h1:after";

$bellini_meta_color_text 		= ".comments-link a,.post-meta__time,.breadcrumb_last,.single.post-meta,.single.post-meta a,.post-meta__category a,.comment-reply-link,.comment__author,.blog-post__meta .post-meta__time,.post-meta__author,.comment-edit-link";
$bellini_meta_color_background 	= ".main-navigation li a:before,.post-meta__tag__item a:before";
$button_color_background 		= ".comment-form input[type=submit],.button--cta--center,.site-search form input[type=submit],.button--secondary";
$button_color_text 				= ".button--secondary a,.button--cta--center,.comment-form input[type=submit]";
?>

<style type="text/css">
body,
button,
input,
select,
textarea{
	font-family: <?php echo $font_preset_body;?>;
	font-size:<?php echo $bellini_body_font_size;?>px;
	color:<?php echo $body_text_color;?>;
}

h3.block-title{font-family: <?php echo $font_preset_body;?>;}

.site-branding{
	font-family: <?php echo $logo_font_select;?>;
}

h1,h2,h3,h4,h5,h6,
.element-title,
.element-title--post,
.element-title--main,
.single-page__title,
.page-title,
.single-post__title,
.main-navigation a,
.hamburger__menu--open .menu-item{
	font-family: <?php echo $font_preset_title; ?>;
}

.element-title,
.element-title--post,
.element-title--main,
.single-page__title,
.single-post__title{
	font-size:<?php echo $bellini_title_font_size;?>px;
	color: <?php echo $title_text_color; ?>;
	text-transform: <?php echo $element_title_capitalization; ?>;
}

.widget-title{text-align:<?php echo $bellini_widget_title_alignment; ?>;}

.website-width{width:<?php echo $website_width; ?>%;}
.bellini__canvas{max-width:<?php echo $canvas_width;?>;}
.header-inner{max-width:<?php echo $bellini_header_width;?>;}

/* Color */
<?php echo $primary_color_text;?>{color: <?php echo $bellini_primary_color; ?>;}
.shopping_bag_items_number{border-color: <?php echo $bellini_primary_color; ?>;}
<?php echo $primary_color_background;?>{background-color: <?php echo $bellini_primary_color; ?>;}
<?php echo $bellini_meta_color_text;?>{color: <?php echo $bellini_accent_color; ?>;}
<?php echo $bellini_meta_color_background;?>{background-color: <?php echo $bellini_accent_color; ?>;}

.current-menu-item a,.main-navigation .menu-item a:hover{border-color:<?php echo $bellini_primary_color; ?> !important;}

a{color: <?php echo $link_text_color; ?>;}
a:hover,a:focus,a:active{color: <?php echo $link_hover_color; ?>;}
.site-header{background-color: <?php echo $header_background_color; ?>;}
.site-footer{background-color: <?php echo $footer_background_color; ?>;}
#secondary .widget{background-color: <?php echo $widget_background_color; ?>;}
.main-navigation a,.main-navigation ul ul a{color: <?php echo $menu_text_color; ?>;}
.site-title a{color: #<?php echo $logo_text_color; ?>;}
<?php echo $button_color_background;?>{background-color: <?php echo $button_background_color; ?>;}
<?php echo $button_color_text;?>{color: <?php echo $button_text_color; ?>;}

/* Position */
.nav-menu {text-align: <?php echo $bellini_menu_position; ?>;}
.page-title,
.single-page__title,
.woocommerce-breadcrumb,
.breadcrumbs{text-align:<?php echo $page_title_position; ?>;}

.widget__footer__widget,
.widget__footer__widget .widget-title{text-align:<?php echo $bellini_footer_widget_alignment; ?>;}

.main-navigation a,.page-numbers a,.page-numbers span,.cart-toggles{font-size:<?php echo $bellini_menu_font_size;?>px;}



/* Front Page */
	.slider-content__title, .slider-content{color:<?php echo $bellini_hero_content_color; ?>;}
	.front-feature-blocks{background-color:<?php echo $bellini_feature_block_background_color; ?>;}
	.front-blog{background-color:<?php echo $bellini_blogposts_background_color;?>;}
	.front-text-field{background-color:<?php echo $bellini_frontpage_textarea_section_color;?>;}
	.front-text-field{background-image: url(<?php echo $bellini_frontpage_textarea_section_image; ?>);}
	.slider__cta--one{background-color: <?php echo $bellini_static_slider_button_background_one; ?>; color: <?php echo $slider_button_1_text_color; ?>;}
	.slider__cta--one:hover{color: <?php echo $bellini_static_slider_button_background_one; ?>; background-color: <?php echo $slider_button_1_text_color; ?>;}
	.slider__cta--two{background-color: <?php echo $bellini_static_slider_button_background_two; ?>; color: <?php echo $slider_button_2_text_color; ?>;}
	.slider__cta--two:hover{color: <?php echo $bellini_static_slider_button_background_two; ?>; background-color: <?php echo $slider_button_2_text_color; ?>;}


<?php
    if ( ! empty( $bellini_custom_code_css ) ) {
		echo $bellini_custom_code_css;
    }
?>

</style>
<?php }

add_action( 'wp_head', 'bellini_customizer_head_styles' );

if ( is_woocommerce_activated() ):

	add_action( 'wp_head', 'bellini_customizer_woocommerce_head_styles' );

	function bellini_customizer_woocommerce_head_styles() {
	global $bellini;

		$woo_category_background_color 			= sanitize_hex_color($bellini['woo_category_background_color']);
		$woo_product_background_color			= sanitize_hex_color($bellini['woo_product_background_color']);
		$woo_featured_product_background_color	= sanitize_hex_color($bellini['woo_featured_product_background_color']);

		$woo_shop_product_title_font_size 		= absint($bellini['bellini_woocommerce_shop_title_font_size']);
		$woo_shop_product_price_font_size 		= absint($bellini['bellini_woocommerce_shop_price_font_size']);

		$product_card_background_color 			= sanitize_hex_color($bellini['bellini_woocommerce_product_card_back_color']);
		$product_card_title_color 				= sanitize_hex_color($bellini['bellini_woocommerce_product_title_color']);
		$product_card_button_text_color 		= sanitize_hex_color($bellini['bellini_woocommerce_product_button_text_color']);
		$product_card_button_color 				= sanitize_hex_color($bellini['bellini_woocommerce_product_button_color']);


		// CSS Classes
		$woo_class_prices 						= ".site-cart__icon,.product-card__info__price,.product-card__info__price,.product-featured__price .amount,.product-card__info__price .amount,.woocommerce div.product span.price,.add_to_cart_button:before";
		$woo_additional 						= ".product-featured__review--centered,.product .onsale,.listed__total,.woocommerce span.onsale";
		$woo_class_buttons 						= ".product-featured__add-cart .add_to_cart_button,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button";
		$woo_product_card_background 			= ".product-card__inner,.front-product-category__card__inner,.front__product-featured__text,.woo__info__sorting,.product-card__inner,.woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce div.product .woocommerce-tabs .panel";

		$font_preset   							= esc_attr($bellini['preset_font']);
		$font_preset_title 						= bellini_font_preset_title($font_preset);
	?>


	<style type="text/css">

	.product_title,
	.category_title,
	.woocommerce-loop-category__title,
	.woocommerce-loop-product__title,
	.related.products h2,
	.wc-tabs li a,
	.up-sells h2{
		font-family: <?php echo $font_preset_title; ?>;
	}

	.product-card__info__product a,
	.product-featured__title a,
	.woocommerce ul.products li.product h3,
	.product-card__info__product h3 {
    	font-size: <?php echo $woo_shop_product_title_font_size;?>px ;
    	color: <?php echo $product_card_title_color;?> ;
	}

	.front-product-category{background-color:<?php echo $woo_category_background_color; ?>;}
	.front-new-arrival{background-color:<?php echo $woo_product_background_color;?>;}
	.front__product-featured{background-color:<?php echo $woo_featured_product_background_color;?>;}

	<?php echo $woo_class_prices;?>{
    	font-size: <?php echo $woo_shop_product_price_font_size;?>px ;
	}

	<?php echo $woo_product_card_background;?>{
		background-color: <?php echo $product_card_background_color;?> ;
	}

	<?php echo $woo_class_buttons;?>{
		color: <?php echo $product_card_button_text_color;?> !important ;
    	background-color: <?php echo $product_card_button_color;?> !important ;
	}

	.woocommerce .widget_price_filter .ui-slider .ui-slider-range{
		background-color: <?php echo $product_card_button_color;?>;
	}

	</style>
	<?php }

endif;


/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
add_action( 'customize_preview_init', 'bellini_customize_preview_js' );

function bellini_customize_preview_js() {
	wp_enqueue_script( 'bellini_customizer', get_theme_file_uri( '/inc/js/customizer.js' ), array( 'customize-preview' ), '20170221', true );
}

add_action( 'customize_controls_enqueue_scripts', 'bellini_customizer_style');

function bellini_customizer_style() {
	wp_enqueue_style('CustomizerUI', get_theme_file_uri( '/inc/css/customizer-ui.css'));
}