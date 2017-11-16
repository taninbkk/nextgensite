<?php

// Typography
$wp_customize->add_section('bellini_typography',
	array(
		'title' => esc_html__( 'Typography', 'bellini' ),
		'capability' => 'edit_theme_options',
		'priority' => 10,
		'panel' => 'bellini_colors_panel'
	)
);


/*--------------------------------------------------------------
## Typography
--------------------------------------------------------------*/

/*--------------------------------------------------------------
## Choose Fonts
--------------------------------------------------------------*/

	// Choose Fonts Heading
	$wp_customize->add_setting( 'bellini[bellini_typography_choose_font]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_typography_choose_font', array(
					'type' => 'info',
					'label' => esc_html__('Choose Fonts','bellini'),
					'section' => 'bellini_typography',
					'settings'    => 'bellini[bellini_typography_choose_font]',
					'priority'   => 1,
			)) );


	// Choose Fonts
    $wp_customize->add_setting( 'bellini[bellini_logo_typography_font]', array (
        'default'               => 'logo-ope',
        'type' 					=> 'option',
        'transport'             => 'refresh',
		'sanitize_callback' 	=> 'sanitize_key',
    ) );

	    $wp_customize->add_control( 'bellini_logo_typography_font', array(
	        'type'                  => 'select',
	        'section'               => 'bellini_typography',
	        'settings'    			=> 'bellini[bellini_logo_typography_font]',
	        'label'                 => esc_html__( 'Logo or Site Title Font', 'bellini' ),
	        'description'           => esc_html__( 'Applies to site title', 'bellini' ),
	        'choices'               => bellii_logo_fonts(),
	        'priority' => 2,
	    ) );



	// Choose Font Pair
    $wp_customize->add_setting( 'bellini[preset_font]', array (
        'default'               => 'planot',
        'type' 					=> 'option',
        'transport'             => 'refresh',
        'sanitize_callback' 	=> 'sanitize_key',
    ) );

	    $wp_customize->add_control( 'preset_font', array(
	        'type'                  => 'select',
	        'section'               => 'bellini_typography',
	        'settings'    			=> 'bellini[preset_font]',
	        'label'                 => esc_html__( 'Font Pairings', 'bellini' ),
	        'description'           => __( '<b>First Font</b> - All the titles or heading text</br><b>Second Font</b> - Site wide body text', 'bellini' ),
	        'choices'               => bellini_font_preset(),
	        'priority' => 3,
	    ) );



/*--------------------------------------------------------------
## Font Size
--------------------------------------------------------------*/

	// Font Size Heading
	$wp_customize->add_setting( 'bellini[bellini_typography_font_size_heading_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_typography_font_size_heading_helper', array(
					'type' => 'info',
					'label' => esc_html__('Font Size','bellini'),
					'description' => esc_html__('If you want to set your font size to 26px, just write 26','bellini'),
					'section' => 'bellini_typography',
					'settings'    => 'bellini[bellini_typography_font_size_heading_helper]',
					'priority'   => 3,
			)) );


	//Body Font Size
	$wp_customize->add_setting('bellini[bellini_body_font_size]', array(
		'type' => 'option',
		'default' => '16',
		'sanitize_callback' => 'absint',
		'transport' => 'postMessage',
	) );
			$wp_customize->add_control('bellini_body_font_size', array(
				'type' => 'number',
				'label' => esc_html__('Body Font Size','bellini'),
				'section' => 'bellini_typography',
				'settings' => 'bellini[bellini_body_font_size]',
				'priority'   => 4,
			) );


	//Title Font Size
	$wp_customize->add_setting('bellini[bellini_title_font_size]', array(
		'type' => 'option',
		'default' => '22',
		'sanitize_callback' => 'absint',
		'transport' => 'postMessage',
	) );
			$wp_customize->add_control('bellini_title_font_size', array(
				'type' => 'number',
				'label' => esc_html__('Title Font Size','bellini'),
				'section' => 'bellini_typography',
				'settings' => 'bellini[bellini_title_font_size]',
				'priority'   => 5,
			) );


	//Menu Font Size
	$wp_customize->add_setting('bellini[bellini_menu_font_size]', array(
		'type' => 'option',
		'default' => '14',
		'sanitize_callback' => 'absint',
		'transport' => 'postMessage',
	) );
			$wp_customize->add_control('bellini_menu_font_size', array(
				'type' => 'number',
				'label' => esc_html__('Menu Font Size','bellini'),
				'section' => 'bellini_typography',
				'settings' => 'bellini[bellini_menu_font_size]',
				'priority'   => 6,
			) );

/*--------------------------------------------------------------
## Font Style
--------------------------------------------------------------*/

	// Font Size Heading
	$wp_customize->add_setting( 'bellini[bellini_typography_font_style_heading_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_typography_font_style_heading_helper', array(
					'type' => 'info',
					'label' => esc_html__('Font Style','bellini'),
					'section' => 'bellini_typography',
					'settings'    => 'bellini[bellini_typography_font_style_heading_helper]',
					'priority'   => 7,
			)) );


    // Title Text Transform
	$wp_customize->add_setting( 'bellini[bellini_header_title_capitalization]' ,
		array(
			'default' 			=> 'none',
			'type' 				=> 'option',
			'transport' 		=> 'postMessage',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_header_title_capitalization',
			array(
				'label'      	=> esc_html__( 'Title Capitalization', 'bellini' ),
				'section'    	=> 'bellini_typography',
				'settings'   	=> 'bellini[bellini_header_title_capitalization]',
				'sanitize_callback' => 'esc_attr',
			    'priority'   	=> 8,
			    'type'       	=> 'radio',
					'choices'   => array(
							'none'   	=> esc_html__( 'Normal', 'bellini' ),
							'uppercase' => esc_html__( 'UPPERCASE', 'bellini' ),
							'lowercase'	=> esc_html__( 'lowercase', 'bellini' ),
							'capitalize'=> esc_html__( 'Capitalize', 'bellini' ),
					),
			)
		);

    // Widget Left Title Alignment
	$wp_customize->add_setting( 'bellini[bellini_widget_title_alignment]' ,
		array(
			'default' 			=> 'left',
			'type' 				=> 'option',
			'transport' 		=> 'postMessage',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_widget_title_alignment',
			array(
				'label'      	=> esc_html__( 'Title Alignment - Widgets', 'bellini' ),
				'section'    	=> 'bellini_typography',
				'settings'   	=> 'bellini[bellini_widget_title_alignment]',
				'sanitize_callback' => 'esc_attr',
			    'priority'   	=> 9,
			    'type'       	=> 'radio',
					'choices'   => array(
							'left'   	=> esc_html__( 'Left', 'bellini' ),
							'center'  	=> esc_html__( 'Center', 'bellini' ),
							'right'		=> esc_html__( 'Right', 'bellini' ),
					),
			)
		);