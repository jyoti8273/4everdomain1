<?php
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'prysm';

    //
    // Create options
    CSF::createOptions( $prefix, [
        'menu_title'         => 'Prysm Options',
        'menu_slug'          => 'theme-option',
        'show_bar_menu'      => false,
        'show_sub_menu'      => true,
        'show_in_customizer' => false,
        'save_defaults'      => true,
        'ajax_save'          => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-analytics',
    ] );

    //

    //
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'General Options',
        'fields' => [

            [
                'id'         => 'preloader_show',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Hide Preloader',
                'default'    => false,
            ],
            array(
                'id'    => 'preloader-color',
                'type'  => 'color',
                'title' => 'Color',
                'output' => '.line_shape',
                'output_mode' => 'background-color'
              ),
            [
                'id'         => 'slidetotop_show',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Move to Top Button',
                'default'    => 'Show',
            ],
            [
                'id'         => 'topbar_show',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Topbar',
                'default'    => 'Hide',
            ],
            [
                'id'      => 'topbar_text',
                'type'    => 'text',
                'title'   => 'TopBar Heading',
                'default' => 'We are the Best Consulting web site as part of the annual WebAward Competition!',
            ],
            [
                'id'     => 'topbar_socialicons',
                'type'   => 'repeater',
                'title'  => 'TopBar Social Icons',
                'fields' => [

                    [
                        'id'    => 'topbar-icon-class',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'topbar-icon-link',
                        'type'  => 'link',
                        'title' => 'Enter Social Link',
                    ],

                ],
            ],

        ],
    ] );

    CSF::createSection( $prefix, [
        'id'    => 'headerall',
        'title' => 'Header All',
        'icon'  => 'fas fa-plus-circle',
    ] );

    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header options',
        'parent' => 'headerall',
        'fields' => [

            //
            // A text field
            [
                'id'      => 'global_nav_menu',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Select Header Style', 'prysm' ),
                'options' => [
                    'header-style-one'     => get_template_directory_uri() . '/assets/img/header/header-1.png',
                    'header-style-two'     => get_template_directory_uri() . '/assets/img/header/header-2.png',
                    'header-style-three'   => get_template_directory_uri() . '/assets/img/header/header-3.png',
                    'header-style-four'    => get_template_directory_uri() . '/assets/img/header/header-4.png',
                    'header-style-five'    => get_template_directory_uri() . '/assets/img/header/header-5.png',                    
                    'header-style-six'     => get_template_directory_uri() . '/assets/img/header/header-6.png',
                    'header-style-seven'   => get_template_directory_uri() . '/assets/img/header/header-7.png',
                    'header-style-eight'   => get_template_directory_uri() . '/assets/img/header/header-8.png',
                    'header-style-nine'    => get_template_directory_uri() . '/assets/img/header/header-9.png',
                    'header-style-ten'     => get_template_directory_uri() . '/assets/img/header/header-10.png',
                    'header-style-eleven'  => get_template_directory_uri() . '/assets/img/header/header-11.png',
                    'header-style-twelve'  => get_template_directory_uri() . '/assets/img/header/header-12.png',
                    'header-style-threeten'=> get_template_directory_uri() . '/assets/img/header/header-13.png',
                    'header-style-fourteen'=> get_template_directory_uri() . '/assets/img/header/header-14.png',
                    'header-style-fiveteen'=> get_template_directory_uri() . '/assets/img/header/header-15.png',
                    'header-style-sixteen' => get_template_directory_uri() . '/assets/img/header/header-16.png',
                    'header-style-seventeen' => get_template_directory_uri() . '/assets/img/header/header-17.png',
                    'header-style-eightteen' => get_template_directory_uri() . '/assets/img/header/header-18.png',
                    'header-style-nineteen' => get_template_directory_uri() . '/assets/img/header/header-19.png',
                ],
                'default' => 'header-style-one',
            
                
            ],
            [
                'id'      => 'header_logo',
                'type'    => 'media',
                'title'   => 'Site Logo',
                'library' => 'image',
            ],
            [
                'id'      => 'header_mobile_logo',
                'type'    => 'media',
                'title'   => 'Site Mobile Logo',
                'library' => 'image',
            ],
            [
                'id'     => 'header_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [

                    [
                        'id'    => 'header-icon-class',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'header_infotitle',
                        'type'  => 'text',
                        'title' => 'Enter Info Title',
                    ],
                    [
                        'id'    => 'header_infotxt',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],

                ],
            ],
            [
                'id'      => 'header_lang_title',
                'type'    => 'text',
                'title'   => 'Enter Language Main Title',
                'default' => 'Language',
            ],
            [
                'id'     => 'header_language',
                'type'   => 'repeater',
                'title'  => "Header Language",
                'fields' => [
                    [
                        'id'      => 'header_lan_img',
                        'type'    => 'media',
                        'title'   => 'Flag Image',
                        'library' => 'image',
                    ],
                    [
                        'id'    => 'header_lan_lnk',
                        'type'  => 'link',
                        'title' => 'Language Text & Link',
                    ],

                ],
            ],
            [
                'id'         => 'header_right_show',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Header Right',
                'default'    => 0,
            ],
            [
                'id'         => 'header_search_show',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Menu Search Icon',
                'default'    => 0,
            ],
            [
                'id'           => 'header_button_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Two options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'     => 'header_two_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [

                    [
                        'id'    => 'header2-icon-class',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'header2_infotxt',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],

                ],
            ],
            [
                'id'     => 'header_social_icon',
                'type'   => 'repeater',
                'title'  => "Social Icon",
                'fields' => [

                    [
                        'id'    => 'h2-social-icon',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'h2_link',
                        'type'  => 'link',
                        'title' => 'Enter Social Link',
                    ],

                ],
            ],
            
            [
                'id'    => 'header2_button',
                'type'  => 'text',
                'title' => 'Enter Button Text',
            ],
            [
                'id'           => 'header2_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Three options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'    => 'header3_top_text',
                'type'  => 'text',
                'title' => 'Enter Top Text',
            ],
            [
                'id'     => 'header_three_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [

                    [
                        'id'    => 'header3-icon-class',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'header3_infotxt',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],

                ],
            ],
            
            [
                'id'    => 'login3_text',
                'type'  => 'text',
                'title' => 'Enter Login Text',
            ],
            [
                'id'           => 'login3_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],
            [
                'id'    => 'reg3_text',
                'type'  => 'text',
                'title' => 'Enter Register Text',
            ],
            [
                'id'           => 'reg3_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],
            [
                'id'    => 'header3_button',
                'type'  => 'text',
                'title' => 'Enter Button Text',
            ],
            [
                'id'           => 'header3_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Four options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'    => 'header4_top_text',
                'type'  => 'text',
                'title' => 'Enter Top Text',
            ],
            [
                'id'     => 'header_four_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [

                    [
                        'id'    => 'header4-icon-class',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'header4_infotitle',
                        'type'  => 'text',
                        'title' => 'Enter Info Title',
                    ],
                    [
                        'id'    => 'header4_infotxt',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],

                ],
            ],
            
            [
                'id'    => 'login_text',
                'type'  => 'text',
                'title' => 'Enter Login Text',
            ],
            [
                'id'           => 'login_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],
            [
                'id'    => 'reg_text',
                'type'  => 'text',
                'title' => 'Enter Register Text',
            ],
            [
                'id'           => 'reg_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],
            [
                'id'    => 'header4_button',
                'type'  => 'text',
                'title' => 'Enter Button Text',
            ],
            [
                'id'           => 'header4_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Five options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'    => 'enable-sidebar-nav',
                'type'  => 'switcher',
                'title' => 'Enable Sidebar Nav',
            ],
            [
                'id'      => 'sidebar_logo',
                'title'   => 'Sidebar Logo Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            
            [
                'id'    => 'sidebar_text',
                'type'  => 'textarea',
                'title' => 'Sidebar Text',
            ],
            
            [
                'id'    => 'sidebar-gall-item',
                'type'  => 'gallery',
                'title' => 'Gallery',
            ],
            [
                'id'    => 'social_title',
                'type'  => 'text',
                'title' => 'Social Title',
            ],
            [
                'id'     => 'sidebar_social_info',
                'type'   => 'repeater',
                'title'  => "Sidebar Social Icon",
                'fields' => [

                    [
                        'id'    => 'sidebar_icon',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'sidebar_icon_link',
                        'type'  => 'link',
                    ],

                ],
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Six options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'    => 'header6_top_text',
                'type'  => 'text',
                'title' => 'Enter Top Text',
            ],
            
            [
                'id'    => 'login6_text',
                'type'  => 'text',
                'title' => 'Enter Login Text',
            ],
            [
                'id'           => 'login6_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],
            [
                'id'    => 'reg6_text',
                'type'  => 'text',
                'title' => 'Enter Register Text',
            ],
            [
                'id'           => 'reg6_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],
            [
                'id'    => 'header6_button',
                'type'  => 'text',
                'title' => 'Enter Button Text',
            ],
            [
                'id'           => 'header6_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Eleven options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'     => 'header_11_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [
                    [
                        'id'    => 'header11-icon-class',
                        'type'  => 'text',
                        'title' => 'Icon Name',
                    ],
                    [
                        'id'    => 'header11_info_title',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],
                    [
                        'id'    => 'header11_infotxt',
                        'type'  => 'text',
                        'title' => 'Enter Info Value',
                    ],
                    [
                        'id'    => 'header11_infolink',
                        'type'  => 'text',
                        'title' => 'Enter Info URL',
                    ],

                ],
            ],
            

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Twelve options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'     => 'header_12_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [
                    [
                        'id'    => 'header12-icon-class',
                        'type'  => 'icon',
                        'title' => 'Icon Name',
                    ],
                    [
                        'id'    => 'header12_info_title',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],
                    [
                        'id'    => 'header12_info_link',
                        'type'  => 'text',
                        'title' => 'Enter Info Link',
                    ],

                ],
            ],
            [
                'id'     => 'sidebar_social_info_12',
                'type'   => 'repeater',
                'title'  => "Social Icon",
                'fields' => [

                    [
                        'id'    => 'sol_icon',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'sidebar_icon_link',
                        'type'  => 'link',
                    ],

                ],
            ],
            

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Threeten options',
        'parent' => 'headerall',
        'fields' => [            
            [
                'id'    => 'header13_button',
                'type'  => 'text',
                'title' => 'Enter Button Text',
            ],
            [
                'id'           => 'header13_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Fourteen options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'     => 'header_14_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [
                    [
                        'id'    => 'header14-icon-class',
                        'type'  => 'icon',
                        'title' => 'Icon Name',
                    ],
                    [
                        'id'    => 'header14_info_title',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],
                    [
                        'id'    => 'header14_info_link',
                        'type'  => 'text',
                        'title' => 'Enter Info Link',
                    ],

                ],
            ],
            [
                'id'     => 'sidebar_social_info_14',
                'type'   => 'repeater',
                'title'  => "Social Icon",
                'fields' => [

                    [
                        'id'    => 'sol_icon',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'sidebar_icon_link',
                        'type'  => 'link',
                    ],

                ],
            ],
            [
                'id'      => 'phone_logo',
                'title'   => 'Phone Icon',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'    => 'phone_title',
                'type'  => 'text',
                'title' => 'Phone Title',
                'default' => 'Call Us',
            ],
            [
                'id'    => 'phone_no',
                'type'  => 'text',
                'title' => 'Phone No',
                'default' => '+98 124 456 789',
            ],
            

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Fiveteen options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'     => 'header_15_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [
                    [
                        'id'    => 'header15-icon-class',
                        'type'  => 'icon',
                        'title' => 'Icon Name',
                    ],
                    [
                        'id'    => 'header15_info_title',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],
                    [
                        'id'    => 'header15_info_link',
                        'type'  => 'text',
                        'title' => 'Enter Info Link',
                    ],

                ],
            ],
            [
                'id'     => 'sidebar_social_info_15',
                'type'   => 'repeater',
                'title'  => "Social Icon",
                'fields' => [

                    [
                        'id'    => 'sol_icon',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'social_icon_link',
                        'type'  => 'link',
                    ],

                ],
            ],
            

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Eightteen options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'           => 'header_button_18_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],
            [
                'id'    => 'header18_top_text',
                'type'  => 'text',
                'title' => 'Header Top Text',
                'default'=> esc_html('Happy To Discuss About Your Requirement Get A Quote')
            ],
            [
                'id'     => 'header_18_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [
                    [
                        'id'    => 'header18-icon-class',
                        'type'  => 'icon',
                        'title' => 'Icon Name',
                    ],
                    [
                        'id'    => 'header18_info_title',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],
                    [
                        'id'    => 'header18_info_link',
                        'type'  => 'text',
                        'title' => 'Enter Info Link',
                    ],

                ],
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Nineteen options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'           => 'header_button_19_link',
                'type'         => 'link',
                'title'        => 'Menu Button Text & Link',
                'add_title'    => 'Add Button',
                'edit_title'   => 'Edit Button',
                'remove_title' => 'Remove Button',
            ],
            [
                'id'    => 'header19_top_text',
                'type'  => 'text',
                'title' => 'Header Top Text',
            ],
            [
                'id'     => 'header_19_infos',
                'type'   => 'repeater',
                'title'  => "Contact Info's",
                'fields' => [
                    [
                        'id'    => 'header19-icon-class',
                        'type'  => 'media',
                        'title' => 'Upload Icon',
                    ],
                    [
                        'id'    => 'header19_info_title',
                        'type'  => 'text',
                        'title' => 'Enter Info Text',
                    ],
                    [
                        'id'    => 'header19_info_value',
                        'type'  => 'text',
                        'title' => 'Enter Info Value',
                    ],

                ],
            ],

        ],
    ] );
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'Header Sidebar options',
        'parent' => 'headerall',
        'fields' => [
            [
                'id'    => 'enable-sidebar-nav',
                'type'  => 'switcher',
                'title' => 'Enable Sidebar Nav',
            ],
            [
                'id'      => 'sidebar_logo',
                'title'   => 'Sidebar Logo Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            
            [
                'id'    => 'sidebar_text',
                'type'  => 'textarea',
                'title' => 'Sidebar Text',
            ],
            
            [
                'id'    => 'sidebar-gall-item',
                'type'  => 'gallery',
                'title' => 'Gallery',
            ],
            [
                'id'    => 'social_title',
                'type'  => 'text',
                'title' => 'Social Title',
            ],
            [
                'id'     => 'sidebar_social_info',
                'type'   => 'repeater',
                'title'  => "Sidebar Social Icon",
                'fields' => [

                    [
                        'id'    => 'sidebar_icon',
                        'type'  => 'icon',
                        'title' => 'Select Icon',
                    ],
                    [
                        'id'    => 'sidebar_icon_link',
                        'type'  => 'link',
                    ],

                ],
            ],

        ],
    ] );

    CSF::createSection( $prefix, [
        'title'  => 'Typography Options',
        'fields' => [
            array(
                'id'      => 'menu-typography',
                'type'    => 'typography',
                'title'   => 'Menu Typography',
                'output'  => '#menu-main-menu li a',
              ),

        ],
    ] );

    CSF::createSection( $prefix, [
        'title'  => 'Footer Options',
        'fields' => [
            [
                'id'          => 'footer-bg-color',
                'type'        => 'color',
                'title'       => 'Footer Background Color',
                'output' => array( 'background-color' => '.pr-footer-section')
            ],
            [
                'id'      => 'footer_copyright',
                'type'    => 'text',
                'title'   => 'Text',
                'default' => __( '© 2021 Prysm All rights reserved', 'prysm' ),
            ],
            [
                'id'     => 'footer_menu',
                'type'   => 'repeater',
                'title'  => 'Footer Menu',
                'fields' => [
                    [
                        'id'           => 'opt-text',
                        'type'         => 'link',
                        'title'        => 'Menu Text & Link',
                        'add_title'    => 'Add Menu',
                        'edit_title'   => 'Edit Menu',
                        'remove_title' => 'Remove Menu',
                    ],
                ],
            ],
            [
                'id'         => 'footer_top_area',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Footer Top Area',
                'default'    => 0,
            ],
            [
                'id'         => 'footer_widget1',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Footer Widget 1',
                'default'    => 1,
            ],
            [
                'id'         => 'footer_widget2',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Footer Widget 2',
                'default'    => 1,
            ],
            [
                'id'         => 'footer_widget3',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Footer Widget 3',
                'default'    => 1,
            ],
            [
                'id'         => 'footer_widget4',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Footer Widget 4',
                'default'    => 1,
            ],
            
            [
                'id'          => 'footer-border-color',
                'type'        => 'color',
                'title'       => 'Footer Heading Border Color',
                'output' => array( 'background' => '.pr-footer-widget .wp-block-group h2:before, .pr-footer-widget .widget-title:before')
            ],
            
            [
                'id'          => 'footer-icon-br-color',
                'type'        => 'color',
                'title'       => 'Footer Icon Border Color',
                'output' => array( 'border-color' => '.pr-footer-widget .pr-footer-social a')
            ],
            
            [
                'id'          => 'footer-icon-color',
                'type'        => 'color',
                'title'       => 'Footer Icon Color',
                'output' => array( 'color' => '.pr-footer-widget .pr-footer-social a')
            ],
            [
                'id'          => 'footer-icon-bg-color',
                'type'        => 'color',
                'title'       => 'Footer Icon BG Color',
                'output' => array( 'background' => '.pr-footer-widget .pr-footer-social a')
            ],
            [
                'id'          => 'footer-icon-bg-hover-color',
                'type'        => 'color',
                'title'       => 'Footer Icon BG Hover Color',
                'output' => array( 'background' => '.pr-footer-widget .pr-footer-social a:hover')
            ],
            [
                'id'          => 'footer-icon-hover-color',
                'type'        => 'color',
                'title'       => 'Footer Icon BG Hover Color',
                'output' => array( 'color' => '.pr-footer-widget .pr-footer-social a:hover')
            ],

        ],
    ] );

    CSF::createSection( $prefix, [
        'id'    => 'basicpages',
        'title' => 'Page Settings',
        'icon'  => 'fas fa-plus-circle',
    ] );
    CSF::createSection( $prefix, [
        'title'  => 'Blog Page Options',
        'parent' => 'basicpages',
        'fields' => [

            //
            // A text field
            [
                'id'      => 'Blog_heading',
                'type'    => 'text',
                'title'   => 'Page Title',
                'default' => 'Blog List',
            ],
            [
                'id'         => 'Blog_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'blog-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'     => 'blog-mainsection',
                'type'   => 'fieldset',
                'title'  => 'Main Section',
                'fields' => [
                    [
                        'id'      => 'blog-main-heading',
                        'type'    => 'text',
                        'title'   => 'Main Section Heading',
                        'default' => 'Featured Insights',
                    ],
                    [
                        'id'      => 'blog-main-title',
                        'type'    => 'text',
                        'title'   => 'Main Section Title',
                        'default' => 'Our latest thinking on the issues that matter most in business.',
                    ],
                ],
            ],
            [
                'id'     => 'blog-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => 'Blog_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => 'blog-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => 'blog-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => 'Blog_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );
    CSF::createSection( $prefix, [
        'title'  => 'Shop Page Options',
        'parent' => 'basicpages',
        'fields' => [

            //
            // A text field
            [
                'id'         => 'shop_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'shop-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],

        ],
    ] );
    CSF::createSection( $prefix, [
        'title'  => 'Author Page Options',
        'parent' => 'basicpages',
        'fields' => [

            [
                'id'         => 'author_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'author-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'     => 'author-mainsection',
                'type'   => 'fieldset',
                'title'  => 'Main Section',
                'fields' => [
                    [
                        'id'      => 'author-main-heading',
                        'type'    => 'text',
                        'title'   => 'Main Section Heading',
                        'default' => 'Featured Insights',
                    ],
                    [
                        'id'      => 'author-main-title',
                        'type'    => 'text',
                        'title'   => 'Main Section Title',
                        'default' => 'Our latest thinking on the issues that matter most in business.',
                    ],
                ],
            ],
            [
                'id'     => 'author-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => 'author_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => 'author-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => 'author-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => 'author_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );

    CSF::createSection( $prefix, [
        'title'  => 'Archive Page Options',
        'parent' => 'basicpages',
        'fields' => [

            [
                'id'         => 'archive_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'archive-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'     => 'archive-mainsection',
                'type'   => 'fieldset',
                'title'  => 'Main Section',
                'fields' => [
                    [
                        'id'      => 'archive-main-heading',
                        'type'    => 'text',
                        'title'   => 'Main Section Heading',
                        'default' => 'Featured Insights',
                    ],
                    [
                        'id'      => 'archive-main-title',
                        'type'    => 'text',
                        'title'   => 'Main Section Title',
                        'default' => 'Our latest thinking on the issues that matter most in business.',
                    ],
                ],
            ],
            [
                'id'     => 'archive-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => 'archive_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => 'archive-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => 'archive-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => 'archive_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );
    CSF::createSection( $prefix, [
        'title'  => 'Search Page Options',
        'parent' => 'basicpages',
        'fields' => [

            [
                'id'         => 'search_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'search-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'     => 'search-mainsection',
                'type'   => 'fieldset',
                'title'  => 'Main Section',
                'fields' => [
                    [
                        'id'      => 'search-main-heading',
                        'type'    => 'text',
                        'title'   => 'Main Section Heading',
                        'default' => 'Featured Insights',
                    ],
                    [
                        'id'      => 'search-main-title',
                        'type'    => 'text',
                        'title'   => 'Main Section Title',
                        'default' => 'Our latest thinking on the issues that matter most in business.',
                    ],
                ],
            ],
            [
                'id'     => 'search-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => 'search_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => 'search-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => 'search-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => 'search_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );

    CSF::createSection( $prefix, [
        'title'  => 'Tag Page Options',
        'parent' => 'basicpages',
        'fields' => [

            [
                'id'         => 'tag_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'tag-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'     => 'tag-mainsection',
                'type'   => 'fieldset',
                'title'  => 'Main Section',
                'fields' => [
                    [
                        'id'      => 'tag-main-heading',
                        'type'    => 'text',
                        'title'   => 'Main Section Heading',
                        'default' => 'Featured Insights',
                    ],
                    [
                        'id'      => 'tag-main-title',
                        'type'    => 'text',
                        'title'   => 'Main Section Title',
                        'default' => 'Our latest thinking on the issues that matter most in business.',
                    ],
                ],
            ],
            [
                'id'     => 'tag-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => 'tag_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => 'tag-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => 'tag-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => 'tag_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );

    CSF::createSection( $prefix, [
        'title'  => 'Category Page Options',
        'parent' => 'basicpages',
        'fields' => [

            [
                'id'         => 'category_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'category-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'     => 'category-mainsection',
                'type'   => 'fieldset',
                'title'  => 'Main Section',
                'fields' => [
                    [
                        'id'      => 'category-main-heading',
                        'type'    => 'text',
                        'title'   => 'Main Section Heading',
                        'default' => 'Featured Insights',
                    ],
                    [
                        'id'      => 'category-main-title',
                        'type'    => 'text',
                        'title'   => 'Main Section Title',
                        'default' => 'Our latest thinking on the issues that matter most in business.',
                    ],
                ],
            ],
            [
                'id'     => 'category-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => 'category_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => 'category-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => 'category-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => 'category_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );

    CSF::createSection( $prefix, [
        'parent' => 'basicpages',
        'title'  => '404 Page Options',
        'fields' => [

            // A text field
            [
                'id'     => '404-mainsection',
                'type'   => 'fieldset',
                'title'  => 'Main Section',
                'fields' => [
                    [
                        'id'      => '404_heading',
                        'type'    => 'text',
                        'title'   => 'Page Title',
                        'default' => 'Page Not Found',
                    ],
                    [
                        'id'      => '404-background',
                        'title'   => 'Background Image',
                        'type'    => 'media',
                        'library' => 'image',
                    ],
                    [
                        'id'      => '404-top-image',
                        'title'   => 'Main Image',
                        'type'    => 'media',
                        'library' => 'image',
                    ],
                    [
                        'id'      => '404-main-text',
                        'type'    => 'text',
                        'title'   => 'Main Section text',
                        'default' => 'Our latest thinking on the issues that matter most in business.',
                    ],
                    [
                        'id'      => '404-btn-text',
                        'type'    => 'text',
                        'title'   => 'Home Button text',
                        'default' => 'Go Back Home',
                    ],
                ],
            ],
            [
                'id'     => '404-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => '404_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => '404-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => '404-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => '404_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );
    CSF::createSection( $prefix, [
        'id'    => 'postlisting',
        'title' => 'Post Listing',
        'icon'  => 'fas fa-plus-circle',
    ] );

    CSF::createSection( $prefix, [
        'title'  => 'Service Listing Options',
        'parent' => 'postlisting',
        'fields' => [

            //
            // A text field
            [
                'id'      => 'service_heading',
                'type'    => 'text',
                'title'   => 'Page Title',
                'default' => 'Service List',
            ],
            [
                'id'         => 'service_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'service-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'     => 'service-mainsection',
                'type'   => 'fieldset',
                'title'  => 'Main Section',
                'fields' => [
                    [
                        'id'      => 'service_maion_heading',
                        'type'    => 'text',
                        'title'   => 'Page Title',
                        'default' => 'Our services',
                    ],
                    [
                        'id'      => 'service_maion_title',
                        'type'    => 'text',
                        'title'   => 'Page Title',
                        'default' => 'Always we offer the best services for success!',
                    ],
                    [
                        'id'      => 'service_maion_button',
                        'type'    => 'text',
                        'title'   => 'Read More Button Text',
                        'default' => 'Read More',
                    ],
                ],
            ],
            [
                'id'     => 'service-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => 'service_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => 'service-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => 'service-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => 'service_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );

    CSF::createSection( $prefix, [
        'title'  => 'Portfolio Listing Options',
        'parent' => 'postlisting',
        'fields' => [

            //
            // A text field
            [
                'id'      => 'portfolio_heading',
                'type'    => 'text',
                'title'   => 'Page Title',
                'default' => 'Portfolio',
            ],
            [
                'id'         => 'portfolio_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'portfolio-background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'     => 'portfolio-contactsection',
                'type'   => 'fieldset',
                'title'  => 'Contact Us Section',
                'fields' => [
                    [
                        'id'         => 'portfolio_bottom_section',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Contact Us Section',
                        'default'    => 'Show',
                    ],
                    [
                        'id'      => 'portfolio-bottom-title',
                        'type'    => 'textarea',
                        'title'   => 'Contact Section Title',
                        'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.',
                    ],
                    [
                        'id'      => 'portfolio-main-bglogo',
                        'type'    => 'media',
                        'title'   => 'Background logo',
                        'library' => 'image',
                    ],
                    [
                        'id'         => 'portfolio_bottom_form',
                        'type'       => 'switcher',
                        'text_on'    => 'Show',
                        'text_off'   => 'Hide',
                        'text_width' => 100,
                        'title'      => 'Subscription Form',
                        'default'    => 'Show',
                    ],

                ],
            ],

        ],
    ] );
    CSF::createSection( $prefix, [
        'title'  => 'Backup & Restore Options',
        'fields' => [
            [
                'type' => 'backup',
            ],

        ],
    ] );
}
