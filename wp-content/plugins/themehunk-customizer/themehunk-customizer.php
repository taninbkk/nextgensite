<?php
/*
  Plugin Name: ThemeHunk Customizer
  Description: With the help of Themehunk unlimited addon you can add unlimited number of columns for services, Testimonial, and Teamwith color options for each.
  Version: 1.0.8
  Author: ThemeHunk
  Text Domain: themehunk-customizer
  Author URI: http://www.themehunk.com/
 */
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
  
// Version constant for easy CSS refreshes
define('THEMEHUNK_CUSTOMIZER_VERSION', '1.0.0');
define('THEMEHUNK_CUSTOMIZER_PLUGIN_URL', plugin_dir_url(__FILE__));

function theme_text_domain(){
	$theme = wp_get_theme();
	$textdomain = $theme->get( 'TextDomain' );
	return $textdomain;
}


add_action('after_setup_theme', 'themehunk_customizer_load_plugin');
function themehunk_customizer_load_plugin() {
	include_once( plugin_dir_path(__FILE__) . 'themehunk/widget.php' );
	include_once( plugin_dir_path(__FILE__) . 'themehunk/custom-customizer.php' );

	if(theme_text_domain() == 'oneline-lite'){   
		include_once( plugin_dir_path(__FILE__) . 'oneline-lite/include.php' );
		
	}elseif(theme_text_domain() == 'featuredlite'){
		include_once( plugin_dir_path(__FILE__) . 'themehunk/color-picker/color-picker.php' );
		include_once( plugin_dir_path(__FILE__) . 'featuredlite/include.php' );

	}
}

?>