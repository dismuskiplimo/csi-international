<?php
/**
 * Total Theme Customizer
 *
 * @package Total
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function total_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	global $wp_registered_sidebars;

	$total_widget_list[] = __( "-- Don't Replace --", "total" ) ;
	foreach ($wp_registered_sidebars as $wp_registered_sidebar) {
		$total_widget_list[$wp_registered_sidebar['id']] = $wp_registered_sidebar['name'];
	}

	$total_categories = get_categories(array('hide_empty' => 0));
	foreach ($total_categories as $total_category) {
		$total_cat[$total_category->term_id] = $total_category->cat_name;
	}
    
	$total_pages = get_pages(array('hide_empty' => 0));
	foreach ($total_pages as $total_pages_single) {
		$total_page_choice[$total_pages_single->ID] = $total_pages_single->post_title; 
	}

	for ( $i = 1; $i <= 100 ; $i++) { 
		$total_percentage[$i] = $i; 
	}

	$total_post_count_choice = array( 3 => 3, 6 => 6, 9 => 9 ); 

	/*============GENERAL SETTINGS PANEL============*/
	$wp_customize->add_panel(
		'total_general_settings_panel',
		array(
			'title' => __( 'General Settings', 'total' ),
			'priority' => 10
		)
	);

	//STATIC FRONT PAGE
	$wp_customize->add_section( 'static_front_page', array(
	    'title' => __( 'Static Front Page', 'total' ),
	    'panel' => 'total_general_settings_panel',
	    'description' => __( 'Your theme supports a static front page.', 'total'),
	) );

	//TITLE AND TAGLINE SETTINGS
	$wp_customize->add_section( 'title_tagline', array(
	     'title' => __( 'Site Logo/Title/Tagline', 'total' ),
	     'panel' => 'total_general_settings_panel',
	) );

	//BACKGROUND IMAGE
	$wp_customize->add_section( 'background_image', array(
	     'title' => __( 'Background Image', 'total' ),
	     'panel' => 'total_general_settings_panel',
	) );

	//COLOR SETTINGS
	$wp_customize->add_section( 'colors', array(
	     'title' => __( 'Colors' , 'total'),
	     'panel' => 'total_general_settings_panel',
	) );

	$wp_customize->add_setting(
		'total_template_color',
		array(
			'default'			=> '#FFC107',
			'sanitize_callback' => 'sanitize_hex_color',
			'priority' => 1
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'total_template_color',
			array(
				'settings'		=> 'total_template_color',
				'section'		=> 'colors',
				'label'			=> __( 'Theme Primary Color ', 'total' ),
			)
		)
	);

	//HEADER SETTINGS
	$wp_customize->add_section(
		'total_header_settings',
		array(
			'title' => __( 'Header Settings', 'total' ),
			'panel' => 'total_general_settings_panel',
		)
	);

	//ENABLE/DISABLE STICKY HEADER
	$wp_customize->add_setting(
		'total_sticky_header_enable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_sticky_header_enable',
			array(
				'settings'		=> 'total_sticky_header_enable',
				'section'		=> 'total_header_settings',
				'label'			=> __( 'Sticky Header', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Enable', 'total' ),
					'off' => __( 'Disable', 'total' )
					)	
			)
		)
	);

	/*============HOME PANEL============*/
	$wp_customize->add_panel(
		'total_home_panel',
		array(
			'title' => __( 'Home Sections', 'total' ),
			'priority' => 20
		)
	);

	/*============SLIDER IMAGES SECTION============*/
	$wp_customize->add_section(
		'total_slider_section',
		array(
			'title' => __( 'Home Slider', 'total' ),
			'panel' => 'total_home_panel',
		)
	);

	//SLIDERS
	for ( $i=1; $i < 4; $i++ ){

		$wp_customize->add_setting(
			'total_slider_heading'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Customize_Heading(
				$wp_customize,
				'total_slider_heading'.$i,
				array(
					'settings'		=> 'total_slider_heading'.$i,
					'section'		=> 'total_slider_section',
					'label'			=> __( 'Slider ', 'total' ).$i,
				)
			)
		);

		$wp_customize->add_setting(
			'total_slider_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'total_slider_page'.$i,
			array(
				'settings'		=> 'total_slider_page'.$i,
				'section'		=> 'total_slider_section',
				'type'			=> 'dropdown-pages',
				'label'			=> __( 'Select a Page', 'total' ),	
			)
		);
		
	}

	$wp_customize->add_setting(
		'total_slider_info',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Info_Text( 
			$wp_customize,
			'total_slider_info',
			array(
				'settings'		=> 'total_slider_info',
				'section'		=> 'total_slider_section',
				'label'			=> __( 'Note:', 'total' ),	
				'description'	=> __( 'The Page featured image works as a slider banner and the title & content work as a slider caption. <br/> Recommended Image Size: 1900X600', 'total' ),
			)
		)
	);

	/*============ABOUT US SECTION============*/
	$wp_customize->add_section(
		'total_about_section',
		array(
			'title' 			=> __( 'About Us Section', 'total' ),
			'panel'     		=> 'total_home_panel'
		)
	);

	//ENABLE/DISABLE ABOUT US PAGE
	$wp_customize->add_setting(
		'total_about_page_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_about_page_disable',
			array(
				'settings'		=> 'total_about_page_disable',
				'section'		=> 'total_about_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	//ABOUT US PAGE
	$wp_customize->add_setting(
		'total_about_page',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'total_about_page',
		array(
			'settings'		=> 'total_about_page',
			'section'		=> 'total_about_section',
			'type'			=> 'dropdown-pages',
			'label'			=> __( 'Select a Page', 'total' ),	
		)
	);

	for ( $i=1; $i < 6; $i++ ){ 
		$wp_customize->add_setting(
			'total_about_progressbar_heading'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Customize_Heading(
				$wp_customize,
				'total_about_progressbar_heading'.$i,
				array(
					'settings'		=> 'total_about_progressbar_heading'.$i,
					'section'		=> 'total_about_section',
					'label'			=> __( 'Progress Bar ', 'total' ).$i,
				)
			)
		);

		$wp_customize->add_setting(
			'total_about_progressbar_disable'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'total_about_progressbar_disable'.$i,
			array(
				'settings'		=> 'total_about_progressbar_disable'.$i,
				'section'		=> 'total_about_section',
				'label'			=> __( 'Check to Disable', 'total' ),
				'type' 			=> 'checkbox'
			)
		);
		
		$wp_customize->add_setting(
			'total_about_progressbar_title'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_text',
				'default'			=> sprintf( __( 'Progress Bar %d', 'total') , $i )
			)
		);

		$wp_customize->add_control(
			'total_about_progressbar_title'.$i,
			array(
				'settings'		=> 'total_about_progressbar_title'.$i,
				'section'		=> 'total_about_section',
				'type'			=> 'text',
				'label'			=> __( 'Title', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_about_progressbar_percentage'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_choices',
				'default'			=> rand( 60 , 100)
			)
		);

		$wp_customize->add_control(
			new Total_Dropdown_Chooser(
				$wp_customize,
				'total_about_progressbar_percentage'.$i,
				array(
					'settings'		=> 'total_about_progressbar_percentage'.$i,
					'section'		=> 'total_about_section',
					'label'			=> __( 'Percentage', 'total' ),
					'choices'       => $total_percentage
				)
			)
		);

		$wp_customize->add_setting(
			'total_about_image_heading',
			array(
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Customize_Heading(
				$wp_customize,
				'total_about_image_heading',
				array(
					'settings'		=> 'total_about_image_heading',
					'section'		=> 'total_about_section',
					'label'			=> __( 'Right Image', 'total' ),
				)
			)
		);

		$wp_customize->add_setting(
			'total_about_image',
			array(
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'total_about_image',
		        array(
		            'section' => 'total_about_section',
		            'settings' => 'total_about_image',
		            'description' => __('Recommended Image Size: 500X600px', 'total')
		        )
		    )
		);

		$wp_customize->add_setting(
			'total_about_widget',
			array(
				'default'			=> '0',
				'sanitize_callback' => 'total_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'total_about_widget',
			array(
				'settings'		=> 'total_about_widget',
				'section'		=> 'total_about_section',
				'type'			=> 'select',
				'label'			=> __( 'Replace Image by widget', 'total' ),
				'choices'       => $total_widget_list
			)
		);

	}

	/*============FEATURED SECTION PANEL============*/
	$wp_customize->add_section(
		'total_featured_section',
		array(
			'title' 			=> __( 'Featured Section', 'total' ),
			'panel'				=> 'total_home_panel'
		)
	);

	//ENABLE/DISABLE FEATURED SECTION
	$wp_customize->add_setting(
		'total_featured_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_featured_section_disable',
			array(
				'settings'		=> 'total_featured_section_disable',
				'section'		=> 'total_featured_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					),
			)
		)
	);

	$wp_customize->add_setting(
		'total_featured_title_sub_title_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_featured_title_sub_title_heading',
			array(
				'settings'		=> 'total_featured_title_sub_title_heading',
				'section'		=> 'total_featured_section',
				'label'			=> __( 'Section Title & Sub Title', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_featured_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Featured Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_featured_title',
		array(
			'settings'		=> 'total_featured_title',
			'section'		=> 'total_featured_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_featured_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Featured Section SubTitle', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_featured_sub_title',
		array(
			'settings'		=> 'total_featured_sub_title',
			'section'		=> 'total_featured_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' ),
		)
	);

	//FEATURED PAGES
	for( $i = 1; $i < 4; $i++ ){
		$wp_customize->add_setting(
			'total_featured_header'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Customize_Heading(
				$wp_customize,
				'total_featured_header'.$i,
				array(
					'settings'		=> 'total_featured_header'.$i,
					'section'		=> 'total_featured_section',
					'label'			=> __( 'Featured Page ', 'total' ).$i
				)
			)
		);

		$wp_customize->add_setting(
			'total_featured_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'total_featured_page'.$i,
			array(
				'settings'		=> 'total_featured_page'.$i,
				'section'		=> 'total_featured_section',
				'type'			=> 'dropdown-pages',
				'label'			=> __( 'Select a Page', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_featured_page_icon'.$i,
			array(
				'default'			=> 'fa fa-bell',
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Fontawesome_Icon_Chooser(
				$wp_customize,
				'total_featured_page_icon'.$i,
				array(
					'settings'		=> 'total_featured_page_icon'.$i,
					'section'		=> 'total_featured_section',
					'type'			=> 'icon',
					'label'			=> __( 'FontAwesome Icon', 'total' ),
				)
			)
		);
	}

	/*============PORTFOLIO SECTION PANEL============*/
	$wp_customize->add_section(
		'total_portfolio_section',
		array(
			'title'			=> __( 'Portfolio Section', 'total' ),
			'panel'         => 'total_home_panel'
		)
	);

	//ENABLE/DISABLE PORTFOLIO
	$wp_customize->add_setting(
		'total_portfolio_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_portfolio_section_disable',
			array(
				'settings'		=> 'total_portfolio_section_disable',
				'section'		=> 'total_portfolio_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'total_portfolio_title_sec_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_portfolio_title_sec_heading',
			array(
				'settings'		=> 'total_portfolio_title_sec_heading',
				'section'		=> 'total_portfolio_section',
				'label'			=> __( 'Section Title & Sub Title', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_portfolio_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Portfolio Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_portfolio_title',
		array(
			'settings'		=> 'total_portfolio_title',
			'section'		=> 'total_portfolio_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_portfolio_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Portfolio Section SubTitle', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_portfolio_sub_title',
		array(
			'settings'		=> 'total_portfolio_sub_title',
			'section'		=> 'total_portfolio_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' )
		)
	);

	//PORTFOLIO CHOICES
	$wp_customize->add_setting(
		'total_portfolio_cat_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_portfolio_cat_heading',
			array(
				'settings'		=> 'total_portfolio_cat_heading',
				'section'		=> 'total_portfolio_section',
				'label'			=> __( 'Portfolio Category', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_portfolio_cat',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);
 
	$wp_customize->add_control(
	    new Total_Customize_Checkbox_Multiple(
	        $wp_customize,
	        'total_portfolio_cat',
	        array(
	            'label' => __( 'Select Category', 'total' ),
	            'section' => 'total_portfolio_section',
	            'settings' => 'total_portfolio_cat',
	            'choices' => $total_cat
	        )
	    )
	);

	/*============SERVICE SECTION PANEL============*/
	$wp_customize->add_section(
		'total_service_section',
		array(
			'title' 			=> __( 'Service Section', 'total' ),
			'panel'				=> 'total_home_panel'
		)
	);

	//ENABLE/DISABLE SERVICE SECTION
	$wp_customize->add_setting(
		'total_service_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_service_section_disable',
			array(
				'settings'		=> 'total_service_section_disable',
				'section'		=> 'total_service_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'total_service_section_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_service_section_heading',
			array(
				'settings'		=> 'total_service_section_heading',
				'section'		=> 'total_service_section',
				'label'			=> __( 'Section Title & Sub Title', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_service_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Service Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_service_title',
		array(
			'settings'		=> 'total_service_title',
			'section'		=> 'total_service_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_service_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Service Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_service_sub_title',
		array(
			'settings'		=> 'total_service_sub_title',
			'section'		=> 'total_service_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' )
		)
	);

	//SERVICE PAGES
	for( $i = 1; $i < 7; $i++ ){
		$wp_customize->add_setting(
			'total_service_header'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Customize_Heading(
				$wp_customize,
				'total_service_header'.$i,
				array(
					'settings'		=> 'total_service_header'.$i,
					'section'		=> 'total_service_section',
					'label'			=> __( 'Service Page ', 'total' ).$i
				)
			)
		);

		$wp_customize->add_setting(
			'total_service_page'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'total_service_page'.$i,
			array(
				'settings'		=> 'total_service_page'.$i,
				'section'		=> 'total_service_section',
				'type'			=> 'dropdown-pages',
				'label'			=> __( 'Select a Page', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_service_page_icon'.$i,
			array(
				'default'			=> 'fa-bell',
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Fontawesome_Icon_Chooser(
				$wp_customize,
				'total_service_page_icon'.$i,
				array(
					'settings'		=> 'total_service_page_icon'.$i,
					'section'		=> 'total_service_section',
					'type'			=> 'icon',
					'label'			=> __( 'FontAwesome Icon', 'total' )
				)
			)
		);
	}
	$wp_customize->add_setting(
		'total_service_left_bg_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_service_left_bg_heading',
			array(
				'settings'		=> 'total_service_left_bg_heading',
				'section'		=> 'total_service_section',
				'label'			=> __( 'Left Image', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_service_left_bg',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'			=> get_template_directory_uri().'/images/banner.jpg'
		)
	);
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'total_service_left_bg',
	        array(
	            'section' => 'total_service_section',
	            'settings' => 'total_service_left_bg',
	            'description' => __('Recommended Image Size: 770X650px', 'total')
	        )
	    )
	);

	/*============TEAM SECTION PANEL============*/
	$wp_customize->add_section(
		'total_team_section',
		array(
			'title'			=> __( 'Team Section', 'total' ),
			'panel'         => 'total_home_panel'
		)
	);

	//ENABLE/DISABLE TEAM SECTION
	$wp_customize->add_setting(
		'total_team_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_team_section_disable',
			array(
				'settings'		=> 'total_team_section_disable',
				'section'		=> 'total_team_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'total_team_title_subtitle_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_team_title_subtitle_heading',
			array(
				'settings'		=> 'total_team_title_subtitle_heading',
				'section'		=> 'total_team_section',
				'label'			=> __( 'Section Title & Sub Title', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_team_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Team Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_team_title',
		array(
			'settings'		=> 'total_team_title',
			'section'		=> 'total_team_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_team_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Team Section SubTitle', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_team_sub_title',
		array(
			'settings'		=> 'total_team_sub_title',
			'section'		=> 'total_team_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' )
		)
	);

	//TEAM PAGES
	for( $i = 1; $i < 5; $i++ ){
		$wp_customize->add_setting(
			'total_team_heading'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Customize_Heading(
				$wp_customize,
				'total_team_heading'.$i,
				array(
					'settings'		=> 'total_team_heading'.$i,
					'section'		=> 'total_team_section',
					'label'			=> __( 'Team Member ', 'total' ).$i,
				)
			)
		);

		$wp_customize->add_setting(
			'total_team_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'total_team_page'.$i,
			array(
				'settings'		=> 'total_team_page'.$i,
				'section'		=> 'total_team_section',
				'type'			=> 'dropdown-pages',
				'label'			=> __( 'Select a Page', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_team_designation'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			'total_team_designation'.$i,
			array(
				'settings'		=> 'total_team_designation'.$i,
				'section'		=> 'total_team_section',
				'type'			=> 'text',
				'label'			=> __( 'Team Member Designation', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_team_facebook'.$i,
			array(
				'default'			=> 'https://facebook.com',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			'total_team_facebook'.$i,
			array(
				'settings'		=> 'total_team_facebook'.$i,
				'section'		=> 'total_team_section',
				'type'			=> 'url',
				'label'	        => __( 'Facebook Url', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_team_twitter'.$i,
			array(
				'default'			=> 'https://twitter.com',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			'total_team_twitter'.$i,
			array(
				'settings'		=> 'total_team_twitter'.$i,
				'section'		=> 'total_team_section',
				'type'			=> 'url',
				'label'	        => __( 'Twitter Url', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_team_google_plus'.$i,
			array(
				'default'			=> 'https://plus.google.com',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			'total_team_google_plus'.$i,
			array(
				'settings'		=> 'total_team_google_plus'.$i,
				'section'		=> 'total_team_section',
				'type'			=> 'url',
				'label'	        => __( 'Google Plus Url', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_team_linkedin'.$i,
			array(
				'default'			=> 'https://linkedin.com',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			'total_team_linkedin'.$i,
			array(
				'settings'		=> 'total_team_linkedin'.$i,
				'section'		=> 'total_team_linkedin'.$i,
				'type'			=> 'url',
				'label'	        => __( 'Linkedin Url', 'total' )
			)
		);
	}

	/*============COUNTER SECTION PANEL============*/
	$wp_customize->add_section(
		'total_counter_section',
		array(
			'title' 			=> __( 'Counter Section', 'total' ),
			'panel'				=> 'total_home_panel'
		)
	);

	$wp_customize->add_setting(
		'total_counter_title_subtitle_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	//ENABLE/DISABLE COUNTER SECTION
	$wp_customize->add_setting(
		'total_counter_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_counter_section_disable',
			array(
				'settings'		=> 'total_counter_section_disable',
				'section'		=> 'total_counter_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_counter_title_subtitle_heading',
			array(
				'settings'		=> 'total_counter_title_subtitle_heading',
				'section'		=> 'total_counter_section',
				'label'			=> __( 'Section Title & Sub Title', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_counter_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Counter Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_counter_title',
		array(
			'settings'		=> 'total_counter_title',
			'section'		=> 'total_counter_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_counter_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Counter Section SubTitle', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_counter_sub_title',
		array(
			'settings'		=> 'total_counter_sub_title',
			'section'		=> 'total_counter_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_counter_bg_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_counter_bg_heading',
			array(
				'settings'		=> 'total_counter_bg_heading',
				'section'		=> 'total_counter_section',
				'label'			=> __( 'Section Background', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_counter_bg',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'			=> get_template_directory_uri().'/images/banner.jpg'
		)
	);

	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'total_counter_bg',
	        array(
	            'label' => __( 'Upload Image', 'total' ),
	            'section' => 'total_counter_section',
	            'settings' => 'total_counter_bg',
	            'description' => __('Recommended Image Size: 1800X400px', 'total')
	        )
	    )
	);

	//COUNTERS
	for( $i = 1; $i < 5; $i++ ){

		$wp_customize->add_setting(
			'total_counter_heading'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Customize_Heading(
				$wp_customize,
				'total_counter_heading'.$i,
				array(
					'settings'		=> 'total_counter_heading'.$i,
					'section'		=> 'total_counter_section',
					'label'			=> __( 'Counter', 'total' ).$i,
				)
			)
		);

		$wp_customize->add_setting(
			'total_counter_title'.$i,
			array(
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			'total_counter_title'.$i,
			array(
				'settings'		=> 'total_counter_title'.$i,
				'section'		=> 'total_counter_section',
				'type'			=> 'text',
				'label'			=> __( 'Title', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_counter_count'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'total_counter_count'.$i,
			array(
				'settings'		=> 'total_counter_count'.$i,
				'section'		=> 'total_counter_section',
				'type'			=> 'number',
				'label'			=> __( 'Counter Value', 'total' )
			)
		);

		$wp_customize->add_setting(
			'total_counter_icon'.$i,
			array(
				'default'			=> 'fa fa-bell',
				'sanitize_callback' => 'total_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new Total_Fontawesome_Icon_Chooser(
				$wp_customize,
				'total_counter_icon'.$i,
				array(
					'settings'		=> 'total_counter_icon'.$i,
					'section'		=> 'total_counter_section',
					'type'			=> 'icon',
					'label'			=> __( 'Counter Icon', 'total' )
				)
			)
		);
	}

	/*============TESTIMONIAL PANEL============*/
	$wp_customize->add_section(
		'total_testimonial_section',
		array(
			'title' 			=> __( 'Testimonial Section', 'total' ),
			'panel'  			=> 'total_home_panel'
		)
	);

	//ENABLE/DISABLE TESTIMONIAL SECTION
	$wp_customize->add_setting(
		'total_testimonial_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_testimonial_section_disable',
			array(
				'settings'		=> 'total_testimonial_section_disable',
				'section'		=> 'total_testimonial_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'total_testimonial_title_subtitle_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_testimonial_title_subtitle_heading',
			array(
				'settings'		=> 'total_testimonial_title_subtitle_heading',
				'section'		=> 'total_testimonial_section',
				'label'			=> __( 'Section Title & Sub Title', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_testimonial_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Testimonial Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_testimonial_title',
		array(
			'settings'		=> 'total_testimonial_title',
			'section'		=> 'total_testimonial_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_testimonial_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Testimonial Section SubTitle', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_testimonial_sub_title',
		array(
			'settings'		=> 'total_testimonial_sub_title',
			'section'		=> 'total_testimonial_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' )
		)
	);

	//TESTIMONIAL PAGES
	$wp_customize->add_setting(
		'total_testimonial_header',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_testimonial_header',
			array(
				'settings'		=> 'total_testimonial_header',
				'section'		=> 'total_testimonial_section',
				'label'			=> __( 'Testimonial', 'total' )
			)
		)
	);

	$wp_customize->add_setting(
		'total_testimonial_page',
		array(
			'sanitize_callback' => 'total_sanitize_choices_array'
		)
	);

	$wp_customize->add_control(
		new Total_Dropdown_Multiple_Chooser(
		$wp_customize,
		'total_testimonial_page',
		array(
			'settings'		=> 'total_testimonial_page',
			'section'		=> 'total_testimonial_section',
			'choices'		=> $total_page_choice,
			'label'			=> __( 'Select the Pages', 'total' ),
			'placeholder'   => __( 'Select Some Pages', 'total' )
 		)
		)
	);

	/*============BLOG PANEL============*/
	$wp_customize->add_section(
		'total_blog_section',
		array(
			'title' 			=> __( 'Blog Section', 'total' ),
			'panel'				=> 'total_home_panel'
		)
	);

	//ENABLE/DISABLE BLOG SECTION
	$wp_customize->add_setting(
		'total_blog_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_blog_section_disable',
			array(
				'settings'		=> 'total_blog_section_disable',
				'section'		=> 'total_blog_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'total_blog_title_subtitle_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_blog_title_subtitle_heading',
			array(
				'settings'		=> 'total_blog_title_subtitle_heading',
				'section'		=> 'total_blog_section',
				'label'			=> __( 'Section Title & Sub Title', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_blog_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Blog Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_blog_title',
		array(
			'settings'		=> 'total_blog_title',
			'section'		=> 'total_blog_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_blog_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Blog Section SubTitle', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_blog_sub_title',
		array(
			'settings'		=> 'total_blog_sub_title',
			'section'		=> 'total_blog_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' )
		)
	);

	//BLOG SETTINGS
	$wp_customize->add_setting(
		'total_blog_post_count',
		array(
			'default'			=> '3',
			'sanitize_callback' => 'total_sanitize_choices'
		)
	);

	$wp_customize->add_control(
		new Total_Dropdown_Chooser(
		$wp_customize,
		'total_blog_post_count',
		array(
			'settings'		=> 'total_blog_post_count',
			'section'		=> 'total_blog_section',
			'label'			=> __( 'Number of Posts to show', 'total' ),
			'choices'       => $total_post_count_choice
		)
		)
	);

	$wp_customize->add_setting(
		'total_blog_cat_exclude',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);
 
	$wp_customize->add_control(
	    new Total_Customize_Checkbox_Multiple(
	        $wp_customize,
	        'total_blog_cat_exclude',
	        array(
	            'label' => __('Exclude Category from Blog Posts', 'total'),
	            'section' => 'total_blog_section',
	            'settings' => 'total_blog_cat_exclude',
	            'choices' => $total_cat
	        )
	    )
	);

	/*============CLIENTS LOGO SECTION============*/
	$wp_customize->add_Section(
		'total_client_logo_section',
		array(
			'title' 			=> __( 'Clients Logo Section', 'total' ),
			'panel'				=> 'total_home_panel'
		)
	);

	//ENABLE/DISABLE LOGO SECTION
	$wp_customize->add_setting(
		'total_client_logo_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_client_logo_section_disable',
			array(
				'settings'		=> 'total_client_logo_section_disable',
				'section'		=> 'total_client_logo_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'total_client_logo_title_subtitle_heading',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Customize_Heading(
			$wp_customize,
			'total_client_logo_title_subtitle_heading',
			array(
				'settings'		=> 'total_client_logo_title_subtitle_heading',
				'section'		=> 'total_client_logo_section',
				'label'			=> __( 'Section Title & Sub Title', 'total' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_logo_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Client Logo Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_logo_title',
		array(
			'settings'		=> 'total_logo_title',
			'section'		=> 'total_client_logo_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_logo_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Clients Logo Section SubTitle', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_logo_sub_title',
		array(
			'settings'		=> 'total_logo_sub_title',
			'section'		=> 'total_client_logo_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' )
		)
	);

	//CLIENTS LOGOS
	$wp_customize->add_setting(
		'total_client_logo_image',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Display_Gallery_Control(
			$wp_customize,
			'total_client_logo_image',
		array(
			'settings'		=> 'total_client_logo_image',
			'section'		=> 'total_client_logo_section',
			'label'			=> __( 'Upload Clients Logos', 'total' ),
		)
		)
	);

	/*============CALL TO ACTION PANEL============*/
	$wp_customize->add_section(
		'total_cta_section',
		array(
			'title' 			=> __( 'Call To Action Section', 'total' ),
			'panel'				=> 'total_home_panel'
		)
	);

	//ENABLE/DISABLE LOGO SECTION
	$wp_customize->add_setting(
		'total_cta_section_disable',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new Total_Switch_Control(
			$wp_customize,
			'total_cta_section_disable',
			array(
				'settings'		=> 'total_cta_section_disable',
				'section'		=> 'total_cta_section',
				'label'			=> __( 'Disable Section', 'total' ),
				'on_off_label' 	=> array(
					'on' => __( 'Yes', 'total' ),
					'off' => __( 'No', 'total' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'total_cta_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Call To Action Section', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_cta_title',
		array(
			'settings'		=> 'total_cta_title',
			'section'		=> 'total_cta_section',
			'type'			=> 'text',
			'label'			=> __( 'Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_cta_sub_title',
		array(
			'sanitize_callback' => 'total_sanitize_text',
			'default'			=> __( 'Call To Action Section SubTitle', 'total' )
		)
	);

	$wp_customize->add_control(
		'total_cta_sub_title',
		array(
			'settings'		=> 'total_cta_sub_title',
			'section'		=> 'total_cta_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Sub Title', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_cta_button1_text',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		'total_cta_button1_text',
		array(
			'settings'		=> 'total_cta_button1_text',
			'section'		=> 'total_cta_section',
			'type'			=> 'text',
			'label'			=> __( 'Button 1 Text', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_cta_button1_link',
		array(
			'default'			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'total_cta_button1_link',
		array(
			'settings'		=> 'total_cta_button1_link',
			'section'		=> 'total_cta_section',
			'type'			=> 'url',
			'label'			=> __( 'Button 1 Link', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_cta_button2_text',
		array(
			'default'			=> '',
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		'total_cta_button2_text',
		array(
			'settings'		=> 'total_cta_button2_text',
			'section'		=> 'total_cta_section',
			'type'			=> 'text',
			'label'			=> __( 'Button 2 Text', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_cta_button2_link',
		array(
			'default'			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'total_cta_button2_link',
		array(
			'settings'		=> 'total_cta_button2_link',
			'section'		=> 'total_cta_section',
			'type'			=> 'url',
			'label'			=> __( 'Button 2 Link', 'total' )
		)
	);

	$wp_customize->add_setting(
		'total_cta_bg',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'			=> get_template_directory_uri().'/images/banner.jpg'
		)
	);

	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'total_cta_bg',
	        array(
	            'label' => __( 'Background Image', 'total' ),
	            'section' => 'total_cta_section',
	            'settings' => 'total_cta_bg',
	            'description' => __('Recommended Image Size: 1800X800px', 'total')
	        )
	    )
	);

	/*============IMPORTANT LINKS============*/
	$wp_customize->add_section(
		'total_implink_section',
		array(
			'title' 			=> __( 'Important Links', 'total' ),
			'priority'			=> 1
		)
	);

	$wp_customize->add_setting(
		'total_imp_links',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Info_Text( 
			$wp_customize,
			'total_imp_links',
			array(
				'settings'		=> 'total_imp_links',
				'section'		=> 'total_implink_section',
				'description'	=> '<a class="ht-implink" href="https://hashthemes.com/documentation/total-documentation/" target="_blank">'.__('Documentation', 'total').'</a><a class="ht-implink" href="http://demo.hashthemes.com/total/" target="_blank">'.__('Live Demo', 'total').'</a><a class="ht-implink" href="https://hashthemes.com/support/" target="_blank">'.__('Support Forum', 'total').'</a><a class="ht-implink" href="https://www.facebook.com/hashtheme/" target="_blank">'.__('Like Us in Facebook', 'total').'</a>',
			)
		)
	);

	$wp_customize->add_setting(
		'total_rate_us',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Info_Text( 
			$wp_customize,
			'total_rate_us',
			array(
				'settings'		=> 'total_rate_us',
				'section'		=> 'total_implink_section',
				'description'	=> sprintf(__( 'Please do rate our theme if you liked it %s', 'total'), '<a class="ht-implink" href="https://wordpress.org/support/theme/total/reviews/?filter=5" target="_blank">Rate/Review</a>' ),
			)
		)
	);

	$wp_customize->add_setting(
		'total_setup_instruction',
		array(
			'sanitize_callback' => 'total_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Total_Info_Text( 
			$wp_customize,
			'total_setup_instruction',
			array(
				'settings'		=> 'total_setup_instruction',
				'section'		=> 'total_implink_section',
				'description'	=> __( '<strong>Instruction - Setting up Home Page</strong><br/>1. Create a new 
					page (any title, like Home )<br/>
2. In right column: Page Attributes -> Template: Home Page<br/>
3. Click on Publish<br/>
4. Go to Appearance-> Customize -> General settings -> Static Front Page<br/>
5. Select - A static page<br/>
6. In Front Page, select the page that you created in the step 1<br/>
7. Save changes', 'total'),
			)
		)
	);

}
add_action( 'customize_register', 'total_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function total_customize_preview_js() {
	wp_enqueue_script( 'total-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'total_customize_preview_js' );

function total_customizer_script() {
	wp_enqueue_script( 'total-customizer-script', get_template_directory_uri() .'/inc/js/customizer-scripts.js', array("jquery"),'', true  );
	wp_enqueue_script( 'total-customizer-chosen-script', get_template_directory_uri() .'/inc/js/chosen.jquery.js', array("jquery"),'1.4.1', true  );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');	
	wp_enqueue_style( 'total-customizer-chosen-style', get_template_directory_uri() .'/inc/css/chosen.css');
	wp_enqueue_style( 'total-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css');	
}
add_action( 'customize_controls_enqueue_scripts', 'total_customizer_script' );

if( class_exists( 'WP_Customize_Control' ) ):	

class Total_Dropdown_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_chooser';

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="hs-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}

class Total_Fontawesome_Icon_Chooser extends WP_Customize_Control{
	public $type = 'icon';

	public function render_content(){
		?>
            <label>
                <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <div class="total-selected-icon">
                	<i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                	<span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="total-icon-list clearfix">
                	<?php
                	$total_font_awesome_icon_array = total_font_awesome_icon_array();
                	foreach ($total_font_awesome_icon_array as $total_font_awesome_icon) {
							$icon_class = $this->value() == $total_font_awesome_icon ? 'icon-active' : '';
							echo '<li class='.$icon_class.'><i class="'.$total_font_awesome_icon.'"></i></li>';
						}
                	?>
                </ul>
                <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
            </label>
		<?php
	}
}

class Total_Display_Gallery_Control extends WP_Customize_Control{
	public $type = 'gallery';
	 
	public function render_content() {
	?>
	<label>
		<span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>

		<?php if($this->description){ ?>
			<span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php } ?>

		<div class="gallery-screenshot clearfix">
    	<?php
        	{
        	$ids = explode( ',', $this->value() );
            	foreach ( $ids as $attachment_id ) {
                	$img = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                	echo '<div class="screen-thumb"><img src="' . esc_url($img[0]) . '" /></div>';
            	}
        	}
    	?>
    	</div>

    	<input id="edit-gallery" class="button upload_gallery_button" type="button" value="<?php _e('Add/Edit Gallery','total') ?>" />
		<input id="clear-gallery" class="button upload_gallery_button" type="button" value="<?php _e('Clear','total') ?>" />
		<input type="hidden" class="gallery_values" <?php echo $this->link() ?> value="<?php echo esc_attr( $this->value() ); ?>">
	</label>
	<?php
	}
}

class Total_Customize_Checkbox_Multiple extends WP_Customize_Control {
    public $type = 'checkbox-multiple';

    public function render_content() {

        if ( empty( $this->choices ) )
            return; ?>

        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

        <?php if ( !empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
        <?php endif; ?>

        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

        <ul>
            <?php foreach ( $this->choices as $value => $label ) : ?>

                <li>
                    <label>
                        <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
                        <?php echo esc_html( $label ); ?>
                    </label>
                </li>

            <?php endforeach; ?>
        </ul>

        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
    <?php }
}

class Total_Customize_Heading extends WP_Customize_Control {
	public $type = 'heading';

    public function render_content() {
    	if ( !empty( $this->label ) ) : ?>
            <h3 class="total-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
        <?php endif;

        if($this->description){ ?>
			<span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php }
    }
}

class Total_Dropdown_Multiple_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_multiple_chooser';
	public $placeholder = '';

	public function __construct($manager, $id, $args = array()){
        $this->placeholder = $args['placeholder'];

        parent::__construct( $manager, $id, $args );
    }

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>

				<?php if($this->description){ ?>
					<span class="description customize-control-description">
					<?php echo wp_kses_post($this->description); ?>
					</span>
				<?php }
				?>

                <select data-placeholder="<?php echo esc_html( $this->placeholder ); ?>" multiple="multiple" class="hs-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label ){
                    	$selected = '';
                    	if(in_array($value, $this->value())){
                    		$selected = 'selected="selected"';
                    	}
                        echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . esc_html($label) . '</option>';
                    }
                    ?>
                </select>
            </label>
		<?php
	}
}

class Total_Category_Dropdown extends WP_Customize_Control{
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array()){
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    public function render_content(){
        if(!empty($this->cats)){
            ?>
            <label>
                <span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>

				<?php if($this->description){ ?>
					<span class="description customize-control-description">
					<?php echo wp_kses_post($this->description); ?>
					</span>
				<?php } ?>

                <select <?php $this->link(); ?>>
                   <?php
                    foreach ( $this->cats as $cat )
                    {
                        printf('<option value="%s" %s>%s</option>', esc_attr($cat->term_id), selected($this->value(), $cat->term_id, false), esc_html($cat->name));
                    }
                   ?>
                </select>
            </label>
        <?php
        }
    }
}

class Total_Switch_Control extends WP_Customize_Control{
	public $type = 'switch';
	public $on_off_label = array();

	public function __construct($manager, $id, $args = array() ){
        $this->on_off_label = $args['on_off_label'];
        parent::__construct( $manager, $id, $args );
    }

	public function render_content(){
    ?>
	    <span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>

		<?php if($this->description){ ?>
			<span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php } ?>

		<?php
			$switch_class = ($this->value() == 'on') ? 'switch-on' : '';
			$on_off_label = $this->on_off_label;
		?>
		<div class="onoffswitch <?php echo $switch_class; ?>">
			<div class="onoffswitch-inner">
				<div class="onoffswitch-active">
					<div class="onoffswitch-switch"><?php echo esc_html($on_off_label['on']) ?></div>
				</div>

				<div class="onoffswitch-inactive">
					<div class="onoffswitch-switch"><?php echo esc_html($on_off_label['off']) ?></div>
				</div>
			</div>	
		</div>
		<input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
		<?php
    }
}

class Total_Info_Text extends WP_Customize_Control{

    public function render_content(){
    ?>
	    <span class="customize-control-title">
			<?php echo esc_html( $this->label ); ?>
		</span>

		<?php if($this->description){ ?>
			<span class="description customize-control-description">
			<?php echo wp_kses_post($this->description); ?>
			</span>
		<?php }
    }

}

endif;


//SANITIZATION FUNCTIONS
function total_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function total_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function total_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function total_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function total_sanitize_choices_array( $input, $setting ) {
    global $wp_customize;
 	
 	if(!empty($input)){
    	$input = array_map('absint', $input);
    }

    return $input;
} 