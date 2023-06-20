<?php
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'prysm_pagepost';

    //
    // Create a metabox
    CSF::createMetabox( $prefix, [
        'title'     => 'Page Options',
        'post_type' => 'page',
    ] );

    //
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => 'General Settings',
        'fields' => [

            array(
                'id'      => 'page_logo',
                'title'   => esc_html__( 'Page Logo', 'prysm' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Logo Here', 'prysm' ),
            ),
            array(
                'id'      => 'page_light_logo',
                'title'   => esc_html__( 'Page Light Logo', 'prysm' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Logo Here', 'prysm' ),
            ),

            array(
                'id'    => 'nav_style',
                'type'  => 'switcher',
                'title' => 'Enable Onaepage Nav',
                'default' => true
              ),

            array(
                'id'      => 'header_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Select Header Navigation Style', 'prysm' ),
                'options' => [
                    'header-style-one'    => get_template_directory_uri() . '/assets/img/header/header-1.png',
                    'header-style-two'    => get_template_directory_uri() . '/assets/img/header/header-2.png',
                    'header-style-three'  => get_template_directory_uri() . '/assets/img/header/header-3.png',
                    'header-style-four'   => get_template_directory_uri() . '/assets/img/header/header-4.png',
                    'header-style-five'   => get_template_directory_uri() . '/assets/img/header/header-5.png',
                    'header-style-six'    => get_template_directory_uri() . '/assets/img/header/header-6.png',
                    'header-style-seven'  => get_template_directory_uri() . '/assets/img/header/header-7.png',
                    'header-style-eight'  => get_template_directory_uri() . '/assets/img/header/header-8.png',
                    'header-style-nine'   => get_template_directory_uri() . '/assets/img/header/header-9.png',
                    'header-style-ten'    => get_template_directory_uri() . '/assets/img/header/header-10.png',
                    'header-style-eleven' => get_template_directory_uri() . '/assets/img/header/header-11.png',
                    'header-style-twelve' => get_template_directory_uri() . '/assets/img/header/header-12.png',
                    'header-style-threeten'  => get_template_directory_uri() . '/assets/img/header/header-13.png',
                    'header-style-fourteen'  => get_template_directory_uri() . '/assets/img/header/header-14.png',
                    'header-style-fiveteen'  => get_template_directory_uri() . '/assets/img/header/header-15.png',
                    'header-style-sixteen'   => get_template_directory_uri() . '/assets/img/header/header-16.png',
                    'header-style-seventeen' => get_template_directory_uri() . '/assets/img/header/header-17.png',
                    'header-style-eightteen' => get_template_directory_uri() . '/assets/img/header/header-18.png',
                    'header-style-nineteen' => get_template_directory_uri() . '/assets/img/header/header-19.png',
                ],
                'default' => 'header-style-one',
            ),

            //
            // A text field
            [
                'id'         => 'page_full',
                'type'       => 'switcher',
                'text_on'    => 'Full',
                'text_off'   => 'Padded',
                'text_width' => 100,
                'title'      => 'Page Full Width',
                'default'    => 'Show',
            ],
            [
                'id'         => 'page_top',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Top Section',
                'default'    => 'Show',
            ],
            [
                'id'      => 'page_heading',
                'type'    => 'text',
                'title'   => 'Page Title',
                'default' => 'Page',
            ],
            [
                'id'         => 'page_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => 'Show',
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => 'Breadcrumb',
                'default'    => 'Show',
            ],
            [
                'id'      => 'page_background',
                'title'   => 'Background Image',
                'type'    => 'media',
                'library' => 'image',
            ],
            array(
                'id'    => 'box_layout_enable',
                'type'  => 'switcher',
                'title' => 'Enable Box Layout',
                'default' => false
            ),

        ],
    ] );

}
