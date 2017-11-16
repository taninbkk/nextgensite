<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// custom header background
function themehunk_customizer_oneline_custom_style(){ 
$ribbon_bg_image = get_theme_mod('ribbon_bg_image');

  $custom_css = "
#services{ background-color:#fff;  }
.service-wrapper .svg-top-container { fill: #fff; }

.team-wrapper #team{ background-color:#fff; }

 #latest-post{ background-color:#f7f7f7; }
.post-wrapper .svg-top-container { fill: #f7f7f7; }

 #woo-section{ background-color:#fff }
.woo-wrapper .svg-top-container { fill: #fff; }

.testimonials { background-color:#1F1F1F; }
.testimonials-wrapper .svg-top-container { fill: #1F1F1F; }

.footer-wrapper .svg-top-container{ fill:#fff; }
.foot-copyright .svg-top-container{ fill: #1F1F1F; }
.footer{ background-color:#fff;}
.foot-copyright { background-color:#1F1F1F; }
";
if($ribbon_bg_image!=''){
$custom_css .= "#ribbon:before{ background:url({$ribbon_bg_image};)}";
}
return $custom_css;
    }

    function themehunk_customizer_enqueue(){
    	 echo "<style>";
   			echo  themehunk_customizer_oneline_custom_style();
     echo "</style>";

}
add_action( 'wp_head', 'themehunk_customizer_enqueue' );

?>