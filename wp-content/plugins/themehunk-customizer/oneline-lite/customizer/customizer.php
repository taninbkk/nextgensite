<?php
function oneline_lite_unlimited_customize_register( $wp_customize ) {
      // section ordering
    //****** Slider Section ****//
    $wp_customize->add_panel( 'slider_panel', array(
        'priority'       => 5,
        'title'          => __('Slider Section', 'oneline-lite'),
        'description'    => '',
        ));

        //First slider image
        $wp_customize->add_section('section_slider_first', array(
            'title'    => __('#1 Slider', 'oneline-lite'),
            'priority' => 1,
             'panel'  => 'slider_panel',
         ));
         $wp_customize->add_setting('first_slider_image', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'first_slider_image', array(
            'label'    => __('Slider Image Upload', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_slider_image',
        )));
        $wp_customize->add_setting('first_slider_heading', array(
            'default'           => __('Heading','oneline-lite'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
        ));
        $wp_customize->add_control('first_slider_heading', array(
            'label'    => __('Slider Heading', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_slider_heading',
             'type'       => 'textarea',
        ));
        $wp_customize->add_setting('first_slider_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('first_slider_link', array(
            'label'    => __('Link for Heading', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_slider_link',
             'type'       => 'text',
        ));
        $wp_customize->add_setting('first_button_text', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('first_button_text', array(
            'label'    => __('Text for button', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_button_text',
             'type'       => 'text',
        ));
        $wp_customize->add_setting('first_button_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('first_button_link', array(
            'label'    => __('Link for button', 'oneline-lite'),
            'section'  => 'section_slider_first',
            'settings' => 'first_button_link',
             'type'       => 'text',
        ));

        //Second slider image

        $wp_customize->add_section('section_slider_second', array(
            'title'    => __('#2 Slider', 'oneline-lite'),
            'priority' => 2,
             'panel'  => 'slider_panel',
        ));
        $wp_customize->add_setting('second_slider_image', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'second_slider_image', array(
            'label'    => __('Slider Image Upload', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_slider_image',
        )));
        $wp_customize->add_setting('second_slider_heading', array(
            'default'           => __('Heading','oneline-lite'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('second_slider_heading', array(
            'label'    => __('Slider Heading', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_slider_heading',
             'type'       => 'textarea',
        ));
        $wp_customize->add_setting('second_slider_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('second_slider_link', array(
            'label'    => __('Link for Heading', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_slider_link',
             'type'       => 'text',
        ));
        $wp_customize->add_setting('second_button_text', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('second_button_text', array(
            'label'    => __('Text for button', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_button_text',
             'type'       => 'text',
         ));
        $wp_customize->add_setting('second_button_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('second_button_link', array(
            'label'    => __('Link for button', 'oneline-lite'),
            'section'  => 'section_slider_second',
            'settings' => 'second_button_link',
             'type'       => 'text',
        ));
        //Second Third image

        $wp_customize->add_section('section_slider_third', array(
            'title'    => __('#3 Slider', 'oneline-lite'),
            'priority' => 3,
             'panel'  => 'slider_panel',
        ));
        $wp_customize->add_setting('third_slider_image', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_upload'
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'third_slider_image', array(
            'label'    => __('Slider Image Upload', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_slider_image',
        )));
        $wp_customize->add_setting('third_slider_heading', array(
            'default'           => __('Heading','oneline-lite'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('third_slider_heading', array(
            'label'    => __('Slider Heading', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_slider_heading',
             'type'       => 'textarea',
        ));
        $wp_customize->add_setting('third_slider_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('third_slider_link', array(
            'label'    => __('Link for Heading', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_slider_link',
             'type'       => 'text',
        ));
        $wp_customize->add_setting('third_button_text', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('third_button_text', array(
            'label'    => __('Text for button', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_button_text',
             'type'       => 'text',
         ));
        $wp_customize->add_setting('third_button_link', array(
            'default'           => '#',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'
        ));
        $wp_customize->add_control('third_button_link', array(
            'label'    => __('Link for button', 'oneline-lite'),
            'section'  => 'section_slider_third',
            'settings' => 'third_button_link',
             'type'       => 'text',
        ));
// end slider section

/** Our Services Section ***/
    $wp_customize->add_panel( 'services_panel', array(
        'priority'       => 5,
        'title'          => __('Services Section', 'oneline-lite'),
    ) );
    $wp_customize->add_section('services_setting', array(
        'title'    => __('Header Settings', 'oneline-lite'),
        'priority' => 1,
        'panel'    =>'services_panel'
    ));
    $wp_customize->add_setting('our_services_heading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
   $wp_customize->add_control('our_services_heading', array(
        'label'    => __('Main Heading', 'oneline-lite'),
        'section'  => 'services_setting',
        'settings' => 'our_services_heading',
         'type'       => 'text',
    )); 
    $wp_customize->add_setting('our_services_subheading', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'

    ));
    $wp_customize->add_control('our_services_subheading', array(
        'label'    => __('Sub Heading', 'oneline-lite'),
        'section'  => 'services_setting',
        'settings' => 'our_services_subheading',
        'type'       => 'textarea',
    )); 
    // end services section

/** Our Ribbon Section ***/
   $wp_customize->add_panel( 'ribbon_panel', array(
        'priority'       => 6,
        'title'          => __('Ribbon Section', 'oneline-lite'),
    ) );
    $wp_customize->add_section('ribbon_sittings', array(
        'title'    => __('Settings', 'oneline-lite'),
        'priority' => 1,
        'panel'    =>'ribbon_panel'
    ));
    $wp_customize->add_setting('ribbon_heading', array(
        'default'           => '',
        'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
    ));
    $wp_customize->add_control('ribbon_heading', array(
        'label'    => __('Main Heading', 'oneline-lite'),
        'section'  => 'ribbon_sittings',
        'settings' => 'ribbon_heading',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('ribbon_button_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
   $wp_customize->add_control('ribbon_button_text', array(
        'label'    => __('Button Text', 'oneline-lite'),
        'section'  => 'ribbon_sittings',
        'settings' => 'ribbon_button_text',
         'type'       => 'text',
    ));
    $wp_customize->add_setting('ribbon_button_link', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('ribbon_button_link', array(
        'label'    => __('Button Link', 'oneline-lite'),
        'section'  => 'ribbon_sittings',
        'settings' => 'ribbon_button_link',
         'type'       => 'text',
    )); 
     
    //image
    $wp_customize->add_section('ribbon_image', array(
        'title'    => __('Image', 'oneline-lite'),
        'priority' => 3,
        'panel'    =>'ribbon_panel'
    ));

     $wp_customize->add_setting('ribbon_bg_image', array(
        'default'        => '',
        'sanitize_callback' => 'esc_url'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'ribbon_bg_image', array(
        'label'    => __('Upload Background Image', 'oneline-lite'),
        'section'  => 'ribbon_image',
        'settings' => 'ribbon_bg_image',
    )));

/** Our Team Section ***/
    $wp_customize->add_panel( 'team_panel', array(
        'priority'       => 9,
        'title'          => __('Team Section', 'oneline-lite'),
        ));
    //header
        $wp_customize->add_section('team_setting', array(
            'title'    => __('Settings', 'oneline-lite'),
            'priority' => 1,
            'panel'    =>'team_panel'
            ));
        $wp_customize->add_setting('team_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('team_heading', array(
            'label'    => __('Main Heading', 'oneline-lite'),
            'section'  => 'team_setting',
            'settings' => 'team_heading',
             'type'       => 'text',
            )); 
        $wp_customize->add_setting('team_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('team_subheading', array(
            'label'    => __('Sub Heading', 'oneline-lite'),
            'section'  => 'team_setting',
            'settings' => 'team_subheading',
             'type'       => 'textarea',
            ));

  //  =============================
 //  = Testimonial Settings       =
//  =============================
    $wp_customize->add_panel( 'testimonial_panel', array(
        'priority'       => 10,
        'title'          => __('Testimonial Section', 'oneline-lite'),
        ));

/** woocommerce section**/
 $wp_customize->add_panel( 'woo_panel', array(
        'priority'       => 12,
        'title'          => __('Woocommerce Section', 'oneline-lite'),
        ));
    //header
$wp_customize->add_section('woo_setting', array(
            'title'    => __('Settings', 'oneline-lite'),
            'priority' => 1,
            'panel'    =>'woo_panel'
            ));
        $wp_customize->add_setting('woo_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('woo_heading', array(
            'label'    => __('Main Heading', 'oneline-lite'),
            'section'  => 'woo_setting',
            'settings' => 'woo_heading',
             'type'       => 'text',
            )); 
        $wp_customize->add_setting('woo_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('woo_subheading', array(
            'label'    => __('Sub Heading', 'oneline-lite'),
            'section'  => 'woo_setting',
            'settings' => 'woo_subheading',
             'type'       => 'textarea',
            ));
        $wp_customize->add_setting('woo_shortcode', array(
            'default'        => '[recent_products]',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('woo_shortcode', array(
            'label'    => __('Woocommerce Shortcode', 'oneline-lite'),
            'section'  => 'woo_setting',
            'settings' => 'woo_shortcode',
             'type'       => 'textarea',
            ));
            /**End woocommerce section**/



/** Latest Post Section ***/
    $wp_customize->add_panel( 'blog_panel', array(
        'priority'       => 11,
        'title'          => __('Latest Post Section', 'oneline-lite'),
        ));
    //header
        $wp_customize->add_section('blog_setting', array(
            'title'    => __('Settings', 'oneline-lite'),
            'priority' => 1,
            'panel'    =>'blog_panel'
            ));
        $wp_customize->add_setting('blog_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('blog_heading', array(
            'label'    => __('Main Heading', 'oneline-lite'),
            'section'  => 'blog_setting',
            'settings' => 'blog_heading',
             'type'       => 'text',
            )); 
        $wp_customize->add_setting('blog_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('blog_subheading', array(
            'label'    => __('Sub Heading', 'oneline-lite'),
            'section'  => 'blog_setting',
            'settings' => 'blog_subheading',
             'type'       => 'textarea',
            ));

/** Contact Us Section ***/
    $wp_customize->add_panel( 'contactus_panel', array(
        'priority'       => 13,
        'title'          => __('Contact Us Section', 'oneline-lite'),
        ));
    //header
        $wp_customize->add_section('contactus_setting', array(
            'title'    => __('Settings', 'oneline-lite'),
            'priority' => 1,
            'panel'    =>'contactus_panel'
            ));
        $wp_customize->add_setting('contactus_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('contactus_heading', array(
            'label'    => __('Main Heading', 'oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_heading',
             'type'       => 'text',
            )); 
        $wp_customize->add_setting('contactus_subheading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('contactus_subheading', array(
            'label'    => __('Sub Heading', 'oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_subheading',
             'type'       => 'textarea',
            ));
         $wp_customize->add_setting('contactus_shortcode', array(
            'default'           => '[lead-form form-id=1 title=Contact Us]',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('contactus_shortcode', array(
            'label'    => __('Contact Us Shortcode', 'oneline-lite'),
            'description' =>__('Lead Form Builder Plugin Shortcode Insert.','oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_shortcode',
             'type'       => 'textarea',
            ));
        
        $wp_customize->add_setting('contactus_address_heading', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
       $wp_customize->add_control('contactus_address_heading', array(
            'label'    => __('Address Heading', 'oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_address_heading',
             'type'       => 'text',
            ));
        $wp_customize->add_setting('contactus_address', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'themehunk_customizer_sanitize_textarea'
            ));
        $wp_customize->add_control('contactus_address', array(
            'label'    => __('Full Address', 'oneline-lite'),
            'section'  => 'contactus_setting',
            'settings' => 'contactus_address',
             'type'       => 'textarea',
            ));    

 // selective-refresh option added
$wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '#logo .site-title a',
        'render_callback' => function() {
            bloginfo( 'name' );
        },
) );
$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '#logo p',
        'render_callback' => function() {
            bloginfo( 'description' );
        },
) );       
// slider
$wp_customize->selective_refresh->add_partial( 'first_slider_heading', array(
        'selector' => '#slider-div h2.title a',
) );
$wp_customize->selective_refresh->add_partial( 'first_button_text', array(
        'selector' => '#slider-div .slider-button',
) );
// services
$wp_customize->selective_refresh->add_partial( 'our_services_heading', array(
        'selector' => '#services h2.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'our_services_subheading', array(
        'selector' => '#services p.sub-heading',
) );
// ribbon
$wp_customize->selective_refresh->add_partial( 'ribbon_heading', array(
        'selector' => '#ribbon h3.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'ribbon_button_text', array(
        'selector' => '#ribbon .ribbon-button',
) );
// team
$wp_customize->selective_refresh->add_partial( 'team_heading', array(
        'selector' => '#team h2.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'team_subheading', array(
        'selector' => '#team p.sub-heading',
) );
// post
$wp_customize->selective_refresh->add_partial( 'blog_heading', array(
        'selector' => '#latest-post h2.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'blog_subheading', array(
        'selector' => '#latest-post p.sub-heading',
) );
// woocommerce
$wp_customize->selective_refresh->add_partial( 'woo_heading', array(
        'selector' => '#woo-section h2.main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'woo_subheading', array(
        'selector' => '#woo-section p.sub-heading',
) );
// contact
$wp_customize->selective_refresh->add_partial( 'contactus_heading', array(
    'selector' => '#contact h2.cnt-main-heading',
) );
$wp_customize->selective_refresh->add_partial( 'contactus_subheading', array(
        'selector' => '#contact p.cnt-sub-heading',
) );
$wp_customize->selective_refresh->add_partial( 'contactus_address_heading', array(
        'selector' => '#contact .add-heading h3',
) );
$wp_customize->selective_refresh->add_partial( 'contactus_address', array(
        'selector' => '#contact .addrs p',
) );
$wp_customize->selective_refresh->add_partial( 'contactus_shortcode', array(
        'selector' => '#contact .cnt-div',
) );
// copyright
$wp_customize->selective_refresh->add_partial( 'copyright_text', array(
        'selector' => '.foot-copyright span.text-footer',
) );
$wp_customize->selective_refresh->add_partial( 'social_link_facebook', array(
        'selector' => '.social-ft i.fa-facebook',
) );
// end brand section
    
}
add_action('customize_register','oneline_lite_unlimited_customize_register',999);
?>