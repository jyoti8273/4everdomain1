<?php
namespace ElementHelper;

class Helper {

    /**
    * Get widgets list
    */
    public static function get_widgets() {

        return [

            // 'cta' => [
            //     'title' => __( 'CTA', 'elementhelper' ),
            //     'icon' => 'fa fa-time',
            //     'ispro' =>true
            // ],

            // 'hero' => [
            //     'title' => __( 'Hero', 'elementhelper' ),
            //     'icon' => 'fa fa-time',
            //     'ispro' =>true
            // ],

            // 'skill' => [
            //     'title' => __( 'Skill', 'elementhelper' ),
            //     'icon' => 'fa fa-time',
            //     'ispro' =>true
            // ],

            // 'video-info' => [
            //     'title' => __( 'Video Info', 'elementhelper' ),
            //     'icon' => 'fa fa-time',
            //     'ispro' =>true
            // ],

            // 'faq' => [
            //     'title' => __( 'FAQ', 'elementhelper' ),
            //     'icon' => 'fa fa-card',
            //     'ispro' =>true
            // ],

            // 'about' => [
            //     'title' => __( 'About', 'elementhelper' ),
            //     'icon' => 'fa fa-card',
            //     'ispro' =>true
            // ],

            // 'about-tab' => [
            //     'title' => __( 'About Tab', 'elementhelper' ),
            //     'icon' => 'fa fa-card',
            //     'ispro' =>true
            // ],

            // 'brand' => [
            //     'title' => __( 'Brand', 'elementhelper' ),
            //     'icon' => 'fa fa-card',
            //     'ispro' =>true
            // ],

            // 'services-tab' => [
            //     'title' => __( 'Services Tab', 'elementhelper' ),
            //     'icon' => 'fa fa-card',
            //     'ispro' =>true
            // ],

            // 'cf7-tab' => [
            //     'title' => __( 'Contact Form 7 Tab', 'elementhelper' ),
            //     'icon' => 'fa fa-form',
            //     'ispro' =>true
            // ],

            // 'cf7' => [
            //     'title' => __( 'Contact Form 7', 'elementhelper' ),
            //     'icon' => 'fa fa-form',
            // ],

            // 'contact-info' => [
            //     'title' => __( 'Contact Info', 'elementhelper' ),
            //     'icon' => 'fa fa-form',
            // ],

            'heading' => [
                'title' => __( 'Heading Title', 'elementhelper' ),
                'icon' => 'fa fa-icon-box',
            ],

            // 'icon-box' => [
            //     'title' => __( 'Icon Box', 'elementhelper' ),
            //     'icon' => 'fa fa-blog-content',
            // ],

            // 'infobox' => [
            //     'title' => __( 'Info Box', 'elementhelper' ),
            //     'icon' => 'fa fa-blog-content',
            // ],

            // 'member' => [
            //     'title' => __( 'Team Member', 'elementhelper' ),
            //     'icon' => 'fa fa-team-member',
            // ],

            // 'member-details' => [
            //     'title' => __( 'Member Details', 'elementhelper' ),
            //     'icon' => 'fa fa-team-member',
            // ],

            // 'author-box' => [
            //     'title' => __( 'Author Box', 'elementhelper' ),
            //     'icon' => 'fa fa-team-member',
            // ],

            // 'featured-list' => [
            //     'title' => __( 'Featured List', 'elementhelper' ),
            //     'icon' => 'fa fa-team-member',
            // ],

            // 'fact' => [
            //     'title' => __( 'Fact', 'elementhelper' ),
            //     'icon' => 'fa fa-team-member',
            // ],

            // 'pricing-table' => [
            //     'title' => __( 'Pricing Table', 'elementhelper' ),
            //     'icon' => 'fa fa-file-cabinet',
            // ],

            // 'job-list' => [
            //     'title' => __( 'Job List', 'elementhelper' ),
            //     'icon' => 'fa fa-flip-card',
            // ],

            'post-list' => [
                'title' => __( 'Post List', 'elementhelper' ),
                'icon' => 'fa fa-post-list',
            ],

            // 'post-tab' => [
            //     'title' => __( 'Post Tab', 'elementhelper' ),
            //     'icon' => 'fa fa-post-tab',
            // ],

            // 'project-slider' => [
            //     'title' => __( 'Project Slider', 'elementhelper' ),
            //     'icon' => 'fa fa-post-tab',
            // ],

        ];
    }

    /**
    *  Get WooCommerce widgets list
    **/
    public static function get_woo_widgets() {

        return [
            'woo-product' => [
                'title' => __( 'Woo Product', 'elementhelper' ),
                'icon' => 'fa fa-card'
            ]

        ];
    }
}
