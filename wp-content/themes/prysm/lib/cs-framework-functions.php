<?php

/**
 *
 * Get prysm Theme options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_get_option' ) ) {
    function cs_get_option( $option = '', $default = null ) {
        $options = get_option( 'prysm' ); // Attention: Set your unique id of the framework
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}

/**
 *
 * Get get switcher option
 *  for theme options
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( ! function_exists( 'cs_get_switcher_option' )) {

    function cs_get_switcher_option( $option = '', $default = null ) {
        $options = get_option( 'prysm' ); // Attention: Set your unique id of the framework
        $return_val =  ( isset( $options[$option] ) ) ? $options[$option] : $default;
        $return_val =  (is_null($return_val) || '1' == $return_val ) ? true : false;;
        return $return_val;
    }
}

if ( ! function_exists( 'cs_switcher_option' )) {

    function cs_switcher_option( $option = '', $default = null ) {
        $options = get_option( 'prysm' ); // Attention: Set your unique id of the framework
        $return_val =  ( isset( $options[$option] ) ) ? $options[$option] : $default;
        $return_val =  ( '1' == $return_val ) ? true : false;;
        return $return_val;
    }
}

/**
 *
 * Get customize option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( ! function_exists( 'cs_get_customize_option' ) ) {

    function cs_get_customize_option( $option = '', $default = null ) {
        $options = get_option( 'ennlil_customize_options' ); // Attention: Set your unique id of the framework
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}

/**
 * Function for get a metaboxes
 *
 * @param $prefix_key Required Meta unique slug
 * @param $meta_key Required Meta slug
 * @param $default Optional Set default value
 * @param $id Optional Set post id
 *
 * @return mixed
 */
function prysm_get_meta( $prefix_key, $meta_key, $default = null, $id = '' ) {
    if ( !$id ) {
        $id = get_the_ID();
    }

    $meta_boxes = get_post_meta( $id, $prefix_key, true );
    return ( isset( $meta_boxes[$meta_key] ) ) ? $meta_boxes[$meta_key] : $default;
}

/**
 * Get Header layout
 *
 * @return string
 */
function prysm_site_header() {
    $header_layout = cs_get_option( 'global_nav_menu', 'header-style-one' );
    if ( is_page() ) {
        $page_header = prysm_get_meta( 'prysm_pagepost', 'header_layout', 'default' );

        if ( 'default' !== $page_header ) {
            $header_layout = $page_header;
        }
    }

    return $header_layout;
}

 /**
  * Site Logo
  */
  function prysm_logo(){ 
    $global_logo = cs_get_option('header_logo');
    $page_footer = prysm_get_meta( 'prysm_pagepost', 'page_logo', 'default' );
    ?>
    <?php if(!empty($page_footer['url'])):?>
        <a  href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo esc_url($page_footer['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php elseif(isset($global_logo['url']) && $global_logo['url']):?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo esc_url($global_logo['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php else:?>
        <?php 
            if(has_custom_logo()){
                the_custom_logo();
            }else{
                printf('<h1 class="prysm-text-logo"><a href="%1$s">%2$s</a></h1>',esc_url(site_url('/')),esc_html(get_bloginfo('name')));
            }
        ?>
    <?php endif;?>
<?php }