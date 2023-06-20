<?php
class prysm_Enqueue {

    function __construct() {

        add_action( 'wp_enqueue_scripts', [ $this, 'prysm_enqueue_scripts' ] );

        add_action( 'wp_head', [ $this, 'wp_head' ] );

        add_action( 'wp_footer', [ $this, 'wp_footer' ] );

        add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'prysm_admin_styles' ] );

    }

    function prysm_enqueue_scripts() {
        global $prysm;

        $styles = [
            'prysm-bootstrap5'       => 'assets/css/bootstrap5.min.css',
            'prysm-bootstrap'        => 'assets/css/bootstrap.min.css',
            'prysm-fontawesome'      => 'assets/css/fontawesome-all.css',
            'prysm-flaticon'         => 'assets/css/flaticon.css',
            'flaticon-v2'            => 'assets/css/flaticon-v2.css',
            'flaticon-v3'            => 'assets/css/flaticon-v3.css',
            'flaticon-v4'            => 'assets/css/flaticon-v4.css',
            'flaticon-v5'            => 'assets/css/flaticon-v5.css',
            'flaticon-v6'            => 'assets/css/flaticon-v6.css',
            'flaticon-v7'            => 'assets/css/flaticon-v7.css',
            'flaticon-v8'            => 'assets/css/flaticon-v8.css',
            'flaticon-v9'            => 'assets/css/flaticon-v9.css',
            'flaticon-v10'            => 'assets/css/flaticon-v10.css',
            'prysm-animated-slider'  => 'assets/css/animated-slider.css',
            'prysm-fancybox'            => 'assets/css/jquery.fancybox.min.css',
            'prysm-animate'          => 'assets/css/animate.css',
            'prysm-nice-select'      => 'assets/css/nice-select.css',
            'prysm-video'            => 'assets/css/video.min.css',
            'prysm-mCustomScrollbar' => 'assets/css/jquery.mCustomScrollbar.min.css',
            'prysm-slick'            => 'assets/css/slick.css',
            'prysm-slick-theme'      => 'assets/css/slick-theme.css',
            'prysm-main'             => 'assets/css/style.css',
            'prysm-progress-bar'     => 'assets/css/progress-bar.css',
            'prysm-inner-theme'      => 'assets/css/theme.css',     
            'prysm-custom'           => 'assets/css/custom.css',
            'prysm-style'            => 'style.css',       
            'prysm2-style'           => 'assets/css/prysm-2.css',
            'itsolution-style'       => 'assets/css/itsolution.css',
            'prysm3-style'           => 'assets/css/prysm-3.css',
            'finance-style'          => 'assets/css/finance.css',
            'software-style'         => 'assets/css/software.css',
            'agency-style'           => 'assets/css/agency.css',
            'marketing-style'        => 'assets/css/marketing.css',
            'newb-responsive'        => 'assets/css/newb-responsive.css',
            'newb-_responsive_2'        => 'assets/css/_responsive_2.css',
        ];

        foreach ( $styles as $name => $style ) {

            if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) ) {
                wp_enqueue_style( $name, $style );
            } else {
                wp_enqueue_style( $name, get_template_directory_uri() . '/' . $style );
            }

        }
        $scripts = [
            'prysm-bootstrap'        => 'assets/js/bootstrap.min.js',
            'prysm-bootstrap5'        => 'assets/js/bootstrap5.min.js',
            'prysm-popper'           => 'assets/js/popper.min.js',
            'prysm-magnific'         => 'assets/js/jquery.magnific-popup.min.js',
            'prysm-appear'           => 'assets/js/appear.js',
            'prysm-slick'            => 'assets/js/slick.min.js',
            'prysm-nice-select'      => 'assets/js/jquery.nice-select.min.js',
            'prysm-mCustomScrollbar' => 'assets/js/jquery.mCustomScrollbar.concat.min.js',
            'prysm-wow'              => 'assets/js/wow.min.js',
            'prysm-counterup'        => 'assets/js/jquery.counterup.min.js',
            'prysm-waypoints'        => 'assets/js/waypoints.min.js',
            'prysm-main'             => 'assets/js/script.js',
            'prysm-cssslider'        => 'assets/js/jquery.cssslider.js',
            'prysm-progress-bar'     => 'assets/js/progress-bar.js',
            'prysm-custom'           => 'assets/js/custom.js',
            'prysm-main-elm'         => 'assets/js/main.js',
            'finance-main-elm'       => 'assets/js/finance.js',
            'itsolution-main-elm'    => 'assets/js/itsolution.js',
            'prysm-3-main-elm'       => 'assets/js/prysm-3.js',
            'prysm-gmaps'            => 'assets/js/gmaps.min.js',
            'sw-scripts'             => 'assets/js/sw-scripts.js',
            'ag-scripts'             => 'assets/js/ag-scripts.js',
            'ma-scripts'             => 'assets/js/marketing.js',
            'dark-business'          => 'assets/js/dark-business.js',
        ];

        foreach ( $scripts as $name => $js ) {
            wp_register_script( $name, get_template_directory_uri() . '/' . $js, '', '', true );
        }

        wp_enqueue_script( [
            'jquery',
            'prysm-bootstrap5',
            'prysm-bootstrap',
            'prysm-popper',
            'prysm-magnific',
            'prysm-appear',
            'prysm-slick',
            'prysm-nice-select',
            'prysm-mCustomScrollbar',
            'prysm-wow',
            'prysm-counterup',
            'prysm-waypoints',
            'prysm-main',
            'prysm-cssslider',
            'prysm-progress-bar',
            'prysm-main-elm',
            'finance-main-elm',
            'prysm-3-main-elm',
            'itsolution-main-elm',
            'prysm-custom',
            'prysm-gmaps',
            'sw-scripts',
            'ag-scripts',
            'ma-scripts',
            'dark-business',
        ]
        );
        if ( is_singular() ) {
            wp_enqueue_script( 'comment-reply' );
        }

    }
    function wp_head() {
    }

    function wp_footer() {
        $this->prysm_enqueue_scripts();
    }

    function prysm_admin_styles() {

        $styles = [
            'prysm-admin-bootstrap'        => 'assets/css/bootstrap.min.css',
            'prysm-admin-fontawesome'      => 'assets/css/fontawesome-all.css',
            'prysm-flaticon-v9'            => 'assets/css/flaticon-v9.css',
            'prysm-flaticon-v8'            => 'assets/css/flaticon-v8.css',
            'prysm-admin-animate'          => 'assets/css/animate.css',
            'prysm-admin-nice-select'      => 'assets/css/nice-select.css',
            'prysm-admin-video'            => 'assets/css/video.min.css',
            'prysm-admin-mCustomScrollbar' => 'assets/css/jquery.mCustomScrollbar.min.css',
            'prysm-admin-slick'            => 'assets/css/slick.css',
            'prysm-admin-slick-theme'      => 'assets/css/slick-theme.css',
            'prysm-admin-main'             => 'assets/css/style.css',
            'prysm-admin-inner-theme'      => 'assets/css/theme.css',
            'prysm-admin-style'            => 'style.css',
        ];

        foreach ( $styles as $name => $style ) {

            if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) ) {
                wp_enqueue_style( $name, $style );
            } else {
                wp_enqueue_style( $name, get_template_directory_uri() . '/' . $style );
            }

        }
        $scripts = [
            'prysm-admin-bootstrap'        => 'assets/js/bootstrap.min.js',
            'prysm-admin-popper'           => 'assets/js/popper.min.js',
            'prysm-admin-magnific'         => 'assets/js/jquery.magnific-popup.min.js',
            'prysm-admin-appear'           => 'assets/js/appear.js',
            'prysm-admin-slick'            => 'assets/js/slick.js',
            'prysm-admin-nice-select'      => 'assets/js/jquery.nice-select.min.js',
            'prysm-admin-mCustomScrollbar' => 'assets/js/jquery.mCustomScrollbar.concat.min.js',
            'prysm-admin-wow'              => 'assets/js/wow.min.js',
            'prysm-admin-counterup'        => 'assets/js/jquery.counterup.min.js',
            'prysm-admin-waypoints'        => 'assets/js/waypoints.min.js',
            'prysm-admin-main'             => 'assets/js/script.js',
            'prysm-admin-gmaps'            => 'assets/js/gmaps.min.js',
        ];

        foreach ( $scripts as $name => $js ) {
            wp_register_script( $name, get_template_directory_uri() . '/' . $js, '', '', true );
        }

        wp_enqueue_script( [
            'jquery',
            'prysm-admin-bootstrap',
            'prysm-admin-popper',
            'prysm-admin-magnific',
            'prysm-admin-appear',
            'prysm-admin-slick',
            'prysm-admin-nice-select',
            'prysm-admin-mCustomScrollbar',
            'prysm-admin-wow',
            'prysm-admin-counterup',
            'prysm-admin-waypoints',
            'prysm-admin-main',
            'prysm-admin-gmaps',
        ]
        );
    }
}
