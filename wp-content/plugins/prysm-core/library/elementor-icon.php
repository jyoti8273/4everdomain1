<?php 

if(!function_exists('prysm_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'prysm_register_custom_icon_library');
    function prysm_register_custom_icon_library($tabs){
        $custom_tabs = [
            'extra_icon2' => [
                'name' => 'flaticonv9',
                'label' => esc_html__( 'Flaticon V9', 'prysm' ),
                'url' => get_template_directory_uri() . '/assets/css/flaticon-v9.css',
                'enqueue' => [  ],
                'prefix' => 'flaticonv9-',
                'displayPrefix' => 'flaticonv9',
                'labelIcon' => 'flaticonv9-home-page',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/elementor-icon/flaticon-v9.js',
                'native' => true,
            ],
            'extra_icon3' => [
                'name' => 'flaticonv8',
                'label' => esc_html__( 'Flaticon V8', 'prysm' ),
                'url' => get_template_directory_uri() . '/assets/css/flaticon-v8.css',
                'enqueue' => [  ],
                'prefix' => 'flaticonv8-',
                'displayPrefix' => 'flaticonv8',
                'labelIcon' => 'flaticonv8-feedback',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/elementor-icon/flaticon-v8.js',
                'native' => true,
            ],

        ];

        $tabs = array_merge($custom_tabs, $tabs);

        return $tabs;
    }
}