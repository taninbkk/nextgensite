<?php

/*--------------------------------------------------------------
## Color & Typography : Sections
--------------------------------------------------------------*/

// Background Color
$wp_customize->add_section('section_color',array(
	'title' => esc_html__( 'Background Color', 'bellini' ),
	'capability' => 'edit_theme_options',
	'priority' => 1,
	'panel' => 'bellini_colors_panel'
	)
);

// Text Color
$wp_customize->add_section('text_color',array(
	'title' => esc_html__( 'Text Color', 'bellini' ),
	'capability' => 'edit_theme_options',
	'priority' => 2,
	'panel' => 'bellini_colors_panel'
	)
);


// Button Color
$wp_customize->add_section('bellini_link_color_section',array(
	'title' => esc_html__( 'Buttons & Links Color', 'bellini' ),
	'capability' => 'edit_theme_options',
	'priority' => 4,
	'panel' => 'bellini_colors_panel'
	)
);



/*--------------------------------------------------------------
## Background Color
--------------------------------------------------------------*/

	// Header Background Color -- Settings
	$wp_customize->add_setting( 'bellini[header_background_color]' ,
		array(
	    'default' => '#ffffff',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'header_background_color',
			array(
				'label'      => esc_html__( 'Header Background Color', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'bellini[header_background_color]',
			    'priority'   => 3
			)
		));



	// Widget Background Color -- Settings
	$wp_customize->add_setting( 'bellini[widgets_background_color]', array(
	    'default' => '#eceef1',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'widgets_background_color',
			array(
				'label'      => esc_html__( 'Widget Area Background Color', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'bellini[widgets_background_color]',
			    'priority'   => 4,
			)
		));


	// Footer Background Color -- Settings
	$wp_customize->add_setting( 'bellini[footer_background_color]' ,
		array(
	    'default' => '#eceef1',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'footer_background_color',
			array(
				'label'      => esc_html__( 'Footer Background Color', 'bellini' ),
				'section'    => 'section_color',
				'settings'   => 'bellini[footer_background_color]',
			    'priority'   => 6
			)
		));


/*--------------------------------------------------------------
## Text Color
--------------------------------------------------------------*/

	// Body Text Color -- Settings
	$wp_customize->add_setting( 'bellini[body_text_color]' ,
		array(
	    'default' => '#333333',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'body_text_color',
			array(
				'label'      => esc_html__( 'Body Text Color', 'bellini' ),
				'description'      => esc_html__( 'Applies to site wide text including input & textarea field text', 'bellini' ),
				'section'    => 'text_color',
				'settings'   => 'bellini[body_text_color]',
			    'priority'   => 1,
			)
		));

	// Title Text Color -- Settings
	$wp_customize->add_setting( 'bellini[title_text_color]' ,
		array(
	    'default' => '#000000',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'title_text_color',
			array(
				'label'      	=> esc_html__( 'Title Text Color', 'bellini' ),
				'description'	=> esc_html__( 'Applies to all the titles', 'bellini' ),
				'section'    	=> 'text_color',
				'settings'   	=> 'bellini[title_text_color]',
			    'priority'   	=> 2,
			)
		));


	// Logo Text Color
	$wp_customize->get_control('header_textcolor')->label = esc_html__('Logo Title Color', 'bellini');
	$wp_customize->get_control('header_textcolor')->priority = 6;

	// Menu Text Color -- Settings
	$wp_customize->add_setting( 'bellini[menu_text_color]' ,
		array(
	    'default' => '#000000',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'menu_text_color',
			array(
				'label'      => esc_html__( 'Menu or Navigation Color', 'bellini' ),
				'section'    => 'text_color',
				'settings'   => 'bellini[menu_text_color]',
			    'priority'   => 8
			)
		));


	$wp_customize->add_setting( 'bellini[bellini_additional_color_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_additional_color_helper', array(
					'type' => 'info',
					'label' => esc_html__('Additional Color Options','bellini'),
					'section' => 'text_color',
					'settings'    => 'bellini[bellini_additional_color_helper]',
					'priority'   => 9,
			)) );



	// Primary Color -- Settings
	$wp_customize->add_setting( 'bellini[bellini_primary_color]', array(
	    'default' => '#2196F3',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_primary_color',
			array(
				'label'      		=> esc_html__( 'Other Colors', 'bellini' ),
				'description'      	=> esc_html__( 'Applies to header sub menu, Scroll To Top. ', 'bellini' ),
				'section'    		=> 'text_color',
				'settings'   		=> 'bellini[bellini_primary_color]',
			    'priority'   		=> 10,
			)
		));


	// Accent Color -- Settings
	$wp_customize->add_setting( 'bellini[bellini_accent_color]' ,
		array(
	    'default' => '#a5aaa8',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_accent_color',
			array(
				'label'      		=> esc_html__( 'Meta Colors', 'bellini' ),
				'description'      	=> esc_html__( 'Applies to Meta Color: Post Meta, Post Category, Comment Author, Breadcrumbs etx.', 'bellini' ),
				'section'    		=> 'text_color',
				'settings'   		=> 'bellini[bellini_accent_color]',
			    'priority'   		=> 12
			)
		));

/*--------------------------------------------------------------
## Button Color
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_button_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_button_helper', array(
					'type' => 'info',
					'label' => esc_html__('Buttons','bellini'),
					'description' => esc_html__('applies to all general buttons, search, comments button, ','bellini'),
					'section' => 'bellini_link_color_section',
					'settings'    => 'bellini[bellini_button_helper]',
					'priority'   => 1,
			)) );

	// Button Background Color -- Settings
	$wp_customize->add_setting( 'bellini[button_background_color]' ,
		array(
	    'default' => '#00B0FF',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'button_background_color',
			array(
				'label'      => esc_html__( 'Button Color', 'bellini' ),
				'section'    => 'bellini_link_color_section',
				'settings'   => 'bellini[button_background_color]',
			    'priority'   => 2,
			)
		));


	// Button Text Color -- Settings
	$wp_customize->add_setting( 'bellini[button_text_color]' ,
		array(
	    'default' => '#ffffff',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'button_text_color',
			array(
				'label'      => esc_html__( 'Button Text', 'bellini' ),
				'section'    => 'bellini_link_color_section',
				'settings'   => 'bellini[button_text_color]',
			    'priority'   => 3,
			)
		));


/*--------------------------------------------------------------
## Link Color
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_links_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_links_helper', array(
					'type' => 'info',
					'label' => esc_html__('Links','bellini'),
					'description' => esc_html__('applies to all general buttons, search, comments button, ','bellini'),
					'section' => 'bellini_link_color_section',
					'settings'    => 'bellini[bellini_links_helper]',
					'priority'   => 4,
			)) );

	// Link Text Color -- Settings
	$wp_customize->add_setting( 'bellini[link_text_color]' ,
		array(
	    'default' => '#000000',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link_text_color',
			array(
				'label'      => esc_html__( 'Link Text', 'bellini' ),
				'section'    => 'bellini_link_color_section',
				'settings'   => 'bellini[link_text_color]',
			    'priority'   => 5,
			)
		));


	// Link Hover Color -- Settings
	$wp_customize->add_setting( 'bellini[link_hover_color]' ,
		array(
	    'default' => '#000000',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'link_hover_color',
			array(
				'label'      => esc_html__( 'Link Hover', 'bellini' ),
				'section'    => 'bellini_link_color_section',
				'settings'   => 'bellini[link_hover_color]',
			    'priority'   => 6,
			)
		));