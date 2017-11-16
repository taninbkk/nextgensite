<?php

/*--------------------------------------------------------------
## Sections
--------------------------------------------------------------*/

// Social Accounts
$wp_customize->add_section('bellini_social_accounts',array(
	'title' => esc_html__( 'Social Accounts', 'bellini' ),
	'capability' => 'edit_theme_options',
	'priority' => 1,
	'panel' => 'bellini_misc_panel'
	)
);

// Show -Hide Elements
$wp_customize->add_section('bellini_show_hide_components',array(
	'title' => esc_html__( 'Show / Hide', 'bellini' ),
	'capability' => 'edit_theme_options',
	'priority' => 2,
	'panel' => 'bellini_misc_panel'
	)
);

// Custom CSS
$wp_customize->add_section('bellini_custom_css_section',array(
	'title' => esc_html__( 'Custom Code', 'bellini' ),
	'capability' => 'edit_theme_options',
	'priority' => 3,
	'panel' => 'bellini_misc_panel'
	)
);



/*--------------------------------------------------------------
## Social Accounts
--------------------------------------------------------------*/

	// Choose Social Menu Icons Heading
	$wp_customize->add_setting( 'bellini[bellini_social_account_choose_helper]',
		array(
			'type' 					=> 'option',
			'sanitize_callback' 	=> 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_social_account_choose_helper', array(
					'type' 			=> 'info',
					'label' 		=> esc_html__('Set Social Menu','bellini'),
					'description' 	=> esc_html__('This social menu will appear in header and footer section.','bellini'),
					'section' 		=> 'bellini_social_accounts',
					'settings'    	=> 'bellini[bellini_social_account_choose_helper]',
					'priority'   	=> 1,
			)) );

////////////////////// Social Account 1  //////////////////////////////

    // Social Accounts Icon One
    $wp_customize->add_setting('bellini[bellini_social_account_icon_one]', array(
        'sanitize_callback' 	=> 'esc_attr',
        'transport' 			=> 'refresh',
        'type' => 'option',
    ));

	    $wp_customize->add_control('bellini_social_account_icon_one', array(
	        'section' => 'bellini_social_accounts',
	        'type' => 'select',
	        'choices' => bellini_social_accounts_icons(),
	        'priority'   => 1,
			'settings'    	=> 'bellini[bellini_social_account_icon_one]',
	        'input_attrs' => array(
				'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
			),
	    ));

	// Social Accounts URL One
	$wp_customize->add_setting('bellini[bellini_social_account_link_one]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_social_account_link_one',array(
				'type' 		=>'url',
               'section'    => 'bellini_social_accounts',
               'settings'   => 'bellini[bellini_social_account_link_one]',
               'priority'   => 2,
               'input_attrs' => array(
					'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
				),
			));

////////////////////// Social Account 2  //////////////////////////////

    // Social Accounts Icon Two
    $wp_customize->add_setting('bellini[bellini_social_account_icon_two]', array(
        'sanitize_callback' 	=> 'esc_attr',
        'transport' 			=> 'refresh',
        'type' => 'option',
    ));

	    $wp_customize->add_control('bellini_social_account_icon_two', array(
	        'section' => 'bellini_social_accounts',
	        'type' => 'select',
	        'choices' => bellini_social_accounts_icons(),
	        'priority'   => 3,
			'settings'    	=> 'bellini[bellini_social_account_icon_two]',
	        'input_attrs' => array(
				'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
			),
	    ));

	// Social Accounts URL Two
	$wp_customize->add_setting('bellini[bellini_social_account_link_two]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_social_account_link_two',array(
				'type' 		=>'url',
               'section'    => 'bellini_social_accounts',
               'settings'   => 'bellini[bellini_social_account_link_two]',
               'priority'   => 4,
                'input_attrs' => array(
					'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
				),
			));

////////////////////// Social Account 3  //////////////////////////////

    // Social Accounts Icon Two
    $wp_customize->add_setting('bellini[bellini_social_account_icon_three]', array(
        'sanitize_callback' 	=> 'esc_attr',
        'transport' 			=> 'refresh',
        'type' => 'option',
    ));

	    $wp_customize->add_control('bellini_social_account_icon_three', array(
	        'section' => 'bellini_social_accounts',
	        'type' => 'select',
	        'choices' => bellini_social_accounts_icons(),
	        'priority'   => 5,
			'settings'    	=> 'bellini[bellini_social_account_icon_three]',
	        'input_attrs' => array(
				'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
			),
	    ));

	// Social Accounts URL Two
	$wp_customize->add_setting('bellini[bellini_social_account_link_three]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_social_account_link_three',array(
				'type' 		=>'url',
               'section'    => 'bellini_social_accounts',
               'settings'   => 'bellini[bellini_social_account_link_three]',
               'priority'   => 6,
               'input_attrs' => array(
					'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
				),
			));

////////////////////// Social Account 4  //////////////////////////////

    // Social Accounts Icon Four
    $wp_customize->add_setting('bellini[bellini_social_account_icon_four]', array(
        'sanitize_callback' 	=> 'esc_attr',
        'transport' 			=> 'refresh',
        'type' => 'option',
    ));

	    $wp_customize->add_control('bellini_social_account_icon_four', array(
	        'section' => 'bellini_social_accounts',
	        'type' => 'select',
			'settings'    	=> 'bellini[bellini_social_account_icon_four]',
	        'choices' => bellini_social_accounts_icons(),
	        'priority'   => 7,
	        'input_attrs' => array(
				'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
			),
	    ));

	// Social Accounts URL Two
	$wp_customize->add_setting('bellini[bellini_social_account_link_four]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_social_account_link_four',array(
				'type' 		=>'url',
               'section'    => 'bellini_social_accounts',
               'settings'   => 'bellini[bellini_social_account_link_four]',
               'priority'   => 8,
               'input_attrs' => array(
				    'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
				),
			));

////////////////////// Social Account 5  //////////////////////////////

    // Social Accounts Icon Five
    $wp_customize->add_setting('bellini[bellini_social_account_icon_five]', array(
        'sanitize_callback' 	=> 'esc_attr',
        'transport' 			=> 'refresh',
        'type' => 'option',
    ));

	    $wp_customize->add_control('bellini_social_account_icon_five', array(
	        'section' => 'bellini_social_accounts',
	        'type' => 'select',
			'settings'    	=> 'bellini[bellini_social_account_icon_five]',
	        'choices' => bellini_social_accounts_icons(),
	        'priority'   => 9,
	        'input_attrs' => array(
				'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
			),
	    ));

	// Social Accounts URL Two
	$wp_customize->add_setting('bellini[bellini_social_account_link_five]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_social_account_link_five',array(
				'type' 		=>'url',
               'section'    => 'bellini_social_accounts',
               'settings'   => 'bellini[bellini_social_account_link_five]',
               'priority'   => 10,
               'input_attrs' => array(
				    'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
				),
			));

////////////////////// Social Account 6  //////////////////////////////

    // Social Accounts Icon Six
    $wp_customize->add_setting('bellini[bellini_social_account_icon_six]', array(
        'sanitize_callback' 	=> 'esc_attr',
        'transport' 			=> 'refresh',
        'type' => 'option',
    ));

	    $wp_customize->add_control('bellini_social_account_icon_six', array(
	        'section' => 'bellini_social_accounts',
	        'type' => 'select',
			'settings'    	=> 'bellini[bellini_social_account_icon_six]',
	        'choices' => bellini_social_accounts_icons(),
	        'priority'   => 11,
	        'input_attrs' => array(
				'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
			),
	    ));

	// Social Accounts URL Two
	$wp_customize->add_setting('bellini[bellini_social_account_link_six]', array(
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'postMessage',
	) );

			$wp_customize->add_control('bellini_social_account_link_six',array(
				'type' 		=>'email',
               'section'    => 'bellini_social_accounts',
               'settings'   => 'bellini[bellini_social_account_link_six]',
               'priority'   => 12,
               'input_attrs' => array(
				    'placeholder' => esc_html__( 'www.facebook.com', 'bellini' ),
				),
			));


/*--------------------------------------------------------------
## Custom CSS
--------------------------------------------------------------*/

	$wp_customize->add_setting( 'bellini[bellini_custom_css]',
		array(
			'default'              => '',
			'capability'           => 'edit_theme_options',
			'sanitize_callback'    => 'bellini_sanitize_custom_css',
			'type' => 'option',
		)
	);

	$wp_customize->add_control('bellini_custom_css',
		array(
			'label'    => esc_html__( 'Custom CSS', 'bellini' ),
			'description' => esc_html__('You can add your own CSS here.','bellini'),
			'section'  => 'bellini_custom_css_section',
			'settings' => 'bellini[bellini_custom_css]',
			'type'     => 'textarea'
		)
	);

/*--------------------------------------------------------------
## Show / Hide
--------------------------------------------------------------*/

/*--------------------------------------------------------------
## Frontpage
--------------------------------------------------------------*/

	// Show Hide Frontpage Sections
	$wp_customize->add_setting( 'bellini[bellini_show_hide_frontpage_sections]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_show_hide_frontpage_sections', array(
					'type' => 'info',
					'label' => esc_html__('Frontpage Sections','bellini'),
					'section' => 'bellini_show_hide_components',
					'settings'    => 'bellini[bellini_show_hide_frontpage_sections]',
					'priority'   => 1,
			)) );

	// Show Frontpage Slider Section
	$wp_customize->add_setting( 'bellini[bellini_show_frontpage_slider]' ,
		array(
			'default' => true,
			'type' => 'option',
			'sanitize_callback' => 'sanitize_key',
			'transport' => 'postMessage'
		)
	);

		$wp_customize->add_control( 'bellini_show_frontpage_slider',array(
				'label'      => esc_html__( 'Show Frontpage Slider', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_frontpage_slider]',
			    'priority'   => 2,
			    'type'       => 'checkbox',
			)
		);


	// Show Frontpage Feature Blocks Section
	$wp_customize->add_setting( 'bellini[bellini_show_frontpage_feature_block]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_frontpage_feature_block',array(
				'label'      => esc_html__( 'Show Feature Blocks', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_frontpage_feature_block]',
			    'priority'   => 3,
			    'type'       => 'checkbox',
			)
		);


	// Show Frontpage WooCommerce Category
	$wp_customize->add_setting( 'bellini[bellini_show_frontpage_woo_category]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_frontpage_woo_category',array(
				'label'      => esc_html__( 'Show WooCommerce Category', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_frontpage_woo_category]',
			    'priority'   => 4,
			    'type'       => 'checkbox',
			    'active_callback' => 'is_plugin_active_woocommerce_bellini',
			)
		);


	// Show Frontpage WooCommerce Products
	$wp_customize->add_setting( 'bellini[bellini_show_frontpage_woo_products]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_frontpage_woo_products',array(
				'label'      => esc_html__( 'Show WooCommerce Products', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_frontpage_woo_products]',
			    'priority'   => 5,
			    'type'       => 'checkbox',
			    'active_callback' => 'is_plugin_active_woocommerce_bellini',
			)
		);

	// Show Frontpage WooCommerce Products Featured
	$wp_customize->add_setting( 'bellini[bellini_show_frontpage_woo_products_featured]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_frontpage_woo_products_featured',array(
				'label'      => esc_html__( 'Show WooCommerce Products Featured', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_frontpage_woo_products_featured]',
			    'priority'   => 6,
			    'type'       => 'checkbox',
			    'active_callback' => 'is_plugin_active_woocommerce_bellini',
			)
		);

	// Show Frontpage Blog Posts
	$wp_customize->add_setting( 'bellini[bellini_show_frontpage_blog_posts]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_frontpage_blog_posts',array(
				'label'      => esc_html__( 'Show Blog Posts', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_frontpage_blog_posts]',
			    'priority'   => 7,
			    'type'       => 'checkbox',
			)
		);


	// Show Frontpage Text Section
	$wp_customize->add_setting( 'bellini[bellini_show_frontpage_text_section]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_frontpage_text_section',array(
				'label'      => esc_html__( 'Show Frontpage Text Section', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_frontpage_text_section]',
			    'priority'   => 8,
			    'type'       => 'checkbox',
			)
		);

/*--------------------------------------------------------------
## Footer
--------------------------------------------------------------*/

	// Show Hide Frontpage Sections
	$wp_customize->add_setting( 'bellini[bellini_show_hide_footer_sections]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_show_hide_footer_sections', array(
					'type' => 'info',
					'label' => esc_html__('Footer Components','bellini'),
					'section' => 'bellini_show_hide_components',
					'settings'    => 'bellini[bellini_show_hide_footer_sections]',
					'priority'   => 10,
			)) );

	// Footer Social Menu
	$wp_customize->add_setting( 'bellini[bellini_show_footer_social_menu]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_footer_social_menu',array(
				'label'      => esc_html__( 'Show Footer Social Menu', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_footer_social_menu]',
			    'priority'   => 11,
			    'type'       => 'checkbox',
			)
		);


// Footer Logo
	$wp_customize->add_setting( 'bellini[bellini_show_footer_logo]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_footer_logo',array(
				'label'      => esc_html__( 'Show Footer Logo', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_footer_logo]',
			    'priority'   => 13,
			    'type'       => 'checkbox',
			)
		);


	// Footer  Menu
	$wp_customize->add_setting( 'bellini[bellini_show_footer_copyright]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_footer_copyright',array(
				'label'      => esc_html__( 'Show Footer Copyright Text', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_footer_copyright]',
			    'priority'   => 14,
			    'type'       => 'checkbox',
			)
		);

	// Scroll To Top
	$wp_customize->add_setting( 'bellini[bellini_show_scroll_to_top]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_scroll_to_top',array(
				'label'      => esc_html__( 'Show Scroll To Top', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_scroll_to_top]',
			    'priority'   => 15,
			    'type'       => 'checkbox',
			)
		);
/*--------------------------------------------------------------
## Posts
--------------------------------------------------------------*/

	// Show Hide Post Sections
	$wp_customize->add_setting( 'bellini[bellini_show_hide_post_sections]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_show_hide_post_sections', array(
					'type' => 'info',
					'label' => esc_html__('Single Post Components','bellini'),
					'section' => 'bellini_show_hide_components',
					'settings'    => 'bellini[bellini_show_hide_post_sections]',
					'priority'   => 20,
			)) );

	// Show Post Meta
	$wp_customize->add_setting( 'bellini[bellini_show_post_meta]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_key',
		)
	);

		$wp_customize->add_control( 'bellini_show_post_meta',array(
				'label'      => esc_html__( 'Show Single Post Meta', 'bellini' ),
				'description'      => esc_html__( 'Author name, Date, Tags and Categories will be visible on single posts.', 'bellini' ),
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_post_meta]',
			    'priority'   => 21,
			    'type'       => 'checkbox',
			)
		);

/*--------------------------------------------------------------
## Page
--------------------------------------------------------------*/

	// Show Hide Post Sections
	$wp_customize->add_setting( 'bellini[bellini_show_hide_breadcrumb_sections]',
		array(
			'type' 				=> 'option',
			'sanitize_callback' => 'sanitize_key',
			)
	);

			$wp_customize->add_control( new Bellini_UI_Helper_Title ( $wp_customize, 'bellini_show_hide_breadcrumb_sections', array(
					'type' => 'info',
					'label' => esc_html__('Breadcrumbs','bellini'),
					'section' => 'bellini_show_hide_components',
					'settings'    => 'bellini[bellini_show_hide_breadcrumb_sections]',
					'priority'   => 40,
			)) );

	// Show Frontpage Slider Section
	$wp_customize->add_setting( 'bellini[bellini_show_page_breadcrumb]' ,
		array(
			'default' => true,
			'type' => 'option',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_key',
		)
	);

	$show_page_breadcrumb_description = sprintf( __( 'To display breadcrumb on your page, make sure you have one of these plugin installed: <a target="_blank" href="%s">Breadcrumb NavXT</a>, <a target="_blank" href="%s">Yoast SEO</a>', 'bellini' ), esc_url( 'https://wordpress.org/plugins/breadcrumb-navxt/' ), esc_url( 'https://wordpress.org/plugins/wordpress-seo/' ));

		$wp_customize->add_control( 'bellini_show_page_breadcrumb',array(
				'label'      => esc_html__( 'Show Breadcrumb', 'bellini' ),
				'description' => $show_page_breadcrumb_description,
				'section'    => 'bellini_show_hide_components',
				'settings'   => 'bellini[bellini_show_page_breadcrumb]',
			    'priority'   => 41,
			    'type'       => 'checkbox',
			)
		);