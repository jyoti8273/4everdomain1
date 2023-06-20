<?php
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'prysm_teampost';

    //
    // Create a metabox
    CSF::createMetabox( $prefix, [
        'title'     => esc_html__('team Options', 'prysm'),
        'post_type' => 'team',
    ] );

    //
    // Create a section
    CSF::createSection( $prefix, [
        'title'  => esc_html__('General Settings', 'prysm'),
        'fields' => [

            //
            // A text field
            [
                'id'         => 'team_full',
                'type'       => 'switcher',
                'text_on'    => esc_html__('Full', 'prysm'),
                'text_off'   => esc_html__('Padded', 'prysm'),
                'text_width' => 100,
                'title'      => esc_html__('team Full Width', 'prysm'),
                'default'    => true
            ],
            [
                'id'         => 'team_top',
                'type'       => 'switcher',
                'text_on'    => esc_html__('Show', 'prysm'),
                'text_off'   => esc_html__('Hide', 'prysm'),
                'text_width' => 100,
                'title'      => esc_html__('Top Section', 'prysm'),
                'default'    => true
            ],
            [
                'id'      => 'team_heading',
                'type'    => 'text',
                'title'   => esc_html__('team Title', 'prysm'),
                'default' => esc_html__('team', 'prysm'),
            ],
            [
                'id'         => 'team_breadcrumb',
                'type'       => 'switcher',
                'text_on'    => esc_html__('Show', 'prysm'),
                'text_off'   => esc_html__('Hide', 'prysm'),
                'text_width' => 100,
                'title'      => esc_html__('Breadcrumb', 'prysm'),
                'default'    => true
            ],
            [
                'id'      => 'team_background',
                'title'   => esc_html__('Background Image', 'prysm'),
                'type'    => 'media',
                'library' => 'image',
            ],

        ],
    ] );

    // Create a section
    CSF::createSection( $prefix, [
        'title'  => esc_html__('Member Info', 'prysm'),
        'fields' => [

            [
                'id'      => 'team_desg',
                'type'    => 'text',
                'title'   => esc_html__('Member Designation', 'prysm'),
                'default' => esc_html__('Business Consultant', 'prysm'),
            ],
            [
                'id'      => 'team_bio',
                'type'    => 'textarea',
                'title'   => esc_html__('Member Short Bio', 'prysm'),
                'default' => esc_html__("Natalia Zox is the worldwide managing partner of Prysm. He is responsible for all aspects of the firm's strategy, team and operations across Our’s globalnetwork of 50+ offices in world wide.",'prysm'),
            ],
            [
                'id'      => 'side_imagee',
                'title'   => esc_html__('Member Slider Image', 'prysm'),
                'type'    => 'media',
                'library' => 'image',
            ],
            [
                'id'      => 'team_numbe',
                'type'    => 'text',
                'title'   => esc_html__('Member Contact Number', 'prysm'),
                'default' => esc_html__('+91 7581 458 21', 'prysm'),
            ],

            [
                'id'      => 'team_mail',
                'type'    => 'text',
                'title'   => esc_html__('Member Mail', 'prysm'),
                'default' => esc_html__('Support@gmail.com', 'prysm'),
            ],

            [
                'id'      => 'team_add',
                'type'    => 'text',
                'title'   => esc_html__('Member Address', 'prysm'),
                'default' => esc_html__('13 Street Road, NY, USA', 'prysm'),
            ],
            [
                'id'     => 'team_socialicons',
                'type'   => 'repeater',
                'title'  => esc_html__('Member Social Icons', 'prysm'),
                'fields' => [

                    [
                        'id'    => 'team_icon_class',
                        'type'  => 'icon',
                        'title' => esc_html__('Select Icon', 'prysm'),
                    ],
                    [
                        'id'    => 'team_icon_link',
                        'type'  => 'link',
                        'title' => esc_html__('Enter Social Link', 'prysm'),
                    ],
                    [
                        'id'      => 'team_icon_clr',
                        'type'    => 'select',
                        'title'   => esc_html__('Select', 'prysm'),
                        'options' => [
                            'fb-icon'  => 'Endeavour',
                            'tw-icon'  => 'Deep Sky Blue',
                            'dri-icon' => 'French Rose',
                            'bh-icon'  => 'Dodger Blue',
                        ],
                        'default' => 'fb-icon',
                    ],

                ],
            ],

        ],
    ] );

    // Create a section
    CSF::createSection( $prefix, [
        'title'  => esc_html__('Featured Insight Section', 'prysm'),
        'fields' => [
            [
                'id'         => 'team_blog_section',
                'type'       => 'switcher',
                'text_on'    => esc_html__('Show', 'prysm'),
                'text_off'   => 'Hide',
                'text_width' => 100,
                'title'      => esc_html__('Featured Insights Section', 'prysm'),
                'default'    => true
            ],
            [
                'id'      => 'team_blog_heading',
                'type'    => 'textarea',
                'title'   => esc_html__('Featured Insights Section Heading', 'prysm'),
                'default' => esc_html__('Featured Insights', 'prysm'),
            ],
            [
                'id'      => 'team_blog_title',
                'type'    => 'textarea',
                'title'   => esc_html__('Featured Insights Section Title', 'prysm'),
                'default' => esc_html__('Our latest thinking on the issues that matter most in business.', 'prysm'),
            ],
            [
                'id'      => 'team_blog_post',
                'type'    => 'number',
                'title'   => esc_html__('Number', 'prysm'),
                'default' => 6,
			],
        ],
    ] );

}
