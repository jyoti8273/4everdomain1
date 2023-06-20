<?php

class prysm_Ajax
{
	function __construct()
	{
		add_action( 'wp_ajax__sh_ajax_callback', array( $this, 'ajax_handler' ) );
		add_action( 'wp_ajax_nopriv__sh_ajax_callback', array( $this, 'ajax_handler' ) );
	}
	
	function ajax_handler()
	{
		$method = prysm_set( $_REQUEST, 'subaction' );
		if( method_exists( $this, $method ) ) $this->$method();
		
		exit;
	}
	function prysm_contact_submit(){
		if( function_exists('prysm_ajax_submit_form') ){
			prysm_ajax_submit_form();
		}	
	}
	function prysm_career_form_submit(){
		if( function_exists('prysm_ajax_submit_career_form') ){
			prysm_ajax_submit_career_form();
		}	
	}
}