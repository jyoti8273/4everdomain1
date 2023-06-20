<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'prysm_blogpost';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => 'Post Options',
    'post_type' => 'post',
    'context'   => 'advanced', // The context within the screen where the boxes should display. `normal`, `side`, `advanced`
  ) );

  //
	 CSF::createSection( $prefix, array(
    'title'  => 'General Options',
    'fields' => array(

      //
      // A text field
	array(
		'id'      => 'post_breadcrumb',
		'type'       => 'switcher',
	  'text_on'    => 'Show',
	  'text_off'   => 'Hide',
	  'text_width' => 100,
		'title'   => 'Breadcrumb',
		'default' => 'Show'
	),
	array(
		'id'      => 'post_sidebar',
		'type'       => 'switcher',
	  'text_on'    => 'Show',
	  'text_off'   => 'Hide',
	  'text_width' => 100,
		'title'   => 'Sidebar',
		'default' => 'Show'
	),
	array(
	  'id'    => 'post_background',
	  'title' => 'Background Image',
		'type'  => 'media',
		'library' => 'image',
	),
		array(
					'id'      => 'post_featured_img',
					'type'       => 'switcher',
				  'text_on'    => 'Show',
				  'text_off'   => 'Hide',
				  'text_width' => 100,
					'title'   => 'Show featured image in listing',
					'default' => 'hide'
				),
	array(
		'id'     => 'post-contactsection',
		'type'   => 'fieldset',
		'title'  => 'Contact Us Section',
		'fields' => array(
				array(
					'id'      => 'post_bottom_section',
					'type'       => 'switcher',
				  'text_on'    => 'Show',
				  'text_off'   => 'Hide',
				  'text_width' => 100,
					'title'   => 'Contact Us Section',
					'default' => 'Show'
				),
				array(
				  'id'      => 'post-bottom-title',
				  'type'    => 'textarea',
				  'title'   => 'Contact Section Title',
				  'default' => 'Stay ahead in a rapidly world. Subscribe to <a href="#">Prysm Insights,</a>our monthly look at the critical issues facing global business.'
				),
				array(
					'id'    => 'post-main-bglogo',
					'type'  => 'media',
					'title' => 'Background logo',
					'library' => 'image',
				  ),
			array(
					'id'      => 'post_bottom_form',
					'type'       => 'switcher',
				  'text_on'    => 'Show',
				  'text_off'   => 'Hide',
				  'text_width' => 100,
					'title'   => 'Subscription Form',
					'default' => 'Show'
				),
			
		),
	),
	array(
	'id'     => 'post_socialsection',
	'type'   => 'fieldset',
	'title'  => 'Social Follow Section',
	'fields' => array(
			array(
			  'id'    => 'facebook_link',
			  'type'  => 'link',
			  'title' => 'Enter Facebook Link',
			),
			array(
			  'id'    => 'twitter_link',
			  'type'  => 'link',
			  'title' => 'Enter Twitter Link',
			),
			array(
			  'id'    => 'linkdin_link',
			  'type'  => 'link',
			  'title' => 'Enter Linkedin Link',
			),
			array(
			  'id'    => 'insta_link',
			  'type'  => 'link',
			  'title' => 'Enter Instagram Link',
			),
	),
),



    )
  ) );

}
