<?php
/*
if ( !class_exists( 'CSF' ) && file_exists( get_template_directory(). '/lib/codestar-framework/codestar-framework.php' ) ) {
    require_once( get_template_directory(). '/lib/codestar-framework/codestar-framework.php' );
}*/

if( class_exists( 'CSF' ) ) {
	include_once( get_template_directory() . '/lib/theme-options.php');
	include_once( get_template_directory() . '/lib/post-meta.php');
	include_once( get_template_directory() . '/lib/page-meta.php');
	include_once( get_template_directory() . '/lib/services-meta.php');
	include_once( get_template_directory() . '/lib/team-meta.php');
	include_once( get_template_directory() . '/lib/portfolio-meta.php');
	include_once( get_template_directory() . '/lib/testimonial-meta.php');
	include_once( get_template_directory() . '/lib/pricing-meta.php');
}