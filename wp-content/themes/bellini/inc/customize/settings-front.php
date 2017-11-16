<?php

/*--------------------------------------------------------------
## Front Page Template
--------------------------------------------------------------*/

/*--------------------------------------------------------------
## Customizer Section: Frontpage
--------------------------------------------------------------*/

	// Front Page Section Category
	$wp_customize->add_section('bellini_frontpage_section_slider',array(
			'title' 			=> esc_html__( 'Slider', 'bellini' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 1,
			'panel' 			=> 'bellini_frontpage_panel',
		)
	);

	// Front Page Feature Blocks
	$wp_customize->add_section('bellini_frontpage_section_blocks',array(
			'title' 			=> esc_html__( 'Blocks', 'bellini' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 2,
			'panel' 			=> 'bellini_frontpage_panel',
		)
	);

	// Front Page Section Category
	$wp_customize->add_section('bellini_frontpage_section_category',array(
			'title' 			=> esc_html__( 'Product Categories', 'bellini' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 2,
			'panel' 			=> 'bellini_frontpage_panel',
			'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
			'description' 		=> esc_html__('Display WooCommerce Product Categories','bellini'),
		)
	);

	// Front Page WooCommerce Products
	$wp_customize->add_section('bellini_frontpage_section_product',array(
			'title' 			=> esc_html__( 'Product Listings', 'bellini' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 3,
			'panel' 			=> 'bellini_frontpage_panel',
			'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
		)
	);

	// Front Page Section Featured Product
	$wp_customize->add_section('bellini_frontpage_section_featured',array(
			'title' 			=> esc_html__( 'Featured Products', 'bellini' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 4,
			'panel' 			=> 'bellini_frontpage_panel',
			'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
		)
	);


	// Homepage Blog Posts
	$wp_customize->add_section('bellini_frontpage_section_blog',array(
			'title' 			=> esc_html__( 'Blog Posts', 'bellini' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 5,
			'panel' 			=> 'bellini_frontpage_panel',
		)
	);

	// Text Field
	$wp_customize->add_section('bellini_frontpage_section_text_field',array(
			'title' 			=> esc_html__( 'Text Field', 'bellini' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 6,
			'panel' 			=> 'bellini_frontpage_panel',
		)
	);

	// Reorder Frontpage Section
	$wp_customize->add_section('bellini_frontpage_section_reorder',array(
			'title' 			=> esc_html__( 'Re-order Sections?', 'bellini' ),
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 20,
			'panel' 			=> 'bellini_frontpage_panel',
		)
	);
/*--------------------------------------------------------------
## Section: Static Front Page
--------------------------------------------------------------*/

	$setup_frontpage_template_description = sprintf( __( 'การแสดงผลหน้าแรก frontpage displays ให้ทำตามขั้นตอนต่อไปนี้ :</br>
		<ol>
		<li> เปิดหน้าต่างใหม่และไปที่ <b> หน้าแดชบอร์ด -> หน้า -> เพิ่มใหม่ </ b> </ li>
		<li> ทางด้านขวาคุณจะพบกล่องชื่อ <b> แอตทริบิวต์ของหน้าเว็บ </ b> </ li>
		<li> เลือก <b> โฮมเพจ </ b> จากส่วน <b> เทมเพลต </ b> </ li>
		<li> คลิกที่ <b> เผยแพร่ </ b> </ li>
		<li> ตอนนี้เลือก <b> หน้าเว็บแบบสแตติก </ b> จาก <b> frontpage displays </ b> ด้านล่าง </ li>
		<li> เลือกหน้าแรกของแม่แบบหน้าแรกของคุณเป็น <b> หน้าแรก </ b> </ li>
		<li> คลิกที่ <b> บันทึกและเผยแพร่ </ b> </ li>
		</ol></br>
		<a target="_blank" href="%s">Front Page Demo</a>', 'bellini' ), esc_url( 'http://demo.atlantisthemes.com/front-page/' ));

	$wp_customize->add_setting( 'bellini[bellini_frontpage_helper_documentation]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_frontpage_helper_documentation', array(
					'type' => 'info',
					'label' => esc_html__('Setting up Front Page','bellini'),
					'description' => $setup_frontpage_template_description,
					'section' => 'static_front_page',
					'settings'    => 'bellini[bellini_frontpage_helper_documentation]',
					'priority'   => 100,
			)) );


/*--------------------------------------------------------------
## Section: Hero Image
--------------------------------------------------------------*/

	// Slider Type -- Settings
	$wp_customize->add_setting( 'bellini[bellini_front_slider_type]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh',
		)
	);

		$wp_customize->add_control( 'bellini_front_slider_type',array(
				'label'      	=> esc_html__( 'Slider Type', 'bellini' ),
				'description' 	=> esc_html__( 'Choose your frontpage slider type.', 'bellini' ),
				'section'    	=> 'bellini_frontpage_section_slider',
				'settings'   	=> 'bellini[bellini_front_slider_type]',
			    'priority'   	=> 1,
			    'type'       	=> 'radio',
				'choices'    	=> array(
									1   => esc_html__( 'Bellini Hero Section', 'bellini' ),
									2 	=> esc_html__( '3rd Party Sliders', 'bellini' ),
								),
			)
		);


	// Show Frontpage Slider on All Pages
	$wp_customize->add_setting( 'bellini[bellini_show_frontpage_slider_pages]' ,
		array(
			'default' => true,
			'type' => 'option',
			'sanitize_callback' => 'sanitize_key',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_show_frontpage_slider_pages',array(
				'label'      	=> esc_html__( 'Show Frontpage Slider on All Pages', 'bellini' ),
				'description' 	=> esc_html__( 'Slider will be visible on all pages except Posts.', 'bellini' ),
				'section'    	=> 'bellini_frontpage_section_slider',
				'settings'   	=> 'bellini[bellini_show_frontpage_slider_pages]',
			    'priority'   	=> 2,
			    'type'       	=> 'checkbox',
			)
		);


	$wp_customize->add_setting( 'bellini[hero_section_content_title]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'hero_section_content_title', array(
					'type' => 'info',
					'label' => esc_html__('Slider - Image','bellini'),
					'section' => 'bellini_frontpage_section_slider',
					'settings'    => 'bellini[hero_section_content_title]',
					'priority'   => 2,
					'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)) );


	//Hero Image
	$wp_customize->add_setting('bellini[bellini_static_slider_image]', array(
		'type' 				=> 'option',
		'default'           => $headIMG,
		'sanitize_callback' => 'esc_url_raw',
		'transport' 		=> 'refresh',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	) );
	
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_static_slider_image',array(
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini[bellini_static_slider_image]',
               'description'=> esc_html__('Slider Image', 'bellini'),
               'priority'   => 2,
               'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			   )
			));


	$wp_customize->add_setting( 'bellini[hero_section_content_title_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'hero_section_content_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Slider - Content','bellini'),
					'section' => 'bellini_frontpage_section_slider',
					'settings'    => 'bellini[hero_section_content_title_helper]',
					'priority'   => 3,
					'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)) );

	//Hero Image Headline
	$wp_customize->add_setting('bellini[bellini_static_slider_title]', array(
		'default'			=> __('เว็บไซต์ของคุณเกือบพร้อมแล้ว', 'bellini'),
		'type' 				=> 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' 		=> 'refresh',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	) );

			$wp_customize->add_control('bellini_static_slider_title',array(
				'type' 		=>'text',
				'description'=> esc_html__('Slider Title', 'bellini'),				
               'input_attrs' 	=> array('placeholder' 	=> esc_html__( 'Title', 'bellini' ),),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini[bellini_static_slider_title]',
               'priority'   => 4,
               'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			));

	//Hero Image Content
	$wp_customize->add_setting('bellini[bellini_static_slider_content]', array(
			'default'			=> __('เริ่มต้นจัดการเว็บไซต์ของคุณได้ทันที !<br>ไปยังอีเมล กดลิ้งในอีเมลที่ได้รับจากเรา เพื่อตั้งค่ารหัสผ่าน<br>และเข้าใช้งานด้วย อีเมล และรหัสผ่าน ที่คุณสร้างขึ้น', 'bellini'),
			'type' 				=> 'option',
			'sanitize_callback' => 'bellini_sanitize_input',
			'transport' 		=> 'refresh',
			'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	) );

			$wp_customize->add_control('bellini_static_slider_content',array(
				'type' 		=>'textarea',
				'description'=> esc_html__('Slider Content', 'bellini'),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini[bellini_static_slider_content]',
               'priority'   => 5,
               'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			));

	$wp_customize->add_setting( 'bellini[hero_section_button_title_helper]',
		array(			
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'hero_section_button_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Slider - Buttons','bellini'),
					'section' => 'bellini_frontpage_section_slider',
					'settings'    => 'bellini[hero_section_button_title_helper]',
					'priority'   => 6,
					'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)) );


	//Button Text
	$wp_customize->add_setting('bellini[bellini_static_slider_button_text-1]', array(
		'default'			=> __('เริ่มกันเลย', 'bellini'),
		'type' 				=> 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' 		=> 'refresh',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	) );

			$wp_customize->add_control('bellini_static_slider_button_text-1',array(
				'type' 				=>'text',
				'description'=> esc_html__('Slider Button 1 Label', 'bellini'),
               'section'    		=> 'bellini_frontpage_section_slider',
               'settings'   		=> 'bellini[bellini_static_slider_button_text-1]',
               'priority'   		=> 7,
               'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	    		'input_attrs' 		=> array('placeholder' 	=> esc_html__( 'Button 1 Text', 'bellini' ),),
			));


	//Button URL
	$wp_customize->add_setting('bellini[bellini_static_slider_button_url-1]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	) );

			$wp_customize->add_control('bellini_static_slider_button_url-1',array(
				'type' 		=>'url',
				'description'=> esc_html__('Slider Button 1 Link', 'bellini'),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini[bellini_static_slider_button_url-1]',
               'priority'   => 8,
               'active_callback' 	=> 'is_active_slider_type_bellini_hero',
               'input_attrs' 		=> array('placeholder' 	=> esc_html__( 'Button 1 URL', 'bellini' ),),
			));


	//Button Text
	$wp_customize->add_setting('bellini[bellini_static_slider_button_text-2]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	) );

			$wp_customize->add_control('bellini_static_slider_button_text-2',array(
				'type' 			=>'text',
				'description'=> esc_html__('Slider Button 2 Label', 'bellini'),
               'section'    	=> 'bellini_frontpage_section_slider',
               'settings'   	=> 'bellini[bellini_static_slider_button_text-2]',
               'priority'   	=> 9,
               'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	    		'input_attrs' 		=> array('placeholder' 	=> esc_html__( 'Button 2 Text', 'bellini' ),),
			));

	//Button URL
	$wp_customize->add_setting('bellini[bellini_static_slider_button_url-2]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
	) );

			$wp_customize->add_control('bellini_static_slider_button_url-2',array(
				'type' 		=>'url',
				'description'=> esc_html__('Slider Button 2 Link', 'bellini'),
               'section'    => 'bellini_frontpage_section_slider',
               'settings'   => 'bellini[bellini_static_slider_button_url-2]',
               'priority'   => 10,
               'active_callback' 	=> 'is_active_slider_type_bellini_hero',
 	    		'input_attrs' 		=> array('placeholder' 	=> esc_html__( 'Button 2 URL', 'bellini' ),),
			));



	$wp_customize->add_setting( 'bellini[bellini_hero_section_color_title_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_hero_section_color_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Slider - Color Settings','bellini'),
					'section' => 'bellini_frontpage_section_slider',
					'settings'    => 'bellini[bellini_hero_section_color_title_helper]',
					'priority'   => 11,
					'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)) );


	// Hero Content Color -- Settings
	$wp_customize->add_setting( 'bellini[bellini_hero_content_color]' ,
		array(
	    'default' 			=> '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' 		=> 'postMessage',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
		'type' => 'option',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_hero_content_color',
			array(
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'bellini[bellini_hero_content_color]',
			    'priority'   => 12,
			    'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			    'label'      => esc_html__( 'Content Color', 'bellini' ),
			)
		));


	// Button 1 Color
	$wp_customize->add_setting( 'bellini[bellini_static_slider_button_background_one]' ,
		array(
	    'default' => '#00B0FF',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
		'type' => 'option',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_static_slider_button_background_one',
			array(
				'label'      => esc_html__( 'Button 1 Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'bellini[bellini_static_slider_button_background_one]',
			    'priority'   => 13,
			    'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)
		));

	// Button 2 Background Color
	$wp_customize->add_setting( 'bellini[bellini_static_slider_button_background_two]' ,
		array(
	    'default' => '#00B0FF',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
		'type' => 'option',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_static_slider_button_background_two',
			array(
				'label'      => esc_html__( 'Button 2 Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'bellini[bellini_static_slider_button_background_two]',
			    'priority'   => 14,
			    'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)
		));



	// Button 1 Color -- Settings
	$wp_customize->add_setting( 'bellini[slider_button_1_text_color]' ,
		array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
		'type' => 'option',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'slider_button_1_text_color',
			array(
				'label'      => esc_html__( 'Button 1 Text Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'bellini[slider_button_1_text_color]',
			    'priority'   => 16,
			    'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)
		));


	// Button 2 Text Color -- Settings
	$wp_customize->add_setting( 'bellini[slider_button_2_text_color]' ,
		array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'postMessage',
		'active_callback' 	=> 'is_active_slider_type_bellini_hero',
		'type' => 'option',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'slider_button_2_text_color',
			array(
				'label'      => esc_html__( 'Button 2 Text Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_slider',
				'settings'   => 'bellini[slider_button_2_text_color]',
			    'priority'   => 17,
			    'active_callback' 	=> 'is_active_slider_type_bellini_hero',
			)
		));





$third_party_slider_description = sprintf( __( 'You can insert below sliders shortcode here<br/>
	<a target="_blank" href="%s">Meta Slider</a><br/>
	<a target="_blank" href="%s">Smart Slider 3</a><br/>
	<a target="_blank" href="%s">Soliloquy</a><br/>
	etc.</br>', 'bellini' ),
esc_url( 'https://wordpress.org/plugins/ml-slider/' ),
esc_url( 'https://wordpress.org/plugins/smart-slider-3/' ),
esc_url( 'https://wordpress.org/plugins/soliloquy-lite/' ));


	$wp_customize->add_setting('bellini[bellini_slider_third_party_field]', array(
			'type' 				=> 'option',
			'sanitize_callback' => 'bellini_sanitize_input',
			'transport' 		=> 'refresh',
			'active_callback' 	=> 'is_active_slider_type_bellini_third_party',
	) );

			$wp_customize->add_control('bellini_slider_third_party_field',array(
				'type' 			=>'text',
               'label'      	=> esc_html__( '3rd Party Slider Shortcode', 'bellini' ),
               'description' 	=> $third_party_slider_description,
               'section'    	=> 'bellini_frontpage_section_slider',
               'settings'   	=> 'bellini[bellini_slider_third_party_field]',
               'priority'   	=> 18,
				'active_callback' 	=> 'is_active_slider_type_bellini_third_party',
			));


/*--------------------------------------------------------------
## Section: WooCommerce Category
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_woo_category_section_title]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woo_category_section_title', array(
					'type' => 'info',
					'label' => esc_html__('Product Categories','bellini'),
					'section' => 'bellini_frontpage_section_category',
					'settings'    => 'bellini[bellini_woo_category_section_title]',
					'priority'   => 1,
			)) );


	//Category Title
	$wp_customize->add_setting('bellini[bellini_woo_category_title]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_woo_category_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Category Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_category',
               'settings'   => 'bellini[bellini_woo_category_title]',
               'priority'   => 2,
			));

	//Category Description
	$wp_customize->add_setting('bellini[bellini_woo_category_description]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_woo_category_description',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Category Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_category',
               'settings'   => 'bellini[bellini_woo_category_description]',
               'priority'   => 3,
			));


	$wp_customize->add_setting( 'bellini[bellini_woo_category_option_title]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woo_category_option_title', array(
					'type' => 'info',
					'label' => esc_html__('Product Category Layout','bellini'),
					'section' => 'bellini_frontpage_section_category',
					'settings'    => 'bellini[bellini_woo_category_option_title]',
					'priority'   => 20,
			)) );


	// Product Category Layout
	$wp_customize->add_setting( 'bellini[woo_product_category_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'woo_product_category_layout',array(
				'label'      => esc_html__( 'Category Layout', 'bellini' ),
				'section'    => 'bellini_frontpage_section_category',
				'settings'   => 'bellini[woo_product_category_layout]',
			    'priority'   => 21,
			    'type'       => 'radio',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
				),
			)
		);


	// Product Category Column Layout
	$wp_customize->add_setting( 'bellini[woo_product_category_row]' ,
		array(
			'default' => 'col-sm-3',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'woo_product_category_row',array(
				'label'      => esc_html__( 'Category Column', 'bellini' ),
				'description'      => esc_html__( 'Display Category in 1, 2, 3 or 4 Column ', 'bellini' ),
				'section'    => 'bellini_frontpage_section_category',
				'settings'   => 'bellini[woo_product_category_row]',
			    'priority'   => 22,
			    'type'       => 'radio',
				'choices'    => array(
					'col-sm-12'   => esc_html__( '1 Column', 'bellini' ),
					'col-sm-6'  => esc_html__( '2 Columns', 'bellini' ),
					'col-sm-4' => esc_html__( '3 Columns', 'bellini' ),
					'col-sm-3' => esc_html__( '4 Columns', 'bellini' ),
				),
			)
		);

	// Product Category Description Position
	$wp_customize->add_setting( 'bellini[bellini_product_category_des_pos]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_product_category_des_pos',array(
				'label'      => esc_html__( 'Section Heading Alignment', 'bellini' ),
				'section'    => 'bellini_frontpage_section_category',
				'settings'   => 'bellini[bellini_product_category_des_pos]',
			    'priority'   => 23,
			    'type'       => 'radio',
				'choices'    => array(
					1   => esc_html__( 'Top', 'bellini' ),
					2  	=> esc_html__( 'Left', 'bellini' ),
					3 	=> esc_html__( 'Right', 'bellini' ),
				),
			)
		);



	$wp_customize->add_setting( 'bellini[bellini_woo_category_color_title_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woo_category_color_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Product Category Color & Image','bellini'),
					'section' => 'bellini_frontpage_section_category',
					'settings'    => 'bellini[bellini_woo_category_color_title_helper]',
					'priority'   => 30,
			)) );


	// Category Background Color -- Settings
	$wp_customize->add_setting( 'bellini[woo_category_background_color]' ,
		array(
	    'default' => '#FFEB3B',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'woo_category_background_color',
			array(
				'label'      => esc_html__( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_category',
				'settings'   => 'bellini[woo_category_background_color]',
			    'priority'   => 31,
			)
		));

/*--------------------------------------------------------------
## Section: WooCommerce Products
--------------------------------------------------------------*/


	$wp_customize->add_setting( 'bellini[bellini_woo_product_section_content_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woo_product_section_content_helper', array(
					'type' => 'info',
					'label' => esc_html__('Product Section Heading','bellini'),
					'section' => 'bellini_frontpage_section_product',
					'settings'    => 'bellini[bellini_woo_product_section_content_helper]',
					'priority'   => 1,
			)) );


	//Product Title
	$wp_customize->add_setting('bellini[bellini_woo_product_title]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_woo_product_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Product Section Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'bellini[bellini_woo_product_title]',
               'priority'   => 2,
			));

	//Product Description
	$wp_customize->add_setting('bellini[bellini_woo_product_description]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_woo_product_description',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Product Section Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'bellini[bellini_woo_product_description]',
               'priority'   => 3,
			));



	$wp_customize->add_setting( 'bellini[bellini_woo_product_options_title]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woo_product_options_title', array(
					'type' => 'info',
					'label' => esc_html__('Product Settings','bellini'),
					'section' => 'bellini_frontpage_section_product',
					'settings'    => 'bellini[bellini_woo_product_options_title]',
					'priority'   => 20,
			)) );


	// Products Per Page
	$wp_customize->add_setting( 'bellini[woo_product_per_page_select]',
		array(
			'default' => 12,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'woo_product_per_page_select',array(
				'label'      	=> esc_html__( 'Number of Products to Display', 'bellini' ),
				'section'    	=> 'bellini_frontpage_section_product',
				'settings'   	=> 'bellini[woo_product_per_page_select]',
			    'priority'   	=> 21,
			    'type'       	=> 'text',
	    		'input_attrs' 	=> array('placeholder' 	=> esc_html__( 'example: 2', 'bellini' ),),
			)
		);

if ( is_woocommerce_activated() ) {
	// WooCommerce Product Category Selection
	$cats = array('' => esc_html__('All', 'bellini' ),);
	$prod_categories = get_terms('product_cat');

	foreach ( $prod_categories as $categories => $category ){
	    $cats[$category->slug] = $category->name;
	}


	$wp_customize->add_setting( 'bellini[bellini_woo_category_selector]', array(
	    'default' => '',
	    'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
	    'type' => 'option',
	    'sanitize_callback' => 'sanitize_key',
	) );

		$wp_customize->add_control( 'bellini_woo_category_selector', array(
			'label'      	=> esc_html__( 'Select Product Category', 'bellini' ),
			'description'      	=> esc_html__( 'Select Category you want to display', 'bellini' ),
		    'settings' => 'bellini[bellini_woo_category_selector]',
		    'type' => 'select',
		    'choices' => $cats,
		    'section' => 'bellini_frontpage_section_product',
		    'priority'   	=> 22,
		    'active_callback' 	=> 'is_plugin_active_woocommerce_bellini',
		) );
}

	// Product Sort
	$wp_customize->add_setting( 'bellini[woo_product_orderby_select]',
		array(
			'default' => 'date',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'woo_product_orderby_select',array(
				'label'      => esc_html__( 'Sort Products By', 'bellini' ),
				'section'    => 'bellini_frontpage_section_product',
				'settings'   => 'bellini[woo_product_orderby_select]',
			    'priority'   => 23,
			    'type'       => 'radio',
				'choices'    => array(
					'date'       => esc_html__( 'Date', 'bellini' ),
					'title'   	 => esc_html__( 'Title', 'bellini' ),
					'rating'  	 => esc_html__( 'Rating', 'bellini' ),
					'popularity' => esc_html__( 'Popularity', 'bellini' ),
					'price_desc' => esc_html__( 'Price', 'bellini' ),
				),
			)
		);

	// Product Sort ASC DESC
	$wp_customize->add_setting( 'bellini[woo_product_order_select]',
		array(
			'default' => 'DESC',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'woo_product_order_select',array(
				'label'      => esc_html__( 'Product Order', 'bellini' ),
				'section'    => 'bellini_frontpage_section_product',
				'settings'   => 'bellini[woo_product_order_select]',
			    'priority'   => 24,
			    'type'       => 'radio',
				'choices'    => array(
						'ASC'   	=> esc_html__( 'Ascending', 'bellini' ),
						'DESC'   	=> esc_html__( 'Descending', 'bellini' ),
				),
			)
		);


	$wp_customize->add_setting( 'bellini[bellini_woo_product_cta_title]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woo_product_cta_title', array(
					'type' => 'info',
					'label' => esc_html__('Call To Action Section','bellini'),
					'section' => 'bellini_frontpage_section_product',
					'settings'    => 'bellini[bellini_woo_product_cta_title]',
					'priority'   => 30,
			)) );


	//Button Text
	$wp_customize->add_setting('bellini[woo_product_button_text]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('woo_product_button_text',array(
				'type' 		=>'text',
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'bellini[woo_product_button_text]',
               'priority'   => 31,
               'input_attrs' 	=> array('placeholder' 	=> esc_html__( 'Button Text', 'bellini' ),),
			));

	//Button URL
	$wp_customize->add_setting('bellini[woo_product_button_url]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('woo_product_button_url',array(
				'type' 		=>'url',
               'section'    => 'bellini_frontpage_section_product',
               'settings'   => 'bellini[woo_product_button_url]',
               'priority'   => 32,
               'input_attrs' 	=> array('placeholder' 	=> esc_html__( 'Button URL', 'bellini' ),),
			));


	$wp_customize->add_setting( 'bellini[bellini_woo_product_layout_title_helper]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woo_product_layout_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Product Section Layout','bellini'),
					'section' => 'bellini_frontpage_section_product',
					'settings'    => 'bellini[bellini_woo_product_layout_title_helper]',
					'priority'   => 40,
			)) );


	// Featured Product Slider Layout
	$wp_customize->add_setting( 'bellini[woo_product_new_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'woo_product_new_layout',array(
				'label'      => esc_html__( 'Product Layouts', 'bellini' ),
				'section'    => 'bellini_frontpage_section_product',
				'settings'   => 'bellini[woo_product_new_layout]',
			    'priority'   => 41,
			    'type'       => 'radio',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
				),
			)
		);


	// Product Category Column Layout
	$wp_customize->add_setting( 'bellini[woo_product_new_row]',
		array(
			'default' => 'col-sm-3',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'woo_product_new_row',array(
				'label'      => esc_html__( 'Product Columns', 'bellini' ),
				'description'      => esc_html__( 'Display * Products in a 1, 2, 3 or 4 columns', 'bellini' ),
				'section'    => 'bellini_frontpage_section_product',
				'settings'   => 'bellini[woo_product_new_row]',
			    'priority'   => 42,
			    'type'       => 'radio',
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

	// Product  Description Position
	$wp_customize->add_setting( 'bellini[bellini_product_general_des_pos]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_product_general_des_pos',array(
				'label'      => esc_html__( 'Section Heading Alignment', 'bellini' ),
				'section'    => 'bellini_frontpage_section_product',
				'settings'   => 'bellini[bellini_product_general_des_pos]',
			    'priority'   => 43,
			    'type'       => 'radio',
				'choices'    => array(
					1   => esc_html__( 'Top', 'bellini' ),
					2  	=> esc_html__( 'Left', 'bellini' ),
					3 	=> esc_html__( 'Right', 'bellini' ),
				),
			)
		);


	$wp_customize->add_setting( 'bellini[bellini_woo_product_section_title]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_woo_product_section_title', array(
					'type' => 'info',
					'label' => esc_html__('Product Section Color & Image','bellini'),
					'section' => 'bellini_frontpage_section_product',
					'settings'    => 'bellini[bellini_woo_product_section_title]',
					'priority'   => 50,
			)) );


	// Product Background Color -- Settings
	$wp_customize->add_setting( 'bellini[woo_product_background_color]' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'woo_product_background_color',
			array(
				'label'      => esc_html__( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_product',
				'settings'   => 'bellini[woo_product_background_color]',
			    'priority'   => 51,
			)
		));

/*--------------------------------------------------------------
## Section: WooCommerce Featured Products
--------------------------------------------------------------*/


	$wp_customize->add_setting( 'bellini[bellini_featured_product_content_title_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_featured_product_content_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Featured Products Section','bellini'),
					'section' => 'bellini_frontpage_section_featured',
					'settings'    => 'bellini[bellini_featured_product_content_title_helper]',
					'priority'   => 10,
			)) );

	//Product Title
	$wp_customize->add_setting('bellini[woo_featured_product_title]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('woo_featured_product_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Featured Section Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_featured',
               'settings'   => 'bellini[woo_featured_product_title]',
               'priority'   => 11,
			));

	//Product Description
	$wp_customize->add_setting('bellini[woo_featured_product_description]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('woo_featured_product_description',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Featured Section Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_featured',
               'settings'   => 'bellini[woo_featured_product_description]',
               'priority'   => 12,
			));


	// Number of Slides
	$wp_customize->add_setting( 'bellini[bellini_featured_slides_no_selector]',
		array(
			'default' => 2,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_featured_slides_no_selector',array(
				'label'      	=> esc_html__( 'Featured Products Per Page', 'bellini' ),
				'section'    	=> 'bellini_frontpage_section_featured',
				'settings'   	=> 'bellini[bellini_featured_slides_no_selector]',
			    'priority'   	=> 13,
			    'type'       	=> 'text',
	    		'input_attrs' 	=> array('placeholder' 	=> esc_html__( 'example: 2', 'bellini' ),),
			)
		);


	$wp_customize->add_setting( 'bellini[bellini_featured_product_color_title_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_featured_product_color_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Featured Products Style & Layout','bellini'),
					'section' => 'bellini_frontpage_section_featured',
					'settings'    => 'bellini[bellini_featured_product_color_title_helper]',
					'priority'   => 30,
			)) );

	// Featured Product Slider Layout
	$wp_customize->add_setting( 'bellini[woo_featured_product_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'woo_featured_product_layout',array(
				'label'      => esc_html__( 'Featured Product Layouts', 'bellini' ),
				'section'    => 'bellini_frontpage_section_featured',
				'settings'   => 'bellini[woo_featured_product_layout]',
			    'priority'   => 31,
			    'type'       => 'radio',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
				),
			)
		);


	// Product Background Color -- Settings
	$wp_customize->add_setting( 'bellini[woo_featured_product_background_color]' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'woo_featured_product_background_color',
			array(
				'label'      => esc_html__( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_featured',
				'settings'   => 'bellini[woo_featured_product_background_color]',
			    'priority'   => 32,
			)
		));

/*--------------------------------------------------------------
## Section: Homepage Blog Posts
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_blog_section_front_content_title_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_blog_section_front_content_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Front Blog Section','bellini'),
					'section' => 'bellini_frontpage_section_blog',
					'settings'    => 'bellini[bellini_blog_section_front_content_title_helper]',
					'priority'   => 10,
			)) );


	//Blog Title
	$wp_customize->add_setting('bellini[bellini_home_blogposts_title]', array(
		'default'	=> __('Our Stories', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_home_blogposts_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Blog Section Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini[bellini_home_blogposts_title]',
               'priority'   => 11,
			));

	//Blog Description
	$wp_customize->add_setting('bellini[bellini_home_blogposts_description]', array(
		'default'	=> __('ข่าวสารอับเดท', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_home_blogposts_description',array(
				'type' 		=>'textarea',
               'label'      => esc_html__( 'Blog Section Description', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini[bellini_home_blogposts_description]',
               'priority'   => 12,
			));

	// Blog Posts Per Page
	$wp_customize->add_setting( 'bellini[blog_front_post_per_page_select]',
		array(
			'default' => 6,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'blog_front_post_per_page_select',array(
				'label'      	=> esc_html__( 'Number of Posts to Display', 'bellini' ),
				'section'    	=> 'bellini_frontpage_section_blog',
				'settings'   	=> 'bellini[blog_front_post_per_page_select]',
			    'priority'   	=> 13,
			    'type'       	=> 'text',
	    		'input_attrs' 	=> array('placeholder' 	=> esc_html__( 'example: 6', 'bellini' ),),
			)
		);


	$wp_customize->add_setting( 'bellini[bellini_blog_section_front_cta_title_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_blog_section_front_cta_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Front Blog Call To Action','bellini'),
					'section' => 'bellini_frontpage_section_blog',
					'settings'    => 'bellini[bellini_blog_section_front_cta_title_helper]',
					'priority'   => 20,
			)) );


	//Button Text
	$wp_customize->add_setting('bellini[bellini_home_blogposts_button_text]', array(
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_home_blogposts_button_text',array(
				'type' 		=>'text',
				'description' => esc_html__('Blog Section Button','bellini'),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini[bellini_home_blogposts_button_text]',
               'priority'   => 21,
               'input_attrs'  	=> array('placeholder' 	=> esc_html__( 'Button Text', 'bellini' ),),
			));

	//Button URL
	$wp_customize->add_setting('bellini[bellini_home_blogposts_button_url]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_home_blogposts_button_url',array(
				'type' 		=>'url',
				'description' => esc_html__('Blog Section Link','bellini'),
               'section'    => 'bellini_frontpage_section_blog',
               'settings'   => 'bellini[bellini_home_blogposts_button_url]',
               'priority'   => 22,
               'input_attrs'  	=> array('placeholder' 	=> esc_html__( 'Button Link', 'bellini' ),),
			));


	$wp_customize->add_setting( 'bellini[bellini_blog_section_front_layout_title_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_blog_section_front_layout_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Blog Posts Layout','bellini'),
					'description' => esc_html__('this layout settings will be aplicable to frontpage blog posts.','bellini'),
					'section' => 'bellini_frontpage_section_blog',
					'settings'    => 'bellini[bellini_blog_section_front_layout_title_helper]',
					'priority'   => 30,
			)) );



	// Front Blog Posts layout
	$wp_customize->add_setting( 'bellini[bellini_home_blogposts_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh',
		)
	);

		$wp_customize->add_control( 'bellini_home_blogposts_layout',array(
				'label'      => esc_html__( 'Blog Posts Layout', 'bellini' ),
				'section'    => 'bellini_frontpage_section_blog',
				'settings'   => 'bellini[bellini_home_blogposts_layout]',
			    'priority'   => 31,
			    'type'       => 'radio',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
					5   => esc_html__( 'Layout 5', 'bellini' ),
				),
			)
		);


	$wp_customize->add_setting( 'bellini[bellini_blog_section_front_color_title_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_blog_section_front_color_title_helper', array(
					'type' => 'info',
					'label' => esc_html__('Blog Section Color & Image','bellini'),
					'section' => 'bellini_frontpage_section_blog',
					'settings'    => 'bellini[bellini_blog_section_front_color_title_helper]',
					'priority'   => 40,
			)) );


	// Blog Section background Color
	$wp_customize->add_setting( 'bellini[bellini_blogposts_background_color]' ,
		array(
	    'default' => '#eceef1',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_blogposts_background_color',
			array(
				'label'      => esc_html__( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_blog',
				'settings'   => 'bellini[bellini_blogposts_background_color]',
			    'priority'   => 41,
			)
		));

/*--------------------------------------------------------------
## Section: Feature Blocks
--------------------------------------------------------------*/

	// Blocks  Title
	$wp_customize->add_setting( 'bellini[bellini_feature_blocks_section_title]',
		array(
			'sanitize_callback'    => 'sanitize_key',
			'type' => 'option',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_feature_blocks_section_title', array(
					'type' => 'info',
					'label' => esc_html__( 'Block - Style & Layout','bellini'),
					'section' => 'bellini_frontpage_section_blocks',
					'settings'    => 'bellini[bellini_feature_blocks_section_title]',
					'priority'   => 20,
			)) );


	// Block Layout
	$wp_customize->add_setting( 'bellini[bellini_feature_block_layout]' ,
		array(
			'default' => 1,
			'type' => 'option',
			'sanitize_callback' => 'absint',
			'transport' => 'refresh'
		)
	);

		$wp_customize->add_control( 'bellini_feature_block_layout',array(
				'label'      => esc_html__( 'Block Layout', 'bellini' ),
				'section'    => 'bellini_frontpage_section_blocks',
				'settings'   => 'bellini[bellini_feature_block_layout]',
			    'priority'   => 21,
			    'type'       => 'radio',
				'choices'    => array(
					1   => esc_html__( 'Layout 1', 'bellini' ),
					3   => esc_html__( 'Layout 3', 'bellini' ),
				),
			)
		);


	// Feature Blocks Column Layout
	$wp_customize->add_setting( 'bellini[bellini_feature_block_row]' ,
		array(
			'default' => 'col-sm-4',
			'type' => 'option',
			'sanitize_callback' => 'esc_attr',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'bellini_feature_block_row',array(
				'label'      => esc_html__( 'Display * Blocks in a row ', 'bellini' ),
				'section'    => 'bellini_frontpage_section_blocks',
				'settings'   => 'bellini[bellini_feature_block_row]',
			    'priority'   => 22,
			    'type'       => 'radio',
				'choices'    => array(
					'col-sm-12'   => esc_html__( '1 Column', 'bellini' ),
					'col-sm-6'    => esc_html__( '2 Columns', 'bellini' ),
					'col-sm-4'    => esc_html__( '3 Columns', 'bellini' ),
				),
			)
		);


	// Category Background Color -- Settings
	$wp_customize->add_setting( 'bellini[bellini_feature_block_background_color]' ,
		array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option',
	    'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_feature_block_background_color',
			array(
				'label'      => esc_html__( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_blocks',
				'settings'   => 'bellini[bellini_feature_block_background_color]',
				'priority'   => 23,
			)
		));


	// Features Blocks Title
	$wp_customize->add_setting( 'bellini[bellini_feature_blocks_content_title]',
		array(
			'type' => 'option',
	        'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_feature_blocks_content_title', array(
					'type' => 'info',
					'label' => esc_html__('Block Section - Heading','bellini'),
					'section' => 'bellini_frontpage_section_blocks',
					'settings'    => 'bellini[bellini_feature_blocks_content_title]',
					'priority'   => 1,
			)) );


	//Blocks Section Title
	$wp_customize->add_setting('bellini[bellini_feature_blocks_title]', array(
		'default'	=> __('Our Features', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_feature_blocks_title',array(
				'type' 		=>'text',
               'label'      => esc_html__( 'Section Title', 'bellini' ),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini[bellini_feature_blocks_title]',
               'priority'   => 2,
			));


	// Features Blocks One Helper Title
	$wp_customize->add_setting( 'bellini[bellii_feature_block_one_helper_title]',
		array(
			'type' => 'option',
	        'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellii_feature_block_one_helper_title', array(
					'type' => 'info',
					'label' => esc_html__('Block 1','bellini'),
					'section' => 'bellini_frontpage_section_blocks',
					'settings'    => 'bellini[bellii_feature_block_one_helper_title]',
					'priority'   => 3,
			)) );


	//Block 1 Section Title
	$wp_customize->add_setting('bellini[bellini_feature_block_title_one]', array(
		'default'	=> __('ออกแบบตามต้องการ', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_feature_block_title_one',array(
				'type' 			=>'text',
				'description'=> esc_html__('Block 1 Title', 'bellini'),
               'section'    	=> 'bellini_frontpage_section_blocks',
               'settings'   	=> 'bellini[bellini_feature_block_title_one]',
               'input_attrs'  	=> array('placeholder' 	=> esc_html__( 'Title', 'bellini' ),),
               'priority'   	=> 4,
			));

	//Block 1 Content
	$wp_customize->add_setting('bellini[bellini_feature_block_content_one]', array(
		'default'	=> __('นี่คือตัวอย่างคำบรรยาย เกี่ยวกับจุดเด่นหรือบริการของคุณ คุณสามารถแก้ไขข้อความและรูปภาพได้ ด้วยการปรับแต่งหลังเว็บไซต์', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_feature_block_content_one',array(
				'type' 		=>'textarea',
				'description'=> esc_html__('Block 1 Description', 'bellini'),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini[bellini_feature_block_content_one]',
               'priority'   	=> 5,
			));

	//Block 1 Image
	$wp_customize->add_setting('bellini[bellini_feature_block_image_one]', array(
		'default'	=> get_parent_theme_file_uri( '/images/search.jpg'),
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_feature_block_image_one',array(
               'section'    => 'bellini_frontpage_section_blocks',
               'description'=> esc_html__('Block 1 Image', 'bellini'),
               'settings'   => 'bellini[bellini_feature_block_image_one]',
               'priority'   	=> 6,
			   )
			));


	// Features Blocks Two Helper Title
	$wp_customize->add_setting( 'bellini[bellini_feature_block_two_helper_title]',
		array(
			'type' => 'option',
	        'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_feature_block_two_helper_title', array(
					'type' => 'info',
					'label' => esc_html__('Block 2','bellini'),
					'section' => 'bellini_frontpage_section_blocks',
					'settings'    => 'bellini[bellini_feature_block_two_helper_title]',
					'priority'   => 7,
			)) );


	//Block 2 Section Title
	$wp_customize->add_setting('bellini[bellini_feature_block_title_two]', array(
		'default'	=> __('จัดส่งฟรี ทั่วประเทศ', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_feature_block_title_two',array(
				'type' 		=>'text',
				'description'=> esc_html__('Block 2 Title', 'bellini'),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini[bellini_feature_block_title_two]',
               'input_attrs'  	=> array('placeholder' 	=> esc_html__( 'Title', 'bellini' ),),
               'priority'   	=> 8,
			));

	//Block 2 Content
	$wp_customize->add_setting('bellini[bellini_feature_block_content_two]', array(
		'default'	=> __('เว็บไซต์ขายของกับระบบอีคอมเมิร์ซที่พร้อมให้คุณใช้งานได้ทันที เพียงคลิ๊กปุ่มสร้างหน้าในระบบอีคอมเมิร์ซ แล้วตั้งค่าต่างๆตามขั้นตอน', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_feature_block_content_two',array(
				'type' 		=>'textarea',
				'description'=> esc_html__('Block 2 Description', 'bellini'),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini[bellini_feature_block_content_two]',
               'priority'   	=> 9,
			));

	//Block 2 Image
	$wp_customize->add_setting('bellini[bellini_feature_block_image_two]', array(
		'default'	=> get_parent_theme_file_uri( '/images/cart.jpg'),
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_feature_block_image_two',array(
               'section'    => 'bellini_frontpage_section_blocks',
               'description'=> esc_html__('Block 2 Image', 'bellini'),
               'settings'   => 'bellini[bellini_feature_block_image_two]',
               'priority'   	=> 10,
			   )
			));

	// Features Blocks Three Helper Title
	$wp_customize->add_setting( 'bellini[bellii_feature_block_three_helper_title]',
		array(
			'type' => 'option',
	        'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellii_feature_block_three_helper_title', array(
					'type' => 'info',
					'label' => esc_html__('Block 3','bellini'),
					'section' => 'bellini_frontpage_section_blocks',
					'settings'    => 'bellini[bellii_feature_block_three_helper_title]',
					'priority'   => 11,
			)) );


	//Block 3 Section Title
	$wp_customize->add_setting('bellini[bellini_feature_block_title_three]', array(
		'default'	=> __('ไม่พอใจยินดีคืนเงิน', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_feature_block_title_three',array(
				'type' 		=>'text',
				'description'=> esc_html__('Block 3 Title', 'bellini'),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini[bellini_feature_block_title_three]',
               'input_attrs'  	=> array('placeholder' 	=> esc_html__( 'Title', 'bellini' ),),
               'priority'   	=> 12,
			));

	//Block 3 Content
	$wp_customize->add_setting('bellini[bellini_feature_block_content_three]', array(
		'default'	=> __('คุณสามารถเปิด-ปิด การแสดงผลส่วนต่างๆ บนหน้าเว็บไซต์ และระบบอีคอมเมิร์ซได้ ถ้าคุณยังไม่พร้อมขายสินค้า หรือไม่มีสินค้า', 'bellini'),
		'type' => 'option',
		'sanitize_callback' => 'bellini_sanitize_input',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control('bellini_feature_block_content_three',array(
				'type' 		=>'textarea',
				'description'=> esc_html__('Block 3 Description', 'bellini'),
               'section'    => 'bellini_frontpage_section_blocks',
               'settings'   => 'bellini[bellini_feature_block_content_three]',
                'priority'   	=> 13,
			));

	//Block 3 Image
	$wp_customize->add_setting('bellini[bellini_feature_block_image_three]', array(
		'default'	=> get_parent_theme_file_uri( '/images/credit.jpg'),
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_feature_block_image_three',array(
               'section'    => 'bellini_frontpage_section_blocks',
               'description'=> esc_html__('Block 3 Image', 'bellini'),
               'settings'   => 'bellini[bellini_feature_block_image_three]',
               'priority'   	=> 14,
			   )
			));

/*--------------------------------------------------------------
## Section: Text Field
--------------------------------------------------------------*/
	//Text Field
	$wp_customize->add_setting('bellini[bellini_frontpage_textarea_section_field]', array(
			'default'	=> __('It is a text field where you can insert any text, HTMl or shortcode.' , 'bellini'),
			'type' 				=> 'option',
			'sanitize_callback' => 'bellini_sanitize_input',
			'transport' 		=> 'refresh',
	) );

			$wp_customize->add_control('bellini_frontpage_textarea_section_field',array(
				'type' 			=>'textarea',
               'label'      	=> esc_html__( 'Text Field', 'bellini' ),
               'description'    => esc_html__( 'You can insert HTML, shortcode in this field.', 'bellini' ),
               'section'    	=> 'bellini_frontpage_section_text_field',
               'settings'   	=> 'bellini[bellini_frontpage_textarea_section_field]',
               'priority'   	=> 1,
			));


	$wp_customize->add_setting( 'bellini[bellini_frontpage_textarea_section_helper]',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_frontpage_textarea_section_helper', array(
					'type' => 'info',
					'label' => esc_html__('Section Color & Image','bellini'),
					'section' => 'bellini_frontpage_section_text_field',
					'settings'    => 'bellini[bellini_frontpage_textarea_section_helper]',
					'priority'   => 2,
			)) );


	// Text Field Background Color
	$wp_customize->add_setting( 'bellini[bellini_frontpage_textarea_section_color]' ,
		array(
	    'default' => '#d3e9fb',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'type' => 'option',
	    'transport' => 'postMessage',
		)
	);

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'bellini_frontpage_textarea_section_color',
			array(
				'label'      => esc_html__( 'Background Color', 'bellini' ),
				'section'    => 'bellini_frontpage_section_text_field',
				'settings'   => 'bellini[bellini_frontpage_textarea_section_color]',
				'priority'   => 3,
			)
		));

	//Text Field Background Image
	$wp_customize->add_setting('bellini[bellini_frontpage_textarea_section_image]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh',
	) );

			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'bellini_frontpage_textarea_section_image',array(
               'section'    => 'bellini_frontpage_section_text_field',
               'settings'   => 'bellini[bellini_frontpage_textarea_section_image]',
               'priority'   	=> 4,
			   )
			));

/*--------------------------------------------------------------
## Section Re-order
--------------------------------------------------------------*/

	$frontpage_reorder_description = sprintf( __( 'You will need to have <a target="_blank" href="%s">Homepage Control</a> plugin installed to <b>re-order</b> frontpage elements.</br>After installation go to <b>Appearance -> Homepage Control</b>', 'bellini' ), esc_url( 'https://wordpress.org/plugins/homepage-control/' ));

	$wp_customize->add_setting( 'bellini[bellini_frontpage_reorder_helper_documentation]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_frontpage_reorder_helper_documentation', array(
					'type' => 'info',
					'label' => esc_html__('How To Re-order','bellini'),
					'description' => $frontpage_reorder_description,
					'section' => 'bellini_frontpage_section_reorder',
					'settings'    => 'bellini[bellini_frontpage_reorder_helper_documentation]',
					'priority'   => 100,
			)) );