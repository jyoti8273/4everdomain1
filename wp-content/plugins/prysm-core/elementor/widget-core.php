<?php 


final class prysm_Elementor_Dependency {
    const VERSION                   = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION       = '7.0';
    private static $_instance       = null;
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
            // self::$_instance->prysm_inlcudes_fiels();
        }
        return self::$_instance;
    }
    public function __construct() {
        add_action( 'after_setup_theme', [$this, 'init'] );
    }

    public function init() {
        if ( !did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_missing_main_plugin'] );
            return;
        }
        if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_minimum_elementor_version'] );
            return;
        }
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_minimum_php_version'] );
            return;
        }
        add_action( 'elementor/widgets/widgets_registered', [$this, 'init_widgets'] );
    }

    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            esc_html__( '%1$s requires "%2$s" to be installed and activated.', 'prysm-extension' ),
            '<strong>' . esc_html__( 'Theme', 'prysm-extension' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'prysm-extension' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            esc_html__( '%1$s requires "%2$s" version %3$s or greater.', 'prysm-extension' ),
            '<strong>' . esc_html__( 'Theme', 'prysm-extension' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'prysm-extension' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            esc_html__( '%1$s requires "%2$s" version %3$s or greater.', 'prysm-extension' ),
            '<strong>' . esc_html__( 'prysm Theme', 'prysm-extension' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'prysm-extension' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }
    

    public function init_widgets() {

        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/work-process.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/prysom-2-heading.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/list-icon-box.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/service.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/achivement-counter.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/team.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/appoinment-banner.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/button.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/prysom-post-grid.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysom-2/faq-accordion.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/prysom-post-grid.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/testimonial-3.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/prysom-3-heading.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/prysm-3-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/prysm-3-list-icon.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/counter-3.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/footer-link.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/newsletter.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/service-3.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/about-3.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/service-box-3.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/team-3.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/project-3.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/prysm-3/heading-title.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/brand.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-service.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/about-banner.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-list-box.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-project.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-button.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/video-banner.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-progress.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-team.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-post-carousel.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/finance-footer-links.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/Finance/fin-newsletter.php';

        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/itsolution-service.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/itsolution-section-heading.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-feature-box.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-list-item.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-about-img.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-project-showcase.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-business-solutions.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-work-process.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-post-item.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/footer-contact-info.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/itsolution/its-subscribe.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-section-title.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-get-in-touch.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-portfolio.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-workflow.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/work-process.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/project-mind.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/software/sw-brand-carousel.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-counter.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-why-choose.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-service-carousel.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-section-title.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-team.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-project.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency/ag-blog-grid.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-hero.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-features.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-service.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-testimonials.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-blog-post.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing/ma-projects.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/con-service.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/con-section-title.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/con-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/con-service-v2.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/faq-brand.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/con-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/con-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/portfolio-filter.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/con-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting/con-post-item.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/business-dark/bud-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-dark/full-width-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-dark/bud-portfolio.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-dark/dark-team.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-dark/newsletter.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-dark/dark-blog-post.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-dark/default-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-dark/bud-service.php';

        require_once plugin_dir_path(__FILE__) . '/widgets/new-business/newb-hero-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/new-business/newb-trusted-partner.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/new-business/newb-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/new-business/newb-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/new-business/newb-mamagement.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/new-business/newb-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/new-business/newb-team.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/new-business/newb-business-section.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/cont-clients-carousal.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/contv2-agency-content.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/cont-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/cont-discover-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-solution.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-project.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-team.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-team.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-consulting-info.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-post-grid.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting2/const-cta-section.php';

        
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-hero.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-feature.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-video.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-service.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-project.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-business-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-hire-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-faq.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/clients-carousle.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/consulting-v3-post.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v3/newslater-cta.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-clients.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-digital-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-content-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-portfolios.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-skill-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-team-members.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-post-item.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/marketing-agency-v2/mgv2-digital-form-section.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consuting-v4-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-help-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-partner.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-post.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-cta2.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-choose-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/consulting-v4/consulting-v4-project.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-service.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-business-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-projects.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-partners.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/business-v2-post.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v2/contact-info-section.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-feature.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-project-filter.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-pricing-table.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-newslater.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-post-item.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-partner.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/agency2/ag2-choose-serction.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-fanfact.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-award-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-video-popup.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-post-item.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/work-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-projects.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-faq.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/web-agency/weba-client-carousle.php';


        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-post-item.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-clients.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-testimonials.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-faq.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-team.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-service-tab.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/law/law-fanfact.php';

        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-slider-section.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-features-item.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-about.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-services.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-cta.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-work-flow.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-projects.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-testimonial.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/market-research.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-faq.php';
        require_once plugin_dir_path(__FILE__) . '/widgets/business-v4/bus4-newslater.php';

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_work_process() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_section_heading() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_service() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_list_icon_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_work_service() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_achivement_counter() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_team() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_appoinment_banner() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_button() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm2_work_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm_blog_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm_accordion() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_blog_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_work_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_section_heading() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_cta_banner() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_list_icon_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_fan_counter() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_footer_link() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_newsleter() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_service() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_about_us() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_service_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_team() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_portfolio() );

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_brand_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_about_banner() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_list_icon_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_portfolio_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_button() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_video_banner() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_skill_bar() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_team() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_cta() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_post_slider() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_footer_link() );

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_service_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_section_heading() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_feature_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_list_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_about_img() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_counterbox_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_business_solution() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_pricing_table() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_cta_box() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_work_process() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_blog_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_footer_contact_info() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \prysm3_item_heading() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \finance_newsleter() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \its_newsleter() );

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_about_content() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_service_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_section_heading() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_get_in_touh() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_portfolio_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_work_flow() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_pricing_table() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_work_process() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_project_mind() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sw_brand_carousel() );

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_counter_counter() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_about() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_service_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_section_heading() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_main_about() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_team() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_portfolio() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_pricing_table() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag_blog_grid() );



        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mrk_hero_slider() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mrk_features_feature() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ma_about_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ma_fanfact() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ma_service_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ma_cta_content() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ma_testimonial_content() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ma_blog_post_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mar_pricing_table() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ma_projects_item() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_service_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_item_heading() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_fanfact() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_service_v2_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_faq_and_brand_logo() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_cta() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_about_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_portfolio_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_testimonial_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \con_post_item() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bud_dark_business() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bud_dark_fullwidth_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bud_dark_portfolio() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bud_dark_team() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bud_dark_newsletter() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bud_blog_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bud_default_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bud_dark_service() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newb_hero_slider() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newb_trusted_partner() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newb_service() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newb_con_fanfact() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newb_business_management() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newb_pricing_table() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newb_team_member() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newb_business_section() );

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \cont_trusted_partner() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \cont_ag_content_info() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \newconsultingv2_service() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \cont_discover_info() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \const_solution_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \cont_fanfact_item() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \const_pricing_table() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \const_project_slider() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \const_team_member() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \cont_consulting_section_info() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \const_testimonials() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \const_post_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \cont_cta_item() );

        // Consulting V3
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_hero_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_feature_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_about_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_video_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_service_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_casestudy_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_business_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_hire_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_cta_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_faq_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_testimonial_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_sponcore_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_post_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv3_cta_newslater_section() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_service_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_about_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_clients_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_digital_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_content_table_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_postrolfio_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_skill_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_fanfact_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_pricing_table_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_team_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_testimonial_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_post_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \mgv2_digital_form_section() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_about_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_fanfact_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_help_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_service_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_partners_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_cta_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_post_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_cta2_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_testimonial_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_choose_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \constv4_project_section() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business2_about_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business2_service_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business2_business_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business2_rojects_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business2_pricing_table_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business2_testimonial_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business_v2_partners_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business2_fanfact_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business_v2_post_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \business2_contact_info_section() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_feature_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_main_about() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_service_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_fanfact() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_project_filter() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_pricing_table_section() );

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_newsletter() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_blog_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_partner_carousle() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \ag2_choose_section() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_fanfact() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_award_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_video_popup() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_blog_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_worksection() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_project_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_faq() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_service_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \weba_partner_carousle() );


        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_cta() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_blog_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_partner_carousle() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_faq() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_team() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_service_tab() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_service_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_about_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \law_fanfact() );

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_slider_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_feature_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_about_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_service_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_cta_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_workflow_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_project_section() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_testimonial() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_market_research() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_faq_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \bus4_newslater_widget() );
        
    }
}

prysm_Elementor_Dependency::instance();



//Add Elementor Category
function prysm_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'prysm-category',
        [
            'title' => esc_html__( 'PRYSM', 'prysm-extension' ),
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'prysm_elementor_widget_categories' );


// Load Script
function prysm_widget_styles() {
    wp_enqueue_style( 'owl-carrosel', plugins_url( 'assets/owl-carrosel/owl.carousel.min.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'owl-carrosel-theme', plugins_url( 'assets/owl-carrosel/owl.theme.default.min.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'consulting-css', plugins_url( 'assets/css/consulting.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'business-dark-css', plugins_url( 'assets/css/business-dark.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'new-business', plugins_url( 'assets/css/new-business.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'custom-animation.css', plugins_url( 'assets/css/custom-animation.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'new-consulting', plugins_url( 'assets/css/new-consulting.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'consulting-v3', plugins_url( 'assets/css/consulting-v3.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'marketing-v2', plugins_url( 'assets/css/marketing-v2.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'consulting-v4', plugins_url( 'assets/css/consulting-v4.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'business-v2', plugins_url( 'assets/css/business-v2.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'agency-v2', plugins_url( 'assets/css/agency-2.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'web-agency', plugins_url( 'assets/css/web-agency.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'prysm-law', plugins_url( 'assets/css/law.css', __FILE__ ), [], '1.0' );
    wp_enqueue_style( 'business-4', plugins_url( 'assets/css/business-4.css', __FILE__ ), [], '1.0' );

    wp_enqueue_script( 'owl-carrosel', plugins_url( 'assets/owl-carrosel/owl.carousel.min.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'tilt-jquery', plugins_url( 'assets/js/tilt.jquery.min.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'isotope', plugins_url( 'assets/js/isotope.pkgd.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'lord-icon-2', plugins_url( 'assets/js/lord-icon-2.1.0.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'consulting-scripts', plugins_url( 'assets/js/consulting-scripts.js', __FILE__ ), ['jquery', 'jquery-ui-accordion'], '1.0', true );
    wp_enqueue_script( 'parallax-pr', plugins_url( 'assets/js/parallax.min.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'mixitup-pr', plugins_url( 'assets/js/mixitup.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'fancybox', plugins_url( 'assets/js/jquery.fancybox.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'portfolio', plugins_url( 'assets/js/portfolio.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'dark-script-in', plugins_url( 'assets/js/dark-script.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'newbusiness', plugins_url( 'assets/js/newbusiness.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'consulting-2-script', plugins_url( 'assets/js/consulting-2-script.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'consulting-v3', plugins_url( 'assets/js/consulting-v3.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'marketing-v2', plugins_url( 'assets/js/marketing-v2.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'consulting-v4', plugins_url( 'assets/js/consulting-v4.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'business-v2', plugins_url( 'assets/js/business-v2.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'agency2', plugins_url( 'assets/js/agency2.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'weba-script', plugins_url( 'assets/js/weba-script.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'law-script', plugins_url( 'assets/js/law.js', __FILE__ ), ['jquery'], '1.0', true );
    wp_enqueue_script( 'business-4', plugins_url( 'assets/js/business-4.js', __FILE__ ), ['jquery'], '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'prysm_widget_styles' );