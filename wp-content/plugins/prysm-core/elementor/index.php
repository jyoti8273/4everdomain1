<?php
if ( !defined( 'ABSPATH' ) ) {
    exit( 'No direct script access allowed' );
}

class Prysm_New_Icons {

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct() {
        add_filter( 'elementor/icons_manager/additional_tabs', [$this, 'add_prysm_new_icons_tabs'] );
    }

    public function add_prysm_new_icons_tabs( $tabs = array() ) {

        $tabs['niobisicon'] = array(
            'name'          => 'niobisicon',
            'label'         => esc_html__( 'Prysm New', 'icon-element' ),
            'labelIcon'     => 'flaticon-home-page',
            'prefix'        => 'flaticon-',
            'displayPrefix' => 'consv3',
            'url'           => plugin_dir_url(__FILE__) . 'assets/css/prysm-icon/flaticon.css',
            'fetchJson'     => plugin_dir_url(__FILE__) . 'assets/css/prysm-icon/prysmicon.json',
            'ver'           => '4.1.1',
        );


        return $tabs;
    }

}

new Prysm_New_Icons();
