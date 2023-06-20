<?php
include_once( get_template_directory() . '/includes/ocdi/codestar.php');
function prysm_ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'Prysm Main',
			'categories'                   => array( 'Prysm' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri('template_url') . '/includes/ocdi/demo/screenshot.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/prysm-main/',
		),
		array(
			'import_file_name'             => 'Business',
			'categories'                   => array( 'Business' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/11/business-1.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/business/',
		),
		array(
			'import_file_name'             => 'Software',
			'categories'                   => array( 'Business' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/software/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/software/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/software/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/11/software.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/software/',
		),
		array(
			'import_file_name'             => 'Finance',
			'categories'                   => array( 'Finance' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/finance/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/finance/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/finance/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/11/finance-1.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/finance/',
		),
		array(
			'import_file_name'             => 'IT Solutions',
			'categories'                   => array( 'IT Solutions' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/itsolutions/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/itsolutions/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/itsolutions/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/11/it-solution-1.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/it-solutions/',
		),
		array(
			'import_file_name'             => 'Consulting',
			'categories'                   => array( 'Consulting' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/11/consultiong-1.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/consulting/',
		),
		array(
			'import_file_name'             => 'Agency',
			'categories'                   => array( 'Agency' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/agency/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/agency/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/agency/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/11/agency.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/agency/',
		),
		array(
			'import_file_name'             => 'Marketing',
			'categories'                   => array( 'Marketing' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/marketing/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/marketing/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/marketing/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/12/marketing.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/marketing/',
		),
		array(
			'import_file_name'             => 'Prysm Main RTL',
			'categories'                   => array( 'RTL' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/prysm-rtl/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/prysm-rtl/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/prysm-rtl/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/12/demo-rtl.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/main-rtl/',
		),
		array(
			'import_file_name'             => 'Consulting Two',
			'categories'                   => array( 'Consulting' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting2/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting2/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting2/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/12/consulting-new.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/consulting2/',
		),
		array(
			'import_file_name'             => 'Business Dark',
			'categories'                   => array( 'Business' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-dark/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-dark/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-dark/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/12/dark-demo.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-5 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/business-dark/',
		),
		array(
			'import_file_name'             => 'International Business',
			'categories'                   => array( 'Business' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/international-business/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/international-business/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/international-business/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/12/int-b.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/business-agency/',
		),
		array(
			'import_file_name'             => 'Consulting Modern',
			'categories'                   => array( 'Consulting' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-modern/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-modern/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-modern/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2021/12/new-con-mod.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/consulting-modern/',
		),
		array(
			'import_file_name'             => 'Consulting New',
			'categories'                   => array( 'Consulting' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-v3/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-v3/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-v3/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2022/01/cons-new-demo.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/consulting-new/',
		),
		array(
			'import_file_name'             => 'Creative Agency',
			'categories'                   => array( 'Agency' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/creative-agency/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/creative-agency/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/creative-agency/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2022/01/agency-crt.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/creative-agency/',
		),
		array(
			'import_file_name'             => 'Consulting Four',
			'categories'                   => array( 'Consulting' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-v4/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-v4/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/consulting-v4/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2022/01/consulting-v4.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/consulting-4/',
		),
		array(
			'import_file_name'             => 'Business Two',
			'categories'                   => array( 'Business' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-v2/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-v2/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-v2/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2022/01/business-v2.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/business-new/',
		),

		array(
			'import_file_name'             => 'Digital Agency',
			'categories'                   => array( 'Agency' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/agency2/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/agency2/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/agency2/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2022/02/digital-agency.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/digital-agency/',
		),

		array(
			'import_file_name'             => 'Web Agency',
			'categories'                   => array( 'Agency' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/web-agency/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/web-agency/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/web-agency/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2022/02/demo-wg.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/web-agency/',
		),
		array(
			'import_file_name'             => 'Law Firms',
			'categories'                   => array( 'Law Firm' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/law-firms/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/law-firms/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/law-firms/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2022/02/law-demo-import.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/law-firms/',
		),
		array(
			'import_file_name'             => 'Business Agency',
			'categories'                   => array( 'business' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-4/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-4/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/business-4/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/ocdi/demo/codestar.json',
					'option_name' => 'prysm',
				),
			),
			'import_preview_image_url'     => 'http://themexriver.com/prysm-theme/wp-content/uploads/2022/02/demo-import.jpg',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.', 'prysm' ),
			'preview_url'                  => 'https://themexriver.com/prysm-theme/business-4/',
		),

	);
}
add_filter( 'pt-ocdi/import_files', 'prysm_ocdi_import_files' );

function prysm_ocdi_after_import( $selected_import ) {
	// Assign menus to their locations.
    $header_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array( 'header_menu' => $header_menu->term_id ) );

    // Assign front page and posts page (blog page)
    $front_page_id	= get_page_by_title( 'Home' );

    $blog_page_id	= get_page_by_title( 'Blog' );

	if ( class_exists( 'RevSlider' )) {

        if ( 'Prysm Main' === $selected_import['import_file_name'] || 'Prysm Main RTL' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/prysm-slider.zip',
            );
        }
        if ( 'Business' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/business.zip',
            );
        }
        if ( 'Agency' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/agency-Slider.zip',
            );
        }

        if ( 'Finance' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/Finance.zip',
            );
        }

        if ( 'IT Solutions' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/it-solution.zip',
            );
        }
        if ( 'Consulting' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/Consulting.zip',
            );
        }
        if ( 'Software' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/Softwareslider-1.zip',
            );
        }
        if ( 'Consulting Two' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/consulting-new.zip',
            );
        }
        if ( 'Business Dark' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/businessdark.zip',
            );
        }
        if ( 'Consulting Modern' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/consulting-modern.zip',
            );
        }
        if ( 'Creative Agency' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/creative-agency.zip',
            );
        }
        if ( 'Consulting Four' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/consulting-v4.zip',
            );
        }
        if ( 'Business Two' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/business-v2.zip',
            );
        }
        if ( 'Digital Agency' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/digital-agency.zip',
            );
        }
        if ( 'Web Agency' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/web-agency.zip',
            );
        }
        if ( 'Law Firms' === $selected_import['import_file_name'] ) {
            $slider_array = array(
                get_template_directory() . '/rev-slider/law-firms.zip',
            );
        }

        $slider = new RevSlider();

        foreach($slider_array as $filepath){
            $slider->importSliderFromPost(true,true,$filepath);
        }

    }


    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'prysm_ocdi_after_import' );

function prysm_ocdi_before_widgets_import( $selected_import ) {
	$sidebars_widgets = get_option('sidebars_widgets');
    $all_widgets = array();

    array_walk_recursive( $sidebars_widgets, function ($item, $key) use ( &$all_widgets ) {
        if( ! isset( $all_widgets[$key] ) ) {
            $all_widgets[$key] = $item;
        } else {
            $all_widgets[] = $item;
        }
    } );

    if( isset( $all_widgets['array_version'] ) ) {
        $array_version = $all_widgets['array_version'];
        unset( $all_widgets['array_version'] );
    }

    $new_sidebars_widgets = array_fill_keys( array_keys( $sidebars_widgets ), array() );

    $new_sidebars_widgets['wp_inactive_widgets'] = $all_widgets;
    if( isset( $array_version ) ) {
        $new_sidebars_widgets['array_version'] = $array_version;
    }

    update_option( 'sidebars_widgets', $new_sidebars_widgets );
}
add_action( 'pt-ocdi/before_widgets_import', 'prysm_ocdi_before_widgets_import' );

function prysm_ocdi_before_content_import() {
    add_filter( 'wp_import_post_data_processed', 'prysm_ocdi_wp_import_post_data_processed', 99, 2 );
}
add_action( 'pt-ocdi/before_content_import', 'prysm_ocdi_before_content_import', 99 );

function prysm_ocdi_wp_import_post_data_processed( $postdata, $data ) {
    return wp_slash( $postdata );
}

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );