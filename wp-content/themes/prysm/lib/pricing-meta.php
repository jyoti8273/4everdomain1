<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'prysm_pricepost';

  //
  // Create a metabox
  CSF::createMetabox( $prefix, array(
    'title'     => 'Pricing Options',
    'post_type' => 'pricing_table',
  ) );

	// Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Pricing Info',
    'fields' => array(

      //
     
       array(
        'id'    => 'monthly_price',
        'type'  => 'text',
        'title' => 'Monthly Price',
      ),
       array(
        'id'    => 'yearly_price',
        'type'  => 'text',
        'title' => 'Yearly Price',
      ),
       array(
        'id'    => 'profesonal_price',
        'type'  => 'text',
        'title' => 'Profesonal Price',
      ),
		array(
        'id'    => 'price_symble',
        'type'  => 'text',
        'title' => 'Pricing Symble',
    ),
		array(
        'id'    => 'month_preod',
        'type'  => 'text',
        'title' => 'Monthly Preod',
    ),
		array(
        'id'    => 'yr_preod',
        'type'  => 'text',
        'title' => 'Yearly Preod',
    ),
		array(
        'id'    => 'bill_text',
        'type'  => 'text',
        'title' => 'Billed Preod Text',
    ),
		array(
        'id'    => 'taxes_text',
        'type'  => 'text',
        'title' => 'Taxes Text',
    ),
		array(
        'id'    => 'notice_text',
        'type'  => 'text',
        'title' => 'Notice Text',
    ),
      array(
        'id'        => 'pricing_lists',
        'type'      => 'repeater',
        'title'     => 'Pricing Lists',
        'fields'    => array(
          array(
            'id'    => 'pricing_item',
            'type'  => 'textarea',
            'title' => 'List item Add Here',
          ),

        ),
      ),
		
		array(
        'id'    => 'pricing_button',
        'type'  => 'text',
        'title' => 'Pricing Button Text',
		 'default' => 'Get Started'
      ),

		array(
        'id'    => 'pricing_link',
        'type'  => 'link',
        'title' => 'Pricing Button Link',
      ),

      array(
        'id'    => 'pricing_shape_img',
        'title' => 'Shape Image',
          'type'  => 'media',
          'library' => 'image',
      ),
      array(
        'id'    => 'pricing_shape2_img',
        'title' => 'Shape Image 2',
          'type'  => 'media',
          'library' => 'image',
      ),

    )
  ) );



}
