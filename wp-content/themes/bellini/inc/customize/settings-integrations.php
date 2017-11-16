<?php

/*--------------------------------------------------------------
## WooCommerce
--------------------------------------------------------------*/


	$wp_customize->add_section( 'bellini_woocommerce_integration', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'          => esc_html__( 'WooCommerce','bellini' ),
		'panel'     	 => 'bellini_third_party_integration',
		'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
	) );


	/*--------------------------------------------------------------
	## Layout
	--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_woocommerce_layout_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woocommerce_layout_helper', array(
					'type' => 'info',
					'label' => esc_html__('Layout','bellini'),
					'section' => 'bellini_woocommerce_integration',
					'settings'    => 'bellini[bellini_woocommerce_layout_helper]',
					'priority'   => 1,
					'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)) );

	// Shop Product layout
	$wp_customize->add_setting( 'bellini[bellini_woo_shop_product_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_woo_shop_product_layout',array(
				'label'      => esc_html__( 'Products Layout', 'bellini' ),
				'description' => esc_html__('Applies to Shop & Archive pages','bellini'),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woo_shop_product_layout]',
			    'priority'   => 2,
			    'type'       => 'select',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
				),
			)
		);


	// Product Column
	$wp_customize->add_setting( 'bellini[bellini_woo_shop_product_column]',
		array(
			'default' => 'col-sm-3',
			'type' => 'option',
			'sanitize_callback' => 'sanitize_html_class',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'bellini_woo_shop_product_column',array(
				'label'      => esc_html__( 'Product Columns ', 'bellini' ),
				'description' => esc_html__( 'Display Products in a 1, 2, 3 or 4 columns', 'bellini' ),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woo_shop_product_column]',
			    'priority'   => 3,
			    'type'       => 'select',
				'choices'    => array(
					'col-sm-12' => esc_html__( '1 Column', 'bellini' ),
					'col-sm-6'  => esc_html__( '2 Columns', 'bellini' ),
					'col-sm-4' 	=> esc_html__( '3 Columns', 'bellini' ),
					'col-sm-3' 	=> esc_html__( '4 Columns', 'bellini' ),
					'col-sm-15' => esc_html__( '5 Columns', 'bellini' ),
					'col-sm-2' 	=> esc_html__( '6 Columns', 'bellini' ),
				),
			)
		);

	// Shop Pagination layout
	$wp_customize->add_setting( 'bellini[bellini_woo_shop_product_pagination_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_woo_shop_product_pagination_layout',array(
				'label'      => esc_html__( 'Pagination & Sorting Layout', 'bellini' ),
				'description' => esc_html__('Product sorting, pagination layouts','bellini'),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woo_shop_product_pagination_layout]',
			    'priority'   => 4,
			    'type'       => 'select',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
					2   => esc_html__( 'Layout 2', 'bellini' ),
				),
			)
		);

	//Show * Products per page
	$wp_customize->add_setting('bellini[bellini_woo_shop_product_per_page]', array(
		'type' => 'option',
		'default' => 12,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	) );
			$wp_customize->add_control('bellini_woo_shop_product_per_page', array(
				'type' => 'number',
				'label' => esc_html__('Products Per Page','bellini'),
				'section' => 'bellini_woocommerce_integration',
				'settings' => 'bellini[bellini_woo_shop_product_per_page]',
				'priority'   => 5,
			) );

	/*--------------------------------------------------------------
	## Typography
	--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_woocommerce_typography_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woocommerce_typography_helper', array(
					'type' => 'info',
					'label' => esc_html__('Typography','bellini'),
					'description' => esc_html__('If you want to set your font size to 26px, just write 26','bellini'),
					'section' => 'bellini_woocommerce_integration',
					'settings'    => 'bellini[bellini_woocommerce_typography_helper]',
					'priority'   => 20,
					'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)) );


	//Shop Product Title Font Size
	$wp_customize->add_setting('bellini[bellini_woocommerce_shop_title_font_size]', array(
		'type' => 'option',
		'default' => 26,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	) );
			$wp_customize->add_control('bellini_woocommerce_shop_title_font_size', array(
				'type' => 'number',
				'label' => esc_html__('Product Title Font Size','bellini'),
				'section' => 'bellini_woocommerce_integration',
				'settings' => 'bellini[bellini_woocommerce_shop_title_font_size]',
				'priority'   => 21,
			) );

	//Shop Product Info Font Size
	$wp_customize->add_setting('bellini[bellini_woocommerce_shop_price_font_size]', array(
		'type' => 'option',
		'default' => 18,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	) );
			$wp_customize->add_control('bellini_woocommerce_shop_price_font_size', array(
				'type' => 'number',
				'label' => esc_html__('Product Price Font Size','bellini'),
				'section' => 'bellini_woocommerce_integration',
				'settings' => 'bellini[bellini_woocommerce_shop_price_font_size]',
				'priority'   => 22,
			) );


	//Single Product Title Font Size
	$wp_customize->add_setting('bellini[bellini_woocommerce_single_title_font_size]', array(
		'type' => 'option',
		'default' => 26,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	) );
			$wp_customize->add_control('bellini_woocommerce_single_title_font_size', array(
				'type' => 'number',
				'label' => esc_html__('Single Product Title Font Size','bellini'),
				'section' => 'bellini_woocommerce_integration',
				'settings' => 'bellini[bellini_woocommerce_single_title_font_size]',
				'priority'   => 25,
			) );

	//Single Product Info Font Size
	$wp_customize->add_setting('bellini[bellini_woocommerce_single_info_font_size]', array(
		'type' => 'option',
		'default' => 26,
		'sanitize_callback' => 'absint',
		'transport' => 'refresh',
	) );
			$wp_customize->add_control('bellini_woocommerce_single_info_font_size', array(
				'type' => 'number',
				'label' => esc_html__('Single Product Description Font Size','bellini'),
				'section' => 'bellini_woocommerce_integration',
				'settings' => 'bellini[bellini_woocommerce_single_info_font_size]',
				'priority'   => 26,
			) );

	/*--------------------------------------------------------------
	## Color
	--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_woocommerce_color_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woocommerce_color_helper', array(
					'type' => 'info',
					'label' => esc_html__('Color','bellini'),
					'section' => 'bellini_woocommerce_integration',
					'settings'    => 'bellini[bellini_woocommerce_color_helper]',
					'priority'   => 30,
					'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)) );


	// Product Card Background Color
	$wp_customize->add_setting( 'bellini[bellini_woocommerce_product_card_back_color]' ,
		array(
	    'default' => '#ffffff',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_woocommerce_product_card_back_color',
			array(
				'label'      => esc_html__( 'Product Card Colors', 'bellini' ),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woocommerce_product_card_back_color]',
			    'priority'   => 31,
			)
		));

	// Product Title Color
	$wp_customize->add_setting( 'bellini[bellini_woocommerce_product_title_color]' ,
		array(
	    'default' => '#eee',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_woocommerce_product_title_color',
			array(
				'label'      => esc_html__( 'Product Title Color', 'bellini' ),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woocommerce_product_title_color]',
			    'priority'   => 32,
			)
		));

	// Button Text Color
	$wp_customize->add_setting( 'bellini[bellini_woocommerce_product_button_text_color]' ,
		array(
	    'default' => '#ffffff',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_woocommerce_product_button_text_color',
			array(
				'label'      => esc_html__( 'Add To Cart Button Text Color', 'bellini' ),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woocommerce_product_button_text_color]',
			    'priority'   => 33,
			)
		));

	// Button Color
	$wp_customize->add_setting( 'bellini[bellini_woocommerce_product_button_color]' ,
		array(
	    'default' => '#000000',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_woocommerce_product_button_color',
			array(
				'label'      => esc_html__( 'Add To Cart Button Color', 'bellini' ),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woocommerce_product_button_color]',
			    'priority'   => 34,
			)
		));

	// Single Product layout
	$wp_customize->add_setting( 'bellini[bellini_woo_single_product_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_woo_single_product_layout',array(
				'label'      => esc_html__( 'Single Product Layout', 'bellini' ),
				'description' => esc_html__('Applies to Single Product Page','bellini'),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woo_single_product_layout]',
			    'priority'   => 6,
			    'type'       => 'select',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
					2   => esc_html__( 'Default', 'bellini' ),
				),
			)
		);

	/*--------------------------------------------------------------
	## Show/Hide
	--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_woocommerce_hide_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woocommerce_hide_helper', array(
					'type' => 'info',
					'label' => esc_html__('WooCommerce Sidebar','bellini'),
					'section' => 'bellini_woocommerce_integration',
					'settings'    => 'bellini[bellini_woocommerce_hide_helper]',
					'priority'   => 40,
					'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)) );

	// Show Sidebar
	$wp_customize->add_setting( 'bellini[bellini_show_woocommerce_sidebar]' ,
		array(
			'default' => true,
			'type' => 'option',
			'sanitize_callback' => 'sanitize_key',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_show_woocommerce_sidebar',array(
				'label'      => esc_html__( 'Show WooCommerce Sidebar', 'bellini' ),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_show_woocommerce_sidebar]',
			    'priority'   => 41,
			    'type'       => 'checkbox',
			)
		);

	// Sidebar Position
	$wp_customize->add_setting( 'bellini[bellini_woocommerce_sidebar_position]' ,
		array(
			'default' => 'right',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'bellini_woocommerce_sidebar_position',array(
				'label'      => esc_html__( 'Sidebar Position', 'bellini' ),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woocommerce_sidebar_position]',
			    'priority'   => 42,
			    'type'       => 'select',
				'choices'    => array(
					'left'   => esc_html__( 'Left', 'bellini' ),
					'right'  => esc_html__( 'Right', 'bellini' ),
				),
			)
		);


	/*--------------------------------------------------------------
	## Position
	--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_woocommerce_position_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woocommerce_position_helper', array(
					'type' => 'info',
					'label' => esc_html__('Position','bellini'),
					'section' => 'bellini_woocommerce_integration',
					'settings'    => 'bellini[bellini_woocommerce_position_helper]',
					'priority'   => 50,
					'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			)) );


	// Page Title Position
	$wp_customize->add_setting( 'bellini[bellini_woocommerce_page_title_position]' ,
		array(
			'default' => 'right',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'bellini_woocommerce_page_title_position',array(
				'label'      => esc_html__( 'Shop Page Title', 'bellini' ),
				'section'    => 'bellini_woocommerce_integration',
				'settings'   => 'bellini[bellini_woocommerce_page_title_position]',
			    'priority'   => 51,
			    'type'       => 'select',
				'choices'    => array(
					'left'   => esc_html__( 'Left', 'bellini' ),
					'right'  => esc_html__( 'Right', 'bellini' ),
					'center' => esc_html__( 'Center', 'bellini' ),
				),
			)
		);