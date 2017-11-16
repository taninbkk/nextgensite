<?php
/**
 * Bellini functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bellini
 * @author  Towhid, Atlantis Themes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

if ( ! function_exists( 'bellini_setup' ) ) :

add_action( 'after_setup_theme', 'bellini_setup' );

function bellini_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bellini, use a find and replace
	 * to change 'bellini' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bellini', get_template_directory() . '/languages' );

	/*
     * Add default posts and comments RSS feed links to head.
     */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'bellini-thumb', 820, 400 );

	/*
     * This theme uses wp_nav_menu() in the following locations.
     */
	register_nav_menus( array(
		'primary' 	=> esc_html__( 'Primary Menu', 'bellini' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo');

	/*
	 * Switch default core yorkup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );

	add_theme_support('widget-customizer');

    /*
     * Enable support for Customizer Selective Refresh.
     * See: https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/
     */
	add_theme_support( 'customize-selective-refresh-widgets' );

	// WooCommerce Integration
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_theme_support( 'custom-background', apply_filters( 'bellini_custom_background_args', array(
		'default-color' => '#eceef1',
		'default-image' => '',
	) ) );

	// Set the default content width.
	$GLOBALS['content_width'] = apply_filters( 'bellini_content_width', 640 );

	add_editor_style();
}

endif; // bellini_setup

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

add_action( 'widgets_init', 'bellini_widgets_init' );

function bellini_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'bellini' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'bellini' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar Right', 'bellini' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'These widgets will be only visible in Blog Page Template, Archive pages','bellini' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'bellini' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'You can change the Footer Widget Column count from Customize - Layout - Layout Footer','bellini' ),
		'before_widget' => apply_filters('bellini_widget_footer_column','<section id="%1$s" class="widget__footer col-md-3 %2$s">'),
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Widgets', 'bellini' ),
		'id'            => 'sidebar-woo-sidebar',
		'description'   => esc_html__( 'These widgets will be only visible in WooCommerce Pages','bellini' ),
		'before_widget' => '<section id="%1$s" class="widget__after__content col-md-12 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="element-title widget-title">',
		'after_title'   => '</h2>',
	) );

}



add_filter( 'excerpt_length', 'bellini_excerpt_length', 999 );

function bellini_excerpt_length( $length ) {
	return 20;
}


add_filter( 'nav_menu_link_attributes', 'add_nav_menu_atts', 10, 3 );

function add_nav_menu_atts( $atts, $item, $args ) {
  $atts['itemprop'] = 'url';
  return $atts;
}


/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'bellini_scripts' );

function bellini_scripts() {

	// Bellini Stylesheets
	wp_enqueue_style('bellini-libraries',get_template_directory_uri(). '/inc/css/libraries.min.css');
	wp_enqueue_style( 'bellini-style', get_stylesheet_uri(), array(), '20160803', 'all' );

	// Load only if WooCommerce is active
	if ( is_woocommerce_activated() ) {
		wp_register_style( 'woostyles', get_template_directory_uri() . '/inc/css/bellini-woocommerce.css' );
		wp_enqueue_style( 'woostyles', '0.11' );
	}

  	wp_enqueue_script( 'bellini-js-libraries', get_template_directory_uri() . '/inc/js/library.min.js',  array('jquery'), '20160625', true );
  	wp_enqueue_script( 'bellini-pangolin', get_template_directory_uri() . '/inc/js/pangolin.js',  array('jquery'), '20160625', true );

  // Load the html5 shiv.
	wp_enqueue_script( 'bellini-html5', get_template_directory_uri() . '/inc/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'bellini-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

/**
 * Display upgrade notice on customizer page
 */
add_action( 'customize_controls_enqueue_scripts', 'bellini_upsell_notice' );

function bellini_upsell_notice() {
 // Enqueue the script
	 wp_enqueue_script('bellini-customizer-upsell', get_template_directory_uri() . '/inc/js/unlock.js', array(), '1.0.0', true);
	 // Localize the script
	 wp_localize_script('bellini-customizer-upsell', 'belliniL10n',
	 array(
		 'belliniURL'	=> esc_url( 'https://atlantisthemes.com/bellini-feature-comparison/' ),
		 'belliniLabel'	=> esc_html__( 'Upgrade To Pro', 'bellini' ),
	 )
	 );
}


function bellini_option_defaults() {
	$defaults = array(
		'header_background_color' 						=> '#FFFFFF',
		'widgets_background_color' 						=> '#FFEB3B',
		'footer_background_color'						=> '#222222',
		'body_text_color' 								=> '#333333',
		'title_text_color' 								=> '#000000',
		'menu_text_color' 								=> '#000000',
		'bellini_primary_color'							=> '#2196F3',
		'bellini_accent_color'							=> '#a5aaa8',
		'button_background_color'						=> '#00B0FF',
		'button_text_color'								=> '#ffffff',
		'link_text_color'								=> '#000000',
		'link_hover_color'								=> '#000000',
		'bellini_website_width' 						=> '100',
		'bellini_canvas_width' 							=> '1100px',
		'bellini_header_width'							=> '1200px',
		'bellini_menu_position'							=> 'right',
		'page_title_position' 							=> 'center',
		'footer_widget_alignment' 						=> 'center',
		'bellini_body_font_size' 						=> 16,
		'bellini_title_font_size' 						=> 22,
		'bellini_menu_font_size'						=> 18,
		'blog_front_post_per_page_select' 				=> 6,
		'bellini_feature_block_background_color'		=> '#ffffff',
		'woo_category_background_color'					=> '#FFEB3B',
		'woo_product_background_color'					=> '#FFEB3B',
		'bellini_static_slider_button_background_one'	=> '#FFEB3B',
		'bellini_static_slider_button_background_two'	=> '#00B0FF',
		'slider_button_1_text_color' 					=> '#333333',
		'slider_button_2_text_color' 					=> '#333333',
		'woo_featured_product_background_color'			=> '#eceef1',
		'bellini_hero_content_color' 					=> '#ffffff',
		'bellini_blogposts_background_color' 			=> '#eceef1',
		'bellini_frontpage_textarea_section_color' 		=> '#d3e9fb',
		'bellini_frontpage_textarea_section_image'		=> '',
		'preset_font'									=> 'planot',
		'bellini_logo_typography_font'					=> 'logo-ope',
		'bellini_header_title_capitalization'			=> 'none',
		'bellini_widget_title_alignment'				=> 'left',
		'bellini_layout_blog'							=> 1,
		'bellini_header_orientation'                    => '',
		'bellini_front_slider_type'						=> 1,
		'bellini_show_woocommerce_sidebar'				=> true,
		'bellini_woocommerce_sidebar_position'          => '',
		'bellini_woo_shop_product_per_page'				=> 12,
		'bellini_woo_shop_product_column'				=> 'col-sm-3',
		'woo_product_new_row'							=> 'col-sm-3',
		'bellini_woo_shop_product_pagination_layout'	=> 1,
		'bellini_woo_shop_product_layout'				=> 1,
		'bellini_footer_layout_type'					=> 2,
		'bellini_show_footer_copyright'					=> true,
		'bellini_copyright_text'						=> '',
		'bellini_show_footer_logo'						=> true,
		'bellini_show_footer_social_menu'				=> true,
		'bellini_show_frontpage_slider_pages'  			=> true,
		'bellini_read_more_title' 						=> '',
		'bellini_show_post_meta' 						=> true,
		'woo_product_category_row' 						=> 'col-sm-3',
		'bellini_woocommerce_shop_title_font_size' 		=> 26,
		'bellini_woocommerce_shop_price_font_size' 		=> 18,
		'bellini_woocommerce_product_card_back_color' 	=> '#ffffff',
		'bellini_woocommerce_product_title_color' 		=> '#333333',
		'bellini_woocommerce_product_button_text_color' => '#ffffff',
		'bellini_woocommerce_product_button_color'  	=> '#2196F3',
		'bellini_show_frontpage_slider'					=> true,
		'bellini_show_frontpage_woo_category'			=> false,
		'bellini_front_slider_type'						=> 1,
		'bellini_static_slider_image'					=> '',
		'bellini_static_slider_title'					=> __('เว็บไซต์ของคุณเกือบพร้อมแล้ว', 'bellini'),
		'bellini_static_slider_content'					=> __('เริ่มต้นจัดการเว็บไซต์ของคุณได้ทันที !<br>ไปยังอีเมล คลิ๊กลิ้งในอีเมลที่ได้รับจากเรา เพื่อตั้งค่ารหัสผ่าน<br>และเข้าใช้งานด้วย อีเมล และรหัสผ่าน ที่คุณสร้างขึ้น', 'bellini'),
		'bellini_static_slider_button_text-1'			=> __('เริ่มกันเลย', 'bellini'),
		'bellini_static_slider_button_text-2'			=> '',
		'bellini_static_slider_button_url-1'			=> '#feature',
		'bellini_static_slider_button_url-2'			=> '',
		'bellini_slider_third_party_field'				=> '',
		'bellini_product_category_des_pos'				=> 1,
		'bellini_woo_category_title'					=> '',
		'bellini_woo_category_description'				=> '',
		'woo_product_category_layout'					=> 1,
		'bellini_show_frontpage_woo_products_featured'	=> false,
		'bellini_featured_slides_no_selector'			=> 2,
		'woo_featured_product_title'					=> '',
		'woo_featured_product_description'				=> '',
		'woo_featured_product_layout'					=> 1,
		'bellini_show_frontpage_woo_products'			=> true,
		'bellini_product_general_des_pos'				=> 1,
		'bellini_woo_product_title' 					=> '',
		'bellini_woo_product_description' 				=> '',
		'woo_product_per_page_select' 					=> '',
		'woo_product_orderby_select' 					=> '',
		'woo_product_order_select' 						=> '',
		'bellini_woo_category_selector' 				=> '',
		'woo_product_new_layout' 						=> 1,
		'woo_product_button_text' 						=> '',
		'woo_product_button_url' 						=> '',
		'bellini_show_frontpage_blog_posts' 			=> true,
		'bellini_home_blogposts_title' 					=> __('Our Stories', 'bellini'),
		'bellini_home_blogposts_description' 			=> __('ข่าวสารอับเดท', 'bellini'),
		'bellini_home_blogposts_layout' 				=> 1,
		'bellini_home_blogposts_button_url' 			=> '',
		'bellini_home_blogposts_button_text' 			=> '',
		'bellini_show_frontpage_feature_block' 			=> true,
		'bellini_feature_blocks_title'  				=> __('Our Features', 'bellini'),
		'bellini_feature_block_layout' 					=> 1,
		'bellini_show_frontpage_text_section' 			=> false,
		'bellini_frontpage_textarea_section_field'  	=> __('It is a text field where you can insert any text, HTMl or shortcode.' , 'bellini'),
		'bellini_menu_layout' 							=> '',
		'bellini_hamburger_title'  						=> '',
		'bellini_other_header_items_selector' 			=> 1,
		'bellini_header_menu_layout'  					=> 1,
		'bellini_layout_single-post'  					=> 3,
		'bellini_feature_block_row'   					=> 'col-sm-4',
		'bellini_social_account_link_one' 				=> '',
		'bellini_social_account_link_two' 				=> '',
		'bellini_social_account_link_three' 			=> '',
		'bellini_social_account_link_four' 				=> '',
		'bellini_social_account_link_five' 				=> '',
		'bellini_social_account_link_six' 				=> '',
		'bellini_show_page_breadcrumb'   				=> '',
		'bellini_feature_block_image_one' 				=> get_parent_theme_file_uri( '/images/search.jpg'),
		'bellini_feature_block_image_two' 				=> get_parent_theme_file_uri( '/images/cart.jpg'),
		'bellini_feature_block_image_three' 			=> get_parent_theme_file_uri( '/images/credit.jpg'),
		'bellini_feature_block_image_four' 				=> '',
		'bellini_blog_pagination_type' 					=> 1,
		'bellini_show_scroll_to_top'					=> true,
		'bellini_footer_widget_column_selector'        	=> 3,
		'bellini_post_featured_image'  					=> get_parent_theme_file_uri('/images/featured-image.jpg'),
		'bellini_show_footer_menu'						=> true,
		'bellini_post_category_selector'				=> false,
		'bellini_feature_block_title_one'				=> __('ออกแบบตามต้องการ', 'bellini'),
		'bellini_feature_block_content_one'				=> __('นี่คือตัวอย่างคำบรรยาย เกี่ยวกับจุดเด่นหรือบริการของคุณ คุณสามารถแก้ไขข้อความและรูปภาพได้ ด้วยการปรับแต่งหลังเว็บไซต์ ', 'bellini'),
		'bellini_feature_block_title_two'				=> __('จัดส่งฟรี ทั่วประเทศ', 'bellini'),
		'bellini_feature_block_content_two'				=> __('เว็บไซต์ขายของกับระบบอีคอมเมิร์ซที่พร้อมให้คุณใช้งานได้ทันที เพียงกดปุ่มสร้างหน้าในระบบอีคอมเมิร์ซ แล้วตั้งค่าต่างๆตามขั้นตอน', 'bellini'),
		'bellini_feature_block_title_three'				=> __('ไม่พอใจยินดีคืนเงิน', 'bellini'),
		'bellini_feature_block_content_three'			=> __('คุณสามารถเปิด-ปิด การแสดงผลส่วนต่างๆ บนหน้าเว็บไซต์ และระบบอีคอมเมิร์ซได้ ถ้าคุณยังไม่พร้อมขายสินค้า หรือไม่มีสินค้า', 'bellini'),
		'bellini_woo_single_product_layout'				=> 1,
		'bellini_custom_css'							=> false,
	);

      $options = get_option('bellini',$defaults);
      $options = wp_parse_args( $options, $defaults );

	return $options;
}

require_once( trailingslashit( get_template_directory() ) . '/inc/structure/extras.php');
/**
 * Implement the Custom Header feature.
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/custom-header.php');

/**
 * Customizer additions.
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/customizer.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/customize/bellini-customizer-choices.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/customize/customizer-sanitization.php');

require_once( trailingslashit( get_template_directory() ) . '/inc/comments.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/dashboard/bellini-info-dashboard.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/hooks.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-front.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-header.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/structure/bellini-footer.php');
require_once( trailingslashit( get_template_directory() ) . '/inc/widget-native-customize.php');


/**
 * Support for Jetpack
 * https://wordpress.org/plugins/jetpack/
 */
if ( class_exists( 'Jetpack' )){
	require_once( trailingslashit( get_template_directory() ) . '/inc/integration/jetpack.php');
}

/**
 * Support for WooCommerce
 * https://wordpress.org/plugins/woocommerce/
 */
if ( is_woocommerce_activated() ) {
	require_once(  get_template_directory()  . '/inc/integration/bellini-woocommerce-functions.php');
	require_once(  get_template_directory()  . '/inc/integration/bellini-woocommerce-hooks.php');
}


add_action( 'widgets_init', 'pangolin_register_bellini_widgets');

function pangolin_register_bellini_widgets(){
    unregister_widget( 'WP_Widget_Recent_Posts' );
    register_widget( 'Bellini_Recent_Posts_Widget' );
    unregister_widget( 'WP_Widget_Recent_Comments' );
    register_widget( 'Bellini_Recent_Comments_Widget' );
}

/**
 * Ao Custom
 */
 
 /* Add Google font */
function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Kanit:300,400', false ); 
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );



/**
 * add page slug to body class, if on a page
 */
 
add_filter('body_class','smartestb_pages_bodyclass');
function smartestb_pages_bodyclass($classes) {
    if (is_page()) {
        // get page slug
        global $post;
        $slug = get_post( $post )->post_name;
 
        // add slug to $classes array
        $classes[] = $slug;
        // return the $classes array
        return $classes;
    } else { 
        return $classes;
    }
}

// change the default page template selection

function default_page_template( $template ) {

    if ( is_page( 'news' )  ) {
        $default_template = locate_template( array( 'content-news.php' ) );
        if ( '' != $default_template ) {
            return $default_template ;
        }
    }

    return $template;
}
add_filter( 'template_include', 'default_page_template', 99 );


// unregister all widgets
function remove_default_widgets() {
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Meta');    
}
add_action('widgets_init', 'remove_default_widgets' );
