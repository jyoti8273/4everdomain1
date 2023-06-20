<?php
if ( !defined( 'ABSPATH' ) ) {
    exit( 'No direct script access allowed' );
}

class Prysm_Icons {

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct() {
        add_filter( 'elementor/icons_manager/additional_tabs', [$this, 'add_prysm_icons_tab'] );
    }

    public function add_prysm_icons_tab( $tabs ) {
        $icon_css = get_template_directory_uri() . '/assets/plugins/business/css/flaticon.css';

        $tabs['Prysm-flaticon'] = [
            'name'          => 'Prysm-flaticon',
            'label'         => esc_html__( 'Business Icon', 'prysm' ),
            'url'           => $icon_css,
            'enqueue'       => [$icon_css],
            'prefix'        => 'flaticonv9-',
            'displayPrefix' => 'flaticonv9',
            'labelIcon'     => 'flaticonv9-loving',
            'ver'           => '1.0.0',
            'icons'         => $this->get_flat_icon_list(),
            'native'        => true,
        ];
        return $tabs;
    }

    /**
     * Get a list of Icons
     *
     * @return array
     */
    public function get_flat_icon_list() {
        $icon = [            
            'right-arrow',
            'next',
            'next-1',
            'next-1',
            'phone-call',
            'pin',
            'email',
            'phone-call-1',
            'link',
            'play-button',
            'quotes',
            'growth-chart',
            'market',
            'analytics',
            'high-value',
            'objectives',
            'brainstorming',
            'remuneration',
            'business-report',
            'business-report',
            'strategy',
            'segmentation',
            'data-analysis',
            'right-arrow-1',
            'pin-1',
            'email-1',
            'pinterest',
            'business-plan',
            'decision',
            'analysis',
            'left-quote',
            'stats',
            'offer',
            'calendar',
            'account',
            'idea',
            'friend',
            'text-message',
            'feedback',
            'projects',
            'repair',
            'consulting',
            'analysis',
            'money-bag',
            'sales',
            'menu',
            
        ];

        return $icon;
    } 

}

new Prysm_Icons();
