<?php
/**
 * Water - Save it functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Water_-_Save_it
 */

if ( ! function_exists( 'water_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function water_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Water - Save it, use a find and replace
		 * to change 'water' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'water', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'top-menu' => esc_html__( 'Top Menu', 'water' ),
			'social-menu' => esc_html__( 'Social Menu', 'water' ),
			'bottom-menu' => esc_html__( 'Bottom Menu', 'water' ),
			'simple-menu' => esc_html__( 'Simple Menu', 'water' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'water_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote' ) );
	}
endif;
add_action( 'after_setup_theme', 'water_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function water_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'water_content_width', 640 );
}
add_action( 'after_setup_theme', 'water_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function water_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'water' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'water' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'water_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function water_scripts() {
	wp_enqueue_style( 'water-style', get_stylesheet_uri() );

	wp_enqueue_script( 'water-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'water-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'water_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load jQuery from CDN.
 * https://digwp.com/2009/06/including-jquery-in-wordpress-the-right-way/
 */
function kg_include_custom_jquery() {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'kg_include_custom_jquery');




/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'water' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'water' ),
        'menu_name'           => __( 'Films', 'water' ),
        'parent_item_colon'   => __( 'Parent Movie', 'water' ),
        'all_items'           => __( 'All Films', 'water' ),
        'view_item'           => __( 'View Movie', 'water' ),
        'add_new_item'        => __( 'Add New Movie', 'water' ),
        'add_new'             => __( 'Add New', 'water' ),
        'edit_item'           => __( 'Edit Movie', 'water' ),
        'update_item'         => __( 'Update Movie', 'water' ),
        'search_items'        => __( 'Search Movie', 'water' ),
        'not_found'           => __( 'Not Found', 'water' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'water' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'movies', 'water' ),
        'description'         => __( 'Movie news and reviews', 'water' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );

/* 
		* Shortcodes 
		-----------------
*/

// Add Shortcode
function col_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'class' => 'half',
		),
		$atts
	);

	return '<div class="half">' . $content . '</half>';

}
add_shortcode( 'col', 'col_shortcode' );



// Add Shortcode
function recent_posts_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'posts' => '5',
		),
		$atts,
		'recent-posts'
	);

	// Query
	$the_query = new WP_Query( array ( 'posts_per_page' => $atts['posts'] ) );
	
	// Posts
	$output = '<ul>';
	while ( $the_query->have_posts() ) :
		$the_query->the_post();
		$output .= '<li>' . get_the_title() . '</li>';
	endwhile;
	$output .= '</ul>';
	
	// Reset post data
	wp_reset_postdata();
	
	// Return code
	return $output;

}
add_shortcode( 'recent-posts', 'recent_posts_shortcode' );




