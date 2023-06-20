<?php

function prysm_set( $var, $key, $def = '' )
{
	if( !$var ) return false;

	if( is_object( $var ) && isset( $var->$key ) ) return $var->$key;
	elseif( is_array( $var ) && isset( $var[$key] ) ) return $var[$key];
	elseif( $def ) return $def;
	else return false;
}


function prysm_printr($data)
{
	echo '<pre>'; print_r($data);exit;
}

function prysm_load_class($class, $directory = 'libraries', $global = true, $prefix = 'prysm_')
{
	$obj = &$GLOBALS['_sh_base'];
	$obj = is_object( $obj ) ? $obj : new stdClass;

	$name = FALSE;

	// Is the request a class extension?  If so we load it too
	$path = get_template_directory().'/includes/'.$directory.'/'.$class.'.php';
	if( file_exists($path) )
	{
		$name = $prefix.ucwords( $class );

		if (class_exists($name) === FALSE)	require($path);
	}

	// Did we find the class?
	if ($name === FALSE) exit('Unable to locate the specified class: '.$class.'.php');

	if( $global ) $GLOBALS['_sh_base']->$class = new $name();
	else new $name();
}

include_once( get_template_directory() . '/includes/library/functions.php');

prysm_load_class( 'ajax', 'helpers', false );
prysm_load_class( 'enqueue', 'helpers', false );

if( is_admin() )
/** Plugin Activation */
require_once(get_template_directory().'/includes/thirdparty/tgm-plugin-activation/plugins.php');

/**
 * Set primary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function prysm_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar float-right col-xl-9 col-lg-8 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'content-has-sidebar float-left col-xl-9 col-lg-8 col-md-12 col-sm-12';
                break;

            default:
                $class[] = 'content-full-width col-12';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html($class) . '"';
        }
    } else {
        echo ' class="content-area col-12"'; 
    }
}


/**
 * Set secondary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function prysm_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-3 col-lg-4 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-3 col-lg-4 col-md-12 col-sm-12';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html($class) . '"';
        }
    }
}

/**
 * Add Template Woocommerce
 */
if(class_exists('Woocommerce')){
    require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}
