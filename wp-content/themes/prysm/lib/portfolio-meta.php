<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'prysm_portfoliopost';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => 'portfolio Options',
    'post_type' => 'portfolio',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'General Settings',
    'fields' => array(

	array(
		'id'      => 'portfolio_top',
		'type'       => 'switcher',
	  'text_on'    => 'Show',
	  'text_off'   => 'Hide',
	  'text_width' => 100,
		'title'   => 'Top Section',
		'default' => 'Show'
	),
       array(
        'id'    => 'portfolio_heading',
        'type'  => 'text',
        'title' => 'portfolio Title',
		 'default' => 'portfolio'
      ),
	array(
		'id'      => 'portfolio_breadcrumb',
		'type'       => 'switcher',
	  'text_on'    => 'Show',
	  'text_off'   => 'Hide',
	  'text_width' => 100,
		'title'   => 'Breadcrumb',
		'default' => 'Show'
	),
	array(
	  'id'    => 'portfolio_background',
	  'title' => 'Background Image',
		'type'  => 'media',
		'library' => 'image',
	),

    )
  ) );


}
