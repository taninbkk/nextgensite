<?php
     //  =============================
     //  = Default Theme Customizer Settings  =
function featuredlite_customize_register( $wp_customize ) { 
//  =============================
//  = Genral Settings     =
//  =============================
$wp_customize->get_section('title_tagline')->title = esc_html__('General Setting', 'featuredlite');
   $wp_customize->get_section('title_tagline')->priority = 3;
   $wp_customize->add_setting('title_disable', array(
        'default'           => 'enable',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('title_disable', array(
        'label'    => __('Display Site Title & Tagline', 'featuredlite'),
        'section'  => 'title_tagline',
        'settings' => 'title_disable',
         'type'       => 'checkbox',
        'choices'    => array(
            'enable' => 'Display Site Title & Tagline',
        ),
    ));   

// wordpress-default-option
$wp_customize->add_section( 'header_image', array(
  'title'          => __( 'Header Background Image', 'featuredlite' ),
  'theme_supports' => 'custom-header',
  'priority'       => 40,
  'panel' =>'theme_optn',
) );
// custom color
    $wp_customize->get_section('colors')->title = esc_html__('Body Background Color', 'featuredlite');
    $wp_customize->get_section('colors')->priority = 60;
    $wp_customize->get_section('colors')->panel = 'theme_optn';
// custom background
$wp_customize->add_section( 'background_image', array(
  'title'          => __( 'Body Background Image', 'featuredlite' ),
  'theme_supports' => 'custom-background',
  'priority'       => 80,
  'panel' =>'theme_optn',
) );  

}
add_action('customize_register','featuredlite_customize_register');
?>