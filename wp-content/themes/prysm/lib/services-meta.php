<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'prysm_servicepost';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => 'Service Options',
    'post_type' => 'services',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'General Settings',
    'fields' => array(

      //
      // A text field
	array(
		'id'      => 'service_full',
		'type'       => 'switcher',
	  'text_on'    => 'Full',
	  'text_off'   => 'Padded',
	  'text_width' => 100,
		'title'   => 'Service Full Width',
		'default' => 'Show'
	),
	array(
		'id'      => 'service_top',
		'type'       => 'switcher',
	  'text_on'    => 'Show',
	  'text_off'   => 'Hide',
	  'text_width' => 100,
		'title'   => 'Top Section',
		'default' => 'Show'
	),
       array(
        'id'    => 'service_heading',
        'type'  => 'text',
        'title' => 'service Title',
		 'default' => 'service'
      ),
	array(
		'id'      => 'service_breadcrumb',
		'type'       => 'switcher',
	  'text_on'    => 'Show',
	  'text_off'   => 'Hide',
	  'text_width' => 100,
		'title'   => 'Breadcrumb',
		'default' => 'Show'
	),
	array(
	  'id'    => 'service_background',
	  'title' => 'Background Image',
		'type'  => 'media',
		'library' => 'image',
	),

    )
  ) );
	
	// Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Service Info',
    'fields' => array(

      //
     
       array(
        'id'    => 'service_icon',
        'type'  => 'text',
        'title' => 'Service Icon Class',
		 'default' => 'flaticon-business-report'
      ),
		array(
			'id'    => 'service_icon_img',
			'type'  => 'media',
			'title' => 'Service Icon Image',
			'library' => 'image',
		  ),
		array(
        'id'    => 'service_text',
        'type'  => 'textarea',
        'title' => 'Service Short Description',
		'default' => 'Our flagship business public<a href="#">Prysm</a> Quarterly, has been defining and inform.'
      ),

    )
  ) );
	// Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Service SideBar Setting',
    'fields' => array(

				array(
					'id'      => 'service_recent_show',
					'type'       => 'switcher',
				  'text_on'    => 'Show',
				  'text_off'   => 'Hide',
				  'text_width' => 100,
					'title'   => 'Recent Services',
					'default' => 'Show'
				),
				array(
				  'id'      => 'service_recent_limit',
				  'type'    => 'number',
				  'title'   => 'Recent Services Limit',
				  'default' => 5,
				),
			array(
					'id'    => 'service_sidebar_img',
					'type'  => 'media',
					'title' => 'Sidebar Image',
					'library' => 'image',
				  ),
			array(
					'id'    => 'service-sidebar_img_lnk',
					'type'  => 'link',
					'title' => 'Sidebar Image Link',
				  ),

    )
  ) );
	
	// Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Service Bottom Setting',
    'fields' => array(

		
		
		array(
		'id'     => 'service_slider',
		'type'   => 'fieldset',
		'title'  => 'More Service Carousal',
		'fields' => array(
				array(
					'id'      => 'service_bottom_slider',
					'type'       => 'switcher',
				  'text_on'    => 'Show',
				  'text_off'   => 'Hide',
				  'text_width' => 100,
					'title'   => 'Service Carousal',
					'default' => 'Show'
				),
			array(
				  'id'      => 'service_bottom_slider_limit',
				  'type'    => 'number',
				  'title'   => 'Carousal Services Limit',
				  'default' => 4,
				),
		),
	),
		
				array(
		'id'     => 'service-contactsection',
		'type'   => 'fieldset',
		'title'  => 'Contact Us Section',
		'fields' => array(
				array(
					'id'      => 'service_bottom_section',
					'type'       => 'switcher',
				  'text_on'    => 'Show',
				  'text_off'   => 'Hide',
				  'text_width' => 100,
					'title'   => 'Contact Us Section',
					'default' => 'Show'
				),
				array(
				  'id'      => 'service-bottom-title',
				  'type'    => 'textarea',
				  'title'   => 'Contact Section Title',
				  'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.'
				),
				array(
					'id'    => 'service-main-bglogo',
					'type'  => 'media',
					'title' => 'Background logo',
					'library' => 'image',
				  ),
			array(
					'id'      => 'service_bottom_form',
					'type'       => 'switcher',
				  'text_on'    => 'Show',
				  'text_off'   => 'Hide',
				  'text_width' => 100,
					'title'   => 'Subscription Form',
					'default' => 'Show'
				),
			
		),
	),

    )
  ) );


}
