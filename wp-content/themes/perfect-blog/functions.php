<?php
/**
 * Perfect Blog functions and definitions
 *
 * @package perfect-blog
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
 
/* Theme Setup */
if ( ! function_exists( 'perfect_blog_setup' ) ) :

function perfect_blog_setup() {
	
	$GLOBALS['content_width'] = apply_filters( 'perfect_blog_content_width', 640 );

	load_theme_textdomain( 'perfect-blog', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	add_image_size('perfect-blog-homepage-thumb',250,145,true);
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'perfect-blog' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
		)	
	);
	add_editor_style( array( 'css/editor-style.css', perfect_blog_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'perfect_blog_activation_notice' );
	}
}

endif;
add_action( 'after_setup_theme', 'perfect_blog_setup' );

// Notice after Theme Activation
function perfect_blog_activation_notice() {
	echo '<div class="notice notice-success is-dismissible get-started">';
		echo '<p>'. esc_html__( 'Thank you for choosing ThemeShopy. We are sincerely obliged to offer our best services to you. Please proceed towards welcome page and give us the privilege to serve you.', 'perfect-blog' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=perfect_blog_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click here...', 'perfect-blog' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function perfect_blog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'perfect-blog' ),
		'description'   => __( 'Appears on blog page sidebar', 'perfect-blog' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'perfect-blog' ),
		'description'   => __( 'Appears on page sidebar', 'perfect-blog' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'perfect-blog' ),
		'description'   => __( 'Appears on page sidebar', 'perfect-blog' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Home Page Sidebar', 'perfect-blog' ),
		'description'   => __( 'Appears on Home Page', 'perfect-blog' ),
		'id'            => 'home-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'perfect-blog' ),
		'description'   => __( 'Appears on footer', 'perfect-blog' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'perfect-blog' ),
		'description'   => __( 'Appears on footer', 'perfect-blog' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'perfect-blog' ),
		'description'   => __( 'Appears on footer', 'perfect-blog' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'perfect-blog' ),
		'description'   => __( 'Appears on footer', 'perfect-blog' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'perfect_blog_widgets_init' );

/* Theme Font URL */
function perfect_blog_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Vollkorn:400,400i,600,600i,700,700i,900,900i';
	$font_family[] = 'Exo:100,100i,300,300i,400,400i,500,500i,600,600i,700,700i,800';
	
	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}	

/* Theme enqueue scripts */

function perfect_blog_scripts() {
	wp_enqueue_style( 'perfect-blog-font', perfect_blog_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'perfect-blog-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'perfect-blog-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'css-nivo-slider', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'SmoothScroll-jquery', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery') );
	wp_enqueue_script( 'jquery-nivo-slider-jquery', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'perfect-blog-customscripts-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	wp_enqueue_style('perfect-blog-ie', get_template_directory_uri().'/css/ie.css', array('perfect-blog-basic-style'));
	wp_style_add_data( 'perfect-blog-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'perfect_blog_scripts' );

define('perfect_blog_BUY_NOW','https://www.themeshopy.com/themes/premium-wordpress-blog-theme/','perfect-blog');
define('perfect_blog_LIVE_DEMO','https://themeshopy.com/perfect-blog/','perfect-blog');
define('perfect_blog_PRO_DOC','https://themeshopy.com/docs/perfect-blog-pro/','perfect-blog');
define('perfect_blog_FREE_DOC','https://themeshopy.com/docs/free-perfect-blog/','perfect-blog');
define('perfect_blog_CONTACT','https://wordpress.org/support/theme/perfect-blog/','perfect-blog');
define('PERFECT_BLOG_CREDIT','https://www.themeshopy.com/','perfect-blog');

if ( ! function_exists( 'perfect_blog_credit' ) ) {
	function perfect_blog_credit(){
		echo "<a href=".esc_url(PERFECT_BLOG_CREDIT)." target='_blank'>".esc_html__('Themeshopy','perfect-blog')."</a>";
	}
}

function perfect_blog_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/
 function perfect_blog_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Custom header additions. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';
/* admin file. */
require get_template_directory() . '/inc/admin/admin.php';