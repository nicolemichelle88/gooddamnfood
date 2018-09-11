<?php
/**
 * Perfect Blog Theme Customizer
 *
 * @package perfect-blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function perfect_blog_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'perfect_blog_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'perfect-blog' ),
	    'description' => __( 'Description of what this panel does.', 'perfect-blog' ),
	) );

	//Layouts
	$wp_customize->add_section( 'perfect_blog_left_right', array(
    	'title'      => __( 'Layout Settings', 'perfect-blog' ),
		'priority'   => 30,
		'panel' => 'perfect_blog_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('perfect_blog_layout_options',array(
	        'default' => __('Right Sidebar','perfect-blog'),
	        'sanitize_callback' => 'perfect_blog_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('perfect_blog_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Change Layouts','perfect-blog'),
	        'section' => 'perfect_blog_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','perfect-blog'),
	            'Right Sidebar' => __('Right Sidebar','perfect-blog'),
	            'One Column' => __('One Column','perfect-blog'),
	            'Three Columns' => __('Three Columns','perfect-blog'),
	            'Four Columns' => __('Four Columns','perfect-blog'),
	            'Grid Layout' => __('Grid Layout','perfect-blog')
	        ),
	) );

	//Top Bar
	$wp_customize->add_section('perfect_blog_topbar_header',array(
		'title'	=> __('Social Icon link','perfect-blog'),
		'description'	=> __('Add Top Bar Content here','perfect-blog'),
		'priority'	=> null,
		'panel' => 'perfect_blog_panel_id',
	) );

	$wp_customize->add_setting('perfect_blog_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('perfect_blog_youtube_url',array(
		'label'	=> __('Add Youtube link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_youtube_url',
		'type'		=> 'url'
	) );

	$wp_customize->add_setting('perfect_blog_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('perfect_blog_facebook_url',array(
		'label'	=> __('Add Facebook link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_facebook_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('perfect_blog_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('perfect_blog_twitter_url',array(
		'label'	=> __('Add Twitter link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_twitter_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('perfect_blog_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('perfect_blog_rss_url',array(
		'label'	=> __('Add RSS link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_rss_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('perfect_blog_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('perfect_blog_insta_url',array(
		'label'	=> __('Add Instagram link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_insta_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('perfect_blog_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('perfect_blog_pint_url',array(
		'label'	=> __('Add Pintrest link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_pint_url',
		'type'	=> 'url'
	) );

	//home page slider
	$wp_customize->add_section( 'perfect_blog_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'perfect-blog' ),
		'priority'   => null,
		'panel' => 'perfect_blog_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'perfect_blog_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'perfect_blog_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'perfect_blog_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'perfect-blog' ),
			'section'  => 'perfect_blog_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Category section
  	$wp_customize->add_section('perfect_blog_cat_section',array(
	    'title' => __('Category post Section','perfect-blog'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'perfect_blog_panel_id',
	)); 

	$wp_customize->add_setting('perfect_blog_cat_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('perfect_blog_cat_title',array(
		'label'	=> __('Section Title','perfect-blog'),
		'section'=> 'perfect_blog_cat_section',
		'setting'=> 'perfect_blog_cat_title',
		'type'=> 'text'
	));

	$categories = get_categories();
		$cats = array();
			$i = 0;
		  	foreach($categories as $category){
		  	if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('perfect_blog_category',array(
	    'default' => 'select',
	    'sanitize_callback' => 'perfect_blog_sanitize_choices',
  	));
  	$wp_customize->add_control('perfect_blog_category',array(
	    'type'    => 'select',
	    'choices' => $cats,
	    'label' => __('Select Category to display Latest Post','perfect-blog'),
	    'section' => 'perfect_blog_cat_section',
	));

	//footer
	$wp_customize->add_section('perfect_blog_footer_section',array(
		'title'	=> __('Footer Text','perfect-blog'),
		'description'	=> __('Add some text for footer like copyright etc.','perfect-blog'),
		'priority'	=> null,
		'panel' => 'perfect_blog_panel_id',
	));
	
	$wp_customize->add_setting('perfect_blog_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('perfect_blog_footer_copy',array(
		'label'	=> __('Copyright Text','perfect-blog'),
		'section'	=> 'perfect_blog_footer_section',
		'type'		=> 'text'
	));
}
add_action( 'customize_register', 'perfect_blog_customize_register' );	


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Perfect_Blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Perfect_Blog_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Perfect_Blog_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Blog Pro Theme', 'perfect-blog' ),
					'pro_text' => esc_html__( 'Go Pro',         'perfect-blog' ),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/premium-wordpress-blog-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'perfect-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'perfect-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Perfect_Blog_Customize::get_instance();