<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "sakshamapp_international_";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Apro2015 Options', 'sakshamapp-international-apro-2015' ),
        'page_title'           => __( 'Apro2015 Options', 'sakshamapp-international-apro-2015' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

 
    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/sakshamapp',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'sakshamapp-international-apro-2015' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'sakshamapp-international-apro-2015' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'sakshamapp-international-apro-2015' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    

    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Social Media', 'sakshamapp-international-apro-2015' ),
        'id'     => 'socaialmedia',
        'desc'   => __( 'Social Media URL(Put your complete url like http://www.facebook.com/susheel3010).', 'sakshamapp-international-apro-2015' ),
        'icon'   => 'el el-home',
        'fields' => array(
 
			array(
                'id'       => 'facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'reddit',
                'type'     => 'text',
                'title'    => __( 'Reddit', 'sakshamapp-international-apro-2015' )
                
                  
            ),   
  
 
			array(
                'id'       => 'linkedin',
                'type'     => 'text',
                'title'    => __( 'LinkedIn', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'digg',
                'type'     => 'text',
                'title'    => __( 'Digg', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'google-plus',
                'type'     => 'text',
                'title'    => __( 'Google+', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'tumblr',
                'type'     => 'text',
                'title'    => __( 'Tumblr', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'pinterest',
                'type'     => 'text',
                'title'    => __( 'Pinterest', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'instagram',
                'type'     => 'text',
                'title'    => __( 'Instagram', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'vimeo',
                'type'     => 'text',
                'title'    => __( 'Vimeo', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'rss',
                'type'     => 'text',
                'title'    => __( 'RSS', 'sakshamapp-international-apro-2015' )
                
                  
            ),        
			array(
                'id'       => 'flickr',
                'type'     => 'text',
                'title'    => __( 'Flickr', 'sakshamapp-international-apro-2015' )
                
                  
            )
        )
    ) );

	
	
	
	
	
	    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Custom CSS ', 'sakshamapp-international-apro-2015' ),
        'id'     => 'customcss',
        'desc'   => __( 'Paste your CSS code, do not include any tags or HTML in the field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed. Dont URL encode image or svg paths. Contents of this field will be auto encoded.', 'sakshamapp-international-apro-2015' ),
        'icon'   => 'el el-home',
        'fields' => array(
 
             array(
                'id'       => 'customcss',
                'type'     => 'textarea',
                'title'    => __( 'Insert here your CSS', 'sakshamapp-international-apro-2015' ),
                'validate' => 'no_html',
              
            ),
			        )
    ) );
		
	
	    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer  ', 'sakshamapp-international-apro-2015' ),
        'id'     => 'footer_credit',
        'desc'   => __( 'Footer Copyright Area Options', 'sakshamapp-international-apro-2015' ),
        'icon'   => 'el el-home',
        'fields' => array(
 
             array(
                'id'       => 'copyright_text',
                'type'     => 'textarea',
                'title'    => __(' Copyright Text', 'sakshamapp-international-apro-2015' ),
               
              
            ),
			
			array(
                'id'       => 'copyright_top_padding',
                'type'     => 'text',
                'title'    => __( 'Copyright Top Padding', 'sakshamapp-international-apro-2015' ),
                 'desc'     => __( 'In pixels, ex: 18px', 'sakshamapp-international-apro-2015' ),
                  
            ),        
			array(
                'id'       => 'copyright_bottom_padding',
                'type'     => 'text',
                'title'    => __( 'Copyright Bottom Padding', 'sakshamapp-international-apro-2015' ),
                 'desc'     => __( 'In pixels, ex: 18px', 'sakshamapp-international-apro-2015' ),
                  
            ),   
			
			
			        )
    ) );

	
		
	    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Tracking Codes', 'sakshamapp-international-apro-2015' ),
        'id'     => 'tracking-code',
        'desc'   => __( 'We can add Google Analytics, Google WebMaster Code etc', 'sakshamapp-international-apro-2015' ),
        'icon'   => 'el el-home',
        'fields' => array(
 
             array(
                'id'       => 'header_area',
                'type'     => 'textarea',
                'title'    => __('Insert in head', 'sakshamapp-international-apro-2015' ),
			 'desc'     => __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the header section of your theme. Please place code inside script tags.', 'sakshamapp-international-apro-2015' ),
                  
              
            ),
			 
             array(
                'id'       => 'footer_area',
                'type'     => 'textarea',
                'title'    => __('Insert in footer', 'sakshamapp-international-apro-2015' ),
			 'desc'     => __( 'Paste your ADDTHIS  (or other)  code here. This will be added into the footer section of your theme. Please place code inside script tags.', 'sakshamapp-international-apro-2015' ),
                  
              
            ),
			 
			
			
			        )
    ) );

	    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'sakshamapp-international-apro-2015' ),
        'id'     => 'typography',
      'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'sakshamapp-international-apro-2015' ),
                'subtitle' => __( 'Specify the body font properties.', 'sakshamapp-international-apro-2015' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#dd9933',
                    'font-size'   => '30px',
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                ),
				)
        )
    ) );
	
    /*
     * <--- END SECTIONS
     */
