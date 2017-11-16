/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
(function ($) {

	var style = $( '.site-title a' ),
		bellini_accent_color_background = $('.main-navigation li a:before,.menu-toggle,.post-meta__tag__item a'),
		bellini_accent_color_text 		= $('.breadcrumb_last,.single.post-meta,.single.post-meta a,.post-meta__category a,.comment-reply-link,.comment__author,.blog-post__meta .post-meta__time,.post-meta__author,.comment-edit-link'),
		bellini_title_color 			= $('.element-title,.element-title--post,.element-title--main,.single-page__title,.single-post__title'),
		bellini_menu_color 				= $('.main-navigation a,.main-navigation ul ul a'),
		bellini_other_color 			= $('.hamburger-inner,.hamburger-inner::before,.hamburger-inner::after,.hamburger__site-title,.main-navigation ul ul,.product-featured__title h1:after,.product-featured__title--l2 h1:after'),
		bellini_button_color_background = $('.comment-form input[type=submit],.site-search form input[type=submit],.button--secondary'),
		bellini_button_color_text 		= $('.button--secondary a,.comment-form input[type=submit]'),
		woocommerce_product_card 		= $('.front__product-featured__text,.woo__info__sorting,.product-card__inner'),
		woocommerce_product_title 		= $('.product-card__info__product a,.product-featured__title a,.woocommerce ul.products li.product h3'),
		woocommerce_button_class 		= $('.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.product-featured__add-cart .add_to_cart_button,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button');



	// Site title
	wp.customize('blogname', function (value) {
		value.bind( function (to) {
			$('.site-title a').text( to );
		} );
	} );

	// Site Description
	wp.customize('blogdescription', function (value) {
		value.bind(function(to) {
			$( '.site-description' ).text( to );
		} );
	} );

/*--------------------------------------------------------------
## Color
--------------------------------------------------------------*/

	// Header text color.
	wp.customize('header_textcolor', function (value) {
		value.bind( function(to){
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	//Header Background Color
	wp.customize( 'bellini[header_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.site-header').css('background-color', newval );
		} );
	} );


	//Widget Background Color
	wp.customize( 'bellini[widgets_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.widget').css('background-color', newval );
		} );
	} );

	// Footer Background Color
	wp.customize( 'bellini[footer_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.site-footer').css('background-color', newval );
		} );
	} );

	// Site Body Text Color
	wp.customize( 'bellini[body_text_color]', function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	} );

	// Title Text Color
	wp.customize( 'bellini[title_text_color]', function( value ) {
		value.bind( function( newval ) {
			bellini_title_color.css('color', newval );
		} );
	} );

	// Menu Text Color
	wp.customize( 'bellini[menu_text_color]', function( value ) {
		value.bind( function( newval ) {
			bellini_menu_color.css('color', newval );
		} );
	} );


	// Other Color
	wp.customize( 'bellini[bellini_primary_color]', function( value ) {
		value.bind( function( newval ) {
			$('.scrollToTop').css('color', newval );
		} );
	} );

	// Other Color Background
	wp.customize( 'bellini[bellini_primary_color]', function( value ) {
		value.bind( function( newval ) {
			bellini_other_color.css('background-color', newval );
		} );
	} );


	//Accent meta Color Background
	wp.customize( 'bellini[bellini_accent_color]', function( value ) {
		value.bind( function( newval ) {
			bellini_accent_color_background.css('background-color', newval );
		} );
	} );

	//Accent meta Color Text
	wp.customize( 'bellini[bellini_accent_color]', function( value ) {
		value.bind( function( newval ) {
			bellini_accent_color_text.css('color', newval );
		} );
	} );


	// Button Background Color
	wp.customize( 'bellini[button_background_color]', function( value ) {
		value.bind( function( newval ) {
			bellini_button_color_background.css('background-color', newval );
		} );
	} );

	// Button Text Color
	wp.customize( 'bellini[button_text_color]', function( value ) {
		value.bind( function( newval ) {
			bellini_button_color_text.css('color', newval );
		} );
	} );
	// Link Text Color
	wp.customize( 'bellini[link_text_color]', function( value ) {
		value.bind( function( newval ) {
			$('a').css('color', newval );
		} );
	} );
	// Link Hover Color
	wp.customize( 'bellini[link_hover_color]', function( value ) {
		value.bind( function( newval ) {
			$('a:hover').css('color', newval );
		} );
	} );

	// Hero Content Color
	wp.customize( 'bellini[bellini_hero_content_color]', function( value ) {
		value.bind( function( newval ) {
			$('.slider-content h3,.slider-content').css('color', newval );
		} );
	} );

	// Slider CTA 1
	wp.customize( 'bellini[bellini_static_slider_button_background_one]', function( value ) {
		value.bind( function( newval ) {
			$('.slider__cta--one').css('background-color', newval );
		} );
	} );
	// Slider CTA 2
	wp.customize( 'bellini[bellini_static_slider_button_background_two]', function( value ) {
		value.bind( function( newval ) {
			$('.slider__cta--two').css('background-color', newval );
		} );
	} );

	// Feature Blocks Background Color
	wp.customize( 'bellini[bellini_feature_block_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.front-feature-blocks').css('background-color', newval );
		} );
	} );

	// WooCommerce Category Background Color
	wp.customize( 'bellini[woo_category_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.front-product-category').css('background-color', newval );
		} );
	} );

	// Front Page Product Background Color
	wp.customize( 'bellini[woo_product_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.front-new-arrival').css('background-color', newval );
		} );
	} );

	// WooCommerce Featured Slider Background Color
	wp.customize( 'bellini[woo_featured_product_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.front__product-featured').css('background-color', newval );
		} );
	} );

	// Front Page Blog Section Background Color
	wp.customize( 'bellini[bellini_blogposts_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.front-blog').css('background-color', newval );
		} );
	} );

	// Front Page Text Field Section Background Color
	wp.customize( 'bellini[bellini_frontpage_textarea_section_color]', function( value ) {
		value.bind( function( newval ) {
			$('.front-text-field').css('background-color', newval );
		} );
	} );

	// WooCommerce Product Card
	wp.customize( 'bellini[bellini_woocommerce_product_card_back_color]', function( value ) {
		value.bind( function( newval ) {
			woocommerce_product_card.css('background-color', newval );
		} );
	} );

	// WooCommerce Product Title
	wp.customize( 'bellini[bellini_woocommerce_product_title_color]', function( value ) {
		value.bind( function( newval ) {
			woocommerce_product_title.css('color', newval );
		} );
	} );

	// WooCommerce Button Text Color
	wp.customize( 'bellini[bellini_woocommerce_product_button_text_color]', function( value ) {
		value.bind( function( newval ) {
			woocommerce_button_class.css('color', newval );
		} );
	} );

	// WooCommerce Button Color
	wp.customize( 'bellini[bellini_woocommerce_product_button_color]', function( value ) {
		value.bind( function( newval ) {
			woocommerce_button_class.css('background-color', newval );
		} );
	} );


/*--------------------------------------------------------------
## Font Size
--------------------------------------------------------------*/

	// Body Font Size
	wp.customize( 'bellini[bellini_body_font_size]', function( value ) {
		value.bind( function( newval ) {
			$('body').css('font-size', newval + 'px');
		} );
	} );
	// Title Font Size
	wp.customize( 'bellini[bellini_title_font_size]', function( value ) {
		value.bind( function( newval ) {
			bellini_title_color.css('font-size', newval + 'px');
		} );
	} );
	// Menu Font Size
	wp.customize( 'bellini[bellini_menu_font_size]', function( value ) {
		value.bind( function( newval ) {
			$('.menu-item a,.page-numbers a,.page-numbers span').css('font-size', newval + 'px');
		} );
	} );

	// Title Capitalization
	wp.customize( 'bellini[bellini_header_title_capitalization]', function( value ) {
		value.bind( function( newval ) {
			bellini_title_color.css('text-transform', newval );
		} );
	} );

	// Title Alignment Widget
	wp.customize( 'bellini[bellini_widget_title_alignment]', function( value ) {
		value.bind( function( newval ) {
			$('.widget-title').css('text-align', newval );
		} );
	} );

/*--------------------------------------------------------------
## Layout & Positioning
--------------------------------------------------------------*/

	 // Website Width
     wp.customize( 'bellini[bellini_website_width]', function( value ) {
        value.bind( function( to ) {
            $( '.website-width' ).css( 'width', to + '%' );
        } );
    });

	// Page Title Position
	wp.customize( 'bellini[page_title_position]', function( value ) {
		value.bind( function( newval ) {
			$('.single-page__title').css('text-align', newval );
		} );
	} );
	// Menu Position
	wp.customize( 'bellini[bellini_menu_position]', function( value ) {
		value.bind( function( newval ) {
			$('.nav-menu').css('text-align', newval );
		} );
	} );


/*--------------------------------------------------------------
## Show / Hide
--------------------------------------------------------------*/

    //Frontpage Slider
    wp.customize( 'bellini[bellini_show_frontpage_slider]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.front__slider__static' ).show();
          } else {
            $( '.front__slider__static' ).hide();
          }
        } );
    } );

    //Feature Blocks
    wp.customize( 'bellini[bellini_show_frontpage_feature_block]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.front-feature-blocks' ).show();
          } else {
            $( '.front-feature-blocks' ).hide();
          }
        } );
    } );

    //WooCommerce Product Category
    wp.customize( 'bellini[bellini_show_frontpage_woo_category]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.front-product-category' ).show();
          } else {
            $( '.front-product-category' ).hide();
          }
        } );
    } );

    //WooCommerce Products
    wp.customize( 'bellini[bellini_show_frontpage_woo_products]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.front-new-arrival' ).show();
          } else {
            $( '.front-new-arrival' ).hide();
          }
        } );
    } );

    //WooCommerce Featured Products
    wp.customize( 'bellini[bellini_show_frontpage_woo_products_featured]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.front__product-featured' ).show();
          } else {
            $( '.front__product-featured' ).hide();
          }
        } );
    } );

    //Frontpage Blogposts
    wp.customize( 'bellini[bellini_show_frontpage_blog_posts]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.front-blog' ).show();
          } else {
            $( '.front-blog' ).hide();
          }
        } );
    } );

    //Frontpage Text Section
    wp.customize( 'bellini[bellini_show_frontpage_text_section]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.front-text-field' ).show();
          } else {
            $( '.front-text-field' ).hide();
          }
        } );
    } );

    //Hide Footer Social Menu
    wp.customize( 'bellini[bellini_show_footer_social_menu]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.site-footer .bellini-social__link' ).show();
          } else {
            $( '.site-footer .bellini-social__link' ).hide();
          }
        } );
    } );

/*--------------------------------------------------------------
## Text
--------------------------------------------------------------*/

	// Hero Section Content Title
	wp.customize('bellini[bellini_static_slider_title]', function (value) {
		value.bind( function ( to ) {
			$( '.slider-content__title' ).text( to );
		} );
	} );

	// Hero Section Content
	wp.customize('bellini[bellini_static_slider_content]', function (value) {
		value.bind( function (to) {
			$('.slider-content__text').text( to );
		} );
	} );

	// Hero Section Button 1
	wp.customize('bellini[bellini_static_slider_button_text-1]', function (value) {
		value.bind( function (to) {
			$('a.button.slider__cta--one').text( to );
		} );
	} );

	// Hero Section Button 2
	wp.customize('bellini[bellini_static_slider_button_text-2]', function (value) {
		value.bind( function (to) {
			$('a.button.slider__cta--two').text( to );
		} );
	} );

	// Feature Block Section Title
	wp.customize('bellini[bellini_feature_blocks_title]', function (value) {
		value.bind( function (to) {
			$('.front-feature-blocks .element-title--main').text( to );
		} );
	} );

	// Feature Block 1 Title
	wp.customize('bellini[bellini_feature_block_title_one]', function (value) {
		value.bind( function (to) {
			$('.block-one .block-title').text( to );
		} );
	} );

	// Feature Block 2 Title
	wp.customize('bellini[bellini_feature_block_title_two]', function (value) {
		value.bind( function (to) {
			$('.block-two .block-title').text( to );
		} );
	} );

	// Feature Block 3 Title
	wp.customize('bellini[bellini_feature_block_title_three]', function (value) {
		value.bind( function (to) {
			$('.block-three .block-title').text( to );
		} );
	} );

	// Feature Block 1 Content
	wp.customize('bellini[bellini_feature_block_content_one]', function (value) {
		value.bind( function (to) {
			$('.block-one p').text( to );
		} );
	} );

	// Feature Block 2 Content
	wp.customize('bellini[bellini_feature_block_content_two]', function (value) {
		value.bind( function (to) {
			$('.block-two p').text( to );
		} );
	} );

	// Feature Block 3 Content
	wp.customize('bellini[bellini_feature_block_content_three]', function (value) {
		value.bind( function (to) {
			$('.block-three p').text( to );
		} );
	} );

	// WooCommerce Category Section Title
	wp.customize('bellini[bellini_woo_category_title]', function (value) {
		value.bind( function (to) {
			$('.front-product-category .element-title--main').text( to );
		} );
	} );

	// WooCommerce Category Section Description
	wp.customize('bellini[bellini_woo_category_description]', function (value) {
		value.bind( function (to) {
			$('.front-product-category .element-title--sub').text( to );
		} );
	} );

	// WooCommerce Products Section Title
	wp.customize('bellini[bellini_woo_product_title]', function (value) {
		value.bind( function (to) {
			$('.front-new-arrival .element-title--main').text( to );
		} );
	} );

	// WooCommerce Products Section Description
	wp.customize('bellini[bellini_woo_product_description]', function (value) {
		value.bind( function (to) {
			$('.front-new-arrival .element-title--sub').text( to );
		} );
	} );

	// WooCommerce Products Section CTA
	wp.customize('bellini[woo_product_button_text]', function (value) {
		value.bind( function (to) {
			$('.front__product__cta .button--cta--center').text( to );
		} );
	} );

	// WooCommerce Featured Slider Section Title
	wp.customize('bellini[woo_featured_product_title]', function (value) {
		value.bind( function (to) {
			$('.front__product-featured .element-title--main').text( to );
		} );
	} );

	// WooCommerce Featured Slider Section Description
	wp.customize('bellini[woo_featured_product_description]', function (value) {
		value.bind( function (to) {
			$('.front__product-featured .element-title--sub').text( to );
		} );
	} );


	// Front Page Blog Section Title
	wp.customize('bellini[bellini_home_blogposts_title]', function (value) {
		value.bind( function (to) {
			$('.front-blog .element-title--main').text( to );
		} );
	} );

	// Front Page Blog Section Description
	wp.customize('bellini[bellini_home_blogposts_description]', function (value) {
		value.bind( function (to) {
			$('.front-blog .element-title--sub').text( to );
		} );
	} );

	// Front Page Blog Section Section CTA
	wp.customize('bellini[bellini_home_blogposts_button_text]', function (value) {
		value.bind( function (to) {
			$('.front__blog__cta .button--cta--center').text( to );
		} );
	} );

	// Text Field Content
	wp.customize('bellini[bellini_frontpage_textarea_section_field]', function (value) {
		value.bind( function (to) {
			$('.front-text-field').text( to );
		} );
	} );

	// Text Field Content
	wp.customize('bellini[bellini_copyright_text]', function (value) {
		value.bind( function (to) {
			$('.footer__copyright').text( to );
		} );
	} );

} )( jQuery );