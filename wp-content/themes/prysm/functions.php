<?php
global $prysm;

include_once get_template_directory() . '/includes/loader.php';
include_once get_template_directory() . '/lib/option-loader.php';
include_once get_template_directory() . '/lib/cs-framework-functions.php';

if ( class_exists( 'OCDI_Plugin' ) ) {
    require_once get_template_directory() . '/includes/ocdi/functions.php';
}

add_action( 'after_setup_theme', 'prysm_theme_setup' );

function prysm_theme_setup() {
    load_theme_textdomain( 'prysm', get_template_directory() . '/languages' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    /**
     * Add default posts formats.
     */
    //add_theme_support( 'post-formats', array( 'audio', 'quote', 'gallery', 'video', ) );

    /**
     * Add default posts and comments RSS feed links to head.
     */
    add_theme_support( 'automatic-feed-links' );

    /**
     * Setup the WordPress core custom header feature.
     */
    add_theme_support( "custom-header" );

    /**
     * Setup the WordPress core custom background feature.
     */
    add_theme_support( "custom-background" );

    /**
     * Declare support for title theme feature.
     */
    add_theme_support( 'title-tag' );

    /**
     * Add support for responsive embedded content.
     */
    add_theme_support( 'responsive-embeds' );


    // Woocommerce support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // custom image Size
    add_image_size( 'finance_post_572_237', 572, 237, true );
    add_image_size( 'finance_post_200_132', 200, 132, true );
    add_image_size( 'finance_post_570_228', 570, 228, true );

    /** Register wp_nav_menus */
    register_nav_menus( [
        'header_menu' => esc_html__( 'Main Menu', 'prysm' ),
        'header_one_menu' => esc_html__( 'Onepage Menu', 'prysm' ),
    ] );

    if ( !isset( $content_width ) ) {
        $content_width = 960;
    }

    add_image_size( 'prysm-365x252', 365, 252, true );
    add_image_size( 'prysm-60x51', 60, 51, true );
    add_image_size( 'prysm-58x68', 58, 68, true );
    add_image_size( 'prysm-74x73', 74, 73, true );
    add_image_size( 'prysm-470x579', 470, 579, true );
}

function prysm_widget_init() {
    if ( function_exists( 'prysm_widget_call' ) ) {
        prysm_widget_call();
    }

    register_sidebar(
        [
            'name'          => esc_html__( 'Default Sidebar', 'prysm' ),
            'id'            => 'default_sidebar',
            'description'   => esc_html__( 'Widgets in this area will be shown on detail pages.', 'prysm' ),
            'class'         => '',
            'before_widget' => '<div class="pr-widget-wrap headline ul-li-block mt-40">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Sidebar 1', 'prysm' ),
            'id'            => 'fsidebar_1',
            'description'   => esc_html__( 'Widgets in this area will be shown in Footer.', 'prysm' ),
            'class'         => '',
            'before_widget' => '<div class="prysm_sidebar %2$s %s pr-footer-widget headline pera-content ul-li-block mt-30">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Sidebar 2', 'prysm' ),
            'id'            => 'fsidebar_2',
            'description'   => esc_html__( 'Widgets in this area will be shown in Footer.', 'prysm' ),
            'class'         => '',
            'before_widget' => '<div class="prysm_sidebar %2$s %s pr-footer-widget headline pera-content ul-li-block mt-30">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Sidebar 3', 'prysm' ),
            'id'            => 'fsidebar_3',
            'description'   => esc_html__( 'Widgets in this area will be shown in Footer.', 'prysm' ),
            'class'         => '',
            'before_widget' => '<div class="prysm_sidebar %2$s %s pr-footer-widget headline pera-content ul-li-block mt-30">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Sidebar 4', 'prysm' ),
            'id'            => 'fsidebar_4',
            'description'   => esc_html__( 'Widgets in this area will be shown in Footer.', 'prysm' ),
            'class'         => '',
            'before_widget' => '<div class="prysm_sidebar %2$s %s pr-footer-widget headline pera-content ul-li-block mt-30">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]

    );
}
add_action( 'widgets_init', 'prysm_widget_init' );

/**
 * Enqueue scripts and styles.
 */
function prysm_rtl_scripts() {
    if(class_exists('Woocommerce')){
        wp_enqueue_style( 'prysm-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.css', '1.1' );
    }	   

	if (is_rtl()) {		
		wp_enqueue_style( 'prysm-theme-rtl', get_template_directory_uri() . '/assets/css/rtl.css', '1.1' );
	}
}
add_action( 'wp_enqueue_scripts', 'prysm_rtl_scripts' );

add_filter( 'body_class', 'prysm_body_classes' );
function prysm_body_classes( $classes ) {

    $classes[] = '';

    return $classes;

}

//* Remove type tag from script and style
add_action( 'wp_loaded', 'prysm_prefix_output_buffer_start' );
function prysm_prefix_output_buffer_start() {
    ob_start( "prysm_prefix_output_callback" );
}

function prysm_prefix_output_callback( $buffer ) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}

/**
 * custom twig function
 */
function prysm_core_mailchimp( $id ) {
    echo do_shortcode( '[mc4wp_form]' );
}
function prysm_core_service_slider( $id ) {

    $post = get_post( $id );
    $title = $post->post_title;
    $prysm = get_post_meta( $id, 'prysm_servicepost', true );
    ?>
	<div class="pr-item-innerbox">
		<div class="pr-service-item-inner pr-single-service-item text-center">
			<div class="pr-service-item-icon d-flex align-items-center justify-content-center">
				<i class="<?php echo esc_attr( $prysm['service_icon'] ); ?>"></i>
			</div>
			<div class="pr-service-item-text headline pera-content position-relative">
				<h3><a href="<?php the_permalink( $id );?>"><?php echo esc_html( $title ); ?></a></h3>
				<p><?php echo wp_kses( $prysm['service_text'], prysm_expanded_alowed_tags() ) ?></p>
				<div class="pr-btn text-center">
					<a class="d-flex justify-content-center align-items-center" href="<?php the_permalink( $id );?>" target="_blank">Read More</a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
function prysm_core_service_circle_content( $id ) {

    $post = get_post( $id );
    $title = $post->post_title;
    $prysm = get_post_meta( $id, 'prysm_servicepost', true );
    ?>

<div class="pr-service-tab-item text-center">
	<div class="pr-item-icon">
		<i class="<?php echo esc_attr( $prysm['service_icon'] ); ?>"></i>
	</div>
	<div class="pr-item-text headline pera-content">
		<h3><a href="<?php the_permalink( $id );?>"><?php echo esc_html( $title ); ?></a></h3>
		<p><?php echo wp_kses( $prysm['service_text'], prysm_expanded_alowed_tags() ) ?></p>
		<div class="pr-btn text-center">
			<a class="d-flex justify-content-center align-items-center" href="<?php the_permalink( $id );?>" target="_blank">Read More</a>
		</div>
	</div>
</div>
	<?php
}
function prysm_core_service_circle_icon( $id ) {

    $post = get_post( $id );
    $title = $post->post_title;
    $prysm = get_post_meta( $id, 'prysm_servicepost', true );
    ?>

<i class="<?php echo esc_attr( $prysm['service_icon'] ); ?>"></i>

<?php
}
function prysm_core_team_slider( $id ) {

    $post = get_post( $id );
    $title = $post->post_title;
    $prysm = get_post_meta( $id, 'prysm_teampost', true );
    $imagez = $prysm['side_imagee']['url'];
    $image =  !empty(wp_get_attachment_image_src( attachment_url_to_postid( $imagez ), "large" )['0']);
    ?>
<div class="pr-team-item-area position-relative">
	<span class="shape-area position-absolute"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/team/t-sh1.png' ) ?>" alt="<?php echo get_the_title( $id ); ?>"></span>
	<span class="shape-area2 position-absolute"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/team/t-sh2.png' ) ?>" alt="<?php echo get_the_title( $id ); ?>"></span>
	<div class="team-item-img position-relative float-left">
		<?php if ( !empty( $imagez ) ): ?>
			<img src="<?php echo esc_url( $imagez ); ?>" alt="<?php echo get_the_title( $id ); ?>">
		<?php else: ?>
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/team/team-demo.png' ) ?>" alt="<?php echo get_the_title( $id ); ?>">
		<?php endif;?>
	</div>
	<div class="team-item-text headline pera-content">
		<h3><a href="<?php echo get_the_permalink( $id ); ?>"><?php echo get_the_title( $id ); ?></a></h3>
		<span><?php echo esc_html( $prysm['team_desg'] ); ?></span>
		<p><?php echo wp_kses( $prysm['team_bio'], prysm_expanded_alowed_tags() ) ?></p>
		<div class="social-item">
			<?php
				$socials = $prysm['team_socialicons'];
				foreach ( (array) $socials as $social ):
    		?>
			<a class="<?php echo esc_attr( $social['team_icon_clr'] ); ?>" href="<?php echo esc_url( $social['team_icon_link']['url'] ); ?>"><i class="<?php echo esc_attr( $social['team_icon_class'] ); ?>"></i></a>
			<?php endforeach;?>
		</div>
		<div class="pr-btn">
			<a class="d-flex justify-content-center align-items-center" href="<?php echo get_the_permalink( $id ); ?>"><?php echo esc_html__( 'Read More', 'prysm' ) ?></a>
		</div>
	</div>
</div>

<?php
}
function prysm_core_testimonial( $id ) {
    $post = get_post( $id );
    $title = $post->post_title;
    $prysm = get_post_meta( $id, 'prysm_testimonialpost', true );
    $star = $prysm['testimonial_stars'];
?>

<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
	<div class="pr-testimonial-item position-relative">
		<div class="pr-testi-item-img position-absolute">
			<img src="<?php echo get_the_post_thumbnail_url( $id ); ?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
		</div>
		<div class="pr-testi-item-icon position-absolute">
			<i class="fas fa-quote-right"></i>
		</div>
		<div class="pr-testi-item-text">
			<?php echo wp_kses( $prysm['testimonial_comment'], prysm_expanded_alowed_tags() ) ?>
		</div>
		<div class="pr-testi-item-author d-flex justify-content-between align-items-center headline">
			<div class="name-degi">
				<h3><a href="<?php the_permalink( $id );?>"><?php echo esc_html( $title ); ?></a></h3>
				<span><?php echo esc_html( $prysm['testimonial_design'] ); ?></span>
			</div>
			<div class="pr-testi-item-rate ul-li">
				<ul>
					<?php
						$x = 1;

						while ( $x <= $star ) {

							echo "<li><i class='fas fa-star'></i></li>";
							$x++;
						}
    				?>
				</ul>
			</div>
		</div>
	</div>
</div>
	<?php
}

function prysm_core_team( $id ) {
    $post = get_post( $id );
    $title = $post->post_title;
    $prysm = get_post_meta( $id, 'prysm_teampost', true );
    ?>

<div class="col-lg-3 col-md-6">
	<div class="pr-team-member-inner-item pr-single-team text-center">
		<div class="pr-team-member-img position-relative">
			<img src="<?php echo get_the_post_thumbnail_url( $id ); ?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
		</div>
		<div class="pr-team-member-text headline pera-content">
			<h3><a href="<?php the_permalink( $id );?>"><?php echo esc_html( $title ); ?></a></h3>
			<span><?php echo esc_html( $prysm['team_desg'] ); ?></span>
		</div>
		<div class="pr-team-member-social">
			<div class="social-item">
				<?php
					$socials = $prysm['team_socialicons'];
					foreach ( (array) $socials as $social ):
				?>
				<a class="<?php echo esc_attr( $social['team_icon_clr'] ); ?>" href="<?php echo esc_url( $social['team_icon_link']['url'] ); ?>"><i class="<?php echo esc_attr( $social['team_icon_class'] ); ?>"></i></a>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>
	<?php
}
function prysm_core_blog( $id ) {
    $post = get_post( $id );
    $title = $post->post_title;

    $args = [ 'post_type' => 'post', 'p' => $id ];
    $new_query = new WP_Query( $args );
    if ( $new_query->have_posts() ):
        while ( $new_query->have_posts() ):
            $new_query->the_post();
            $author_id = $post->post_author;
            $avatar_url = get_avatar_url( $author_id );
            ?>
		<div class=" pr-item-innerbox">
			<div class="pr-blog-inner-item">
				<?php if ( has_post_thumbnail() ): ?>
				<div class="pr-blog-img-item">
					<img src="<?php the_post_thumbnail_url();?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
				</div>
				<?php endif;?>
			<div class="pr-blog-text-item headline pera-content">
				<div class="item-meta">
					<a href="<?php the_permalink();?>"><i class="fal fa-calendar-alt"></i><?php the_time( 'F d, Y' );?></a>
				</div>
				<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
				<p><?php echo substr( strip_tags( get_the_content() ), 0, 70 ); ?></p>
				<div class="item-author-meta d-flex justify-content-between align-items-center">
					<div class="b-item-img">
						<img src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
						<a href="<?php get_the_author_link();?>"><?php the_author();?></a>
					</div>
					<div class="pr-blog-more">
						<a href="<?php the_permalink();?>"> <?php echo esc_html__( 'More Details', 'prysm' ) ?><i class="fal fa-long-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

		<?php
endwhile;
    endif;
    wp_reset_postdata();
}
function prysm_core_image_path( $name ) {
    echo ( get_template_directory_uri() . "/assets/img/upload/" . $name );
}

/**
 * add twig function
 */
function prysm_core_function( $twig ) {

    $twig->addFunction( new Twig_SimpleFunction( "mailchimp", "prysm_core_mailchimp" ) );
    $twig->addFunction( new Twig_SimpleFunction( "service_slider", "prysm_core_service_slider" ) );
    $twig->addFunction( new Twig_SimpleFunction( "testimonial", "prysm_core_testimonial" ) );
    $twig->addFunction( new Twig_SimpleFunction( "member", "prysm_core_team" ) );
    $twig->addFunction( new Twig_SimpleFunction( "service_icon", "prysm_core_service_circle_icon" ) );
    $twig->addFunction( new Twig_SimpleFunction( "service_content", "prysm_core_service_circle_content" ) );
    $twig->addFunction( new Twig_SimpleFunction( "image", "prysm_core_image_path" ) );
    $twig->addFunction( new Twig_SimpleFunction( "memberz", "prysm_core_team_slider" ) );
    $twig->addFunction( new Twig_SimpleFunction( "blog", "prysm_core_blog" ) );
}

add_action( "unlimited_elements/twig/add_custom_features", "prysm_core_function" );
