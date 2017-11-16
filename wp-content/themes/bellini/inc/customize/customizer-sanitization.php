<?php


/**
 * Sanitize Custom CSS
 */
if ( ! function_exists( 'bellini_sanitize_custom_css' ) ) {
    function bellini_sanitize_custom_css( $input ) {
        if ( $input != '' ) {

            $input = str_replace( '<=', '&lt;=', $input );
            $input = wp_kses_split( $input, array(), array() );
            $input = str_replace( '&gt;', '>', $input );
            $input = strip_tags( $input );

            return $input;
        }else {
            return '';
        }
    }
}

/**
 * Sanitize Hex Color
 */
if ( ! function_exists( 'sanitize_hex_color' ) ) {
    function sanitize_hex_color( $color ) {
        if ( '' === $color ) {
            return '';
        }
        // 3 or 6 hex digits, or the empty string.
        if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
            return $color;
        }
        return null;
    }
}

/**
 * Sanitize Text Input
 */
if ( ! function_exists( 'bellini_sanitize_input' ) ) {
    function bellini_sanitize_input($input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }
}

/**
 * Check if WooCommerce Plugin is Active
 */
if ( ! function_exists( 'is_plugin_active_woocommerce_bellini' ) ) {
     function is_plugin_active_woocommerce_bellini(){
         // Check for the WooCommerce class
         if( !class_exists( 'woocommerce' ) ){
             return false;
         } else {
             return true;
         }
    }
}

/**
 * Check if Bellini Hero Image is active
 */
if ( ! function_exists( 'is_active_slider_type_bellini_hero' ) ) {
 function is_active_slider_type_bellini_hero(){
    global $bellini;
     // Check for the slider plugin class
     if( absint($bellini['bellini_front_slider_type']) === 1 ){
         return true;
     } else {
         return false;
     }
 }
}

/**
 * Check if Third Party Slider Section is active
 */
if ( ! function_exists( 'is_active_slider_type_bellini_third_party' ) ) {
    function is_active_slider_type_bellini_third_party(){
        global $bellini;
         // Check for the slider plugin class
         if( absint($bellini['bellini_front_slider_type']) === 2 ){
             return true;
         } else {
             return false;
         }
    }
}