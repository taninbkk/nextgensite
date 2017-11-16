jQuery.noConflict();
jQuery(document).ready(function () {
    "use strict";

    var topScroll       = {origin: "top", distance: "64px", duration: 900, scale: 1, easing: "ease"},
        leftScroll      = {origin: "left", distance: '10px', duration: 940, scale: 1, easing: "ease", opacity: 1},
        rightScroll     = {origin: "right", distance: '100px', duration: 900, scale: 1, easing: "ease", opacity: 1},
        bottomScroll    = {origin: "bottom", duration: 900, scale: 1, easing: "ease"},
        stepsScroll     = {origin: "left", duration: 900, scale: 1, easing: "ease"},
        stillScroll     = {distance: "0px", duration: 900, scale: 1, easing: "ease"}

    // ScrollReveal
    window.sr = ScrollReveal();

    sr.reveal('.product-holder--l1', bottomScroll, 120);
    sr.reveal('.layout-golden--one__right', rightScroll);
    sr.reveal('.blog__post--l5', bottomScroll);
    sr.reveal('.front-product-category__card', stepsScroll, 250);
    sr.reveal('.image__pic--left','.image__pic--right', bottomScroll);
    sr.reveal('.widget__footer__widget', stillScroll);
    sr.reveal('.front-feature-blocks .feature-block__inner', stepsScroll, 180);

    // Featured Product Slick Slider
    jQuery('.single-item--featured').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
    });


    jQuery(function($) {
        var $container = $('.products');
        $container.imagesLoaded( function() {
            jQuery('.product-card__inner').matchHeight({byRow: false});
        });
    });

    jQuery(function($) {
        var $container = $('.product__categories');
        $container.imagesLoaded( function() {
            jQuery('.front-product-category__card__inner').matchHeight({byRow: false});
        });
    });

    // Equal Height
    jQuery('.nav-previous, .nav-next').matchHeight();
    jQuery('.feature-block__inner').matchHeight();
    jQuery('.equal-height').matchHeight();
    jQuery('.front__product-featured__text, .front__product-featured__image').matchHeight();
    jQuery('.post-item--l5').matchHeight();
    jQuery('.type-product').matchHeight();

    // Cart Toggle
    jQuery('.cart-toggles').click(function () {
        jQuery('.sidebar__cart__full').toggleClass('sidebar__cart--open');
        jQuery('.site-content').toggleClass('site--collapsed');
        jQuery('.site-branding').toggleClass('site--collapsed');
    });

     // Hamburger Menu
    jQuery('.hamburger').click(function () {
        jQuery(this).toggleClass('is-active');
        jQuery('.hamburger__menu__full').toggleClass('hamburger__menu--open');
        return false;
    });

     // Hamburger Close
    jQuery('.ham__close').click(function () {
        jQuery('.hamburger__menu__full').removeClass('hamburger__menu--open');
        jQuery( ".header-inner" ).find( ".hamburger--spring" ).removeClass('is-active');
        return false;
    });

    // WooCommerce Product Search at Top Bar
    jQuery('.site-search__icon').click(function () {
        jQuery('.widget_product_search').slideToggle(200);
        jQuery(this).toggleClass('active');
        return false;
    });

    // Hero Image Headline Fittext
    jQuery(".slider-content__title").fitText();

    // Scroll To Top
    if (jQuery(window).scrollTop() > jQuery('.site-header').outerHeight(true)) {
        jQuery('body').addClass('scrolling');
    } else {
        jQuery('body').removeClass('scrolling');
    }

    var menuSub = jQuery('.menu-item-has-children');
     menuSub.hover(function () {
        jQuery(this).find( '.sub-menu' ).toggleClass('delay--hover');
     });

    if(jQuery(".type-product").hasClass("has-post-thumbnail")){
        jQuery(".attachment-shop_single").attr("data-adaptive-background","1");
    }

    jQuery(document).ready(function(){
        var opts = { parent: '.product__single--l1 .flex-viewport'}
            jQuery.adaptiveBackground.run(opts);
    });

});