<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'prysm_testimonialpost';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => 'Testimonial Options',
    'post_type' => 'testimonial',
  ) );

  //

	// Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Testimonial Info',
    'fields' => array(

      //
     
       array(
        'id'    => 'testimonial_design',
        'type'  => 'text',
        'title' => 'Author Desigination',
		 'default' => 'Customer Manager'
      ),
		array(
        'id'    => 'testimonial_comment',
        'type'  => 'textarea',
        'title' => 'Author Comment',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor to incididunt ut labore et dolore magna for aliqua. Quis ipsum suspendisse.'
      ),
		array(
		  'id'          => 'testimonial_stars',
		  'type'        => 'select',
		  'title'       => 'Select Author Rating',
		  'placeholder' => 'Select an option',
		  'options'     => array(
			'1'  => '1 Star',
			'2'  => '2 Star',
			'3'  => '3 Star',
			'4'  => '4 Star',
			'5'  => '5 Star',
		  ),
		  'default'     => '5'
		),

    )
  ) );


}
